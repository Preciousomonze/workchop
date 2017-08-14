<?php session_start();

/**Finally, i get the chance to comment first :)

This is the profile page that shows imbe customers
DON'T EDIT THIS CODE IF YOU DON'T KNOW WHAT YOU ARE DOING.
 * if you know what you're doing, add your name to the contributors list
 * 
 * @author Haastrup Adejoke
 * @contributors ....add your name should be seperated with a comma
 * I have to acknowledge myself oh, so that one day, my code will hit the right set of people
 */

require "_parts/_functions.php";

require "vendor/autoload.php";
$curl = new Curl();

 $session = new Session();
 if($session->check_session_basically($user) == false){
	 header("location:login.php");
	 exit();
 }
 $result = $curl->get_auth($site_url."mobile_app/get_user_details.php?user_id=".$user);
 
$firstname = '';
$surname = '';
$phone = '';
$email = '';
$location_index = '';
if(!$curl->get_error()){

$user_details = explode($delimiter,$result);
$firstname = $user_details[1];
$surname = $user_details[0];
$phone = $user_details[2];
$email = $user_details[3];
$location_index = $user_details[4];
}
else{
	//header("location:".$_SERVER["REQUEST_URI"]);
//exit; 

}
 ?>
 
 


<!DOCTYPE html>
	<html>
		<head>
   <?php //call header
   require PARTS."_header.php";
   ?>
   
	<title>Workchop - Home</title>


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
					<div class = "head"><p class = "write">Profile</p></div>
					<div class = "body-part"> 
						
						<form> 
						
						<?php //Putting this blah in a boostrap so they can split?>
						<div class = "row" >
						<div class = "col-sm-6">
						First Name: <br/> 
						<input type = "text" name = "firstname" value = "<?php //echo $firstname; ?>"><br/> 
					</div>
					
					<div class = "col-sm-6">
						Last Name: <br/>
						<input type = "text" name = "lastname" value = "<?php //echo $lastname; ?>" ><br/>  
						</div>
						
						
					<div class = "col-sm-6">
						Email: <br/>
						<input type = "email" name = "email"  value = "<?php //echo $email; ?>"><br/>  
						</div>
						
					<div class = "col-sm-6">
						Phone: <br/>
						<input type = "tel" name = "phone" value = "<?php //echo $phone; ?>"><br/>  
						</div>
						
					<div class = "col-sm-6">
						Location: <br/>
						<input type = "text" name = "location" value = "<?php //echo $location; ?>"><br/>  
						</div>
						
						
						</div>
						
						
						
						</form>



					</div> 
					<?php // END OF PROFILE TAG!?> 
					
			
					
				</div> 
				
				
				<?php //START OF TRADESMAN TAG!?>  
					<div class = "tradesman-body inside"> 
					<div class = "head"><p class = "write">Tradesman</p></div>
					<div class = "body-part"> 
				
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
 