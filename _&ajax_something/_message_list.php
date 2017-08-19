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
$url = $site_url."mobile_app/get_user_chat_list.php?user_id=".$user."";
 $curl = new Curl();
 
 $result = $curl->get_auth($url);
 if($curl->get_error()){
	
 }
 else{
	 //no error
	 $messages = explode($chat_delimiter,$result);
	 if(count($messages) < 1){
		 //no message
		echo "bla bla"; 
		 exit();
	 }
	 //now loop
	 for($i = 0; $i < count($messages); $i++){
		 //get values
		 $message_details = explode($delimiter,$messages[$i]);
		 $t_id = $m_details[0];
		 $t_name = $m_details[1];
		 $date = $m_details[3];
		 $unread_no = (int)$m_details[4];
		 //know if it's unread or not
		 $badge_no = '';
		 $is_unread = '';
		 if($unread_no > 0){
			 //it's unread
			 $is_unread = "unread";
			 $badge_no = "	<span class=\"wc-badge pull-right\">".$unread_no."</span>";
		 }
		 ?>
		 <div class="message-box <?php echo $is_unread; ?>">
						<section class="message-body">
							<div class="row">
								<div class="col-xs-2 center">
									<img src="<?php echo load_image($site_url."mobile_app/vendor_pictures/".$t_id.".jpg"); ?>" alt="<?php echo $t_name; ?>">
								</div><?php //col
								?>
								<div class="col-xs-10">
								<?php echo $badge_no; ?>
									<p class="person-name">
									 <?php echo $t_name; ?>
									</p>
									<p class="message-part">
									 bla bla bla bla bla bla la something
									</p>
								</div><?php //col
								?>
								<div class="col-xs-3">
									
								</div><?php //col
								?>
							</div>
						</section>
						<section class="detail-section">
							<i class="icon fa-clock-o"></i> <span title="time">time</a>
						</section>
						
					</div>
					
		 <?php
	 } 
 }

 ?>