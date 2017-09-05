<?php session_start();
/*
 * for displaying message list 
 * if you know what you're doing, add your name to the contributors list
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
	echo toast_note("Sorry, an unknown error occured, please try again or reload the page.",2);
	
	 exit();
 }
 ?>
 

 <?php
 //get the request
 $vendor_id = trim($_GET["tradesman"]);
 //$message = trim($_POST["message"]);
 $url = $site_url."mobile_app/get_user_chats.php?vendor_id=".$vendor_id."&user_id=".$user."";
  
 
 $curl = new Curl();
 
 $result = trim(strtolower($curl->get_auth($url)));
 //var_dump($result);
 //check if theres an error
 if($curl->get_error() || $result == "false"){
	 echo toast_note("Could not resolve host",2);
	 //send an error to the js, so that the initial page is reloaded
	 ?>
	 	        <div class="message-itself inside"> 
        <div class = "head"> 
          <p class = "write">   
            <i class="icon fa-comments-o"></i>  
            Messages 
            </p> 
                 </div> 
                 <div class="initial center" style="min-height:220px;position:relative;"> 
                  
                 <div id="message-list-place"> 
                  <?php loader(); ?> 
                  </div> 
                  </div> 
        </div>
	 <script type="text/javascript">
	 <?php
	 echo ajax_load("#message-list-place","'".AJAX_PART."_message_list.php'");
			?>
	 </script>
	 <?php
	 
	 exit();
 }
 else{
	 //get the list of messages.
	 $messages = explode('------',$result);
	 $messages = array_filter($messages);
	 ///now loop through the result to get necessary info
	 if(count($messages) < 1){
		 //display no messages
		echo alert_note("You haven't sent any message. Start a conversation."); 
			exit();
	 }
		//end of list, so that we start from the bottom
		$end_list = count($messages) - 1 ;
		
		?>
		
			<div class="message-itself inside">
		    
				<div class = "head clearfix">
				<p class = "write">	
				<img style="width:10%;" class="round" src="<?php echo load_image($site_url."mobile_app/vendor_pictures/".$vendor_id.".jpg"); ?>" alt="<?php echo tradesman_names($vendor_id); ?>">
				<?php echo tradesman_names($vendor_id); ?></p>
				
				<a href="#messages" style="float:right;margin-top:-30px;" class="btn-feel"><i class="icon fa-step-backward"></i> Back</a>
				</div>
					<div class="message-body">
		
		<?php
		//var_dump($messages);
	 for($i = 0; $i < count($messages); $i++){//reverse this something backwards, so as to get the latest at the top
		 //from what i noticed, you could get empty results, i don't know why he won't solve that :(
		 if(!empty(trim($messages[$i]))){
			 $details = explode($delimiter,$messages[$i]);
	    $sender_id = trim($details[2]);
		$message = $details[3];
		$date = $details[4];
		//get the tradesman id from one of the indexes
		$user_and_tradesman = $details[1];
		//split this variable with the &&;
		$user_and_tradesman = explode("&&",$user_and_tradesman);
		$t_id = $user_and_tradesman[1];
		
		$message_pos = '';//message position 
		
			if($sender_id == $user){
				$message_pos = 'right';
				
			}
			else{
				$message_pos = 'left';
			}
			?>
			
					<section class="message <?php echo $message_pos; ?> clearfix">

						<div class="inner">
						<p><?php echo $message; ?></p>
						<section class="time">
							<i class="icon fa-clock-o"></i> <?php echo $date; ?>
						</section>
						</div>
					</section>
			
		<?php
		 }
	 }
	 ?>
				</div>
				<div class="new-message">
					<form id="send-msg-form">
						<textarea name="new_message" class="form-control" placeholder="Send a new message to name"></textarea>
						<button type="submit" id="send-msg-btn" class="btn-feel btn form-control"><i class="colour-blue icon fa-send"></i> Send</button>
					</form>
					<?php 
					echo ajax_send("#search-result","'".AJAX_PART."_send_msg.php'","post",'');
					?>
				</div>
					</div><?php // messages 
			
				?>
				<?php
				//send to the server that the message has been read, like pelumi suggested.
				$curl->get_auth($site_url."mobile_app/clear_user_notification.php?user_id=".$user."&vendor_id=".$vendor_id);
				//it's either it goes or not mehn, can't do nothing about it.
 }
?>