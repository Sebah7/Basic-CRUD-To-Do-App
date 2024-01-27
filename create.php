<?php
// database connection
include_once ("setup.php");

// When request is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Get values from the ($_POST) 
        $title = $_POST['title'];
        $description = $_POST['description'];
      // if the done is set in POST request it gets value 1 otherwise it is assigned a 0
        $done = isset($_POST['done']) ? 1 : 0;

try{
  // To add a new task to the table
 $sql= "INSERT INTO Tasks(title, description, done) 
 VALUES('$title', '$description', $done)";
 $conn->exec($sql);

 echo "New task created successfully";
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
}

$conn = null;
?>

<?=header_temp('Create')?>

<div class="content update">
    <h2>Create a task</h2>
    <form action="create.php" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Buy a book" id="title" required>
        <label for="description">Description</label>
        <input type="text" name="description" placeholder="Buy the book for the store" id="description" required>
        <input type="submit" value="Create">
    </form>
</div>

<?=footer_temp()?>