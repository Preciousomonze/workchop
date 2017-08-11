<?php session_start();
/*
 * for adding vendors to user list 
 * if you know what you're doing, add your name to the contributors list
 * 
 * @author Precious Omonzejele
 * @contributors ..add names here,separate with comma
 * I have to acknowledge myself oh, so that one day, my code will hit the right set of people
 */
 
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
 $vendor_type = trim($_POST["tradesman_type"]);
 $location = trim($_POST["location"]);
 $url = $site_url."mobile_app/search_engine.php?vendor_type=".$vendor_type."&user_id=".$user."&location_index=".$location;
 
 //check if the inputs are null
 if(empty($vendor_type)){
	 ?>
	 <div class="big-search">
			<i class="icon fa-delete"></i>
			<p class="inscribed">Please select a type of tradesman</p>
						
	 </div>
	 <?php
 }
 else if(empty($location)){
	 ?>
	 
	 <div class="big-search">
			<i class="icon fa-delete"></i>
			<p class="inscribed">Please select a location</p>
						
	 </div>
	 <?php
 }
 else{
	 
 
 $curl = new Curl();
 
 $result = trim(strtolower($curl->get_auth($url)));
 
 //check if theres an error
 if(!$curl->get_error()){
	 //get the tradesman details
	 $tradesmen = explode($tradesman_split,$result);
		//keep counting
		for($i = 0; $i < count($tradesmen); $i++){
			if($i == 4){//once it's 5, like tomiwa said, don't show again
				break;
			}
			//split the vendor's details
			 $tradesman = explode( $tradesman_details_split,$tradesmen[$i]);
			 $t_name = $tradesman[0];
			 $t_id = $tradesman[1];
			 $t_rating = $tradesman[2];
			 $t_story = $tradesman[5];
			 
			 
				?>
		 
		 <div class="tradesman-result">
			<div class="row">
				<div class="col-md-3">
					<img 
				</div><?php //column ?>
			</div><?php //row ?>
		 </div>
		 <?php
		 
 }
 
 }
 else{
	 //i'm tired, do nothing
	 
 }

 }
?>