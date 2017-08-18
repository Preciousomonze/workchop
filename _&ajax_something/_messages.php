<?php session_start();
/*
 * for displaying message list 
 * if you know what you're doing, add your name to the contributors list
 * 
 * @author Precious Omonzejele
 * @contributors ..Haastrup Adejoke
 * I have to acknowledge myself oh, so that one day, my code will hit the right set of people
 */
 require_once "../../w_var.php";
 
 require_once "../_vars.php";
 require_once "../_parts/_functions.php";
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
 $vendor_id = '55c49998a0f1df61322b9e831586c4c8';//trim($_POST["vendor_id"]);
 $message = trim($_POST["message"]);
 $url = $site_url."mobile_app/get_user_chats.php?vendor_id=".$vendor_id."&user_id=".$user."";
  
 
 $curl = new Curl();
 
 $result = trim(strtolower($curl->get_auth($url)));
 //var_dump($result);
 //check if theres an error
 if(!$curl->get_error() || $result != "false"){
	 //get the list of messages.
	 $messages = explode('------',$result);
	 ///now loop through the result to get necessary info
	 if(count($messages) < 1){
		 //display no messages
			exit();
	 }
	 
	 for($i = 0; $i < count($messages); $i++){
		 //from what i noticed, you could get empty results, i don't know why he won't solve that :(
		 if(!empty(trim($messages[$i]))){
			 $details = explode($delimiter,$messages[$i]);
	    $sender_id = trim($details[2]);
		$message = $details[3];
		$date = $details[4];
		
		$message_pos = '';//message position 
		
			if($sender_id == $user){
				$message_pos = 'right';
				
			}
			else{
				$message_pos = 'left';
			}
			?>
			<div class="message-itself inside">
				<div class = "head"><p class = "write">	
				<img style="width:10%;border-radius:100%;" src="<?php echo load_image("sample"); ?>" alt="">
								 Tradesman</p></div>
					
					<section class="message <?php echo $message_pos; ?> clearfix">

						<div class="inner">
						<p><?php echo $message; ?></p>
						<section class="time">
							<i class="icon fa-clock-o"></i> <?php echo $date; ?>
						</section>
						</div>
					</section>
				</div><?php // messages 
			
				?>
		<?php
		 }
	 }
	 ?>
	 
				<div class="new-message">
					<form>
						<textarea name="new_message" class="form-control" placeholder="Send a new message to name"></textarea>
						<button type="button" class="btn-feel btn form-control"><i class="colour-blue icon fa-send"></i></button>
					</form>
				</div>
				<?php
				//send to the server that the message has been read, like pelumi suggested.
				$curl->get_auth($site_url."mobile_app/clear_user_notification.php?user_id=".$user."&vendor_id=".$vendor_id);
				//it's either it goes or not mehn, can't do nothing about it.
 }
?>