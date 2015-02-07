<?php 
	require_once 'include.php';
	session_start();
	$username = $_SESSION['username'];
	$result = get_orderid_shoppingcart($username);
	foreach ($result as $row) {
		$order_id = $row['order_id'];
		update_orderid($order_id);
		delete_shoppingcart($username);
	}
	echo "true";
 ?>