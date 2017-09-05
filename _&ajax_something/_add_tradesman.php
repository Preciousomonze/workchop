<?php session_start();
/*
 * for adding vendors to user list 
 * if you know what you're doing, add your name to the contributors list
 * 
 * @author Precious Omonzejele
 * @contributors ..Haastrup Adejoke
 * I have to acknowledge myself oh, so that one day, my code will hit the right set of people
 */
 require "../_vars.php";
 require "../_parts/_functions.php";
 //call the main imbe that loads all my niggas.
 require "../vendor/autoload.php";
  $session = new Session();
 if($session->check_session_basically($user) == false){
	// header("location:login.php");
	?>
	<script type="text/javascript">alert("Sorry, an unknown error occured, please try again or reload the page.");</script>
	<?php
	 exit();
 }
 //get the request
 $vendor_id = trim($_GET["tradesman"]);
 $url = $site_url."mobile_app/add_to_my_vendors.php?vendor_id=".$vendor_id."&user_id=".$user;
 
 
 $curl = new Curl();
 
 $result = trim(strtolower($curl->get_auth($url)));
 
 //check if theres an error
 if(!$curl->get_error()){
	 
	 if($result == "done"){
		 ?>
		 
		 <p class="added-btn-statement">
			<i class="icon fa-check"></i> Added
		 </p>
		 <?php
	 }
 }
 else{
	 //i'm tired, do nothing
	 echo toast_note("Could not add tradesmen, try again.",2);
	 //show the button again.
	 echo show_add_btn($vendor_id);
 }

?>