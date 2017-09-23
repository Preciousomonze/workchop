<?php session_start();
 require_once "_vars.php";
 require_once "_parts/_functions.php";
 //call the main imbe that loads all my niggas.
 require "vendor/autoload.php";
 $site_name = "Workchop";
 $site_title = $site_name." - na where person work, na there hin go chop. No food for lazy man.";
 $site_description = "";
$firstname = '';
$surname = '';
$phone = '';
$email = '';
$location_index = '';
$location = '';
 $session = new Session();
 if($session->check_session_basically($user) == true){
$user_curl = new Curl();
$result = $user_curl->get_auth($site_url."mobile_app/get_user_details.php?user_id=".$user);
if(!$user_curl->get_error()){
$user_details = explode($delimiter,$result);
$firstname = trim($user_details[1]);
$surname = trim($user_details[0]);
$phone = trim($user_details[2]);
$email = trim($user_details[3]);
$location_index = $user_details[4];
$location = get_location($location_index,$location_args);
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-128x128.png" type="image/x-icon">
  <?php wc_meta_keywords();
  wc_meta_description(); ?>
  <meta name="author" content="Omonzejele Precious">
    <meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $site_title; ?>" />
<?php wc_fb_meta_description(); ?>
<meta property="og:image" content="<?php echo $site_url; ?>assets/images/logo-128x128.png" />
<meta name="twitter:image" content="<?php echo $site_url; ?>assets/images/logo-128x128.png" />
<meta name="twitter:creator" content="<?php echo $twitter_handle; ?>" />
<meta property="og:url" content="<?php echo $site_url; ?>" />
<meta property="og:site_name" content="<?php echo $site_name; ?>" />
<meta name="twitter:card" content="summary" />
<?php  wc_twt_meta_description(); 
      wc_twt_meta_title($site_title);
?>
<meta name="twitter:site" content="<?php echo $twitter_handle; ?>" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/et-line-font-plugin/style.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animate.css/animate.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="assets/css/welcome.css" type="text/css">
  <title>Workchop - For tradesmen you can trust!</title>
</head>
<body>
<section id="menu-0">
    <nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
        <div class="container">
            <div class="mbr-table">
                <div class="mbr-table-cell">
                    <div class="navbar-brand">
                        <a href="/" class="navbar-logo"><img src="assets/images/logo-128x128.png" alt="workchop logo"></a>
                        <a class="navbar-caption" href="http://workchop.ng" title="workchop">workchop</a>
                    </div>
                </div>
                <div class="mbr-table-cell">
                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>
                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar"><li class="nav-item">
					<a class="nav-link link" href="http://worckchop.ng/"></a></li><li class="nav-item dropdown open">
					<a class="nav-link link dropdown-toggle" href="login.php" title="sign in to workchop">
					<span class="mbri-login mbr-iconfont mbr-iconfont-btn"></span>Sign in</a></li>
					<li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="workchop.apk"><span class="mbri-android mbr-iconfont mbr-iconfont-btn"></span>DOWNLOAD</a></li></ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</section>

<section class="engine"><a rel="external" href="#"></a></section><section class="mbr-section mbr-section-hero mbr-section-full mbr-parallax-background mbr-section-with-arrow" id="header1-1" style="background-image: url(assets/images/pexels-photo-2000x1329.png);">
    <div class="mbr-table-cell">
        <div class="container">
            <div class="row">
                <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">
                    <h1 class="mbr-section-title display-1"><span class="cool-txt-shadow colour-yellow">wor<span class="k">k</span></span><span class="cool-txt-shadow colour-blue"><span class="c">c</span>hop</span></h1>
                    <p class="mbr-section-lead lead"><span style="font-family: verdana;font-style:normal;">Workchop is a community of people who truly look out for each other. We ensure you find the best tradesmen because you deserve the best.</span></p>
                    <div class="mbr-section-btn"><a class="cool-blue btn btn-lg btn-primary" title="sign in" href="login.php"><span class="mbri-login mbr-iconfont mbr-iconfont-btn"></span>Sign in</a>  <a class="btn btn-lg btn-white btn-white-outline" title="download workchop app to sign up" href="workchop.apk"><span class="socicon socicon-play mbr-iconfont mbr-iconfont-btn"></span>Download app to sign up</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="mbr-arrow mbr-arrow-floating" aria-hidden="true"><a href="#features6-7"><i class="mbr-arrow-icon"></i></a></div>
</section>

<section class="mbr-cards mbr-section mbr-section-nopadding" id="features6-7" style="background-color: rgb(239, 239, 239);">
    <div class="usefulness-statements mbr-cards-row row">
        <div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
              <div class="card cart-block">
                  <div class="card-img"><span class="mbri-like mbr-iconfont mbr-iconfont-features3"></span></div>
                  <div class="card-block">
                    <h4 class="card-title">Why workchop</h4>
                    <p class="card-text">We exist to connect you to skilled artisan/tradesmen that have been tried, tested and reviewed by your friends.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><span class="etl-icon icon-tools-2 mbr-iconfont mbr-iconfont-features3"></span></div>
                    <div class="card-block">
                        <h4 class="card-title">For tradesmen</h4>
                        <p class="card-text">Find work from people who want to hire you for your unique skills and services.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img">
					<span style="padding: 25px 20px 25px 25px;" class="mbri-idea mbr-iconfont mbr-iconfont-features3"></span></div>
                    <div class="card-block">
                        <h4 class="card-title">Advantages</h4>
                        <p class="card-text">Find trusted, verified and honest tradesmen, find jobs, get jobs.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="how-it-works mbr-section mbr-parallax-background" id="content5-2" style="background-image: url(assets/images/pexels-photo-2000x1085.png);padding-top:40px;padding-bottom:30px;">
    <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(0, 0, 0);">
    </div>
    <div class="container">
        <h4 class="mbr-section-title display-2 center" style="padding:0;">How <span class="cool-txt-shadow colour-yellow">wor<span class="k">k</span></span><span class="cool-txt-shadow colour-blue"><span class="c">c</span>hop</span> works</h4>
		</div>
</section>
<section class="mbr-cards mbr-section mbr-section-nopadding" id="features2-4" style="background-color: rgb(255, 255, 255);">

    <div class="mbr-cards-row initial-how-to row striped">
    <div class="mbr-cards-col col-xs-12 col-lg-3 my-icon" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><span class="icon fa-meh-o">
					<sup class=" icon fa-question"></sup>
					</span>
					</div>
                    <div class="card-block">
                        <p class="card-text">Looking for a tradesman (mechanic or tailor)?</p>
                    </div>
                </div>
            </div>
			<span class="icon direct-arrow"></span>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><a href="#search" class="mbri-search mbr-iconfont mbr-iconfont-features2"></a></div>
                    <div class="card-block">
                        <p class="card-text">Search for a tradesman of your choice.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><a href="#results" class="mbri-user mbr-iconfont mbr-iconfont-features2"></a></div>
                    <div class="card-block">
                        <p class="card-text">Get results based on suggestions from your contacts.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img"><a href="#contact-tradesman" class="mbri-chat mbr-iconfont mbr-iconfont-features2"></a></div>
                    <div class="card-block">
                        <p class="card-text">Contact the tradesman of your choice.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-3 my-icon my-icon-star" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img">
					<span class="icon fa-star"></span>
					<span class="icon fa-star"></span>
					<span class="icon fa-star"></span>
					<span class="icon fa-star-half-empty"></span>
					<span class="icon fa-star-o"></span>
					</div>
                    <div class="card-block">
                        <p class="card-text">Rate the tradesman after transaction has been completed.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-info mbr-section mbr-section-md-padding" id="msg-box2-3" style="background-color: rgb(245, 245, 245);padding-top: 90px;padding-bottom: 90px;border-bottom: 1px solid rgba(0,0,0,0.1);border-top:1px solid rgba(0,0,0,0.1);">
    <div class="container">
        <div class="row">
            <div class="mbr-table-md-up">
              <div class="mbr-table-cell col-md-4">
                  <div class="text-xs-center blog-btn"><a class="cool-yellow btn btn-primary" href="http://blog.workchop.ng/">Go to blog</a> </div>
              </div>
              <div class="mbr-table-cell mbr-right-padding-md-up col-md-8 text-xs-center text-md-left">
                  <h3 class="mbr-info-title mbr-section-title display-2">Check out our blog</h3>
                  <h2 class="mbr-info-subtitle mbr-section-subtitle" style="font-style:normal;">Get more stories and information needed on workchop, updates and reviews.</h2>
              </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section contacting" id="form1-6" style="background-color: rgb(255, 255, 255); padding-top: 120px; padding-bottom: 120px;">
    <div class="mbr-section mbr-section__container mbr-section__container--middle">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-center">
                    <h3 class="mbr-section-title display-2">Contact Us</h3>
                    <small class="mbr-section-subtitle"></small>
                </div>
            </div>
        </div>
    </div>
    <div class="mbr-section mbr-section-nopadding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1" data-form-type="formoid">
                    <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="row row-sm-offset">
                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-6-name">Name <span class="form-asterisk">*</span></label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $firstname." ".$surname ?>" required data-form-field="Name" id="form1-6-name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="form1-6-email">Email <span class="form-asterisk">*</span></label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required data-form-field="Email" id="form1-6-email">
                                </div>
                            </div>
						<div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label class="form-control-label" for="form1-6-message">Message <span class="form-asterisk">*</span></label>
                            <textarea class="form-control autofill" name="message" rows="7" required data-form-field="Message" id="form1-6-message"><?php echo (isset($_POST["message"]) ? $_POST["message"] : ""); ?></textarea>
                        </div>
						</div>
                        </div>
                        <div><button type="submit" name="submit" class="btn btn-primary">Contact Us</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section mbr-section-md-padding" id="social-buttons4-5" style="background-color: rgb(46, 46, 46); padding-top: 10px; padding-bottom: 15px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2"></h3>
                <div><a class="btn btn-social" title="Twitter" target="_blank" href="<?php echo $twitter_url; ?>"><i class="socicon socicon-twitter"></i></a>    
				<a class="btn btn-social" title="Instagram" target="_blank" href="<?php echo $instagram_url; ?>"><i class="socicon socicon-instagram"></i></a>
            </div>
        </div>
    </div>
</section>
<footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-2" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">
    <div class="container">
        <p class="text-xs-center">Copyright &copy; <?php echo date("Y"); ?> Workchop.</p>
    </div>
</footer>

<?php 
if(isset($_POST["submit"])){
	require_once "_mail.php"; 
}
?>
  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assets/jarallax/jarallax.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/js/script.js"></script>
  <input name="animation" type="hidden">
   <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
  </body>
</html>