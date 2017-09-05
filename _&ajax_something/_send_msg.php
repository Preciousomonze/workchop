<?php session_start();
/*
 * For sending messages
 * if you know what you're doing, edit it for the better, add your name to the contributors list
 * 
 * @author Precious Omonzejele
 * @contributors ..Haastrup Adejoke
 * I have to acknowledge myself oh, so that one day, my code will hit the right set of people
 */
 require_once "../_vars.php";
 require_once "../_parts/_functions.php";
 //call the main imbe that loads all my niggas.
 require "../vendor/autoload.php";
  $session = new Session();
 if($session->check_session_basically($user) == false){
	// header("location:login.php");
	toast_note("Sorry, an unknown error occured, please try again or reload the page.",2);
	 exit();
 }
 
 //get the request
 $vendor_id = '55c49998a0f1df61322b9e831586c4c8';//trim($_POST["vendor_id"]);
 $message = trim($_POST["message"]);
 $url = $site_url."mobile_app/upload_chats.php?vendor_id=".$vendor_id."&user_id=".$user."&chat=".$message."&sender=".$user;
  
 if(empty($message)){
	 //show an error
	 echo toast_note("Please type something in the message box",2);
	 exit();
 }
 $curl = new Curl();
 
 $result = $curl->get_auth($url);
 //var_dump($result);
 //check if theres an error
 if(!$curl->get_error()){
	 echo toast_note("Message sent",1);
	 }
	 else{
		 echo toast_note("An error occured, please try again later.",2);
	 }
?>




