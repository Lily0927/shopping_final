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
<section class="content-wrapper">
	<div class="content-container container">
		<div class="col-main-left">
			<h1 class="page-title">About Our Website</h1>
			<div class="about-banner"><img src="images/640.jpg" title="Image" alt="Image" /><div class="clear"></div></div>
			<div class="block-01">
				<h4>Team member</h4>
				<p>Barry, Swatha, Tianyang, Lei, Yezhuo</p>
			</div>
			
		</div>
		<aside class="right-sidebar">
			<div class="block widget-searchwidget">
				<input type="text" value="Type to search..." />
			</div>
			<div class="block widget-img">
				<a href="#" title=""><img src="images/125.jpg"></a>
				<a href="#" title=""><img src="images/125.jpg"></a>
				<a href="#" title=""><img src="images/125.jpg"></a>
				<a href="#" title=""><img src="images/125.jpg"></a>
        <a href="#" title=""><img src="images/125.jpg"></a>
			</div>
			
		</aside>
		<div class="clearfix"></div>
	</div>
</section>
</div>
<!--Footer Block-->
<?php show_footer(); ?>
</body>
</html>