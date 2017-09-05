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
 
 ?>
<!DOCTYPE html>
	<html>
		<head>
   <?php //call header
   require PARTS."_header.php";
   ?>
   
	<title>Workchop - Feedback</title>
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
				<div class="activity-stream inside">
					<div class="head">
					    <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="post"> 
         
						
						<div class="row">
						<div class="col-xs-9">
						<div class="col-sm-6">
						<select class="form-control" name="tradesman_type">
						<option value="">Select a tradesman type</option>
							<?php 
							foreach($tradesman_args as $name => $id){
								?>
								<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
								<?php
							}
							?>
						</select>
						</div><?php //column
						?>
						  <div class="col-sm-6">
							<select class="form-control" name="location">
						<option value="">Select a location</option>
							<?php 
							foreach($location_args as $name => $id){
								?>
								<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
								<?php
							}
							?>
						</select>
						</div><?php //column
						?>
						<input type="text">
						</div> <?php //column
						?>
						<div class="col-xs-3">
						<button type="submit" id="search-btn" class="btn btn-feel" name="search"><i class="icon fa-search"></i></button>
						</div><?php //column
						?>
						</div> <?php //row 
						?>
						
						</form>
					</div>
					
					<div id="search-result" class="body">
						<div class="big-search">
							<i class="icon fa-search"></i>
							<p class="inscribed">Search for a trandesman</p>
						</div>
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
    $("#home-page").addClass("active");

</script>
        <?php //footer
        require base_path("_parts/_footer.php");
        ?>
