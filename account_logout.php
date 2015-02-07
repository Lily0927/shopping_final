<?php 
	require_once 'include.php';
	session_start();
	if (isset($_SESSION['username'])) {
		unset($_SESSION['username']);
		$result = session_destroy();
		?>
		<!doctype html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>logout</title>
			<meta http-equiv="refresh" content="1; url=index.php">
		</head>
		<body>
			<?php 
				if ($result) {
					echo "log out !";
				}else{
					echo "log out error !";
				}
			 ?>
		</body>
		</html>
		<?php
	}else{
		?>
		<!doctype html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>logout</title>
			<meta http-equiv="refresh" content="1; url=index.php">
		</head>
		<body>
			<?php 
				echo "You haven't log in !";
			 ?>
		</body>
		</html>
		<?php
	}
 ?>