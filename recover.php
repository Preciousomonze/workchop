<?php session_start();
require "_parts/_vars.php";
require "vendor/autoload.php";
 $session = new Session();
 if($session->check_session_basically($user)){
	 header("location:index.php");
 }
 $success_txt = array();
 if(isset($_POST["submit"])){
	 //oya oh, make sure some things aren't empty first
	 $phone = trim($_POST["phone"]);
	 //storing error things, i just hope it's not taking memory space oh :(
	$messages = array();
	
	 
	 if(empty($phone)){
		 $success_txt[] = 0;
		 $messages[] = "Please put in your phone number";
	 }

	 else {//not empty password
	 $ok = "ok";
				//call the curl request
				$url = $site_url."mobile_app/get_details_from_phone.php?type=1&phone_number=".$phone."";
			$curl = new Curl();
			
			$result = $curl->get_auth($url);
			
			if($curl->get_error() != false){//if it returns true
				$success_txt[] = 0;
				$messages[] = "Sorry, an error occurred, try again later";
			}
			else if(!$result){//returned false
				$success_txt[] = 0;
				$messages[] = "Sorry, the phone number is incorrect, please put in a registered phone number";
			}
			
			else{//successful
				//$success_txt = 1;
				//split the user result
				$user_result = explode($delimiter,$result);
				echo $curl->get_error();
				//echo $url;
				//check if the user is already logged in
				if($user_result[0] == "logged"){//the first index will contain logged if the user is logged in
					$success_txt[] = 0;
					$messages[] = "Sorry, the phone number is currently logged in, you can't change the password.";
				}
				else{//successful
					//the user isn't logged in, go ahead
					//now check for the sms guys
					$response = $curl->get_auth("http://smslive247.com/http/index.aspx?cmd=login&owneremail=donpelumos@gmail.com&subacct=EMCON&subacctpwd=workchop12345");
					//now check if it produces a correct response, a correct response from them is like this 'ok: d33e33ee33....'
					$sms_response = explode(':',$response);
					
					echo $response;
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
						$text = "We noticed you lost your password, we're so sorry about that, your confirmation code is ".$confirm_code."";
						//now send the messages
						$final = $curl->get_auth("http://smslive247.com/http/index.aspx?cmd=sendmsg&sessionid=".$sms_session."&message=".$text."&sender=Workchop&sendto=".$phone."&msgtype=0");
						
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
 
 //check for confirmation
 else if( isset($_POST["confirm_code_btn"]) && isset($_SESSION["confirm_code"]) ){
	  //storing error things, i just hope it's not taking memory space oh :(
	$messages = array();
	
		//check if the code is equal to the confirmation code entered.
		$confirm = trim($_POST["confirm_code"]);
		
		if(empty($confirm)){
			$success_txt[] = 0;
			$messages[] = "Please enter a confirmation code";
		}
		else{
			if($confirm != $_SESSION["confirm_code"]){
				$success_txt[] = 0;
				$messages[] = "Sorry, the confirmation code is incorrect, try again";
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
	}
	else if($password != $cpassword){
			$success_txt[] = 0;
		$messages[] = "Please the password combination doesn't match, try again.";
	
	}
	else{
		//get curl request
		$answer = $curl->get_auth($site_url."mobile_app");
		
		if($curl->get_error()){
			$success_txt[] = 0;
			$messages[] = "sorry, an error occured, try again later.";
			
		}
		else{
					$success_txt[] = 1;
		$messages[] = "Password has been changed successfully.";
	
	
		}
	}
	
 }
 
 
 
 ?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Recover password - Workchop</title>
  <?php
  //meta description
  ?>
  <link rel="icon" href="workchopphoneicon.png">
		
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="assets/css/login-style.css" type="text/css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>

  <div class="login">
  <div class="logo" style="text-align:center;">
<img src="http://www.workchopapp.com/images/icon.png">
</div>
	<h1>Recover password</h1>
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
		if(!isset($messages)){
			echo "<div class=\"alert alert-info\" role=\"alert\">
			A confirmation code has been sent to the phone number <strong>".$phone."</strong>, Check your phone and enter it below.
				</div>";
		}
		
		?>
    	<input type="tel" name="confirm_code" placeholder="Enter confirmation code here" required="required" />
        <button type="submit" name="confirm_code_btn" class="btn btn-primary btn-block btn-large">Reset password</button>
	<?php }
	else if (isset($_SESSION["change_pass"]) && !empty($_SESSION["change_pass"])){
		if(!isset($messages)){
			echo "<div class=\"alert alert-info\" role=\"alert\">
			Your confirmation code is correct, please enter your new password below.
				</div>";
		}
		?>
		
					<input type="password" name="password" placeholder="Enter your new password" required="required" />
			<input type="password" name="cpassword" placeholder="Re-enter your new password" required="required" />
			
        <button type="submit" name="change_password" class="btn btn-primary btn-block btn-large">Change password</button>
	<?php 
	}
	
	else{
		if(!isset($messages)){
			echo "<div class=\"alert alert-info\" role=\"alert\">
			So sorry you lost your password, please put in your phone number to reset your password.
				</div>";
		}
		?>
			<input type="tel" name="phone" placeholder="Phone number" required="required" value = "<?php echo (isset($_POST["phone"]) ? $_POST["phone"] : ""); ?>" />
        <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Recover password</button>
	<?php 
	}
	?>
    </form>
	<a href=""></a>
</div>
  
    <script src="assets/js/index.js"></script>

</body>
</html>
