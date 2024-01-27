<?php
include_once("setup.php");

$msg = '';
try {

// To check if the Task id is avalible
if (isset($_GET['id'])) {
    if (!empty($_POST)) {

      $title = $_POST['title'];
      $description = $_POST['description'];
      $done = isset($_POST['done']) ? 1 : 0;

       // Update the task
       $stmt = $conn->prepare('UPDATE Tasks SET title = ?, description = ?, done = ? WHERE id = ?');
       $stmt->execute([$title, $description, $done, $_GET['id']]);
       $msg = 'Updated Successfully!';
    }

    // getting task from the Tasks table
    $stmt = $conn->prepare('SELECT * FROM Tasks WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $task = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$task) {
      exit('Task doesn\'t exist with that ID!');
  }

} else {
  throw new Exception('No ID specified!');
}
} catch (Exception $e) {
  $msg = 'Error: ' . $e->getMessage();
}

$conn = null; 
?>

<?=header_temp('Update')?>

<div class="content update">
	<h2>Update Task #<?=$task['id']?></h2>
    <form action="update.php?id=<?=$task['id']?>" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="buy book" value="<?=$task['title']?>" id="title" required>
        
        <label for="description">Description</label>
        <input type="text" name="description" placeholder="descriptiondescriptiondescription" value="<?=$task['description']?>" id="description" required>
        
        <label for="done">Done:</label>
        <input type="checkbox" name="done" <?=$task['done'] == '1' ? 'checked' : ''?>>

        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=footer_temp()?>