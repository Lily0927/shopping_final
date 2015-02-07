<?php 
  require_once 'include.php';
  session_start();
  if(isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
		$idarray = get_infor($username);
                $adarray = get_address($username);
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
<script type="text/javascript" src="./js/update.js"></script>
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
		<div class="fieldset">

			<?php
                $itemnum = count($adarray,0);
                echo "<input type=\"hidden\" id=\"itemnum\" value=\"5\" />";
                foreach ($idarray as $row) {
                    $username = $row['username'];
                    $email = $row['email'];
                    $lastname = $row['lastname'];
                    $firstname = $row['firstname'];
                     $company = $row['company'];?>

                     <h2 class="legend">Personal Information</h2>
					<ul class="form-list">
						<li class="fields">
							<div class="customer-name">
								<div class="input-box name-firstname">
									<label for="firstname">FirstName<em>*</em></label>
									<input value="<?php echo $firstname; ?>" type="text" class="required-entry input-text" id="firstname" name="firstname" maxlength="14" required>
								</div>
								<div class="clear"></div>
							</div>                
						</li>
						<li class="fields">
							<div class="customer-name">
								<div class="input-box name-firstname">
									<label for="lastname">LastName<em>*</em></label>
									<input value="<?php echo $lastname; ?>" type="text" class="required-entry input-text" id="lastname" name="lastname" maxlength="14" required>
								</div>
								<div class="clear"></div>
							</div>                
						</li>
						<li>
							<div class="input-box">
								<label class="required" for="email_address">Email Address<em>*</em></label>
								<input value="<?php echo $email; ?>" type="text" class="input-text validate-email required-entry" id="email" name="email" maxlength="120" required>
							</div>
							<div class="clear"></div>
						</li>
						<li>
							<div class="input-box">
								<label class="required" for="email_address">Company</label>
								<input value="<?php echo $company; ?>" type="text" id="company" name="company" maxlength="120">
							</div>
							<div class="clear"></div>
						</li>
					</ul>
					<h2 class="legend">Login Information</h2>
					<ul class="form-list">
						<li class="fields">
							<div class="customer-name">
								<div class="input-box name-firstname">
									<label for="username">UserName<em>*</em></label>
									<input value="<?php echo $username; ?>" type="text" class="required-entry input-text" id="username" name="username" maxlength="14" required>
								</div>
								<div class="clear"></div>
							</div>                
						</li>
						<li class="fields">
							<div class="customer-name">
								<div class="input-box name-firstname">
									<label for="firstname">Password<em>*</em></label>
									<input type="password" class="required-entry input-text" id="password" name="password" maxlength="40" required>
								</div>
								<div class="input-box name-lastname">
									<label for="lastname">Confirm Password<em>*</em></label>
									<input type="password" class="required-entry input-text" id="password2" name="password2" maxlength="40" required>
								</div>
								<div class="clear"></div>
							</div>
						</li>
					</ul>
                                    <?php
                            }
                    ?>
				<div class="buttons-set">
					<p class="required">* Required Fields</p>
					<a href="account_info.php" title="Back" class="f-left">&laquo; Cancel</a>
					<input type="button" id="update_button" class="colors-btn" value="Update">
					<div class="clear"></div>
				</div>
        </div>
	</div>
</section>
</div>
<!--Footer Block-->
<?php show_footer(); ?>
</body>
</html>