
<?php
include 'setup.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo App</title>
</head>
<body>
    <h2>Add a task</h2>
    <form action="create.php" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
        
        <label for="done">Done:</label>
        <input type="checkbox" name="done" value="1">

        <button type="submit">Add Task</button>
    </form>

    <h2>Task List</h2>
    <?php
include 'read.php'; // Include the script to display tasks
?>

</body>
</html>
