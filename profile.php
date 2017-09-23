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
require "_vars.php"; 
require "_parts/_functions.php";

require "vendor/autoload.php";
//$curl = new Curl();

 $session = new Session();
 if($session->check_session_basically($user) == false){
	 header("location:login.php");
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
 $(document).ready(function(){
		   	  <?php
		   echo ajax_load("#tradesman-stuff ul","'".AJAX_PART."_tradesman_type.php'",null,null);
			?>
    	  });
			function showTradesmanType(event){
				event.preventDefault();
			$(document).off('ajaxStart.general');
		  $(document).off('ajaxStart.sendmsg');
		  $(document).off('ajaxComplete.sendmsg');
			<?php
			$p_start = "$('#trade-loader').addClass('make-relative').append('".loader("","loading...","circle-o-notch")."');";//"$('#message-space > .blanket').remove();";
		   $ajax_end = "$('div').remove('.blanket');";//"$('#message-space > .blanket').remove();";
		   ?>
		   $('.tradesman-body').html('<div id="trade-loader"><div class = "head"><p class = "write"><i class = "icon fa-group"></i> Tradesmen</p></div><div class = "body-part"><div id="tradesman-stuff" class = "trade-inside"><ul class="trades-details wow fadeInUp animated"></ul></div></div></div>');
		<?php
		   echo ajax_load("#tradesman-stuff ul","'".AJAX_PART."_tradesman_type.php'",$p_start,$ajax_end,"profiletradesmen");
			?>
        }
		function showTradesmen(id){
			id = id.toString();	
			$(document).off('ajaxComplete.general');
		  $(document).off('ajaxStart.sendmsg');
		  $(document).off('ajaxComplete.sendmsg');
			<?php
			$ajax_start = "$('#trade-loader').addClass('make-relative').append('".loader("","loading...","circle-o-notch")."');";//"$('#message-space > .blanket').remove();";
		   echo ajax_load("#trade-loader","'".AJAX_PART."_tradesman_list.php?tradesman_type='+id",$ajax_start,$ajax_end,"profiletradesmen");
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
						
						<form class="dont-edit"> 
						
						<?php //Putting this blah in a boostrap so they can split?>
						<div class = "row" >
						<div class = "col-sm-6 wow fadeInUp">
						<label>First Name </label> 
						<input type = "text" name = "firstname" class="form-control" value = "<?php echo $firstname; ?>" readonly><br/> 
					</div>
					
					<div class = "col-sm-6 wow fadeInUp">
						<label>Last Name</label>
						<input type = "text" name = "lastname" class="form-control" value = "<?php echo $surname; ?>" readonly><br/>  
						</div>
						
						
					<div class = "col-sm-6 wow fadeInUp">
						<label>Email</label>
						<input type = "email" name = "email" class="form-control" value = "<?php echo $email; ?>" readonly><br/>  
						</div>
						
					<div class = "col-sm-6 wow fadeInUp">
						<label>Phone</label>
						<input type = "tel" name = "phone" class="form-control"  value = "<?php echo $phone; ?>" readonly><br/>  
						</div>
						
					<div class = "col-sm-offset-3 col-sm-6 wow fadeInUp">
						<label>Location</label>
						<input type = "text" class="form-control" name = "location" value = "<?php echo $location; ?>" readonly>
						</div>
						</div>
						</form>

					</div> 
					<?php // END OF PROFILE TAG!?> 
				</div> 
				
				<?php //START OF TRADESMAN TAG!?>  
				<div id="trades"></div>
					<div class = "tradesman-body inside">
						<div id="trade-loader">
					<div class = "head"><p class = "write"><i class = "icon fa-group"></i> Tradesmen</p></div>
					<div class = "body-part"> 
				
					<div id="tradesman-stuff" class = "trade-inside">
					<ul class="trades-details wow fadeInDown">
					<?php echo loader("","working...","gear"); ?>
					</ul>
					
					</div> 
					<?php //END OF THAT BISH INSIDE TRADESMAN ! we are moving on to greater things?> 
					
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