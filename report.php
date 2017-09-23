<?php session_start();

 require_once "_vars.php";
require "_parts/_functions.php";

require "vendor/autoload.php";
$curl = new Curl();

 $session = new Session();
 if($session->check_session_basically($user) == false){
	 header("location:login.php");
	 exit();
 }
 
 $success_txt = array();
 if(isset($_POST["submit"])){
	 $mode = "1";
	  //oya oh, make sure some things aren't empty first
	 $subject = wc_prepare_text(trim($_POST["subject"]),"server");
	 $message = wc_prepare_text(trim($_POST["message"]),"server");
	 
	 //store error things
	 $messages = array();
	 if(empty($subject)){
		 $success_txt[] = 0;
		 $messages[] = "Please enter a subject";
	 }
	 
	 if(empty($message)){
		 $success_txt[] = 0;
		 $messages[] = "Please type a message";
	 }
	 
	 else if( !( empty($subject) || empty($message) )){
		 $y = date("Y");
 $m = date("m");
 $d = date("d");
 $h = date("H");
 $i = date("i");
 $s = date("s");
				//call the curl request
				$url = $site_url."mobile_app/send_issue.php?id=".$user."&subject=".$subject."&message=".$message."&date_year=".$y."&date_month=".$m."&date_day=".$d."&date_hour=".$h."&date_minute=".$i."&date_second=".$s."&mode=".$mode;
			$compare = $subject.$message.$i;
			//var_dump($url);
			if(wc_prevent_duplicate($compare) == true){//duplicate, prevent.
			$result = $curl->get_auth($test_url);
			}
			else{
			$result = $curl->get_auth($url);
			}
			//var_dump($result);
			if($curl->get_error()){//if it returns true
			$success_txt[] = 0;
				$messages[] = "Sorry, could not connect to the server, try again later";
			}
			else{//successful
			/*load the user stuff*/
$u_curl = new Curl();
$u_result = $u_curl->get_auth($site_url."mobile_app/get_user_details.php?user_id=".$user);
 
$firstname = '';
$surname = '';

if(!$u_curl->get_error()){
$u_details = explode($delimiter,$u_result);
$firstname = $u_details[1];
$surname = $u_details[0];
}
				$success_txt[] = 1;
				$messages[] = "Thank you for reporting an issue ".$firstname.", your message has been received, we will get in touch with you as soon as we can.";
				$_POST["subject"] = ""; $_POST["message"] = "";
			}	
	 }
 }
 ?>
<!DOCTYPE html>
	<html>
		<head>
   <?php //call header
   require PARTS."_header.php";
   ?>
   
	<title>Workchop - Report an issue</title>
	
	</head>
		<body>
		<div class="container whole-body">
		
		<?php require base_path("_parts/_menu.php"); ?>
			
		 <div class="row">	
			<div class="body_container">
				
			<?php //left part 
				require base_path(PARTS."_left.php"); 
			?>
				<div id="#issue-submit"></div>
			<div class="col-md-6 center-body">
				<div class="activity-stream inside">
					<div class="head">
					    <p class="write"><i class="icon fa-bullhorn"></i> Report an issue</p>
						</div>
					
					<div class="body">
						<form class="normal-form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
						<div class="adjust-alert-msg">
						
						 <?php if(isset($messages)){
							 for($i = 0; $i < count($messages); $i++){
								 if($success_txt[$i] == 0){
							 echo "<div class=\"alert alert-danger\" role=\"alert\">";
								
						 }
						 else{
							 	 echo "<div class=\"alert alert-success\" role=\"alert\">";
								
						 }
						 	  echo $messages[$i]."</div>";
						
								 }
								 } else {} ?>
					</div>
				  	<label>Subject <span class="required">*</span></label>
						<input type="text" name="subject" title="subject" placeholder="Subject" value="<?php echo (isset($_POST["subject"]) ? $_POST["subject"] : ""); ?>" class="form-control" required>
						<label>Message <span class="required">*</span></label>
						<textarea name="message" title="type a message" placeholder="Type your message..." required class="form-control autofill"><?php echo (isset($_POST["message"]) ? $_POST["message"] : ""); ?></textarea>
						<div class="clearfix">
						<button type="reset" class="btn btn-feel pull-left"><i class="icon fa-refresh colour-blue"></i> Reset</button>
						<button type="submit" name="submit" class="btn btn-feel pull-right"><i class="icon fa-send-o colour-blue"></i> Send</button>
						</div>
						</form>
					</div>
					<div class="footer">
						
					</div>
				</div>
			</div>
            
			<?php //right side
				require PARTS."_right.php";
			?>
				
			</div><?php ////body_container ?>
			
		  </div><?php ////row ?>
			</div>

<script type="text/javascript">
    $("#report-page").addClass("active");

</script>
        <?php //footer
        require base_path("_parts/_footer.php");
        ?>
