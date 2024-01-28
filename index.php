
<?php
include 'setup.php';

?>

<?=header_temp('Home')?>

<div class="content">
	<div class="homeflex">
   <div class="flex-items">
	 <h1>The 2024 Todo App</h1>
	<p>Helps you keep track of your tasks!</p>
	 </div>
   <div class="flex-items">
	 <ul class="index-ul">
		<li><a class="index-href" href="create.php">Add a new task</a></li>
		<li><a class="index-href" href="read.php">View and edit tasks</a></li>
	</ul>
	 </div>	
</div>
</div>

<?=footer_temp()?>
