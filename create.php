<?php
include_once ("setup.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $done = isset($_POST['done']) ? 1 : 0;

try{
 $sql= "INSERT INTO Tasks(title, description, done) 
 VALUES('$title', '$description', $done)";

 $conn->exec($sql);

 echo "New task created successfully";
} catch (PDOException $e) {
 echo $sql . "<br>" . $e->getMessage();
}
}

$conn = null;
?>
