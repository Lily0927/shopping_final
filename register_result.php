<?php 
	require_once 'php_fns.php';
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$lname = $_POST['lastname'];
    $fname = $_POST['firstname'];
    $company = $_POST['company'];


	$result = register($username,$password,$email,$lname,$fname,$company);
	if ($result == "true") {
		$_SESSION['username'] = $username;
		echo "true";
	}else{
		echo "register failed !";
	}
	
 ?>