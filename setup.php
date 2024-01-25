<?php

$servername = 'db';
$username = 'root';
$password = 'mariadb';
$dbname = 'sebtodo';
// $port = '3306'; // Use the port number used by your MySQL/MariaDB server inside the Docker container

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>