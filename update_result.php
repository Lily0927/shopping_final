<?php 
	require_once 'include.php';
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
        //Added by Yezhuo Zhu
        //Get the values passed with post method using index 'lastname', 'firstname' and 'company'
        $lname = $_POST['lastname'];
        $fname = $_POST['firstname'];
        $company = $_POST['company'];

        //Modified by Yezhuo Zhu
        //Pass the new parameters lname, fname and company to the register function.
	$result = update($username,$email,$lname,$fname,$company);
	if ($result == "true") {
		$_SESSION['username'] = $username;
		echo "true";
	}else{
		echo "register failed !";
	}
	
 ?>
