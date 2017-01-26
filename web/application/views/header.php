<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!-- saved from url=(0061)http://remtsoy.com/tf_templates/traveler/demo_v1_7/index.html -->
<html class="<?php if(isset($html_class)) echo $html_class ?>">
<head>
    <title>Booking</title>

    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="Template, html, premium, themeforest" />
    <meta name="description" content="Traveler - Premium template for travel companies">
    <meta name="author" content="Tsoy">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

<body class="<?php if(isset($body_class)) echo $body_class ?>">


    <!-- FACEBOOK WIDGET -->
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
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
                        <div class="col-md-3">
                            <a class="logo" href="index.html">
                                <img src="/public/images/logo-invert.png" alt="Image Alternative text" title="Image Title" />
                            </a>
                        </div>
                        <div class="col-md-3 col-md-offset-2">
                            <form class="main-header-search">
                                <div class="form-group form-group-icon-left">
                                    <i class="fa fa-search input-icon"></i>
                                    <input type="text" class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="top-user-area clearfix">
                                <ul class="top-user-area-list list list-horizontal list-border">
                                    <li class="top-user-area-avatar">
                                        <a href="user-profile.html">
                                            <img class="origin round" src="/public/images/amaze_40x40.jpg" alt="Image Alternative text" title="AMaze" />Hi, John</a>
                                    </li>
                                    <li><a href="#">Sign Out</a>
                                    </li>
                                    <li class="nav-drop"><a href="#">USD $<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></a>
                                        <ul class="list nav-drop-menu">
                                            <li><a href="#">EUR<span class="right">€</span></a>
                                            </li>
                                            <li><a href="#">GBP<span class="right">£</span></a>
                                            </li>
                                            <li><a href="#">JPY<span class="right">円</span></a>
                                            </li>
                                            <li><a href="#">CAD<span class="right">$</span></a>
                                            </li>
                                            <li><a href="#">AUD<span class="right">A$</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="top-user-area-lang nav-drop">
                                        <a href="#">
                                            <img src="/public/images/flags/32/uk.png" alt="Image Alternative text" title="Image Title" />ENG<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i>
                                        </a>
                                        <ul class="list nav-drop-menu">
                                            <li>
                                                <a title="German" href="#">
                                                    <img src="/public/images/flags/32/de.png" alt="Image Alternative text" title="Image Title" /><span class="right">GER</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Japanise" href="#">
                                                    <img src="/public/images/flags/32/jp.png" alt="Image Alternative text" title="Image Title" /><span class="right">JAP</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Italian" href="#">
                                                    <img src="/public/images/flags/32/it.png" alt="Image Alternative text" title="Image Title" /><span class="right">ITA</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="French" href="#">
                                                    <img src="/public/images/flags/32/fr.png" alt="Image Alternative text" title="Image Title" /><span class="right">FRE</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Russian" href="#">
                                                    <img src="/public/images/flags/32/ru.png" alt="Image Alternative text" title="Image Title" /><span class="right">RUS</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Korean" href="#">
                                                    <img src="/public/images/flags/32/kr.png" alt="Image Alternative text" title="Image Title" /><span class="right">KOR</span>
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
                        <li class="active"><a href="index.html">Home</a>
                            <ul>
                                <li class="active"><a href="index.html">Default</a>
                                </li>
                                <li><a href="index-1.html">Layout 1</a>
                                </li>
                                <li><a href="index-2.html">Layout 2</a>
                                </li>
                                <li><a href="index-3.html">Layout 3</a>
                                </li>
                                <li><a href="index-4.html">Layout 4</a>
                                </li>
                                <li><a href="index-5.html">Layout 5</a>
                                </li>
                                <li><a href="index-6.html">Layout 6</a>
                                </li>
                                <li><a href="index-7.html">Layout 7</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="success-payment.html">Pages</a>
                            <ul>
                                <li><a href="success-payment.html">Success Payment</a>
                                </li>
                                <li><a href="user-profile.html">User Profile</a>
                                    <ul>
                                        <li><a href="user-profile.html">Overview</a>
                                        </li>
                                        <li><a href="user-profile-settings.html">Settings</a>
                                        </li>
                                        <li><a href="user-profile-photos.html">Photos</a>
                                        </li>
                                        <li><a href="user-profile-booking-history.html">Booking History</a>
                                        </li>
                                        <li><a href="user-profile-cards.html">Cards</a>
                                        </li>
                                        <li><a href="user-profile-wishlist.html">Wishlist</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="blog.html">Blog</a>
                                    <ul>
                                        <li><a href="blog.html">Sidebar Right</a>
                                        </li>
                                        <li><a href="blog-sidebar-left.html">Sidebar Left</a>
                                        </li>
                                        <li><a href="blog-full-width.html">Full Width</a>
                                        </li>
                                        <li><a href="blog-post.html">Post</a>
                                            <ul>
                                                <li><a href="blog-post.html">Sidebar Right</a>
                                                </li>
                                                <li><a href="blog-post-sidebar-left.html">Sidebar Left</a>
                                                </li>
                                                <li><a href="blog-post-full-width.html">Full Width</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="404.html">404 page</a>
                                </li>
                                <li><a href="contact-us.html">Contact Us</a>
                                </li>
                                <li><a href="about.html">About</a>
                                </li>
                                <li><a href="login-register.html">Login/Register</a>
                                    <ul>
                                        <li><a href="login-register.html">Full Page</a>
                                        </li>
                                        <li><a href="login-register-normal.html">Normal</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="loading.html">Loading</a>
                                </li>
                                <li><a href="comming-soon.html">Comming Soon</a>
                                </li>
                                <li><a href="gallery.html">Gallery</a>
                                    <ul>
                                        <li><a href="gallery.html">4 Columns</a>
                                        </li>
                                        <li><a href="gallery-3-col.html">3 columns</a>
                                        </li>
                                        <li><a href="gallery-2-col.html">2 columns</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="page-full-width.html">Full Width</a>
                                </li>
                                <li><a href="page-sidebar-right.html">Sidebar Right</a>
                                </li>
                                <li><a href="page-sidebar-left.html">Sidebar Left</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="feature-typography.html">Features</a>
                            <ul>
                                <li><a href="feature-typography.html">Typography</a>
                                </li>
                                <li><a href="feature-icons.html">Icons</a>
                                </li>
                                <li><a href="feature-forms.html">Forms</a>
                                </li>
                                <li><a href="feature-icon-effects.html">Icon Effects</a>
                                </li>
                                <li><a href="feature-elements.html">Elements</a>
                                </li>
                                <li><a href="feature-grid.html">Grid</a>
                                </li>
                                <li><a href="feature-hovers.html">Hover effects</a>
                                </li>
                                <li><a href="feature-lightbox.html">Lightbox</a>
                                </li>
                                <li><a href="feature-media.html">Media</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="hotels.html">Hotels</a>
                            <ul>
                                <li><a href="hotel-details.html">Details</a>
                                    <ul>
                                        <li><a href="hotel-details.html">Layout 1</a>
                                        </li>
                                        <li><a href="hotel-details-2.html">Layout 2</a>
                                        </li>
                                        <li><a href="hotel-details-3.html">Layout 3</a>
                                        </li>
                                        <li><a href="hotel-details-4.html">Layout 4</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="hotel-payment.html">Payment</a>
                                    <ul>
                                        <li><a href="hotel-payment.html">Registered</a>
                                        </li>
                                        <li><a href="hotel-payment-registered-card.html">Existed Cards</a>
                                        </li>
                                        <li><a href="hotel-payment-unregistered.html">Unregistered</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="hotel-search.html">Search</a>
                                    <ul>
                                        <li><a href="hotel-search.html">Layout 1</a>
                                        </li>
                                        <li><a href="hotel-search-2.html">Layout 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="hotels.html">Results</a>
                                    <ul>
                                        <li><a href="hotels.html">Layout 1</a>
                                        </li>
                                        <li><a href="hotels-search-results-2.html">Layout 2</a>
                                        </li>
                                        <li><a href="hotels-search-results-3.html">Layout 3</a>
                                        </li>
                                        <li><a href="hotels-search-results-4.html">Layout 4</a>
                                        </li>
                                        <li><a href="hotel-search-results-5.html">Layout 5</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="flights.html">Flights</a>
                            <ul>
                                <li><a href="flight-payment.html">Payment</a>
                                    <ul>
                                        <li><a href="flight-payment.html">Registered</a>
                                        </li>
                                        <li><a href="flight-payment-registered-card.html">Existed Cards</a>
                                        </li>
                                        <li><a href="flight-payment-unregistered.html">Unregistered</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="flight-search.html">Search</a>
                                    <ul>
                                        <li><a href="flight-search.html">Layout 1</a>
                                        </li>
                                        <li><a href="flight-search-2.html">Layout 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="flights.html">List</a>
                                    <ul>
                                        <li><a href="flights.html">Layout 1</a>
                                        </li>
                                        <li><a href="flights-search-results-2.html">Layout 2</a>
                                        </li>
                                        <li><a href="flights-search-results-3.html">Layout 3</a>
                                        </li>
                                        <li><a href="flights-search-results-4.html">Layout 4</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="rentals.html">Rentals</a>
                            <ul>
                                <li><a href="rentals-details.html">Details</a>
                                    <ul>
                                        <li><a href="rentals-details.html">Layout 1</a>
                                        </li>
                                        <li><a href="rentals-details-2.html">Layout 2</a>
                                        </li>
                                        <li><a href="rentals-details-3.html">Layout 3</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="rental-payment.html">Payment</a>
                                    <ul>
                                        <li><a href="rental-payment.html">Registered</a>
                                        </li>
                                        <li><a href="rental-payment-registered-card.html">Existed Cards</a>
                                        </li>
                                        <li><a href="rental-payment-unregistered.html">Unregistered</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="rentals-search.html">Search</a>
                                    <ul>
                                        <li><a href="rentals-search.html">Layout 1</a>
                                        </li>
                                        <li><a href="rentals-search-2.html">Layout 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="rentals.html">Results</a>
                                    <ul>
                                        <li><a href="rentals.html">Layout 1</a>
                                        </li>
                                        <li><a href="rentals-search-results-2.html">Layout 2</a>
                                        </li>
                                        <li><a href="rentals-search-results-3.html">Layout 3</a>
                                        </li>
                                        <li><a href="rentals-search-results-4.html">Layout 4</a>
                                        </li>
                                        <li><a href="rentals-search-results-5.html">Layout 5</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="cars.html">Cars</a>
                            <ul>
                                <li><a href="car-details.html">Details</a>
                                </li>
                                <li><a href="car-payment.html">Payment</a>
                                    <ul>
                                        <li><a href="car-payment.html">Registered</a>
                                        </li>
                                        <li><a href="car-payment-registered-card.html">Existed Cards</a>
                                        </li>
                                        <li><a href="car-payment-unregistered.html">Unregistered</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="car-search.html">Search</a>
                                    <ul>
                                        <li><a href="car-search.html">Layout 1</a>
                                        </li>
                                        <li><a href="car-search-2.html">Layout 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="cars.html">Results</a>
                                    <ul>
                                        <li><a href="cars.html">Layout 1</a>
                                        </li>
                                        <li><a href="cars-results-2.html">Layout 2</a>
                                        </li>
                                        <li><a href="cars-results-3.html">Layout 3</a>
                                        </li>
                                        <li><a href="cars-results-4.html">Layout 4</a>
                                        </li>
                                        <li><a href="cars-results-5.html">Layout 5</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="activities.html">Activities</a>
                            <ul>
                                <li><a href="activitiy-details.html">Details</a>
                                    <ul>
                                        <li><a href="activitiy-details.html">Layout 1</a>
                                        </li>
                                        <li><a href="activitiy-details-2.html">Layout 2</a>
                                        </li>
                                        <li><a href="activitiy-details-3.html">Layout 3</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="activity-search.html">Search</a>
                                    <ul>
                                        <li><a href="activity-search.html">Layout 1</a>
                                        </li>
                                        <li><a href="activity-search-2.html">Layout 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="activitiy-payment.html">Payment</a>
                                    <ul>
                                        <li><a href="activitiy-payment.html">Registered</a>
                                        </li>
                                        <li><a href="activity-payment-registered-card.html">Existed Cards</a>
                                        </li>
                                        <li><a href="activitiy-payment-unregistered.html">Unregistered</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="activities.html">Results</a>
                                    <ul>
                                        <li><a href="activities.html">Layout 1</a>
                                        </li>
                                        <li><a href="activities-search-results-2.html">Layout 2</a>
                                        </li>
                                        <li><a href="activities-search-results-3.html">Layout 3</a>
                                        </li>
                                        <li><a href="activities-search-results-4.html">Layout 4</a>
                                        </li>
                                        <li><a href="activities-search-results-5.html">Layout 5</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
		<?php } ?>