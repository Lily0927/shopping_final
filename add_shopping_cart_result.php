<?php 
	require_once 'include.php';
	session_start();
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
	}else{
		echo "Please Login First !!";
		exit();
	}
	$itemid = $_POST['itemid'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$num = $_POST['num'];

	$result = insert_shoppingcart($username,$itemid,$num);
	if ($result == true) {
		echo "true";
	}else{
		echo "false".$result;
	}
 ?>