<?php 
	include 'include.php';
	session_start();
	$name = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$zip = $_POST['zip'];
	$phonenumber = $_POST['phonenumber'];
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
	}else{
		echo "false1";
		exit();
	}
	$result = insert_address_select($username,$name,$address,$city,$state,$country,$zip,$phonenumber);
	if ($result == true) {
		echo "true";
	}else{
		echo "false2".$username;
	}
 ?>