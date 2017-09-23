<?php session_start();
require "_vars.php";
require "vendor/autoload.php";
unset($_SESSION["user"]);
unset($_SESSION["duplicate"]);
header("location:".$site_url);
/*
 $session = new Session();
 if($session->check_session_basically($_SESSION["user"])){
	 header("location:index.php");
 }
*/