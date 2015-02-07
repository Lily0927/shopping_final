<?php 
  require_once 'include.php';
  session_start();
  if(isset($_GET['cgtid']))
	{
		$cgtid = $_GET['cgtid'];
	//	echo $cgtid;
		$itemarray = cgt_get_itemarray($cgtid);
	}else{
		if (isset($_GET['cgoid'])) {
			$cgoid = $_GET['cgoid'];
	//		echo $cgoid;
			$itemarray = cgo_get_itemarray($cgoid);
		} else {
			if(isset($_POST['SearchContent']))
			{
				$itemname = $_POST['SearchContent'];
				if ($itemname == "")
					$itemarray = get_all_itemarray();
				else
					$itemarray = search_get_itemarray($itemname);
			}
			else
				$itemarray = get_all_itemarray();
		}	
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
		<div class="breadcrum-container">
		</div>
		<div class="col-left">
			<?php display_side() ?>
			
		</div>
		<div class="col-main">
			
			<div class="new-product-block">
					<?php 
 						display_item_list($itemarray);
 				?>

				
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