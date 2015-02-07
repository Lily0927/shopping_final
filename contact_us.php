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
<script type="text/javascript">
function vote() {
  alert("Thanks for your voting!");
}
function contact() {
  alert("Submit successfully!");
}
</script>
<section class="content-wrapper">
	<div class="content-container container">
		<div class="col-left">
			<div class="block community-block">
				<div class="block-title">COMMUNITY POLL</div>
				<ul>
					<li class="question-row">WHAT IS YOUR FAVORITE TEAMMEMMBER</li>
					<li><input type="radio">Barry</li>
					<li><input type="radio">Swetha</li>
					<li><input type="radio">Lei</li>
					<li><input type="radio" checked>Tianyang</li>
          <li><input type="radio">Yezhuo</li>
					<li class="vote-row"><button title="Vote" id="Vote" onclick="vote()">Vote</button></li>
				</ul>
			</div>
		</div>
		<div  class="col-main">
			<h1 class="page-title">Contact Us</h1>
			<div class="contact-form-container">
				<div  class="form-title">Contact Information</div>
				<ul class="form-fields">
					<li class="left">
						<label>Name<em>*</em></label>
						<input type="text" />
					</li>
					<li class="left">
						<label>Email<em>*</em></label>
						<input type="text" />
					</li>
					<li class="left">
						<label>Telephone</label>
						<input type="text" />
					</li>
					<li class="full-row">
						<label>Comment<em>*</em></label>
						<textarea></textarea>
					</li>
				</ul>
				<div class="button-set">
					<p class="required">* Required Fields</p>
					<button type="submit" class="form-button" onclick="contact()"><span>Submit</span></button>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
<!--Footer Block-->
<section class="footer-wrapper">
              <footer class="container">
                <div class="link-block">
                  <ul>
                    <li class="link-title"><a href="about_us.php" title="ABOUT US">ABOUT US</a></li>
                    <li><a href="about_us.php" title="About Us">About Us</a></li>
                    <li><a href="#" title="Customer Service">Customer Service</a></li>
                    <li><a href="#" title="Privacy Policy">Privacy Policy</a></li>
                  </ul>
                  <ul>
                    <li class="link-title"><a href="#" title="CUSTOMER SERVICES">CUSTOMER SERVICES</a></li>
                    <li><a href="#" title="Shipping & Returns">Shipping & Returns</a></li>
                    <li><a href="#" title="Secure Shopping">Secure Shopping</a></li>
                    <li><a href="contact_us.php" title="Contact Us">Contact Us</a></li>
                  </ul>
                  <ul>
                    <li class="link-title"><a href="#" title="ABOUTUS">ABOUT US</a></li>
                    <li class="aboutus-block">Lorem ipsum dolor sit amet,
                      consectetur adipiscing elit. Vivamus sit
                      amet ligula lectus, a mollis diam. Nulla
                      porttitor pulvinar elit... <a href="about_us.php" title="read more">read more</a> </li>
                  </ul>
                  <ul class="stay-connected-blcok">
                    <li>
                         <div class="payment-block"><img src="images/payment.png" alt="payment"></div>
                    </li>
                  </ul>
                </div>
                <div class="footer-bottom-block">
                  <ul class="bottom-links">
                    <li><a href="index.php" title="Home">HOME</a></li>
                    <li><a href="#" title="Pages">PAGES</a></li>
                    <li><a href="about_us.php" title="About">ABOUT</a></li>
                    <li><a href="contact_us.php" title="Contact">CONTACT</a></li>
                  </ul>
                </div>
              </footer>
            </section>
</body>
</html>