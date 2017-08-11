<?php //left part ?>
			<div class="col-md-3 profile-sidebar">
			<?php 
			//get the user url picture
			$pic_url = $site_url."mobile_app/user_pictures/".$user.".jpg";
			$user_pic = $curl->get_auth($pic_url);
			//echo $pic_url;
			if($curl->get_error()){
				$pic_url = USER_AREA."default.jpg";
			}
			else{
				//echo "yh";
			}
			?>
				<img class="profile-picture" src="<?php echo $pic_url; ?>" alt="<?php echo $firstname ." ".$surname; ?>">
			<p class="their-names"><?php echo $firstname ." ".$surname; ?></p>
			</div>
				