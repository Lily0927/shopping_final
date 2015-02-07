<?php
	require_once 'include.php';
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$result = login($username,$password);
	if ($result == true) {
		$_SESSION['username'] = $username;
		echo "true";
	}else{
		echo "login error!";
	}
?>