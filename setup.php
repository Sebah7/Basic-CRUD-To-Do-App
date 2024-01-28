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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="media/icon.png">
    <meta name="author" content="Sebah Abubeker">
    <meta name="description" content="Track your tasks and be on top!">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	</head>
	<body>
	<header>
    <nav>
	<ul>
				<li><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
		    <li><a href="read.php"><i class="fas fa-list-check"></i> View</a></li>
				<li><a href="create.php"><i class="fas fa-address-book"></i> Add</a></li>
	</ul>
</nav>
</header>
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
