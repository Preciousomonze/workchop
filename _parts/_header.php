<?php session_start();
require "_parts/_vars.php";
require "vendor/autoload.php";
 $session = new Session();
 if(!$session->check_session_basically($user)){
	 header("location:index.php");
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
  <link rel="stylesheet" href="assets/css/login-style.css" type="text/css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>

  <div class="login">
  <div class="logo" style="text-align:center;">
<img src="http://www.workchopapp.com/images/icon.png" width="40%" >
</div>
	<h1>Login</h1>
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
        <button type="submit" class="btn btn-primary btn-block btn-large"><i class="icon fa-login"></i> Sign In</button>
    </form>
	<a href=""></a>
</div>
  
    <script src="assets/js/index.js"></script>

</body>
</html>
