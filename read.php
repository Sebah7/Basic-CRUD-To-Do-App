<?php

include 'setup.php';

// Fetch and display existing tasks
$result = $conn->query("SELECT * FROM Tasks");

if ($result->rowCount() > 0) {
    echo "<ul>";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<li>{$row['title']} - {$row['description']} (Done: {$row['done']})</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No tasks found.</p>";
}

// Close the database connection
$conn = null;
?>
