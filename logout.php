<?php session_start();
require "_vars.php";
require "vendor/autoload.php";
unset($_SESSION["user"]);
/*
 $session = new Session();
 if($session->check_session_basically($_SESSION["user"])){
	 header("location:index.php");
 }
*/