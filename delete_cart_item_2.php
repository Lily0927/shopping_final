<?php 
	require 'include.php';
	session_start();
	if(isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
	}else{
		?>
		<!doctype html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Please Login</title>
			<link rel="shortcut icon" href="./images/logo.ico">
			<meta http-equiv="refresh" content="1; url=account_login.php">
		</head>
		<body>
			<p>Please Login First</p>
		</body>
		</html>
		<?php
		exit();
	}
	if(isset($_GET['itemid'])){
		$id = $_GET['itemid'];
		$result = delete_shoppingcart_item($username, $id);

		if ($result == true) {
			echo "true";
			?>
			<script type="text/javascript">
				history.go(-1);
			</script>
			<?php
		}else{
			echo "false".$result;
		}
	}else{
		echo "error";
	}
 ?>