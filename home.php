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
   
	<title>Workchop - Home</title>


            <script type="text/javascript">
                <?php ////LET'S DO THE JS STUFF HERE ?>
          $(document).on("submit","#search-vendor",function(event){ 
            event.preventDefault();
			searchVendor();
          }); 
           function searchVendor(){ 
          <?php
		   $toast_note_js = toast_note_js(".toast-note");
		   $starting_ajax = "
			$('.activity-stream').append('".loader()."');";
			$end_ajax = "$('.activity-stream div').remove('.blanket');";
			
		   $success = "$('#search-result').html(response);";
		 // $load_inside = ajax_load("#search-result","response",$start_ajax,$toast_note_js);
		  $the_data = "location:$(\"#location\").val(),tradesman_type:$(\"#tradesman_type\").val()";
                   echo ajax_send("#search-result","'".AJAX_PART."_search_result.php'","post",$the_data,$success,"html",$starting_ajax,$end_ajax);
		?>
       }
	   	$(document).on("click","#select-location",function(){
			$("form .location-pack").fadeToggle("slow");
		});
		function putLocation(id,name){
			$("form #location").val(id);
				$("form .location-pack").fadeOut("slow");
				$("form #select-location").removeClass("left-out");
			$("#select-location").empty().html("<p>"+name+" <i class=\"icon fa-caret-down\"></i></p>");
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
				<div class="activity-stream inside">
					<div class="head">
					    <form id="search-vendor" method="post"> 
         
						
						<div class="row">
						<div class="col-xs-12">
						<div class="col-sm-6">
						<div class="inner">
						<div class="form-top">
						  <span class="icon-on-input"><i class="icon fa-users"></i></span>
						  <span class="label">Type</span>
						  </div>
						<select class="form-control" id="tradesman_type" name="tradesman_type">
						<option value="">Select a tradesman type</option>
							<?php 
							foreach($tradesman_args as $name => $values){
								?>
								<option value="<?php echo $values[0]; ?>"><?php echo $name; ?></option>
								<?php
							}
							?>
						</select>
						</div>
						</div><?php //column
						?>
						  <div class="col-sm-6">
						  <div class="inner">
						  <div class="form-top">
						  <span class="icon-on-input"><i class="icon fa-map-marker"></i> </span>
						    <span class="label">Location</span>
						  </div>
							<div id="select-location" class="like-combo clickable">
								<p>Select a location <i class="icon fa-caret-down"></i></p>
							</div>
							<div class="location-pack">
							<div class="body">
							<?php //<div class="pack-head">Select a location</div>
								$counting = 0;
							foreach($location_args as $name => $values){
								if($values[0] != 0){//for the sake of the no location i added, so it doesn't show.
								$col_size = '';
								$colour = '';
								$div_row_start = '';
								$div_row_end = '';
								//using switch :(,i dont like it, maybe because because of nepa.
									switch($values[0]){
										case 1:
										$div_row_start = "<div class=\"row\">";
										$col_size = "col-xs-7";
										break;
										case 2:
										$div_row_end = "</div>";
										$col_size = "col-xs-5";
										$colour = "halt";
										break;
										case 3:
										$div_row_start = "<div class=\"row\">";
										$col_size = "col-xs-6";
										break;
										case 4:
										$div_row_end = "</div>";
										$col_size = "col-xs-6";
										$colour = "halt";
										break;
										case 5:
										$div_row_start = "<div class=\"row\">";
										$col_size = "col-xs-4";
										break;
										case 6:
										$col_size = "col-xs-4";
										$colour = "halt";
										break;
										case 7:
										$div_row_end = "</div>";
										$col_size = "col-xs-4";
										break;
										default:
										$div_row_end = "";
										$col_size = "";
										
									}
									echo $div_row_start;
								?>
								<div class="col <?php echo $col_size." ".$colour; ?> clickable" onclick="putLocation(<?php echo $values[0]; ?>,'<?php echo $values[1]; ?>')">
								
								<p><?php echo $name; ?></p>
								</div>
								<?php
								echo $div_row_end;
							}
							}
							?>
							</div>
							<div class="foot"><p><p class="center" style="font-weight:700;">Can't find your location?</p>
							Locations are divided into sectors. Select the one closest to you.</p></div>
							</div>
							<input type="hidden" value="0" class="form-control" id="location" name="location">
						</div>
						</div><?php //column
						?>
						</div> <?php //column
						?>
						<div class="col-xs-3 center">
						<button type="submit" id="search-btn" class="btn btn-feel" name="search"><i class="icon fa-search"></i> <span>Search</span></button>
						</div><?php //column
						?>
						</div> <?php //row 
						?>
						
						</form>
					</div>
					
					<div id="search-result" class="body">
						<div class="big-search">
							<i class="icon fa-search"></i>
							<p class="inscribed">Search for a tradesman</p>
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
