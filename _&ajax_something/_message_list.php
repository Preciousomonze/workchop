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
 ?>
 
 <?php
 

 //get the request
$url = $site_url."mobile_app/get_user_chat_list2.php?user_id=".$user."";
 $curl = new Curl();
 
 $result = $curl->get_auth($url);
 if($curl->get_error()){
		 //no message
		echo alert_note("An error occured, please try again later.",2); 
		?>
		
		<a href="#open-message" onclick="showMessage(2)" title="view conversation with">bla</a>
		<?php 
		 exit();
 }
 else{
	 //no error
	 $messages = explode($chat_delimiter,$result);
	 if(count($messages) < 1){
		 //no message
		echo alert_note("No Message Thread. Start a conversation."); 
		 exit(); 
	 }
	 //now loop
	 for($i = 0; $i < count($messages); $i++){
		 //get values
		 $message_details = explode($delimiter,$messages[$i]);
		 $t_id = trim($m_details[0]);
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
		 
		 //switch between rows
		 $even = $i % 2;
		 $two_class = '';
		 if($even == 1){
			 $two_class = "two";
		 }
		 ?>
		 <a href="#open-message" onclick="showMessage($t_id)" title="view conversation with <?php $t_name; ?>">
		 <div class="message-box <?php echo $two_class." ".$is_unread; ?>">
						<section class="message-body">
							<div class="row">
								<div class="col-xs-2 center">
									<img class="round" src="<?php echo load_image($site_url."mobile_app/vendor_pictures/".$t_id.".jpg"); ?>" alt="<?php echo $t_name; ?>">
								</div><?php //col
								?>
								<div class="col-xs-10">
								<?php echo $badge_no; ?>
									<p class="person-name">
									 <?php echo $t_name; ?>
									</p>
									<p class="message-part">
									<?php // now load the most recent message into this part
									
									 $url = $site_url."mobile_app/get_user_chats.php?vendor_id=".$vendor_id."&user_id=".$user."";
  
 
 $curl = new Curl();
 
 $result = trim(strtolower($curl->get_auth($url)));
 //var_dump($result);
 //check if theres an error
 if(!$curl->get_error() || $result != "false"){
	 //get the list of messages.
	 $messages = explode('------',$result);
	 ///now loop through the result to get necessary info
	
		//end of list, so that we start from the bottom
		$end_list = count($messages) - 1 ;
		//store the last message.
		$last_message = '';
		$last_message_set = '';
		for($i = $end_list; $i >=0; $i--){
			$last_message_set = explode($delimiter,$messages[$i]);
			$last_message = $last_message_set[3];
			break;
		}
		echo $last_message;
									?>
									</p>
								</div><?php //col
								?>
								<div class="col-xs-3">
									
								</div><?php //col
								?>
							</div>
						</section>
						<section class="detail-section">
							<i class="icon fa-clock-o"></i> <span title="time"><?php echo $last_message_set[4]; ?></a>
						</section>
						
					</div>
					
					</a>
					
		 <?php
	 } 
 }
 
 }

 ?>
 
 