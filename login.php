<?php session_start();
require "_vars.php";
require "vendor/autoload.php";
 $session = new Session();
 if($session->check_session_basically($user)){
	 header("location:home.php");
 }
 $success_txt = array();
 $false = "false";
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
				$url = $site_url."mobile_app/user_login.php?email=".$email."&password=".$password."";
			$curl = new Curl();
			
			$result = $curl->get_auth($url);
			
			if($curl->get_error()){//if it returns true
			$success_txt[] = 0;
				$messages[] = "Sorry, an error occurred, bla try again later";
			}
			else if($result == $false){//returned false
			$success_txt[] = 0;
				$messages[] = "Incorrect email or password.";
			}
			
			else{//successful
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
				header("location:home.php");
				
			}
			
	 }
 }
 
 ?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login - Workchop</title>
  <?php
  //meta description
  ?>
  <link rel="icon" href="workchopphoneicon.png">
		
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

  <link rel="stylesheet" href="assets/css/login-style.css" type="text/css">

 
</head>

<body>

  <div class="login">
  <div class="logo" style="text-align:center;">
<a href="index.html"><img src="http://www.workchopapp.com/images/icon.png" alt="workchop"></a>
</div>
	<h1>Log In</h1>
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
        <button type="submit" name="submit" class="btn btn-primary btn-block btn-large"><i class="icon fa-login"></i> Sign In</button>
    </form>
	<a href="recover.php" class="under-link">Forgot password?</a>
</div>
  
    <script src="assets/js/index.js"></script>

</body>
</html>
