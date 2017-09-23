<?php session_start();
/**
This is the message page
DON'T EDIT THIS CODE IF YOU DON'T KNOW WHAT YOU ARE DOING.
 * if you know what you're doing, add your name to the contributors list
 * 
 * @author Precious Omonzejele
 * @contributors ...
 * I have to acknowledge myself oh, so that one day, my code will hit the right set of people
 */
require_once "_vars.php";
require "_parts/_functions.php";
require "vendor/autoload.php";
$session = new Session();
 if($session->check_session_basically($user) == false){
header("location:login.php");
	 exit();
 }
 
 ?>
<!DOCTYPE html>
	<html>
		<head>
   <?php //call header
   require PARTS."_header.php";
   ?>
   
	<title>Messages - Workchop</title>


            <script type="text/javascript">
                <?php ////LET'S DO THE JS STUFF HERE ?>
       $(document).ready(function(){
		   	  <?php
		   $toast_note_js = toast_note_js(".toast-note");
		   echo ajax_load("#message-list-place","'".AJAX_PART."_message_list.php'",null,$toast_note_js);
			?>
    	  });
			function showMessageList(){
				<?php /*
               request = new XMLHttpRequest();
               request.open('GET', "<?php echo AJAX_PART;?>_message_list.php", true);
               request.onreadystatechange = changed;
               request.send(null);
			   */
		   $ajax_end = "";//"$('#message-space > .blanket').remove();";
		   ?>
		
		   $('#message-space').html('<div class="messages inside"><div class = "head"><p class = "write"><i class="icon fa-comments-o"></i> Messages</p></div><div class="initial center"><div id="message-list-place"><?php echo loader(); ?></div></div></div>');
		
		<?php
		   //$start_ajax = "$('#message-space').append('".loader()."');";
			$start_ajax = "";
		   echo ajax_load("#message-list-place","'".AJAX_PART."_message_list.php'",null,$ajax_end);
			?>
     
           }
    
    function showMessage(id){ 
             id = id.toString();   
  <?php
        $toast_note_js = toast_note_js(".toast-note");
		$s_m_end = $toast_note_js."$('div').remove('.blanket');
		$('.message-body').scrollTop($('.message-body')[0].scrollHeight - $('.message-body')[0].clientHeight);";
		//$('.message-body').animate({scrollTop: $('.message-body')[0].scrollHeight - $('.message-body')[0].clientHeight}, 1000);
		echo "$('#message-list-place').append('".loader()."');";
		   echo ajax_load("#message-space","'".AJAX_PART."_messages.php?tradesman='+id",null,$s_m_end);
			 ?>
    }
	  </script>
		</head>
		<body>
		<div class="container whole-body">
		
		<?php require base_path("_parts/_menu.php"); ?>
			
		 <div class="row">	
			<div class="body_container">
				
			<?php //left part 
				require base_path(PARTS."_left.php"); 
			?>
				
				
				
			<div id="message-space" class="col-md-6 center-body">
				<?php
				/** This is where the center comes in for the message. **/
				?>
			<?php // messages 
				?>
		<div class="messages inside"> 
        <div class = "head"> 
          <p class = "write">   
            <i class="icon fa-comments-o"></i>  
            Messages 
            </p> 
                 </div> 
                 <div class="initial center" style="min-height:220px;position:relative;"> 
                  
                 <div id="message-list-place"> 
                  <?php echo loader(); ?> 
                  </div> 
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
	$(document).on("ready",function(){
    $("#message-page").addClass("active");
	});
</script>
        <?php //footer
        require base_path("_parts/_footer.php");
        ?>
 