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
<script type="text/javascript" src="./js/login.js"></script>
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
function validate_required(field,alerttxt)
{
with (field)
  {
  if (value==null||value=="")
    {alert(alerttxt);return false}
  else {return true}
  }
}

function validate_form(thisform)
{
with (thisform)
  {
  if (validate_required(email,"Username must be filled out!")==false)
    {email.focus();return false}
  }
}
</script>

<section class="content-wrapper">
	<div class="content-container container">
		<div class="main">
			<h1 class="page-title">Login or Create an Account</h1>
			<div class="account-login">
				<div class="col-1 new-users">
					<div class="content">
						<h2>New Customers</h2>
						<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
					</div>
					<div class="buttons-set">
						<a class="colors-btn" title="Create an Account" href="account_create.php"><span><span>Create an Account</span></span></a>
						<div class="clear"></div>
					</div>
				</div>
				<div class="col-2 registered-users">
          <form action="login_result.php" method="post" onsubmit="return validate_form(this)">
            <div class="content">
              <h2>Registered Customers</h2>
              <p>If you have an account with us, please log in.</p>
              <ul class="form-list">
                <li>
                  <label class="required" for="username">Username<em>*</em></label>
                  <div class="input-box">
                    <input type="text" title="Username" id="username" name="username" class="input-text required-entry validate-email" value="" />
                  </div>
                  <div class="clear"></div>
                </li>
                <li>
                  <label class="required" for="pass">Password<em>*</em></label>
                  <div class="input-box">
                    <input type="password" title="Password" id="password" name="password" class="input-text required-entry validate-password" />
                  </div>
                  <div class="clear"></div>
                </li>
              </ul>
              <p class="required">* Required Fields</p>
            </div>
            <div class="buttons-set">
              <a class="f-left" href="#">Forgot Your Password?</a>
              <input type="button" id="login_button" class="colors-btn" value="Login">
              <div class="clear"></div>
            </div>
          </form>
        </div>
				<div class="clear"></div>
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