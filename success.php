<?php 
  require_once 'include.php';
  session_start();
  if (isset($_POST['add'])) {
    $addressid = $_POST['add'];
  }else{
    ?>
    <!doctype html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>Please Login</title>
      <link rel="shortcut icon" href="./images/logo.ico">
      <meta http-equiv="refresh" content="2; url=cart.php">
    </head>
    <body>

    </body>
    </html>
    <?php
  }
  if(isset($_SESSION['username']))
  {
    $username = $_SESSION['username'];
    $idarray = get_idarray_shoppingcart($username);
    //echo $idarray;
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
		<div class="main">
			<div class="error-container">
        <?php 
        if (isset($addressid)){
          $save_order = insert_order_address($idarray, $username, $addressid);
          if ($save_order == true) {
            echo "<h1>Payment Successful!</h1>";?>

            <script type="text/javascript">
            $(document).ready(function() {
                  var xmlhttp;
                  if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                  } else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                  }
                  xmlhttp.open("POST","payment_result.php",true);
                  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded;");
                  xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                      var add_info = xmlhttp.responseText;
                      if (add_info == "true") {
                        alert("Pay successfully ! Please wait ...");
                      }else{
                        alert(add_info);
                      }
                    }
                  }
                  xmlhttp.send(null);
            });
            </script>
            <div class="f-fix">
              <a href="index.php" title="Back To Home" class="colors-btn">Back To Home</a>
            </div>

            <?php
          }else{
            echo "<h1>Payment Error!</h1>";
          }     
        }else{
          echo "<h2>Please add an address first!</h2>";?>
          <div class="f-fix">
            <a href="cart.php" title="Back To Cart" class="colors-btn">Back To Cart</a>
          </div>
          <?php
        }
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