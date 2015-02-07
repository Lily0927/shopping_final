<?php 
  require_once 'include.php';
  session_start();
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
<script type="text/javascript" src="./js/register.js"></script>
<script type="text/javascript">$(document).ready(function(){$(".inline").colorbox({inline:true, width:"50%"});});</script>
<script src="./js/add_address.js"></script>
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
			<h1 class="page-title">Create an Account</h1>
			<div class="fieldset">
				<form action="./register_result.php" method="post">
	            <h2 class="legend">Personal Information</h2>
				<ul class="form-list">
					<li class="fields">
						<div class="customer-name">
							<div class="input-box name-firstname">
								<label for="firstname">Name<em>*</em></label>
								<input type="text" class="required-entry input-text" id="name" name="name" maxlength="14" required>
							</div>
							<div class="clear"></div>
	
						</div>                
					</li>
					<li>
						<div class="input-box">
							<label class="required">Address<em>*</em></label>
							<input type="text" id="address" name="address" maxlength="120" required>
						</div>
						<div class="clear"></div>
					</li>
					<li>
						<div class="input-box">
							<label class="required">City<em>*</em></label>
							<input type="text" id="city" name="city" maxlength="120" required>
						</div>
						<div class="clear"></div>
					</li>
					<li>
						<div class="input-box">
							<label class="required" >State<em>*</em></label>
							<input type="text" id="state" name="state" maxlength="120" required>
						</div>
						<div class="clear"></div>
					</li>
					<li>
						<div class="input-box">
							<label class="required" >Country<em>*</em></label>
							<input type="text" id="country" name="country" maxlength="120" required>
						</div>
						<div class="clear"></div>
					</li>
					<li>
						<div class="input-box">
							<label class="required" >Zip<em>*</em></label>
							<input type="text" id="zip" name="zip" maxlength="120" required>
						</div>
						<div class="clear"></div>
					</li>
					<li>
						<div class="input-box">
							<label class="required" >Phone<em>*</em></label>
							<input type="text" id="phone" name="phone" maxlength="120" required>
						</div>
						<div class="clear"></div>
					</li>
				</ul>
				<div class="buttons-set">
					<p class="required">* Required Fields</p>
					<a href="cart.php" title="Back" class="f-left">&laquo; Back</a>
					<input type="button" id="add_button" class="colors-btn" value="Add" onclick="add()">
					<div class="clear"></div>
				</div>
			</form>
        </div>
		</div>
		<div class="clearfix"></div>
		
	</div>
</section>
</div>
<!--Footer Block-->
<?php show_footer(); ?>
</body>
</html>