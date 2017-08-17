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
                function showBasic(){
                    $(".advanced-show").hide('slow');
                    $(".basic-show").show('slow');

                    $("a[href='#advanced']").removeClass("active");
                    $("a[href='#basic']").addClass("active");

                }

                function showAdvanced(){
                    $(".basic-show").hide('slow');
                    $(".advanced-show").show('slow');

                    $("a[href='#basic']").removeClass("active");
                    $("a[href='#advanced']").addClass("active");

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
				
				
				
			<div class="col-md-6 center-body">
				<?php
				/** This is where the center comes in for the message. **/
				?>
				<div class="messages inside">
					<div class="message-box">
						<section class="message-body">
							<div class="row">
								<div class="col-xs-2 center">
									<img src="<?php echo load_image("sample"); ?>" alt="">
								</div><?php //col
								?>
								<div class="col-xs-10">
								<span class="wc-badge pull-right">3</span>
									<p class="person-name">
									 Sample me
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
					<div class="message-box">
						<section class="message-body">
							<div class="row">
								<div class="col-xs-3">
									<img src="<?php echo load_image("sample"); ?>" alt="">
								</div><?php //col
								?>
								<div class="col-xs-9">
								<span class="wc-badge pull-right">3</span>
									<p class="person-name">
									 Sample me
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
				</div><?php // messages 
				?>
				
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
 