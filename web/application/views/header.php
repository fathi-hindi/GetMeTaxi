<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!-- saved from url=(0061)http://remtsoy.com/tf_templates/traveler/demo_v1_7/index.html -->
<html class="<?php if(isset($html_class)) echo $html_class ?>">
<head>
    <title>
		<?php
			echo 'Traveler';
			if (isset($page_title) && $page_title != '') echo ' | ' . $page_title;
		?>
	</title>

    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="Template, html, premium, themeforest" />
    <meta name="description" content="Traveler - Premium template for travel companies">
    <meta name="author" content="Tsoy">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Favicon-->
    <link rel="icon" href="/public/images/favicon.png" type="image/x-icon">
	
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="/public/css/bootstrap.css">
    <link rel="stylesheet" href="/public/css/font-awesome.css">
    <link rel="stylesheet" href="/public/css/icomoon.css">
    <link rel="stylesheet" href="/public/css/styles.css">
    <link rel="stylesheet" href="/public/css/mystyles.css">
    <script src="/public/js/modernizr.js"></script>

    <link rel="stylesheet" href="/public/css/switcher.css" />
    <link rel="alternate stylesheet" type="text/css" href="/public/css/schemes/bright-turquoise.css" title="bright-turquoise" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="/public/css/schemes/turkish-rose.css" title="turkish-rose" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="/public/css/schemes/salem.css" title="salem" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="/public/css/schemes/hippie-blue.css" title="hippie-blue" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="/public/css/schemes/mandy.css" title="mandy" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="/public/css/schemes/green-smoke.css" title="green-smoke" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="/public/css/schemes/horizon.css" title="horizon" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="/public/css/schemes/cerise.css" title="cerise" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="/public/css/schemes/brick-red.css" title="brick-red" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="/public/css/schemes/de-york.css" title="de-york" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="/public/css/schemes/shamrock.css" title="shamrock" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="/public/css/schemes/studio.css" title="studio" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="/public/css/schemes/leather.css" title="leather" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="/public/css/schemes/denim.css" title="denim" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="/public/css/schemes/scarlet.css" title="scarlet" media="all" />
</head>

<body class="<?php if(isset($body_class)) echo $body_class ?>" onLoad="onAllPageLoad();">

    <script>
		function onAllPageLoad () {
			CheckoutHelperJS.userType = '<?php if (getUserType() == '') echo USER_TYPE_GUEST; else echo getUserType();  ?>';
		}
    </script>
    <!-- /FACEBOOK WIDGET -->
    <div class="global-wrap">
        <div class="demo_changer" id="demo_changer">
            <div class="demo-icon fa fa-sliders"></div>
            <div class="form_holder">
                <div class="line"></div>
                <p>Color Scheme</p>
                <div class="predefined_styles" id="styleswitch_area">
                    <a class="styleswitch" href="?default=true" style="background:#ED8323;"></a>
                    <a class="styleswitch" href="#" data-src="bright-turquoise" style="background:#0EBCF2;"></a>
                    <a class="styleswitch" href="#" data-src="turkish-rose" style="background:#B66672;"></a>
                    <a class="styleswitch" href="#" data-src="salem" style="background:#12A641;"></a>
                    <a class="styleswitch" href="#" data-src="hippie-blue" style="background:#4F96B6;"></a>
                    <a class="styleswitch" href="#" data-src="mandy" style="background:#E45E66;"></a>
                    <a class="styleswitch" href="#" data-src="green-smoke" style="background:#96AA66;"></a>
                    <a class="styleswitch" href="#" data-src="horizon" style="background:#5B84AA;"></a>
                    <a class="styleswitch" href="#" data-src="cerise" style="background:#CA2AC6;"></a>
                    <a class="styleswitch" href="#" data-src="brick-red" style="background:#cf315a;"></a>
                    <a class="styleswitch" href="#" data-src="de-york" style="background:#74C683;"></a>
                    <a class="styleswitch" href="#" data-src="shamrock" style="background:#30BBB1;"></a>
                    <a class="styleswitch" href="#" data-src="studio" style="background:#7646B8;"></a>
                    <a class="styleswitch" href="#" data-src="leather" style="background:#966650;"></a>
                    <a class="styleswitch" href="#" data-src="denim" style="background:#1A5AE4;"></a>
                    <a class="styleswitch" href="#" data-src="scarlet" style="background:#FF1D13;"></a>
                </div>
                <div class="line"></div>
                <p>Layout</p>
                <div class="predefined_styles"><a class="btn btn-sm" href="#" id="btn-wide">Wide</a><a class="btn btn-sm" href="#" id="btn-boxed">Boxed</a>
                </div>
                <div class="line"></div>
                <p>Background Patterns</p>
                <div class="predefined_styles" id="patternswitch_area">
                    <a class="patternswitch" href="#" style="background-image: url(/public/images/patterns/binding_light.png);"></a>
                    <a class="patternswitch" href="#" style="background-image: url(/public/images/patterns/binding_dark.png);"></a>
                    <a class="patternswitch" href="#" style="background-image: url(/public/images/patterns/dark_fish_skin.png);"></a>
                    <a class="patternswitch" href="#" style="background-image: url(/public/images/patterns/dimension.png);"></a>
                    <a class="patternswitch" href="#" style="background-image: url(/public/images/patterns/escheresque_ste.png);"></a>
                    <a class="patternswitch" href="#" style="background-image: url(/public/images/patterns/food.png);"></a>
                    <a class="patternswitch" href="#" style="background-image: url(/public/images/patterns/giftly.png);"></a>
                    <a class="patternswitch" href="#" style="background-image: url(/public/images/patterns/grey_wash_wall.png);"></a>
                    <a class="patternswitch" href="#" style="background-image: url(/public/images/patterns/ps_neutral.png);"></a>
                    <a class="patternswitch" href="#" style="background-image: url(/public/images/patterns/pw_maze_black.png);"></a>
                    <a class="patternswitch" href="#" style="background-image: url(/public/images/patterns/pw_pattern.png);"></a>
                    <a class="patternswitch" href="#" style="background-image: url(/public/images/patterns/simple_dashed.png);"></a>
                </div>
                <div class="line"></div>
                <p>Background Images</p>
                <div class="predefined_styles" id="bgimageswitch_area">
                    <a class="bgimageswitch" href="#" style="background-image: url(/public/images/switcher/bike.jpg);" data-src="/public/images/backgrounds/bike.jpg"></a>
                    <a class="bgimageswitch" href="#" style="background-image: url(/public/images/switcher/flowers.jpg);" data-src="/public/images/backgrounds/flowers.jpg"></a>
                    <a class="bgimageswitch" href="#" style="background-image: url(/public/images/switcher/wood.jpg);" data-src="/public/images/backgrounds/wood.jpg"></a>
                    <a class="bgimageswitch" href="#" style="background-image: url(/public/images/switcher/taxi.jpg);" data-src="/public/images/backgrounds/taxi.jpg"></a>
                    <a class="bgimageswitch" href="#" style="background-image: url(/public/images/switcher/phone.jpg);" data-src="/public/images/backgrounds/phone.jpg"></a>
                    <a class="bgimageswitch" href="#" style="background-image: url(/public/images/switcher/road.jpg);" data-src="/public/images/backgrounds/road.jpg"></a>
                    <a class="bgimageswitch" href="#" style="background-image: url(/public/images/switcher/keyboard.jpg);" data-src="/public/images/backgrounds/keyboard.jpg"></a>
                    <a class="bgimageswitch" href="#" style="background-image: url(/public/images/switcher/beach.jpg);" data-src="/public/images/backgrounds/beach.jpg"></a>
                    <a class="bgimageswitch" href="#" style="background-image: url(/public/images/switcher/street.jpg);" data-src="/public/images/backgrounds/street.jpg"></a>
                    <a class="bgimageswitch" href="#" style="background-image: url(/public/images/switcher/nature.jpg);" data-src="/public/images/backgrounds/nature.jpg"></a>
                    <a class="bgimageswitch" href="#" style="background-image: url(/public/images/switcher/bridge.jpg);" data-src="/public/images/backgrounds/bridge.jpg"></a>
                    <a class="bgimageswitch" href="#" style="background-image: url(/public/images/switcher/cameras.jpg);" data-src="/public/images/backgrounds/cameras.jpg"></a>
                </div>
                <div class="line"></div>
            </div>
        </div>
		<?php if (!isset($hide_navigation) || $hide_navigation == false) { ?>
        <header id="main-header">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <a class="logo" href="/">
                                <img src="/public/images/logo-invert.png" alt="Image Alternative text" title="Image Title" />
                            </a>
                        </div>
                        <div class="col-md-3 col-md-offset-2">
							<?php if (SEARCH_ENABLE) { ?>
                            <form class="main-header-search">
                                <div class="form-group form-group-icon-left">
                                    <i class="fa fa-search input-icon"></i>
                                    <input type="text" class="form-control">
                                </div>
                            </form>
							<?php } ?>
                        </div>
						
                        <div class="col-md-5">
                            <div class="top-user-area clearfix">
                                <ul class="top-user-area-list list list-horizontal list-border">
                                    <li><a><i class="fa fa-phone input-icon"></i> <?php echo CONTACT_US_PHONE; ?> </a></li>
									<?php if (isLoggedIn()) { ?>
										<li class="top-user-area-avatar">
											<a href="/account">
                                            <img class="origin round" src="<?php echo getUserPhoto();?>" alt="Image Alternative text" title="AMaze" />Hi, <?php echo getUserFirstName();?></a>
										</li>
										<li><a href="/logon/logout">Sign Out</a></li>
									<?php } else { ?>
										<li><a href="/logon">Sign In</a></li>
									<?php } ?>
                                    
                                    <li class="top-user-area-lang nav-drop">
                                        <a href="#">
                                            <img src="/public/images/flags/32/uk.png" />English
											<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i>
                                        </a>
                                        <ul class="list nav-drop-menu">
                                            <li>
                                                <a title="English" href="#">
                                                    <img src="/public/images/flags/32/de.png" /><span class="right">English</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Arabic" href="#">
                                                    <img src="/public/images/flags/32/jp.png"/><span class="right">Arabic</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="nav">
                    <ul class="slimmenu" id="slimmenu">
                        <li class="active">
							<a href="/">Home</a>
                            
                        </li>
                        <li>
							<a href="success-payment.html">Services</a>
                        </li>
                        
                        <li><a href="cars.html">Delivery Vendors</a>
                            <ul>
                                <li>
									<a href="car-details.html">All</a>
                                </li>
                                <li>
									<a href="car-payment.html">Nablus</a>
                                    <ul>
                                        <li>
											<a href="car-payment.html">An-Najah Taxi Office</a>
                                        </li>
                                        <li>
											<a href="car-payment-registered-card.html">Al-Madenah</a>
                                        </li>
                                        <li>
											<a href="car-payment-unregistered.html">Al-3temad Taxi Office</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
									<a href="car-payment.html">Jenin</a>
                                    <ul>
                                        <li>
											<a href="car-payment.html">An-Najah Taxi Office</a>
                                        </li>
                                        <li>
											<a href="car-payment-registered-card.html">Al-Madenah</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="cars.html">Taxi Office</a>
                            <ul>
                                <li>
									<a href="car-details.html">All</a>
                                </li>
                                <li>
									<a href="car-payment.html">Nablus</a>
                                    <ul>
                                        <li>
											<a href="car-payment.html">An-Najah Taxi Office</a>
                                        </li>
                                        <li>
											<a href="car-payment-registered-card.html">Al-Madenah</a>
                                        </li>
                                        <li>
											<a href="car-payment-unregistered.html">Al-3temad Taxi Office</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
									<a href="car-payment.html">Jenin</a>
                                    <ul>
                                        <li>
											<a href="car-payment.html">An-Najah Taxi Office</a>
                                        </li>
                                        <li>
											<a href="car-payment-registered-card.html">Al-Madenah</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
							<a href="/content/about">About</a>
                        </li>
						<li>
							<a href="/content/contact">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
		<?php } ?>