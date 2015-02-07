<?php 
	function db_connect()
	{
		$result = new mysqli('127.0.0.1','root','','shopping');
		if (!$result) {
			return false;
		}
		$result->autocommit(TRUE);
		return $result;
	}
 ?>