<?php session_start();
require_once "_vars.php";
require_once PARTS."_functions.php";
require_once "vendor/autoload.php";
 $session = new Session();
 if($session->check_session_basically($user)){
	 header("location:home.php");
 }
 $site_name = "Workchop";
 $site_title = $site_name." - login to your account.";
 $log_description = "Login to your workchop account, find recommended tradesmen, find new tradesmen used by your contact,rate tradesmen you've used, chat with tradesmen.";
 $success_txt = array();
 $false = "false";
 if(isset($_SESSION["phone_number"])){//the forgot password session was started.clear all
	 unset($_SESSION["confirm_code"]);
	 unset($_SESSION["change_pass"]);
	 unset($_SESSION["phone_number"]);
 }
 if(isset($_POST["submit"])){
	 //oya oh, make sure some things aren't empty first
	 $email = trim($_POST["email"]);
	 $password = trim($_POST["password"]);
	 //store error things
	 $messages = array();
	 if(empty($email)){
		 $success_txt[] = 0;
		 $messages[] = "Please put in your email address";
	 }
	 if(empty($password)){
		 $success_txt[] = 0;
		 $messages[] = "Please put in your password";
	 }
	 else if( !( empty($email) || empty($password) )){
				//call the curl request
				$url = wc_prepare_text($site_url."mobile_app/user_login.php?email=".$email."&password=".$password."","server");
			$curl = new Curl();
			$result = $curl->get_auth($url);
			if($curl->get_error()){//if it returns true
			$success_txt[] = 0;
				$messages[] = "Sorry, an error occurred, try again later";
			}
			else if($result == $false){//returned false
			$success_txt[] = 0;
				$messages[] = "Incorrect email or password.";
			}
			else{//successful
				header("location:home.php");
				$success_txt[] = 1;
				//split the user result
				$user_result = explode($delimiter,$result);
				//echo $result;
				//create the session
				//check if the user is currently logged in on the phone, so that we know which index the id is
				$user_result[0] = trim(strtolower($user_result[0]));
				if($user_result[0] == "logged"){//the imbe is logged in, get the possition
				$_SESSION["user"] = $user_result[6];
				}
				else{
				$_SESSION["user"] = $user_result[5];
				}
				//echo $_SESSION["user"];	
			}		
	 }
 }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Workchop</title>
  <?php
  //meta description
wc_meta_keywords("login,workchop login,chat,message,rate");
  wc_meta_description($log_description); ?>
  <meta name="author" content="Omonzejele Precious">
    <meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo $site_title; ?>" />
<?php wc_fb_meta_description($log_description); ?>
<meta property="og:image" content="<?php echo $site_url; ?>assets/images/logo-128x128.png" />
<meta name="twitter:image" content="<?php echo $site_url; ?>assets/images/logo-128x128.png" />
<meta name="twitter:creator" content="<?php echo $twitter_handle; ?>" />
<meta property="og:url" content="<?php echo $site_url; ?>login.php" />
<meta property="og:site_name" content="<?php echo $site_name; ?>" />
<meta name="twitter:card" content="summary" />
<?php  wc_twt_meta_description($log_description); 
      wc_twt_meta_title($site_title);
?>
<meta name="twitter:site" content="<?php echo $twitter_handle; ?>" />
  <link rel="icon" href="<?php echo $site_url; ?>assets/images/logo-128x128.png">
 <?php // <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> 
 ?>
  <link rel="stylesheet" href="assets/css/login-style.css" type="text/css"> 
</head>

<body>
<div class="login">
<div class="inner-login">
<div class="inner-login-top">
  <div class="logo" style="text-align:center;">
<a href="<?php echo $site_url; ?>" title="workchop"><img src="<?php echo $site_url; ?>images/icon.png" alt="workchop"></a>
</div>
<div class="login-body">
	<?php //<h1 style="text-shadow:0px 1px 1px rgba(0,0,0,0.5);">Log In</h1>
	?>
	<div class="inner">
	<div class="adjust-alert-msg">
						 <?php if(isset($messages)){
							 for($i = 0; $i < count($messages); $i++){
								 if($success_txt[$i] == 0){
							 echo "<div class=\"alert alert-danger\" role=\"alert\">";
						 }
						 else{
							 	 echo "<div class=\"alert alert-success\" role=\"alert\">";
						}
						 	  echo $messages[$i]."</div>";
								}
								 } else {} ?>
				  </div>
	<form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>">
    	<input type="text" name="email" placeholder="Email or Phone number" required="required" value = "<?php echo (isset($_POST["email"]) ? $_POST["email"] : ""); ?>" />
        <input type="password" name="password" placeholder="Password" required="required"/>
		<div class="btn-div">
	   <button type="submit" name="submit" class="btn btn-primary btn-block btn-large"><i class="icon fa-login"></i> Sign In</button>
		</div>
	</form>
	</div>
		<a href="recover.php" class="under-link">Forgot password?</a>
	</div>
	</div>
	<p class="foot-txt">&copy <?php echo date("Y"); ?>. workchop.</p>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js" type="text/javascript"></script>
    <script src="assets/js/index.js" type="text/javascript"></script>
</body>
</html>
