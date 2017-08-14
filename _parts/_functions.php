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
  require "_vars.php";
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
?>
