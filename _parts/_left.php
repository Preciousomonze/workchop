<?php //left part ?> 
			<div class="col-md-3 profile-sidebar">
			<?php 
			//get the user url picture
			$pic_url = $site_url."mobile_app/user_pictures/".$user.".jpg";
		?>
		
			<a class="profile-link" href = "profile.php">
				<img class="profile-picture" src="<?php echo load_image($pic_url); ?>" alt="<?php echo $firstname ." ".$surname; ?>">
			<p class="their-names"><?php echo $firstname ." ".$surname; ?></p>
			</a>
			</div> 
			
			<?php //messaging popup ?>
			<div class="messaging-pop">
				<div class="col-sm-offset-4 col-sm-5">
					<div class="inside">
						<div class="head"></div>
						<div class="pop-body">
							<?php echo loader(); ?>
						</div>
					</div>
				</div>
			</div>
			
				