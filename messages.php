<?php session_start();

/** j: Finally, i get the chance to comment first :)
* p: Yup imbes are always allowed to do some things first ;)
This is the profile page that shows imbe customers
DON'T EDIT THIS CODE IF YOU DON'T KNOW WHAT YOU ARE DOING.
 * if you know what you're doing, add your name to the contributors list
 * 
 * @author Precious Omonzejele
 * @contributors Precious Omonzejele
 * I have to acknowledge myself oh, so that one day, my code will hit the right set of people
 */

 require_once "_vars.php";
require "_parts/_functions.php";

require "vendor/autoload.php";
//$curl = new Curl();

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
                <?php /*
                var _basic_part= $(".basic-show");
                var _advanced_part= $(".advanced-show");
                var _basic_click = $("a[href='#basic']");
                var _advanced_click = $("a[href='#advanced']");
                    */?>
              $(document).ready(function(){
			try{
				<?php /*
               request = new XMLHttpRequest();
               request.open('GET', "<?php echo AJAX_PART;?>_message_list.php", true);
               request.onreadystatechange = changed;
               request.send(null);
			   */
			   
         //  $("#message-list-place").load('<?php echo AJAX_PART;? >_message_list.php');
		  
		   $toast_note_js = toast_note_js(".toast-note");
		   echo ajax_js("#message-list-place","'".AJAX_PART."_message_list.php'",null,$toast_note_js);
			?>
     
           }
           catch(exception){
               alert(exception);
           }  
		   
			  }
			  );
    <?php // echo toast_note_js(".toast-note"); ?>
	  
	  
	
    function showMessage(id){ 
               
           try{ 
		   alert("bla");
		   
    	//alert("bla");
		//$('#message-list-place').load(function(){
		//setTimeout(remove, 1000);
	//	remove();
			//alert("b");
		 $("#message-space").load('<?php echo AJAX_PART; ?>_messages.php?');
		
		//});
               <?php
        // $toast_note_js = toast_note_js(".toast-note");
		   //echo ajax_js("#message-space","'".AJAX_PART."_messages.php?tradesman='+id",null,"alert(\"fool\");");
			 ?>
			 
          } 
           catch(exception){ 
               alert(exception); 
           }   
    } 
                <?php

                        //profile edit part
                        //when the edit profile is clicked

                ?>
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
				
				
				
				<div class="message-itself inside">
				<div class = "head"><p class = "write">	
				<img style="width:10%;border-radius:100%;" src="<?php echo load_image("sample"); ?>" alt="">
								 Tradesman</p></div>
					
					  <div class="message-body"> 
          <section class="message left clearfix"> 
 
            <div class="inner"> 
            <p>bla bla bla</p> 
            <section class="time"> 
              <i class="icon fa-clock-o"></i> 2017/45/34 45:15 
            </section> 
            </div> 
          </section> 
           
           
          <section class="message right clearfix"> 
            <div class="inner"> 
            <p>bla bla bla</p> 
            <section class="time"> 
              <i class="icon fa-clock-o"></i> 2017/45/34 45:15 
            </section> 
            </div> 
          </section> 
           
           
          <section class="message right clearfix"> 
            <div class="inner"> 
            <p>bla bla bla</p> 
            <section class="time"> 
              <i class="icon fa-clock-o"></i> 2017/45/34 45:15 
            </section> 
            </div> 
          </section> 
					
					<section class="message left clearfix">

						<div class="inner">
						<p>bla bla bla</p>
						<section class="time">
							<i class="icon fa-clock-o"></i> 2017/45/34 45:15
						</section>
						</div>
					</section>
					<section class="message right clearfix">
						<div class="inner">
						<p>bla bla bla</p>
						<section class="time">
							<i class="icon fa-clock-o"></i> 2017/45/34 45:15
						</section>
						</div>
					</section>
				</div><?php // messages 
			
				?>
				<div class="new-message">
					<form>
						<textarea name="new_message" class="form-control" placeholder="Send a new message to name"></textarea>
						<button type="button" class="btn-feel btn form-control"><i class="colour-blue icon fa-send"></i></button>
					</form>
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
    $("#profile-page").addClass("active");

</script>
        <?php //footer
        require base_path("_parts/_footer.php");
        ?>
 