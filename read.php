<?php

include_once 'setup.php'; // Include the database connection

try {
    // Prepare the SQL statement to fetch taskss
    $sql = 'SELECT * FROM Tasks ORDER BY id';
    $stmt = $conn->prepare($sql);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch the taskss as associative array
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

$conn = null;

?>

<?=header_temp('Read')?>

<div class="content read">
	<h2>Viewing Tasks</h2>
	<table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Description</td>
                <td>Done</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <!-- A dynamic php loop -->
            <?php $count = 1; ?> <!-- for the task count -->
            <?php foreach ($tasks as $task): ?>
            <tr>
                 <td><?=$count++?></td> <!-- to display count -->
                <td><?=$task['title']?></td>
                <td><?=$task['description']?></td>
                <td><input type="checkbox" <?=$task['done'] == '1' ? 'checked' : ''?>
                disabled></td> <!-- Checkbox -->
                <td class="actions">
                    <a href="update.php?id=<?=$task['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$task['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?=footer_temp()?>
