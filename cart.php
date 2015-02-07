<?php 
  require_once 'include.php';
  session_start();
  if(isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
		$idarray = get_idarray_shoppingcart($username);
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
 ?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Database Shop</title>

<!--js-->
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/common.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/ddsmoothmenu.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/jquery.elastislide.js"></script>
<script src="js/jquery.jcarousel.min.js"></script>
<script src="js/jquery.accordion.js"></script>
<script src="js/light_box.js"></script>
<script type="text/javascript">$(document).ready(function(){$(".inline").colorbox({inline:true, width:"50%"});});</script>
<!--end js-->

<!-- Mobile Specific Metas ================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS ================================================== -->

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors.css">
<link rel="stylesheet" href="css/skeleton.css">
<link rel="stylesheet" href="css/layout.css">
<link rel="stylesheet" href="css/ddsmoothmenu.css"/>
<link rel="stylesheet" href="css/elastislide.css"/>
<link rel="stylesheet" href="css/home_flexslider.css"/>

<link rel="stylesheet" href="css/light_box.css"/>
<script src="js/html5.js"></script>

<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

</head>
<body>
	<div class="mainContainer sixteen container">
            <!--Header Block-->
            <?php
        if (isset($_SESSION['username'])) {
          show_header($_SESSION['username']);
        }else{
          show_header();}
       ?>
<!--Content Block-->
<section class="content-wrapper">
	<div class="content-container container">
		<div class="col-1-layout">

			<?php 
			if ($idarray == false) {
 				echo "<div style=\"height: 100px;\"><span>There is no item in shoppingcart !</span></div>";
 			}
 			else{
					$total = 0;
					$itemnum = count($idarray,0);
					echo "<input type=\"hidden\" id=\"itemnum\" value=\"".$itemnum."\" />";
					foreach ($idarray as $row) {
						$id = $row['itemid'];
						$num = $row['num'];
						$item_detail = id_get_details($id);
						
						echo "<div id=\"order-info\">";
						foreach ($item_detail as $row) {
							$total_price = $num * $row['price'];
							$total += $total_price; ?>

						<ul class="shopping-cart-table">
							<li>
								<div class="img-box"><img src="images/item-pic/<?php echo $row['pic_name'] ?>" title="" alt="" /></div>
								<form action="delete_cart_item.php" method="post">
									<input type="hidden" id="itemid" name="itemid" value="<?php echo $id; ?>">
									<input class="edit-btn" type="submit" title="Delete" value="Delete">
								</form>
							</li>
							<li>
								<div class="pro-name"><?php echo $row['name'] ?></div>
								<div class="pro-qty"><input type="text" value="<?php echo $num; ?>" /></div>
								<div class="pro-price"><?php echo $total_price ?></div>
							</li>
						</ul>

						
						<?php
						}
					}?>
					<div class="shopping-cart-totals">
						<div class="grand-row"><div class="left">Grand  Total</div><div class="right">$<?php echo $total ?></div></div>
						<ul class="checkout-types">
							<form action="checkout.php" method="post">
								<input type="hidden" name="amount" id="amount" value="<?php echo $total ?>">
							<li><input class="colors-btn" type="submit" value="Proceed to Checkout"></li>
							</form>
						</ul>
					</div>
					<?php
				}	
				?>	
			

			<div class="generic-product-list">
				<h4>Based on your selection, you may be interested in the following items:</h4>
				<ul>
					<li>
						<div class="left-img"><img src="images/tshir_img.png" title="" alt="" /></div>
						<div class="right-content">
							<div class="pro-name">White Round Neck <br>T-Shirt</div>
							<div class="pro-price">$600.00</div>
						</div>
					</li>
					<li>
						<div class="left-img"><img src="images/tshir_img.png" title="" alt="" /></div>
						<div class="right-content">
							<div class="pro-name">White Round Neck <br>T-Shirt</div>
							<div class="pro-price">$600.00</div>
						</div>
					</li>
					<li>
						<div class="left-img"><img src="images/tshir_img.png" title="" alt="" /></div>
						<div class="right-content">
							<div class="pro-name">White Round Neck <br>T-Shirt</div>
							<div class="pro-price">$600.00</div>
						</div>
					</li>
					<li>
						<div class="left-img"><img src="images/tshir_img.png" title="" alt="" /></div>
						<div class="right-content">
							<div class="pro-name">White Round Neck <br>T-Shirt</div>
							<div class="pro-price">$600.00</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</section>
</div>
<!--Footer Block-->
<?php show_footer(); ?>
</body>
</html>