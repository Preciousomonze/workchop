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
 $vendor_type = trim($_POST["tradesman_type"]);
 $location = trim($_POST["location"]);
 $url = $site_url."mobile_app/search_engine.php?vendor_type=".$vendor_type."&user_id=".$user."&location_index=".$location;
 
 //check if the inputs are null
 if(empty($vendor_type)){
	 ?>
	 <div class="big-search" onload="showDanger('#location')">
			<i class="icon fa-close"></i>
			<p class="inscribed">Please select a type of tradesman</p>
						
	 </div>
	 
	 <?php
 }
 else if(empty($location)){
	 ?>
	 
	 <div class="big-search">
			<i class="icon fa-close"></i>
			<p class="inscribed">Please select a location</p>
						
	 </div>
	 <script type="text/javascript">
		showDanger("form #tradesman_type");
	 </script>
	 <?php
 }
 else{
	 
 
 $curl = new Curl();
 
 $result = trim(strtolower($curl->get_auth($url)));
 var_dump($url);
 var_dump($result);
 //check if theres an error
 if(!$curl->get_error()){
	 //get the tradesman details
	 $tradesmen = explode($tradesman_split,$result);
	 //var_dump($tradesmen);
	 if(count($tradesmen) < 1){
		 
	?>
		 
	 <div class="big-search">
			<i class="icon fa-frown-o"></i>
			<p class="inscribed">No tradesman found</p>
						
	 </div>
	
	<?php
	}
	else{
	 ?>
	 
		 <div class="add-trade">
		  <ul>
	 <?php
		//keep counting
		for($i = 0; $i < count($tradesmen); $i++){
			if($i > 4){//once it's 5, like tomiwa said, don't show again
				break;
			}
			//split the vendor's details
			 $tradesman = explode( $tradesman_details_split,$tradesmen[$i]);
			 $t_name = $tradesman[0];
			 $t_id = $tradesman[1];
			 $t_rating = $tradesman[2];
			 $t_story = $tradesman[5];
			 
			 //get tradesman-pishure
			 $t_pishure = $site_url."mobile_app/vendor_pictures/".$t_id.".jpg";
			 $row_num = $i%2;
			 $row_is = '';
			 if($row_num == 1)
				 $row_is = "two";
				?>
		 <li class="<?php echo $row_is; ?>">
		  <section>
			<div class="row">
				<div class="col-xs-2 center">
					<img src="<?php echo load_image($t_pishure); ?>" alt="<?php echo $t_name; ?>">
				</div><?php //column 
				?>
				
				<div class="col-xs-8">
				<div class="person-name">
					<?php echo $t_name; ?>
				</div>

				<div class = "rating">
									<?php 
									echo show_rating($t_rating);
									// get the review-show
				/*
				$review_link = $site_url."mobile_app/get_review.php?vendor_id=".$t_id;
				$tradesman_review = $curl->get_auth($review_link);
				if(!$curl->get_error()){
					//show something,
					//explode
					$tradesman_review_info = explode($delimiter,$tradesman_review);
					//get the rating bla
					$rate = $tradesman_review_info[3];
					var_dump($tradesman_review_info);
					//maximum rating is 5,so show five,
					//but now determine by showing the rating level, hmm,sounds complex. :(, thank God i did a function for it :)
					echo show_rating($rate);
				}
				*/
				?>
				</div>
			<span class="used-by">
				<?php // get the review-show
				echo $t_story;
				?>
			</span>
						</div><?php //column
			?>
			<script type="text/javascript">
	  	  function addTradesman(id){
			   id = id.toString();  
  <?php
        $toast_note_js = toast_note_js(".toast-note");
		
		   $start_ajax = "
			/*$('#added-or-not').append('".loader()."');*/";
		   echo ajax_load("#added-or-not-".$i."","'".AJAX_PART."_add_tradesman.php?tradesman='+id",$start_ajax,$toast_note_js);
			 ?>
	  }	   
            </script>
			<?php //main-body 
			//now we need to get the vendor's info,so lets curl the url, you get the pun?
			$result = $curl->get_auth($site_url."mobile_app/get_vendor_info.php?vendor_id=".$t_id);
			if(!$curl->get_error()){//out of variable names, bear with me, don't roar though ;).
				$t_result = explode($delimiter,$result);
				$t_phone = $t_result[1];
				$t_email = $t_result[2];
				//check if the tradesman has the app installed
				$has_app = '';
				$app_result = trim($curl->get_auth($site_url."mobile_app/check_smart_vendor.php?vendor_id=".$t_id."&user_id=".$user));
				
				if(!$curl->get_error()){
					if($app_result == "1"){
						//the tradesman has a happ.
						$has_app = "<a href=\"#message-pop\" onclick=\"show_side_message('".$t_id."')\" title=\"Message ".$t_name.".\">
						<i class=\"icon fa-commenting\"></i></a>";
					}
				}
				
			?>
			<div class="col-xs-2">
			<div class="info-box center">
			<span id="added-or-not-<?php echo $i; ?>">
			<?php 
			//var_dump(is_user_tradesman($t_id));
			echo show_add_btn($t_id); ?>
			</span>
			<?php //incase there are 2 numbers ?>
			<a href="tel:<?php echo $t_phone; ?>" class="call-btn" title="Call <?php echo $t_name; ?>."><i class="icon fa-phone"></i></a>
			<a href="mailto:<?php echo $t_email; ?>" class="mail-btn" title="Send <?php echo $t_name; ?> a mail."><i class="icon fa-envelope"></i></a>
			<?php 
			echo $has_app; 
			?>
			
			</div>
			
			</div>
			
			</div><?php //row 
			?>
			</li>
			<?php
			}
		
		 
 }
 ?>
 </ul>
 </div>
 <?php
	}
 } 
 else{
	 //i'm tired, do nothing
	 ?>
	 	 
	 <div class="big-search">
			<i class="icon fa-frown-o"></i>
			<p class="inscribed">No tradesman found, try another location.</p>
						
	 </div>
	 <?php
 }

 }
?>