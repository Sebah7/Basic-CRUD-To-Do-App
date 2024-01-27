<?php

$conn = pdo_mysql();

function pdo_mysql() {
    $servername = 'db';
    $dbuser = 'root';
    $dbpassword = 'mariadb';
    $dbname = 'sebtodo';

		// A Database connection using PDO
        try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbuser, $dbpassword);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Connected successfully";
								return $conn; // Return PDO connection object

            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
								return null;
            }		
}

// A header template with a $title parameture for different use
function header_temp($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
    <nav class="nav">
	<div>
		<h1>Todo App</h1>
				<a href="index.php"><i class="fas fa-home"></i>Home</a>
		    <a href="read.php"><i class="fas fa-list-check"></i> View</a>
				<a href="create.php"><i class="fas fa-address-book"></i> Add</a>
	</div>
</nav>
EOT; // Heredoc syntax for the end of header template
}

// The start of footer template function
function footer_temp() {
echo <<<EOT
<footer>
<div>
    <p>&copy; U04 for Chasacadmey by Sebah Abubeker</p>
</div>
</footer>
</body>
</html>
EOT; // Heredoc syntax for the end of footer template
}
?>
