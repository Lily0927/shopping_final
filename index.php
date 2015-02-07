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
            <!--Banner Block-->
            <section class="banner-wrapper">
              <div class="banner-block container">
                <div class="flexslider">
                  <ul class="slides">
                    <li><a href="view.php?itemid=15"><img title="Banner" alt="Banner" src="images/item-pic/15.png" /></a></li>
                    <li><a href="view.php?itemid=11"><img title="Banner" alt="Banner" src="images/item-pic/11.png" /></a></li>
                    <li><a href="view.php?itemid=14"><img title="Banner" alt="Banner" src="images/item-pic/14.png" /></a></li>
                    <li><a href="view.php?itemid=18"><img title="Banner" alt="Banner" src="images/item-pic/18.png" /></a></li>
                  </ul>
                </div>
                <ul class="banner-add">
                  <li class="add1"><a href="view.php?itemid=7" title=""><img title="I can read" alt="add1" src="images/item-pic/7.png" /></a></li>
                  <li class="add2"><a href="view.php?itemid=7" title=""><img title="add2" alt="add2" src="images/banner_add2.png" /></a></li>
                </ul>
              </div>
            </section>
            <!--Content Block-->
            <section class="content-wrapper">
              <div class="content-container container">
                <div class="heading-block">
                  <h1>New Product</h1>
                </div>
                <div class="new-product-block">
                  <ul class="product-grid">
                    <li>
                      <div class="pro-img"><a href="view.php?itemid=2"><img title="Freature Product" alt="Freature Product" src="images/item-pic/1.png" /></a></div>
                      <div class="pro-content"><p>ViewSonic Monitor VA2037M-LED</p></div>
                      <div class="pro-price">$400.00</div>
                      <div class="pro-link-block">
                        <div class="clearfix"></div>
                      </div>
                    </li>
                    <li>
                      <div class="pro-img"><a href="view.php?itemid=5"><img title="Freature Product" alt="Freature Product" src="images/item-pic/5.png" /></a></div>
                      <div class="pro-content"><p>PC game handle rocker</p></div>
                      <div class="pro-price">$48.00</div>
                      <div class="pro-link-block">
                        <div class="clearfix"></div>
                      </div>
                    </li>
                    <li>
                      <div class="pro-img"><a href="view.php?itemid=10"><img title="Freature Product" alt="Freature Product" src="images/item-pic/10.png" /></a></div>
                      <div class="pro-content"><p>LEGO</p></div>
                      <div class="pro-price">$224.00</div>
                      <div class="pro-link-block">
                        <div class="clearfix"></div>
                      </div>
                    </li>
                    <li>
                      <div class="pro-img"><a href="view.php?itemid=17"><img title="Freature Product" alt="Freature Product" src="images/item-pic/17.png" /></a></div>
                      <div class="pro-content"><p>Coat</p></div>
                      <div class="pro-price">$300.00</div>
                      <div class="pro-link-block">
                        <div class="clearfix"></div>
                      </div>
                    </li>
                  </ul>
                </div>
                
              </div>
            </section>
    </div> 
    <!--Quick view Block-->
<script type="text/javascript">
jQuery (function(){
	var tabContainers=jQuery('div.tabs > div');
	tabContainers.hide().filter(':first').show();
	jQuery('div.tabs ul.tabNavigation a').click(function(){
		tabContainers.hide();
		tabContainers.filter(this.hash).show();
		jQuery('div.tabs ul.tabNavigation a').removeClass('selected');
		jQuery(this).addClass('selected');
		return false;
		}).filter(':first').click();
	});
</script>
<article style="display:none;">
	<section id="quick-view-container" class="quick-view-wrapper">
	<div class="quick-view-container">
		<div class="quick-view-left">
			<h2>Sunglass RB3184</h2>
			<div class="product-img-box">
				<p class="product-image">
					<img src="images/sale_icon_img.png" title="Sale" alt="Sale" class="sale-img" />
					<a href="view.php" title="Image"><img src="images/quick_view_img.png" title="Image" alt="Image" /></a>				</p>
				<ul class="thum-img">
					<li><img  src="images/quick_thum_img.png" title="" alt="" /></li>
					<li><img  src="images/quick_thum_img.png" title="" alt="" /></li>
				</ul>
			</div>
		</div>
		<div class="quick-view-right tabs">
			<ul class="tab-block tabNavigation">
				<li><a class="selected" title="Overview" href="#tabDetail">Overview</a></li>
			</ul>
			<div id="tabDetail" class="tabDetail">
			<div class="price-box">
				<span class="price">$600.00</span>			</div>
			<div class="availability">In stock</div>
			<div class="color-size-block">
				<div class="label-row">
					<label><em>*</em> size</label>
				</div>
				<div class="select-row">
					<select><option>-- Please Select --</option></select>
				</div>
			</div>
			<div class="add-to-cart-box">
				<span class="qty-box">
					<label for="qty">Qty:</label>
					<a class="prev" title="" href="#"><img alt="" title="" src="images/qty_prev.png"></a>
					<input type="text" name="qty" class="input-text qty" id="qty" maxlength="12" value="1">
					<a class="next" title="" href="#"><img alt="" title="" src="images/qty_next.png"></a>				</span>
				<button title="Add to Cart" class="form-button"><span>Add to Cart</span></button>
			</div>
            </div>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
</article>       
<!--Footer Block-->
<?php show_footer(); ?>
</body>
</html>