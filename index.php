
<?php
include 'setup.php';

?>

<?=header_temp('Home')?>

<div class="content">
	<h1>The 2024 Todo App</h1>
	<p>Helps you keep track of your tasks!</p>
	<ul>
		<li><a href="create.php">Add a new task</a></li>
		<li><a href="read.php">View and edit tasks</a></li>
	</ul>
</div>

<?=footer_temp()?>
