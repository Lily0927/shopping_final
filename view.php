<?php 
  require_once 'include.php';
  session_start();
  if (isset($_GET['itemid'])) {
		$id = $_GET['itemid'];
		//echo $id;
		$item_detail = id_get_details($id);
		$item_array = array();
		$message_array = id_get_message($id);
	//	$appraise_array = appraise_get_array($id);
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
<script type="text/javascript" src="./js/addshoppingcart.js"></script>
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
		<div class="main">
			
			<div class="product-info-box">
				<div class="product-essential">

					<?php
						if (!is_array($item_detail)) {
							echo "<p>No item selected!
							Please back and selected again!";
						}else{
							foreach ($item_detail as $row) {
								$item_array = $row;
					?>

					<div class="product-img-box">
						<p class="product-image-zoom">
							<?php echo "<img src=\"./images/item-pic/".$row['pic_name']."\" alt=\"Item-PNG\">"; ?>
						</p>
					</div>
					<div class="product-shop" id="name">
						<h3 class="product-name"><?php echo $row['name']; ?></h3>
						<br><br>
						<div class="price-box" id="price">
                		    <span class="price">&nbsp;&nbsp;&nbsp;$<a><?php echo $row['price']; ?></a></span>
				        </div>
				        <br>
				        <br>
						<div class="add-to-cart-box">
							<span class="qty-box">
								<br><br>
								<label for="qty">Qty:</label>
								<a href="javascript:void(0)" title="" class="prev add"><img src="images/qty_prev.png" title="" alt="add" />‹</a>
								<input type="text" value="1" maxlength="12" id="qty" class="input-text qty" name="qty" id="qty">
								<a href="javascript:void(0)" title="" class="next dec add"><img src="images/qty_next.png" title="" alt="" />›</a>
							</span>
                            <script type="text/javascript">
								jQuery(document).ready(function(){
									jQuery(".ajax").colorbox();
								});	
                            	jQuery(function() {
									jQuery(".add").click(function() {
										var jQueryadd = jQuery(this);
										var oldValue = jQueryadd.parent().find("input").val();
										var newVal = 0;
									
										if (jQueryadd.text() == "›") {
										   newVal = parseFloat(oldValue) + 1;
										  // AJAX save would go here
										} else {
										  // Don't allow decrementing below zero
										  if (oldValue >= 1) {
											  newVal = parseFloat(oldValue) - 1;
											  // AJAX save would go here
										  }
										  if(oldValue == 0){
											  newVal = parseFloat(oldValue);
											  }
										}
										jQueryadd.parent().find("input").val(newVal);
									});
									
								
								});
                            </script>
						</div>
						<div class="add-to-cart-box">
							<br><br>
							<input class="form-button" title="Add to Cart" value="Add to Cart" type="button"/>
						</div>
					</div>
					<?php
							}
						}
					 ?>


				</div>
			</div>
            
			<section  class="product-collateral">
				<ul class="tab-block">
					<li><a href="#pro-detail" title="Description" class="active">Description</a></li>
				</ul>
				<div id="pro-detail" class="pro-detail commonContent">
					<ol>
					</ol>
					<p>
						This the description of the product! 
					</p>
				</div>
                
                
			</section>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
</div>
<!--Footer Block-->
<?php show_footer(); ?>
</body>
</html>