<?php 
	require_once 'include.php';
	function fillout($post)
	{
		foreach ($post as $key => $value) {
			if(!isset($key) || ($value == ''))
			{
				return false;
			}
		}
		return true;
	}
	function login($username,$password)
	{
		$db = db_connect();
		$result = $db->query("select * from user where username='".$username."' and password=sha1('".$password."')");
		if (!$result) {
			echo "Could not execute the query";	
		}
		$num = $result->num_rows;
		if($result->num_rows > 0){
			return true;
		}else{
			echo "Username or password error !";
			return false;
		}
	}
	function check_login_user()
	{
		if (isset($_SESSION['username'])) {
			
		}else{
			throw new Exception("You have not login");
			
		}
	}
	function db_result_to_array($result)
	{
		$res_array = array();
		for ($count=0; $row = $result->fetch_assoc(); $count++) { 
			$res_array[$count] = $row;
		}
		return $res_array;
	}
	function register($username,$password,$email,$lName,$fName,$company)
	{
		$db=db_connect();
		$result = $db->query("select * from user where username = '".$username."'");
		if (!$result) {
			echo "Could not execute the query";
			
		}
		if ($result->num_rows > 0) {
			echo "The username have been register! try anoter";	
			return false;
		}
		//Modified by Yezhuo Zhu
                //Insert values of new columns: accType, lName, fName, dob, company, lastLogin
                //For the column accType, dob and lastLogin, use default value B, NULL, NULL
		$result = $db->query("insert into user values('".$username."',sha1('".$password."'),'".$email."','".$lName."','".$fName."','".$company."')");

		if (!$result) {
			//echo "insert into user values('".$username."',sha1('".$password."'),'".$email."','".$lName."','".$fName."','".$company."')";
			echo false;
		}
		else{
			//echo "insert into user values('".$username."',sha1('".$password."'),'".$email."','".$lName."','".$fName."','".$company."')";
			return true;
		}
	}
/****************************************************************************/	
	function get_info($username)
	{
		$db = db_connect();
		$query = "select * from user where username = ".$username;
		$result = @$db->query($query);

		
		if (!$result) {
			return false;
		}
		$result = db_result_to_array($result);
		return $result;
	}
	function get_all_itemarray()
	{
		$db = db_connect();
		$query = "select i.id,i.name,i.price,i.pic_name from item as i";
		$result = @$db->query($query);

		
		if (!$result) {
			return false;
		}
		$num_item = @$result->num_rows;
		if ($num_item == 0) {
			return false;
		}
		$result = db_result_to_array($result);
		return $result;
	}
	function cgt_get_itemarray($cgtid)
	{
		if ((!$cgtid) || ($cgtid == '')) {
			echo "<p>item is empty !";
			return false;
		}

		$db = db_connect();
//		$query = "select id,name,price from item where cgt_id='".$cgtid."'";
		$query = "select i.id,i.name,i.price,i.pic_name from item as i  where cgt_id =".$cgtid;
		$result = @$db->query($query);

		
		if (!$result) {
			return false;
		}
		$num_item = @$result->num_rows;
		if ($num_item == 0) {
			return false;
		}
		$result = db_result_to_array($result);
		return $result;
	}
	function cgo_get_itemarray($cgoid)
	{
		if ((!$cgoid) || ($cgoid == '')) {
			return false;
		}

		$db = db_connect();
//		$query = "select id,name,price from item where cgo_id='".$cgoid."'";
		$query = "select id,name,price,pic_name from item  where cgo_id = '".$cgoid."'";
		$result = @$db->query($query);
		if (!$result) {
			return false;
		}
		$num_item = @$result->num_rows;
		if ($num_item == 0) {
			return false;
		}
		$result = db_result_to_array($result);
		return $result;
	}
	function search_get_itemarray($itemname)
	{
		if ((!$itemname) || ($itemname == '')) {
			return false;
		}
	//	echo $itemname;
		$db = db_connect();
//		$query = "select id,name,price from item where name like'%".$itemname."%'";
		$query = "select i.id,i.name,i.price,i.pic_name from item as i  where i.name like '%".$itemname."%'";
		$result = @$db->query($query);
		if (!$result) {
	//		echo "false1";
			return false;
		}
	//	echo "right1";
		$num_item = @$result->num_rows;
		if ($num_item == 0) {
//			echo "no item";
			return false;
		}
		$result = db_result_to_array($result);
		return $result;
	}
/****************************item-details.php***************************************/

	function id_get_details($id)
	{
		$db = db_connect();
//		$query = "select id,name,price,info from item where id = '".$id."'";
		$query = "select i.id,i.cgo_id,i.cgt_id,i.name,i.price,i.pic_name,i.info from item as i where i.id = '".$id."'";
		$result = @$db->query($query);
		if (!$result) {
			return false;	
		}
		$item_detail = @$result->num_rows;
		if ($item_detail == 0) {
			return false;
		}
		$result = db_result_to_array($result);
		return $result;
	}
	function get_cgtid_id($id)
	{
		$db = db_connect();
		$result = $db->query("select cgt_id from item where id = '".$id."';");
		if (!$result) {
			echo "execute select cgtid error!!";
		}
		$result = db_result_to_array($result);
		foreach ($result as $row) {
			$cgtid = $row['cgt_id'];
		}
		return $cgtid;
	}
	function id_get_message($id)
	{
		$db = db_connect();
		$query = "select content from review where id = '".$id."'";
		$result = @$db->query($query);
		if(!$result)
		{
			return false;
		}
		$message = @$result->num_rows;
		if($message == 0)
		{
			return false;
		}
		$result = db_result_to_array($result);
		return $result;
	}
	function insert_shoppingcart($username,$itemid,$num)
	{
		$db = db_connect();
		$query = "insert into shoppingcart (username,itemid,num) values('".$username."',".$itemid.",".$num.");";
		$result = $db->query($query);
		if (!$result) {
			return false;
		}else{
			return true;
		}
		return true;
	}

/****************************************************************************/
function insert_order($id,$username,$num,$price)
{
	$db = db_connect();
	$query="insert into order_id (id,username,num,price) values(".$id.",'".$username."',".$num.",".$price.");";
	$result = $db->query($query);
	if (!$result) {
		echo "could't execute the query to insert into database!";
	}else{
		$order_id = $db->insert_id;
		return $order_id;
	}
}

/****************************************************************************/
function payment($total_price)
{
	return true;
}
function delete_order($username)
{
	$db = db_connect();
	$result = $db->query("select orderid from order_id where enddate is null;");
	if (!$result) {
		echo "false select empty order";
		exit();
	}
	$num = $result->num_rows;
	if ($num == 0) {
		return true;
	}
	$result = db_result_to_array($result);
	foreach ($result as $row) {
		$orderid = $row['orderid'];
		$result_d = $db->query("delete from shipinfor where orderid = '".$orderid."';");
		if (!$result_d) {
			echo "delete shipinfor error!";
			exit();
		}
		$result_d = $db->query("delete from order_id where orderid = '".$orderid."';");
		if (!$result_d) {
			echo "delete order error!";
			exit();
		}
	}
	
}
function insert_address($order_id,$addressid)
{
	$db = db_connect();
//	$name = addslashes($name);
//	echo "--".$city."--";
	// $address = addslashes($address);
	// $city = addslashes($city);
	// $state = addslashes($state);
	// $country = addslashes($country);
//	echo $order_id.$name.$address.$city.$state.$country.$zip;
//	$query = "insert into address values('".$order_id."','".$name."','".$address."','".$city."','".$state."','".$country."','".$zip."','".$phonenumber."');"; 
	$query =  $query= "insert into shipinfor select ".$order_id." , ship_name,ship_address,ship_city,ship_state,ship_country,ship_zip from address where addressid = ".$addressid;           
	//echo "--".$query."--";
	$result = $db->query($query);
	if (!$result) {
		return false;
	}else{
		return true;
	}
}
function update_orderid($order_id)
{
	$db = db_connect();
	$result = $db->query("update order_id set enddate = now() where orderid = '".$order_id."';");
	if (!$result) {
		echo "couldn't not execute query update order_id!";
	}else{
		return true;
	}
	return true;
}
/****************************************************************************/
function insert_address_select($username,$name,$address,$city,$state,$country,$zip,$phonenumber)
{
	$db = db_connect();
	$address = addslashes($address);
	$city = addslashes($city);
	$state = addslashes($state);
	$country = addslashes($country);
	$query="insert into address (username,ship_name,ship_address,ship_city,ship_state,ship_country,ship_zip,ship_phonenumber) values ('".$username."','".$name."',
		'".$address."','".$city."','".$state."','".$country."',".$zip.",".$phonenumber.");";
    //echo $query;
	$result = $db->query($query);
	if (!$result) {
		return false;
	}else{
		return true;
	}
}

function get_address($username)
{
	$db = db_connect();
	$query = "select addressid,ship_name,ship_country,ship_state,ship_city,ship_address,ship_zip,ship_phonenumber from address where username = '".$username."'";
	$result = $db->query($query);
	if (!$result) {
		return false;
	}
	$num = $result->num_rows;
	if ($num < 1) {
		return false;
	}
	$result = db_result_to_array($result);
	return $result;
}
/***************************cart.php************************************/
function get_idarray_shoppingcart($username)
{
	$db = db_connect();
	$query = "select itemid,num from shoppingcart where username = '".$username."';";
	$result = $db->query($query);
	if (!$result) {
		return false;
	}
	$num = $result->num_rows;
	if ($num < 1) {
		return false;
	}
	$result = db_result_to_array($result);
	return $result;
}
/***************************cartpay.php************************************/
function insert_order_address($idarray, $username, $addressid)
{
	try{
		foreach ($idarray as $row) {
			$id = $row['itemid'];
			$num = $row['num'];
			$total_price = caculator_price($id,$num);
			$order_id = insert_order($id,$username,$num,$total_price);
			update_shoppingcart_orderid($username,$id,$order_id);
			insert_address($order_id,$addressid);
		}
		return true;
	}catch(Exception $e){
		return $e->getMessage();
	}
}
function caculator_price($id, $num)
{
	$db = db_connect();
	$result = $db->query("select price from item where id = ".$id.";");
	if (!$result) {
		throw new Exception("can't execute select price query");
	}
	$result = db_result_to_array($result);
	foreach ($result as $row) {
		$price = $row['price'];
	}
	$price = $num * $price;
	return $price;
}
function update_shoppingcart_orderid($username,$id,$order_id)
{
	$db = db_connect();
	$result = $db->query("update shoppingcart set order_id = '".$order_id."' where username = '".$username."' and itemid = '".$id."';");
	if (!$result) {
		return false;
	}
	return true;
}
function get_orderid_shoppingcart($username)
{
	$db = db_connect();
	$result = $db->query("select order_id from shoppingcart where username = '".$username."';");
	if (!$result) {
		return false;
	}
	$num = $result->num_rows;
	if ($num < 1) {
		echo "no orderid";
	}
	$result = db_result_to_array($result);
	return $result;
}
function delete_shoppingcart($username)
{
	$db = db_connect();
	$result = $db->query("delete from shoppingcart where username = '".$username."';");
	if (!$result) {
		echo "delete shoppingcart error";
		exit();
	}
	return true;
}
/***************************cartpay.php************************************/
function get_order_unship($username)
{
	$db = db_connect();
	$query = "select i.id,i.name,o.orderid,o.num,o.price from item as i inner join order_id as o on i.id = o.id where username='".$username."' and enddate is not null and startdate is null order by orderid desc limit 15";
	//echo $query;
	$result = $db->query($query);
		if (!$result) {
			echo "select order info error !";
			return false;
		}
		$order_num = $result->num_rows;
		if ($order_num == 0) {
			echo "There is no item need to be shipped !";
			return false;
		}
		$result = db_result_to_array($result);
		return $result;
}

function get_order_ship($username)
{
	$db = db_connect();
	$query = "select i.id,i.name,o.orderid,o.num,o.price from item as i inner join order_id as o on i.id = o.id where username='".$username."' and enddate is not null and shipdate is not null and recevdate is null order by orderid desc limit 15";
	$result = $db->query($query);
	if (!$result) {
		echo "select order info error !";
		return false;
	}
	$order_num = $result->num_rows;
	if ($order_num == 0) {
		echo "There is no item need to be received !";
		return false;
	}
	$result = db_result_to_array($result);
	return $result;
}

function get_order_completed($username)
{
	$db = db_connect();
	$query = "select i.id,i.name,o.orderid,o.num,o.price from item as i inner join order_id as o on i.id = o.id where username='".$username."' and enddate is not null and shipdate is not null and recevdate is not null order by orderid desc limit 15";
	$result = $db->query($query);
	if (!$result) {
		echo "select order info error !";
		return false;
	}
	$order_num = $result->num_rows;
	if ($order_num == 0) {
		echo "There is no item haves been completed !";
		return false;
	}
	$result = db_result_to_array($result);
	return $result;
}
/***************************writeReviewResult.php************************************/

function insert_review($id,$content)
{
	$db = db_connect();
	$result = $db->query("insert into review values('','".$id."','".$content."');");
	if (!$result) {
		echo "insert review error !";
		return false;
	}else{
		return true;
	}
}
/***************************write_review.php************************************/

function receive_order($orderid)
{
	$db = db_connect();
	$query = "update order_id set recevdate = now() where orderid = '".$orderid."'";
	$result = $db->query($query);
	if (!$result) {
		echo "update recevdate error !";
		return false;
	}
	return true;
}
/***************************write_review.php************************************/
function change_password($username,$oldPassword,$newPassword)
{
	$db = db_connect();
	$result = $db->query("select username from user where username = '".$username."' and password = sha1('".$oldPassword."');");
	if (!$result) {
		echo "judge old password error !";
		return false;
	}
	$num = $result->num_rows;
	if ($num == 0) {
		echo "old password is error !";
		return false;
	}
	$result = $db->query("update user set password = sha1('".$newPassword."') where username='".$username."';");
	if (!$result) {
		echo "set new password error !";
		return false;
	}
	return true;
}

function get_infor($username)
{
	$db = db_connect();
	$query = "select username,email,lastname,firstname,company from user where username = '".$username."';";
	$result = $db->query($query);
	if (!$result) {
		return false;
	}
	$num = $result->num_rows;
	if ($num < 1) {
		return false;
	}
	$result = db_result_to_array($result);
	return $result;
}

//Delete the particular item in shopping cart
function delete_shoppingcart_item($username,$itemid)
{
	$db = db_connect();
	$result = $db->query("delete from shoppingcart where username = '".$username."' and itemid = '".$itemid."';");
	if (!$result) {
		echo "delete shoppingcart error";
		exit();
	}
	return true;
}
function update($username,$email,$lName,$fName,$company)
{
		$db=db_connect();
                $result = $db->query("update user set email = '".$email."', lastname = '".$lName."', firstname = '".$fName."', company = '".$company."' where username = '".$username."';");
                //echo "update user set email = '".$email."', lastname = '".$lName."', firstname = '".$fName."', company = '".$company."' where username = '".$username."';";
		if (!$result) {
                    echo "update user_infor error !";
                    return false;
                }
                return true;
}
 ?>
