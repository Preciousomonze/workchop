<?php session_start();
require_once "_vars.php";
require_once PARTS."_functions.php";
require_once "vendor/autoload.php";
 $session = new Session();
 if($session->check_session_basically($user)){
	 header("location:index.php");
	 exit();
 }
 $site_name = "Workchop";
 $site_title = $site_name." - recover your password.";
 $log_description = "Recover your password to login to your workchop account, chat with tradesmen,find new tradesmen,rate tradesmen you've used.";
 $curl = new Curl();
	 $ok = "ok";
$resend_msg = '';
 $success_txt = array();
 if(isset($_POST["submit"])){
	 //oya oh, make sure some things aren't empty first
	 $phone = trim($_POST["phone"]);
	 $_SESSION["phone_number"] = $phone;
	 //storing error things, i just hope it's not taking memory space oh :(
	$messages = array();
	 if(empty($phone)){
		 $success_txt[] = 0;
		 $messages[] = "Please put in your phone number";
	 }

	 else {//not empty password
				//call the curl request
				$url = $site_url."mobile_app/get_details_from_phone.php?type=1&phone_number=".$phone."";
			
			$result = trim($curl->get_auth($url));
			
			if($curl->get_error()){//if it returns true
				$success_txt[] = 0;
				$messages[] = "Sorry, an error occurred, try again later.";
			}
			else if($result == "false"){//returned false
				$success_txt[] = 0;
				$messages[] = "Sorry, the phone number is not registered, please put in a registered phone number.";
			}
			
			else{//successful
				//$success_txt = 1;
				//split the user result
				$user_result = explode($delimiter,$result);
				//echo $curl->get_error();
				//echo $url;
				//check if the user is already logged in
				if($user_result[0] == "logged"){//the first index will contain logged if the user is logged in
					$success_txt[] = 0;
					$messages[] = "Sorry, the phone number is currently logged in, you can't change the password.";
				}
				else{//successful
					//the user isn't logged in, go ahead
					$sm_url = "http://smslive247.com/http/index.aspx?cmd=login&owneremail=donpelumos@gmail.com&subacct=EMCONF&subacctpwd=workchop12345";
					//now check for the sms guys
					$response = $curl->get_auth($sm_url);
					//now check if it produces a correct response, a correct response from them is like this 'ok: d33e33ee33....'
					$sms_response = explode(':',$response);
					//var_dump($response);
					//echo $response;
					if(strtolower($sms_response[0]) != $ok){
						//an error
						$success_txt[] = 0;
						$messages[] = "Sorry! could not retrieve password reset code, try again later.";
					}
					else{//successful
						//get the session code, don't forget to use trim, like pelumi said. cause ther's a space in front, and could ruin our code.
						$sms_session = trim($sms_response[1]);
						//now lets generate a confirmation code for the user
						$confirm_code = md5(session_id().time());
						//you have to reshuffle it since we're reducing it to 6 digits, to avoid repitition
						$letters = new Letters();
						$confirm_code = $letters->backwards($confirm_code);
						$confirm_code = substr($confirm_code, 0, 6);
						//to be able to use it later.
						$_SESSION["confirm_code"] = $confirm_code;
						//now we've gotten the code, let's compose the messages
						$text = urlencode("We noticed you lost your password, we're so sorry about that, your confirmation code is ".$confirm_code.".");
						//now send the messages
						$sm_url_2 ="http://smslive247.com/http/index.aspx?cmd=sendmsg&sessionid=".$sms_session."&message=".$text."&sender=Workchop&sendto=".$phone."&msgtype=0";
						$final = $curl->get_auth($sm_url_2);
						//var_dump($sm_url_2);
						//var_dump($final);
						//check if it went well
						$fn = explode(':',$final);
						if(strtolower($fn[0]) != $ok){
							//an error
							$messages[] = "Sorry! could not retrieve password reset code, try again later.";
						}
						else{//successful
							$success_txt[] = 1;
							//reload the page so that the necessary things show
							header("location:".$_SERVER["PHP_SELF"]);
						}
					}
				}
				
			}////successful
	 }
 }
 //check if it's resend
 elseif(isset($_SESSION["confirm_code"]) && isset($_POST["resend_code"])){//resend bla
					//go ahead
					$sm_url = "http://smslive247.com/http/index.aspx?cmd=login&owneremail=donpelumos@gmail.com&subacct=EMCONF&subacctpwd=workchop12345";
					//now check for the sms guys
					$response = $curl->get_auth($sm_url);
					//now check if it produces a correct response, a correct response from them is like this 'ok: d33e33ee33....'
					$sms_response = explode(':',$response);
					//var_dump($response);
					//echo $response;
					if(strtolower($sms_response[0]) != $ok){
						//an error
						$success_txt[] = 0;
						$messages[] = "Sorry! could not retrieve password reset code, try again later.";
					}
					else{//successful
						//get the session code, don't forget to use trim, like pelumi said. cause ther's a space in front, and could ruin our code.
						$sms_session = trim($sms_response[1]);
						//now lets generate a confirmation code for the user
						//$confirm_code = md5(session_id().time());
						//you have to reshuffle it since we're reducing it to 6 digits, to avoid repitition
						//$letters = new Letters();
						//$confirm_code = $letters->backwards($confirm_code);
						//$confirm_code = substr($confirm_code, 0, 6);
						//to be able to use it later.
						//$_SESSION["confirm_code"] = $confirm_code;
						//now we've gotten the code, let's compose the messages
						$text = urlencode("We noticed you lost your password, we're so sorry about that, your confirmation code is ".$_SESSION["confirm_code"].".");
						//now send the messages
						$sm_url_2 ="http://smslive247.com/http/index.aspx?cmd=sendmsg&sessionid=".$sms_session."&message=".$text."&sender=Workchop&sendto=".$_SESSION["phone_number"]."&msgtype=0";
						$final = $curl->get_auth($sm_url_2);
						//var_dump($sm_url_2);
						//var_dump($final);
						//check if it went well
						$fn = explode(':',$final);
						if(strtolower($fn[0]) != $ok){
							//an error
							$messages[] = "Sorry! could not retrieve password reset code, try again later.";
						}
						else{//successful
							//$success_txt[] = 1;
							$resend_msg = "<div class=\"alert alert-info\" role=\"alert\">
			Your confirmation code has been resent to the phone number <strong>".$_SESSION["phone_number"]."</strong>, Check your phone and enter it below.
				</div>";
						}
					}
				}//resend
 
 //check for confirmation
 else if( isset($_POST["confirm_code_btn"]) && isset($_SESSION["confirm_code"]) ){
	  //storing error things, i just hope it's not taking memory space oh :(
	$messages = array();
	
		//check if the code is equal to the confirmation code entered.
		$confirm = trim($_POST["confirm_code"]);
		
		if(empty($confirm)){
			$success_txt[] = 0;
			$messages[] = "Please enter a confirmation code.";
		}
		else{
			if(strtolower($confirm) != strtolower($_SESSION["confirm_code"])){
				$success_txt[] = 0;
				$messages[] = "Sorry, the confirmation code is incorrect, try again.";
			}
			else{
				$success_txt[] = 1;
				//now set a session to know that we want to show the change password part
				$_SESSION["change_pass"] = "change_pass";
				//unset the previous session
				unset($_SESSION["confirm_code"]);
				//reload the page
				header("location:".$_SERVER["PHP_SELF"]);
			}
		}
 }
 
 else if(isset($_POST["change_password"]) && isset($_SESSION["change_pass"])){
	 $password = trim($_POST["password"]);
	 $cpassword = trim($_POST["cpassword"]);
	 //storing error things, i just hope it's not taking memory space oh :(
	$messages = array();
	if(empty($password)){
		$success_txt[] = 0;
		$messages[] = "Please put in a new password";
	}/* for not allowing spaces, just incase we change our minds shaa and note since the url is encoded, spaces are converted to %20. :)
	else if(strrpos($password, " ") != false){
		$success_txt[] = 0;
		$messages[] = "Please spaces are not allowed as password characters.";
	}*/
	else if($password != $cpassword){
			$success_txt[] = 0;
		$messages[] = "Please the password combination doesn't match, try again.";
	}
	else{
		$u = wc_prepare_text("mobile_app/set_new_password.php?type=1&number=".$_SESSION["phone_number"]."&password=".$password,"server");
		$pass_url = $site_url.$u;
		//get curl request
		//var_dump($pass_url);
		$answer = $curl->get_auth($pass_url);
		//var_dump($answer);
		if($curl->get_error()){
			$success_txt[] = 0;
			$messages[] = "sorry, an error occured, try again later.";
		}
		else{
		$success_txt[] = 1;
		$messages[] = "Password has been changed successfully.";
		 unset($_SESSION["change_pass"]);
		 unset($_SESSION["phone_number"]);
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
  <title>Recover password - Workchop</title>
  <?php
  //meta description
 wc_meta_keywords("login,workchop login,chat,message,rate,recover password");
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
<style type="text/css">
	form{
		padding:0 !important;
		
	}
	form .inside-form{
		padding:30px 15px;
	}
</style>
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
								 }
							else {
								} ?>
						 
                  </div>
    <form method="post" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>">
	<?php 
	//check if the user has already tried confirming code, thanks to the session storing the confitmation code stuff
	//once that session is set, we know the user has clicked that already
	if(isset($_SESSION["confirm_code"]) && !empty($_SESSION["confirm_code"])){
		if(!isset($messages) && !isset($_POST["resend_code"])){
			echo "<div class=\"alert alert-info\" role=\"alert\">
			A confirmation code has been sent to the phone number <strong>".$_SESSION["phone_number"]."</strong>, Check your phone and enter it below.
				</div>";
		}
		elseif(isset($_POST["resend_code"])){
				
			echo $resend_msg;
		}
		?>
		<div class="inside-form">
    	<input type="text" name="confirm_code" placeholder="Enter confirmation code here"/>
			    <p class="little-note">
				Haven't received confirmation code for more than 2 minutes, hit the resend code button.</p>
		 	<div class="btn-div">
			<div>
					<button type="submit" name="resend_code" class="btn btn-feel btn-block btn-large resend">Resend code</button>
					</div>
	<button type="submit" name="confirm_code_btn" class="btn btn-primary btn-block btn-large">Reset password</button>
	</div>
	<?php }
	else if (isset($_SESSION["change_pass"]) && !empty($_SESSION["change_pass"])){
		if(!isset($messages)){
			echo "<div class=\"alert alert-info\" role=\"alert\">
			Your confirmation code is correct, please enter your new password below.
				</div>";
		}
		?>
			<div class="inside-form">
			<input type="password" name="password" placeholder="Enter your new password" required="required" />
			<input type="password" name="cpassword" placeholder="Re-enter your new password" required="required" />
				<div class="btn-div">
        <button type="submit" name="change_password" class="btn btn-primary btn-block btn-large">Change password</button>
	</div>
	<?php 
	}
	else{
		if(!isset($messages)){
			echo "<div class=\"alert alert-info\" role=\"alert\">
			So sorry you lost your password, please put in your phone number to reset your password.
				</div>";
		}
		?>
		<div class="inside-form">
			<input type="tel" name="phone" placeholder="Phone number" required="required" value = "<?php echo (isset($_POST["phone"]) ? $_POST["phone"] : ""); ?>" />
        	<div class="btn-div">
	<button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Recover password</button>
	</div>
	<?php 
	}
	?>
	</div><?php //inside form ?>
    </form>
	</div>
		<a href="login.php" class="under-link" title="login to workchop">Login</a>
	</div>
	</div>
	<p class="foot-txt">&copy <?php echo date("Y"); ?>. workchop.</p>
	</div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js" type="text/javascript"></script>
    <script src="assets/js/index.js" type="text/javascript"></script>
</body>
</html>
