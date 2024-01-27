<?php
include 'setup.php';
$msg = '';

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
  } else {
      exit('No ID specified!');
  }
?>

<?=header_temp('Delete')?>

<div class="content delete">
	<h2>Delete task #<?=$task['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete task #<?=$task['id']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$task['id']?>&confirm=yes">Yes</a>
        <a href="delete.php?id=<?=$task['id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=footer_temp()?>