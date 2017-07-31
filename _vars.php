<?php
/*
 * All the global variables here
 * If you think you can add extra, feel free
 * The frequent variables used on all files are put here for easy changing
 *
 * ONLY PROGRAMMERS WITH PHP SERVER SCRIPTING KNOWLEDGE SHOULD EDIT THIS
 * OTHERWISE, CONTACT THE WRITER
 * OMONZEJELE PRECIOUS
 * @author Jempton
 * @contributors ...add your names here
 * COPYRIGHT
  */
  
	/*
	 * base url
	 * 
	 * for getting the base url of the whole site
	 * it is useful when going through directories
	 * 
	 * @var string path 
	 * @returns string
	 * @author precious omonze
	 * @contributors ...add your names here.
	*/
  
define('BASE_PATH',__DIR__ );
define('BASE_URL','http://localhost/workchop/workchop/');
define('USER_AREA','users_lounge/');
define('PARTS','_parts/');

 
 $site_url = "http://workchopapp.com/";
 $delimiter = "--";
 $user = (isset($_SESSION["user"]) ? $_SESSION["user"] : "" );