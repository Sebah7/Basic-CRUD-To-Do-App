<?php
include 'setup.php';
$msg = '';

// To get all data from database
try {
    $sql = 'SELECT * FROM Tasks ORDER BY id';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {

    // Get task by id
    $stmt = $conn->prepare('SELECT * FROM Tasks WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $task = $stmt->fetch(PDO::FETCH_ASSOC);

     // if task doesn't exists
    if (!$task) {
        exit('Task doesn\'t exist with that ID!');
    }
    
    // ask user before deleting
    if (isset($_GET['confirm'])) {
                // If "Yes" button then delete
      if ($_GET['confirm'] == 'yes') {
          $stmt = $conn->prepare('DELETE FROM Tasks WHERE id = ?');
          $stmt->execute([$_GET['id']]);
          $msg = 'You have deleted the task!';
      } else { // If "No" button then redirect to view
          header('Location: read.php');
          exit;
      }
    }


} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['ids']) && is_array($_GET['ids'])) {
    // multiple slect delete
    $ids = $_GET['ids'];

    $ids_str = implode(',', $ids);

    try {
        // Selected id task delete
        $stmt = $conn->prepare("DELETE FROM Tasks WHERE id IN ($ids_str)");
        $stmt->execute();

        $msg = 'Selected tasks have been deleted successfully!';
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    exit('Invalid request!');
}
?>

<?=header_temp('Delete')?>

<div class="content delete">
	<h2>Delete tasks</h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
        <p>Are you sure you want to delete task #<?=$task['id']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$task['id']?>&confirm=yes">Yes</a>
        <a href="delete.php?id=<?=$task['id']?>&confirm=no">No</a>
    </div>
    <hr>
        <p>Or delete multiple tasks:</p>
        <form action="delete.php" method="get">
            <?php foreach ($tasks as $task): ?>
                <label>
                    <input type="checkbox" name="ids[]" value="<?=$task['id']?>"> Task #<?=$task['id']?>
                </label><br>
            <?php endforeach; ?>
            <input type="submit" value="Delete Selected Tasks" class="delete-button">
        </form>
    <?php endif; ?>
</div>

<?=footer_temp()?>