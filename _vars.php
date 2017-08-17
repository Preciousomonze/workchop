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
 * @contributors ......Haastrup Adejoke
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
	
	/*create a file outside this folder called w_vars.php
	 * add this code to it $commiter = "yourname";
	 * as you can see the switch case, you can add your own case to it, and define your base url
	 * don't be disturbing me, ah :-|
	 */
  require "../w_var.php";
define('BASE_PATH',__DIR__ );
//the extra part for development purposes
switch($commiter){
	case "precious":
		define('BASE_URL','http://localhost/workchop');
		break;
	case "joke":
		define('BASE_URL','http://localhost/workchop/workchop');
		break;
	default:
		define('BASE_URL','http://localhost/workchop/');
	
}
###################
define('USER_AREA','users_lounge/');
define('PARTS','_parts/');
define('AJAX_PART','_&ajax_something/');

 $site_url = "http://workchopapp.com/";
 $delimiter = "--";
 $tradesman_details_split = "----";
 $tradesman_split = "==========";
 $user = (isset($_SESSION["user"]) ? $_SESSION["user"] : "" );
 //for some js stuff
 
$tradesman_args = array(
'Master Gas Supplier' => 1,
'Master Hair Stylist' => 2,
'Master Make-up Artist' => 3,
'Master Mechanic' => 4,
'Master Tailor' => 5
);
$l_sep = "|";
$location_args = array(
'Ojuelegba '.$l_sep.' surulere'.$l_sep.' Iponri'.$l_sep.' Festac'.$l_sep.'Aguda'.$l_sep.'Bode Thomas'.$l_sep.'Apapa'.$l_sep.'Mile 2'.$l_sep.'Badagry' => 1,
'Ikeja'.$l_sep.'Ogba'.$l_sep.'Opebi'.$l_sep.'Oregun'.$l_sep.'Alausa'.$l_sep.'Berger' => 2,
'Shomolu'.$l_sep.'Bariga'.$l_sep.'Anthony'.$l_sep.'Maryland'.$l_sep.'Onipanu'.$l_sep.'Ilupeju' => 3,
'Ebute Meta'.$l_sep.'Yaba'.$l_sep.'Akoka'.$l_sep.'Lagos Island'.$l_sep.'Oke Arin'.$l_sep.'Sure'.$l_sep.'Obalende' => 4,
'Ikorodu'.$l_sep.'Ojota'.$l_sep.'Mile 12'.$l_sep.'Ketu' => 5,
'Ajah'.$l_sep.'Lekki'.$l_sep.'Victorua Island'.$l_sep.'Ikoyi'.$l_sep.'Epe' => 6,
'Oshodi'.$l_sep.'Alimosho'.$l_sep.'Abule Egba'.$l_sep.'Ikotun'.$l_sep.'Egbeda' => 7
);