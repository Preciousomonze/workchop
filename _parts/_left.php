<?php //left part ?> 
			<a href = "profile.php">
			<div class="col-md-3 profile-sidebar">
			<?php 
			//get the user url picture
			$pic_url = $site_url."mobile_app/user_pictures/".$user.".jpg";
				$pic_url = load_image($pic_url);
		?>
				<img class="profile-picture" src="<?php echo $pic_url; ?>" alt="<?php echo $firstname ." ".$surname; ?>">
			<p class="their-names"><?php echo $firstname ." ".$surname; ?></p>
			</div> 
			</a>
				