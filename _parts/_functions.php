<?php
/*
 * Functions
 * where all the functions are built.
 * ONLY PROGRAMMERS WITH PHP SERVER SCRIPTING KNOWLEDGE SHOULD EDIT THIS
 * OTHERWISE, CONTACT THE WRITER
 * OMONZEJELE PRECIOUS
 * @author Jempton
 * @contributors Haastrup Adejoke
 * COPYRIGHT
  */
 // require "_vars.php";
	/*
	 * base url
	 * 
	 * for getting the base url of the whole site
	 * it is useful when going through directories
	 * 
	 * @var string path 
	 * @returns string
	 * @author precious omonze
	 * @contributors Haastrup Adejoke
	*/
  
	function base_url($url_path = "")
	{
		//display the base url here
		
		$url = BASE_URL."/".$url_path;
		echo $url;
	}
	/*
	 * base path
	 * 
	 * for getting the base path of the site, so that we can use the require well.
	 * it is useful when going through directories
	 * 
	 * @var string path 
	 * @returns string
	 * @author precious omonze
	 * @contributors Haastrup Adejoke
	*/
  
	function base_path($url_path = "")
	{
		//display the base url here
		
		$url = BASE_PATH."/".$url_path;
		return $url;
	}
	
	
	/*
	 * load_image()
	 * 
	 * for loading the image stuff, if no image was found, it loads the default image
	 * it is useful when going through directories
	 * 
	 * @var string path, the path of the image  
	 * @returns string
	 * @author precious omonze
	 * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :(
	*/
  
	function load_image($url_path)
	{
		//initialise curl here
		$img_curl = new Curl();
		$pic_url = $url_path;
			$user_pic = $img_curl->get_auth($pic_url);
			//echo $pic_url;
			if($img_curl->get_error()){
				$pic_url = USER_AREA."default.jpg";
			}
			
			return $pic_url;
	}
	
	
	
	
	/*
	 * base path
	 * 
	 * for loading the image stuff, if no image was found, it loads the default image
	 * it is useful when going through directories
	 * 
	 * @var int location_index, the location index of the location  
	 * @var array location_args, the array of the locations
	 * @returns string
	 * @author precious omonze
	 * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :(
	*/
  
	function get_location($location_index,$location_args)
	{
		$location_index = trim($location_index);
		//loop through the location args
		//that's why it's important to import the _vars.php, before this, cause all these stuff won't work, some variables,oh i've alreaded imported it starting of this file
		//my bad.
		//but just incase things happen shaa, it should be imported before this file :)
		$location = '';
		foreach($location_args as $name => $id){
			if($id == $location_index){
				//baam, gotten the value, store then break, if it was in java, it would be, copy and then paste, joke will understande :)
				$location = $name;
				break;
			}
		}
			return $location;
	}
	
	
	
	
?>
