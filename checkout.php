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
      <meta http-equiv="refresh" content="1; url=acount_login.php">
    </head>
    <body>
      <p>Please Login First</p>
    </body>
    </html>
    <?php
    exit();
  }
  if (isset($_POST['amount'])) {
    $amount = $_POST['amount'];
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
    <div>
      <?php
      if (isset($amount)){
      ?>
      <h1 class="page-title">Total Amount : $ <?php echo $amount ?></h1>
      <div class="contact-form-container">
        <form action="success.php" method="post">
          <ul class="form-fields">
            <li class="full-row">
              <label>Card Number</label>
              <input type="text" />
            </li>
            <br>
            <br>
            <br>
          <?php 
        //  echo $username;
            $result = get_address($username);
            if ($result == false) {
              ?>
              <a href="add_address.php" class="add_address">Add a new Address</a>
              <?php
            }else{
              echo "<div>";
              display_address($result);
              ?>
                <div class="add">
                  <div id="a" style="margin-top:30px;">
                    <a href="add_address.php" class="add_address">Add a new Address</a>
                  </div>
                </div>
              </div>
              <?php
              echo "<input type=\"hidden\" value=\"".count($result,0)."\" id=\"addnum\" />"; 
            }
           ?>
        </ul>
        <div class="button-set">
          <button class="form-button" onclick="window.location='cart.php'"><span>Cancel</span></button>
          <input type="submit" class="form-button" value="OK">
        </div>
        </form>
      </div><?php
    }
      ?>
    </div>
  </div>
</section>
</div>
<!--Footer Block-->
<?php show_footer(); ?>
</body>
</html>