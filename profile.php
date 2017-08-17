<?php session_start();

/** j: Finally, i get the chance to comment first :)
* p: Yup imbes are always allowed to do some things first ;)
This is the profile page that shows imbe customers
DON'T EDIT THIS CODE IF YOU DON'T KNOW WHAT YOU ARE DOING.
 * if you know what you're doing, add your name to the contributors list
 * 
 * @author Haastrup Adejoke
 * @contributors Precious Omonzejele
 * I have to acknowledge myself oh, so that one day, my code will hit the right set of people
 */

require "_parts/_functions.php";

require "vendor/autoload.php";
//$curl = new Curl();

 $session = new Session();
 if($session->check_session_basically($user) == false){
	 //header("location:login.php");
	 //exit();
 }
 
 ?>
 
 


<!DOCTYPE html>
	<html>
		<head>
   <?php //call header
   require PARTS."_header.php";
   ?>
   
	<title>Profile - Workchop</title>


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
                 var profile_edit_status = 0;

                    $("#profile-edit").click(function(){

                        //if(profile_edit_status == 0){
                        $(".whole-body").hide();
                        //}

                        //else{
                        $("#profile input").removeAttr("readonly");
                        //}

                    });




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
				/**This is where the center comes in for the profile**/
				?>
				
				<?php
				//This inherits from home.php the class inside and class head 
				//And also the start of profile tag!
				?>
				<div class = "profile-body inside"> 
					<div class = "head"><p class = "write"><i class = "icon fa-user"></i> Profile</p></div>
					<div class = "body-part"> 
						
						<form> 
						
						<?php //Putting this blah in a boostrap so they can split?>
						<div class = "row" >
						<div class = "col-sm-6">
						First Name: <br/> 
						<input type = "text" name = "firstname" class="form-control" value = "<?php echo $firstname; ?>"><br/> 
					</div>
					
					<div class = "col-sm-6">
						Last Name: <br/>
						<input type = "text" name = "lastname" class="form-control" value = "<?php echo $surname; ?>" ><br/>  
						</div>
						
						
					<div class = "col-sm-6">
						Email: <br/>
						<input type = "email" name = "email" class="form-control" value = "<?php echo $email; ?>"><br/>  
						</div>
						
					<div class = "col-sm-6">
						Phone: <br/>
						<input type = "tel" name = "phone" class="form-control"  value = "<?php echo $phone; ?>"><br/>  
						</div>
						
					<div class = "col-sm-6">
						Location:<br/>
						<input type = "text" name = "location" value = "<?php //echo $location; ?>">
						</div>
						
						
						</div>
						
						
						
						</form>



					</div> 
					<?php // END OF PROFILE TAG!?> 
					
			
					
				</div> 
				
				
				<?php //START OF TRADESMAN TAG!?>  
					<div class = "tradesman-body inside"> 
					<div class = "head"><p class = "write"><i class = "icon fa-group"></i>Tradesman</p></div>
					<div class = "body-part"> 
				
					<?php //Oya oh lets kill this bish!?>
					
					<div class = "trade-inside">
					<ul>
					<li><a href = "#">
					
					<i class = "icon fa-arrow-right"></i>Master blah 
					<i class = " pull-right icon fa-angle-right"></i>
					<span class ="pull-right wc-badge">3</span>
					</a></li> 
					
					<li><a href = "#"><i class = "icon fa-arrow-right"></i>Master blah
					<i class = " pull-right icon fa-angle-right"></i> 
					<span class ="pull-right wc-badge">3</span>
					</a></li> 
					
					
					<li><a href = "#"><i class = "icon fa-arrow-right"></i>Master blah
					<i class = " pull-right icon fa-angle-right"></i>
					<span class ="pull-right wc-badge">3</span>
					</a></li>
					
					
					<li><a href = "#"><i class = "icon fa-arrow-right"></i>Master blah
					<i class = " pull-right icon fa-angle-right"></i>
					<span class ="pull-right wc-badge">3</span>
					</a></li> 
					
					
					<li><a href = "#"><i class = "icon fa-arrow-right"></i>Master blah
					<i class = " pull-right icon fa-angle-right"></i>
					<span class ="pull-right wc-badge">3</span>
					</a></li>
					
					</ul>
					
					
					</div>
					
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
    $("#profile-page").addClass("active");

</script>
        <?php //footer
        require base_path("_parts/_footer.php");
        ?>
 