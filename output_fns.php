<?php 
	require_once 'include.php';
	function show_header($username='')
	{
		if(isset($_SESSION['username']))
		{
			$username = $_SESSION['username'];
			$idarray = get_idarray_shoppingcart($username);
		}
		?>
			<div class="header-wrapper">
       <header class="container">
         <div class="head-right">
          <ul class="top-nav">
             <?php 
             	if ($username =='') {?>
             		<li class="contact-us"><a href="contact_us.php" title="Contact Us">Contact Us</a></li>
             		<li class="log-in"><a href="account_login.php" title="Log In">Log In</a></li>
             <?php }
             	else{?>
             		<li class="welcome">Welcome, <?php echo $username ?>!</li>
             		<li class=""><a href="account_info.php" title="My Account">My Account</a></li>
             		<li class="contact-us"><a href="contact_us.php" title="Contact Us">Contact Us</a></li>
             		<li class="checkout"><a href="cart.php" title="Checkout">Checkout</a></li>
             		<li class="log-in"><a href="account_logout.php" title="Log Out">Log Out</a></li>
             <?php	}
             ?>
           </ul>
          <section class="header-bottom">
         <div class="cart-block">
         	<?php
         		if ($username !=''){
         			if ($idarray == false) {?>
 						<ul>
							<li>(0)</li>
							<li><a href="cart.php" title="Cart"><img title="Item" alt="Item" src="images/item_icon.png" /></a></li>
							<li>Item</li>
						</ul>
 			<?php
 					}
 					else{
 						$total = 0;
						$itemnum = count($idarray,0);?>
						<ul>
							<li>(<?php echo $itemnum ?>)</li>
							<li><a href="cart.php" title="Cart"><img title="Item" alt="Item" src="images/item_icon.png" /></a></li>
							<li>Item</li>
						</ul>
						<div id="minicart" class="remain_cart" style="display: none;">
							<p class="empty">You have <?php echo $itemnum ?> items in your shopping cart.</p>
							<ol>
						<?php
						echo "<input type=\"hidden\" id=\"itemnum\" value=\"".$itemnum."\" />";
						foreach ($idarray as $row) {
							$id = $row['itemid'];
							$num = $row['num'];
							$item_detail = id_get_details($id);
							
							echo "<div id=\"order-info\">";
							foreach ($item_detail as $row) {
								$total_price = $num * $row['price'];
								$total += $total_price; ?>
							
								 	<li>
										<div class="img-block"><img src="images/item-pic/<?php echo $row['pic_name'] ?>" title="" alt="" /></div>
										<div class="detail-block">
											<h4><a ><?php echo $row['name'] ?></a></h4>
											<p>
												<strong><?php echo $num ?></strong> x $<?php echo $row['price'] ?>
											</p>
										</div>
										<div class="edit-delete-block">
											<a href="delete_cart_item_2.php?itemid=<?php echo $id ?> ?>" title="Remove"><img src="images/delete_item_btn.png" alt="Remove" title="Remove" /></a>
										</div>
									</li>
							<?php
							}
						}
         	?>
							<li>
								<div class="total-block">Total:<span>$<?php echo $total ?></span></div>
								<a href="cart.php" title="Checkout" class="colors-btn">Checkout</a>
								<div class="clear"></div>
							</li>
						 </ol>
					</div>
					<?php
					}
				}
					?>
				</div>
                    <div class="search-block">
                      <form action="./category.php" method="post">
                        <input type="text" name="SearchContent" />
                        <input type="submit" value="Search" title="Search" id="SearchItem"/>
                      </form>
                    </div>
                  </section>
                </div>
                <h1 class="logo"><a href="index.php" title="Logo">
                  <img title="Logo" alt="Logo" src="images/Banner.png" />
                  </a></h1>
                <nav id="smoothmenu1" class="ddsmoothmenu mainMenu">
                  <ul id="nav">
                    <li class><a href="index.php" title="Home">Home</a></li>
                    <li class=""><a href="category.php" title="Shop by">Shop by</a>
                      <ul>
                        <li><a href="category.php?cgoid=1">Electronics & Computer</a>
                        	<ul>
                                <li><a href="category.php?cgtid=1">TV &amp; video</a></li>
								<li><a href="category.php?cgtid=2">Home Audio</a></li>
								<li><a href="category.php?cgtid=3">camera photo</a></li>
								<li><a href="category.php?cgtid=4">video games</a></li>
								<li><a href="category.php?cgtid=5">MP3 player</a></li>
								<li><a href="category.php?cgtid=6">laptop &amp; Tablets</a></li>
                              </ul>
                        </li>
                        <li><a href="category.php?cgoid=2">Books & Audio</a>
                        	<ul>
                                <li><a href="category.php?cgtid=7">Children Books</a></li>
								<li><a href="category.php?cgtid=8">Textbooks</a></li>
								<li><a href="category.php?cgtid=9">Magazine</a></li>
								<li><a href="category.php?cgtid=10">whisper for voice</a></li>
								<li><a href="category.php?cgtid=11">audio books</a></li>
								<li><a href="category.php?cgtid=12">Software books</a></li>
                              </ul>
                        </li>
                        <li><a href="category.php?cgoid=3">Toy & Baby</a>
                        	<ul>
                                <li><a href="category.php?cgtid=13">Toys Games</a></li>
								<li><a href="category.php?cgtid=14">Babys' clothing</a></li>
								<li><a href="category.php?cgtid=15">video games for kids</a></li>
								<li><a href="category.php?cgtid=16">Babys' Birthday</a></li>
								<li><a href="category.php?cgtid=17">Plush Toys</a></li>
								<li><a href="category.php?cgtid=18">Building block</a></li>
                              </ul>
                        </li>
                        <li><a href="category.php?cgoid=4">Clothing</a>
                        	<ul>
                                <li><a href="category.php?cgtid=19">shoes</a></li>
                                <li><a href="category.php?cgtid=20">T-shirt</a></li>
                                <li><a href="category.php?cgtid=21">Pants</a></li>
                                <li><a href="category.php?cgtid=22">Coats</a></li>
                                <li><a href="category.php?cgtid=23">Jeans</a></li>
                                <li><a href="category.php?cgtid=24">Skirt</a></li>
                              </ul>
                        </li>
                      </ul>
                    </li>
                    <li class=""><a href="faq.php" title="Faq">Video show</a></li>
                    <li class=""><a href="about_us.php" title="About us">About us</a></li>
                    <li class=""><a href="contact_us.php" title="Footwear">Contact us</a></li>
                  </ul>
                </nav>
                
                <div class="mobMenu">
            <h1>
            <span>Menu</span>
            <a class="menuBox highlight" href="javascript:void(0);">ccc</a>
            <span class="clearfix"></span>
            </h1>
            <div id="menuInnner" style="display:none;">
                   <ul class="accordion">
                       <li class="active"><a href="index.php" title="Home">Home</a></li>
                    <li class="parent"><a href="category.php" title="Shop by">Shop by</a>
                      <ul>
                        <li><a href="category.php?cgoid=1">Electronics & Computer</a>
                        	<ul>
                                <li><a href="category.php?cgtid=1">TV &amp; video</a></li>
								<li><a href="category.php?cgtid=2">Home Audio</a></li>
								<li><a href="category.php?cgtid=3">camera photo</a></li>
								<li><a href="category.php?cgtid=4">video games</a></li>
								<li><a href="category.php?cgtid=5">MP3 player</a></li>
								<li><a href="category.php?cgtid=6">laptop &amp; Tablets</a></li>
                              </ul>
                        </li>
                        <li><a href="category.php?cgoid=2">Books & Audio</a>
                        	<ul>
                                <li><a href="category.php?cgtid=7">Children Books</a></li>
								<li><a href="category.php?cgtid=8">Textbooks</a></li>
								<li><a href="category.php?cgtid=9">Magazine</a></li>
								<li><a href="category.php?cgtid=10">whisper for voice</a></li>
								<li><a href="category.php?cgtid=11">audio books</a></li>
								<li><a href="category.php?cgtid=12">Software books</a></li>
                              </ul>
                        </li>
                        <li><a href="category.php?cgoid=3">Toy & Baby</a>
                        	<ul>
                                <li><a href="category.php?cgtid=13">Toys Games</a></li>
								<li><a href="category.php?cgtid=14">Babys' clothing</a></li>
								<li><a href="category.php?cgtid=15">video games for kids</a></li>
								<li><a href="category.php?cgtid=16">Babys' Birthday</a></li>
								<li><a href="category.php?cgtid=17">Plush Toys</a></li>
								<li><a href="category.php?cgtid=18">Building block</a></li>
                              </ul>
                        </li>
                        <li><a href="category.php?cgoid=4">Clothing</a>
                        	<ul>
                                <li><a href="category.php?cgtid=19">shoes</a></li>
                                <li><a href="category.php?cgtid=20">T-shirt</a></li>
                                <li><a href="category.php?cgtid=21">Pants</a></li>
                                <li><a href="category.php?cgtid=22">Coats</a></li>
                                <li><a href="category.php?cgtid=23">Jeans</a></li>
                                <li><a href="category.php?cgtid=24">Skirt</a></li>
                              </ul>
                        </li>
                      </ul>
                    </li>
                    <li class=""><a href="faq.php" title="Faq">Faq</a></li>
                    <li class=""><a href="about_us.php" title="About us">About us</a></li>
                    <li class=""><a href="contact_us.php" title="Footwear">Contact us</a></li>
                      <span class="clearfix"></span>
                   </ul>
                  
             </div>      
            </div>
                
              </header>
            </div>

			<?php
	}
	function show_footer()
	{
		?>
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
                    <li class="aboutus-block"><a href="about_us.php" title="read more">read more</a> </li>
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
                    <li><a href="about_us.php" title="About">ABOUT</a></li>
                    <li><a href="contact_us.php" title="Contact">CONTACT</a></li>
                  </ul>
                </div>
              </footer>
            </section>
		<?php
	}
	function show_html_footer()
	{
		?>
		<style>
			div#footer{
				width: 850px;
				height: 170px;
				margin-top: 80px;
				font-size: 14px;
			}
			div.footer1{
				width: 230px;
				height: 150px;
				float: left;
				margin-left: 30px;
			}
			div.footer2{
				width: 250px;
				height: 150px;
				float: left;
				margin-right: 20px;
			}
			div.footer3{
				width: 250px;
				height: 150px;
				float: left;
			}
			div#footer ul li{
				font-size: 14px;
				margin-bottom: 10px;
				list-style: none;
				color: #ffffff;
			}
		</style>
		<footer>
			<div id="footer">
				<div id="footer">
					<div class="footer1">
						<ul class="website">
							<h4 class="foot-title">Get To Know Us</h4>
							<li><a href="#">Careers</a></li>
							<li><a href="#">Investor Relations</a></li>
							<li><a href="#">Our Planet</a></li>
							<li><a href="#">Community</a></li>
						</ul>
					</div>
					<div class="footer2">
						<ul class="website">
							<h4 class="foot-title">Make Money With Us</h4>
							<li><a href="#">Sell on TianGou</a></li>
							<li><a href="#">Advertise Your Products</a></li>
							<li><a href="#">Become an Affiliate</a></li>
							<li><a href="#">Independently Publish With Us</a></li>
						</ul>
					</div>
					<div class="footer3">
						<ul class="website">
							<h4 class="foot-title">Let Us Help You</h4>
							<li><a href="#">Your Account</a></li>
							<li><a href="#">Payment & Refund</a></li>
							<li><a href="#">Send & Delivery</a></li>
							<li><a href="#">Help ...</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<?php
	}
	function show_logo()
	{
		?>
		<div id="header">
			<style>
				div#header{
					width: 850px;
					margin-left: auto;
					margin-right: auto;
					margin-top: 20px;
					margin-bottom: 15px;
				}
				h1#logo {
					display: block;
					font-size: 2em;
					-webkit-margin-before: 0.67em;
					-webkit-margin-after: 0.67em;
					-webkit-margin-start: 0px;
					-webkit-margin-end: 0px;
					font-weight: bold;
				}
			</style>
			<h1 id="logo"><a href="./index.php">
				<img src="./images/Banner.png" alt="TianGou -- Shopping" id="banner">
			</a></h1>
		</div>
		<?php
	}
	function show_html_start()
	{
		?>
		<!doctype html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Document</title>
		</head>
		<body>
		<?php
	}
	function show_html_end()
	{
		?>			
		</body>
		</html>
		<?php
	}
	function show_message($message)
	{
		?>
		<div id="message">
			<style>
				div#message{
					width: 850px;
					height: 200px;
					margin-left: auto;
					margin-right: auto;
					margin-bottom: 200px;
				}
			</style>
			<p><?php echo $message; ?></p>
		</div>
		<?php
	}
	function display_info($username)
	{
			//foreach ($username as $row) {
			?>
			<ul class="form-fields">
					<li class="left">
						<label>Name</label>
						<a><?php echo $username['username']; ?></a>
					</li>
					<li class="left">
						<label>Email</label>
						<a><?php echo $username['email']; ?></a>
					</li>
			</ul>
		<?php
			//}
	}
	function display_side()
	{
			?>

			<div class="block man-block">
				<div class="block-title"><a href="category.php?cgoid=1">Electronics & computer</a></div>
				<ul>
					<li><a href="category.php?cgtid=1">TV &amp; video</a></li>
					<li><a href="category.php?cgtid=2">Home Audio</a></li>
					<li><a href="category.php?cgtid=3">camera photo</a></li>
					<li><a href="category.php?cgtid=4">video games</a></li>
					<li><a href="category.php?cgtid=5">MP3 player</a></li>
					<li><a href="category.php?cgtid=6">laptop &amp; Tablets</a></li>
				</ul>
			</div>
			<div class="block man-block">
				<div class="block-title"><a href="category.php?cgoid=2">Books & Audio</a></div>
				<ul>
					<li><a href="category.php?cgtid=7">Children Books</a></li>
					<li><a href="category.php?cgtid=8">Textbooks</a></li>
					<li><a href="category.php?cgtid=9">Magazine</a></li>
					<li><a href="category.php?cgtid=10">whisper for voice</a></li>
					<li><a href="category.php?cgtid=11">audio books</a></li>
					<li><a href="category.php?cgtid=12">Software books</a></li>
				</ul>
			</div>
			<div class="block man-block">
				<div class="block-title"><a href="category.php?cgoid=3">Toy & Baby</a></div>
				<ul>
					<li><a href="category.php?cgtid=13">Toys Games</a></li>
					<li><a href="category.php?cgtid=14">Babys' clothing</a></li>
					<li><a href="category.php?cgtid=15">video games for kids</a></li>
					<li><a href="category.php?cgtid=16">Babys' Birthday</a></li>
					<li><a href="category.php?cgtid=17">Plush Toys</a></li>
					<li><a href="category.php?cgtid=18">Building block</a></li>
				</ul>
			</div>
			<div class="block man-block">
				<div class="block-title"><a href="category.php?cgoid=4">Clothing</a></div>
				<ul>
					<li><a href="category.php?cgtid=19">shoes</a></li>
					<li><a href="category.php?cgtid=20">T-shirt</a></li>
					<li><a href="category.php?cgtid=21">Pants</a></li>
					<li><a href="category.php?cgtid=22">coats</a></li>
					<li><a href="category.php?cgtid=23">Jeans</a></li>
					<li><a href="category.php?cgtid=24">Skirt</a></li>
				</ul>
			</div>
		<?php
	}
	function display_item_list($itemarray)
	{
		if (!is_array($itemarray)) {
			echo "<p>No item currently available in this list";
		}else{
			$count = 0;
			foreach ($itemarray as $row) {
				if($count == 3){
					?></ul><?php
					$count = 0;
				}
				if($count == 0){
					?><ul class="product-grid"><?php
				}
			?>
			<li>
				<div class="pro-img"><a href="view.php?itemid=<?php echo $row['id'] ?>"><?php echo "<img src=\"./images/item-pic/".$row['pic_name']."\" alt=\"Laptop\">"; ?></a></div>
				<div class="pro-content"><p><?php echo $row['name']; ?></p></div>
				<div class="pro-price">$ <?php echo $row['price']; ?></div>
				<div class="pro-link-block">
					<div class="clearfix"></div>
				</div>
			</li>
		<?php
			$count++;
			}
		}
	}
	function display_top()
	{
		?>
		<style>
			div#header{
			height: 40px;
			}
			div#top{
				height: 120px;
			}
			div#logo{
				width: 35%;
				height: 106px;
				float: left;
			}
			div#search{
				width: 65%;
				height: 76px;
				float: right;
				padding-top: 30px;
			}
			div#search-panel{
				width: 500px;
				height: 68px;
				margin-top: auto;
				margin-left: auto;
				margin-right: auto;
				margin-bottom: auto;
			}
			div#search-panel form{
				float: right;
			}
			div#search-panel input[type = text]{
				width: 350px;
				height: 30px;
				border-radius: 15px;
				margin-right: 15px;
			}
			input#SearchItem{
				width: 70px;
				height: 35px;
				border-radius: 10px;
			}
		</style>
		<div id="top">
 			<div id="logo">
 				<h1 id="banner"><a href="./index.php"><img src="./images/Banner.png" alt="TianGou -- Shopping" id="banner"></a></h1>
 			</div>
	 		<div id="search">
	 			<div id="search-panel">
	 				<form action="category.php" method="post">
	 					<input type="text" name="SearchContent" maxlength="120" placeholder="Search: Computer? "><input type="submit" value="Search" id="SearchItem">
	 				</form>
	 			</div>	
	 		</div>
	 	</div>
		<?php
	}
	function display_recommend($id)
	{
		$cgtid = get_cgtid_id($id);
		$itemarray = array();
		$itemarray = cgt_get_itemarray($cgtid);
		foreach ($itemarray as $row) {
			?>
			<style>
				div.nav-item-list-img{
					margin-top: 15px;
				}
				div.nav-item-list-img img{
					width: 70px;
					height: 70px;
					float: left;
					margin-right: 5px;
				}
				div.nav-item-list-detail{
					text-align: left;
				}
			</style>
			<div class="nav-item-list">
				<div class="nav-item-list-img">
					<?php echo "<img src=\"./images/item-pic/".$row['pic_name']."\" alt=\"Laptop\">"; ?>
				</div>
				<div class="nav-item-list-detail">
					<?php 
 						echo "<a href=\"./item-details.php?itemid=".$row['id']."\">
 							<span>".$row['name']."</span>
 							</a>";
 					 ?>
 					 <br>
 					 <span>$<?php echo $row['price']; ?></span>
				</div>
			</div>
			<?php
		}
	}
	function display_information($id)
	{
		
	}
	function display_appraise($id)
	{
		
	}

	function display_address($result)
	{
		if (!$result) {
			echo "Address error ! can't load .. Please refresh!";
		}else{
			$count_add = 0;
			foreach ($result as $row) {
				if($count_add == 0){?>
				<div class="add">
					<input type="radio" name="add" value="$row['addressid']" checked>
					<div class="add_detail">
						name: <?php echo $row['ship_name'] ?>
						<br>
						address: <?php echo $row['ship_country']."-".$row['ship_state']."-".$row['ship_city']."-".$row['ship_address'] ?>
						<br>
						zip: <?php echo $row['ship_zip'] ?>
						<br>
						phone: <?php echo $row['ship_phonenumber'] ?>
					</div>
				</div>				
				<?php
				}else{?>

				<div class="add">
					<input type="radio" name="add" value="$row['addressid']">
					<div class="add_detail">
						name: <?php echo $row['ship_name'] ?>
						<br>
						address: <?php echo $row['ship_country']."-".$row['ship_state']."-".$row['ship_city']."-".$row['ship_address'] ?>
						<br>
						zip: <?php echo $row['ship_zip'] ?>
						<br>
						phone: <?php echo $row['ship_phonenumber'] ?>
					</div>
				</div>

				<?php
				}
				$count_add++;
			}
		}
	}


?>
