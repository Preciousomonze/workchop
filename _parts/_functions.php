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
	 * get_location
	 * 
	 * for getting the equivalent value of the location index
	 *
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
	
	
/* 
   * alert_note 
   *  
   * for displaying alert messages 
   * 
   *  
   * @var string msg, the message to display.   
   * @var int alert, the type of alert, 0 = info,1 = success, 2 = danger 
   * @returns string 
   * @author precious omonze 
   * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :( 
  */ 
   
  function alert_note($msg,$alert = 0,$reload = false) 
  { 
    $msg = trim($msg); 
    $alert = trim($alert); 
    $alert = (int)$alert; 
	
	
    $result = ''; 
    $alert_type = 'info'; 
    //check the type of alert 
    switch($alert){ 
        case 0 : 
        $alert_type = 'info'; 
        break; 
         
        case 1 : 
        $alert_type = 'success'; 
        break; 
         
        case 2 : 
        $alert_type = 'danger'; 
        break; 
         
        default : 
        $alert_type = 'info'; 
         
    } 
     $load_more = '';
	 if($reload == true){
		 $load_more = "<a href=\"".$_SERVER["REQUEST_URI"]."\"><i class=\"icon fa-reload\"></i><span class=\"\"></span></a>";
	 }
    if(!empty($msg)){ 
        $result = "<div class=\"alert info alert-".$alert_type."\" role=\"alert\">".$msg."
		".$load_more."
		</div>
		"; 
   
    } 
    return $result; 
  } 
   
   
  /* 
   * toast_note 
   *  
   * for displaying a note for a particular time, //and you can select the effect hiding you want, like fade out ,etc, all jquery types shaa 
   * 
   *  
   * @var string msg, the message to display.   
   * @var int alert, the type of alert, 0 = info,1 = success, 2 = danger 
   * @var bool jstag(optional), if it should be inside or not, default is true.   
   * @var bool show, if to echo it directly or return the result. 
   * @returns string or nothing, if show is set to true 
   * @author precious omonze 
   * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :( 
  */ 
   
  function toast_note($msg,$alert,$jstag = true,$show = false) 
  { 
    $msg = trim($msg); 
    $alert = trim($alert); 
    $alert = (int)$alert; 
     
    $result = ''; 
    $alert_type = 'info'; 
    //check the type of alert 
    switch($alert){ 
        case 0 : 
        $alert_type = 'info'; 
        break; 
         
        case 1 : 
        $alert_type = 'success'; 
        break; 
         
        case 2 : 
        $alert_type = 'danger'; 
        break; 
         
        default : 
        $alert_type = 'info'; 
         
    } 
    //script tags 
    $start_tag = ''; 
    $end_tag = ''; 
     
    if($jstag == true){ 
      $start_tag = "<script type=\"text/javascript\">"; 
      $end_tag = "</script>"; 
    } 
     
    if(!empty($msg)){ 
        $result = "<div class=\"alert alert-".$alert_type." toast-note \" role=\"alert\">".$msg."</div>"; 
		/*
        $result .= $start_tag."
		    $(document).on(\"ready\", function(event){ 
		$('.toast-note').show('slow').delay(5000).fadeOut('slow');
			});
		".$end_tag; 
    */
    } 
    if($show == false){ 
    return $result; 
    } 
    else{ 
      echo $result; 
    } 
  } 
   
   
  /* 
   * toast_note_js 
   *  
   * for displaying a note for a particular time inside the js, this function seems unecessary sef :( 
   * 
   *  
   * @var string element, the element to deal with, can be a class name,tag,id etc any valid one.   
   * @var string fade_out(optional), the timer for fading out, default is 3000.   
   * @var string set_timeout(optional), the time to delay before executing, default is 3000.   
   * @var string fade_in, the fade in effect, can be any valid jquery value, default is slow. 
   * @var bool jstag(optional), if it should be inside or not, default is false.   
   * @returns string 
   * @author precious omonze 
   * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :( 
  */ 
   
  function toast_note_js($element,$jstag = false,$set_timeout = 3000,$fade_out_timer = "3000",$fade_in = "slow") 
  { 
    $element = trim($element); 
    $fade_in = trim($fade_in); 
    $fade_out_timer = trim($fade_out_timer); 
     
    $result = ''; 
     
	 $start_tag = '';
	 $end_tag = '';
    if($jstag == true){ 
      $start_tag = "<script type=\"text/javascript\">"; 
      $end_tag = "</script>"; 
    } 
     
	 
    if(!empty($element)){ 
       
        $result .= $start_tag."";
    //$(document).on(\"ready\", function(event){
	$result .=	"	$('".$element."').fadeIn('".$fade_in."').delay(".$fade_out_timer.").fadeOut('slow');
	";
	//});
	
      $result .="".$end_tag."";
    } 
    return $result; 
   
  } 
   
 /* 
   * ajax_load 
   *  
   * for doing the ajax bla this function seems unecessary sef :( 
   * 
   *  
   * @var string element, the element to deal with, can be a class name,tag,id etc any valid one.   
   * @var string url, the timer for fading out, default is 3000.   
   * @var string do_ajax_start(optional), what to do when the ajax starts or is in process, default is "".   
   * @var string do_ajax_end(optional), what to do when the ajax finishes, default is "".
   * @var bool jstag(optional), if it should be inside or not, default is false.   
   * @returns string 
   * @author precious omonze 
   * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :( 
  */ 
   
  function ajax_load($element,$url,$do_ajax_start = '',$do_ajax_end = '',$jstag = false) 
  { 
    $element = trim($element); 
    $do_ajax_start = trim($do_ajax_start); 
    $do_ajax_end = trim($do_ajax_end); 
     $state = "ready";
		$result = ''; 
     
	 $start_tag = '';
	 $end_tag = '';
    if($jstag == true){ 
      $start_tag = "<script type=\"text/javascript\">"; 
      $end_tag = "</script>"; 
    } 
     
	 
    if(!empty($element)){ 
       
        $result .= $start_tag."";
		//$(document).on('".$state."',function(event){
		$result .="	$('".$element."').load(".$url.");";
		//});";
		if(!(empty($do_ajax_start) || $do_ajax_start == null)){
		$result .= ajax_load_start($do_ajax_start);
		}
		
		if(!(empty($do_ajax_end) || $do_ajax_end == null)){
		$result .= ajax_load_end($do_ajax_end);
		}
		$result .="
         ".$end_tag."";
    } 
    return $result; 
   
  } 


 
/* 
   * ajax_load_start 
   *  
   * for doing the ajax bla that triggers when an ajax load has started this function seems unecessary sef :( 
   * 
   *  
   * @var string do_ajax_start(optional), what to do when the ajax starts, default is "".
   * @returns string 
   * @author precious omonze 
   * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :( 
  */ 
   
  function ajax_load_start($do_ajax_start = '') 
  { 
    $do_ajax_start = trim($do_ajax_start); 
    	$result = ''; 
   
		if(!(empty($do_ajax_start) || $do_ajax_start == null)){
		$result .= "
		$(document).ajaxStart(function(){
			".$do_ajax_start."
		});";
		}
	 
    return $result; 
   
  } 
  

 
  
/* 
   * ajax_load_end 
   *  
   * for doing the ajax bla that triggers when an ajax load is complete this function seems unecessary sef :( 
   * 
   *  
   * @var string do_ajax_end(optional), what to do when the ajax finishes, default is "".
   * @returns string 
   * @author precious omonze 
   * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :( 
  */ 
   
  function ajax_load_end($do_ajax_end = '') 
  { 
    $do_ajax_end = trim($do_ajax_end); 
    	$result = ''; 
   
		if(!(empty($do_ajax_end) || $do_ajax_end == null)){
		$result .= "
		$(document).ajaxComplete(function(){
			".$do_ajax_end."
		});";
		}
	 
    return $result; 
   
  } 
  


  

 /* 
   * ajax_send
   *  
   * for sending a form using post or get with the ajax method
   * 
   *  
   * @var string element, the element to deal with, can be a class name,tag,id etc any valid one.   
   * @var string url, the url to be submitted to.   
   * @var string method, post or get method.   
   * @var string data_stuff, the data to send, the normal ajax data pattern. e.g{id1: $('#id1').val()}, only thing is you dont need to put the curly bracket.   
   * @var string do_success, what to execute on success, a normal jquery stuff should be put inside here.   
   * @var string data_type, what to return, JSON or normal html, default is "html".   
   * @var string do_ajax_start(optional), what to do when the ajax starts or is in process, default is "".   
   * @var string do_ajax_end(optional), what to do when the ajax finishes, default is "".
   * @var bool jstag(optional), if it should be inside or not, default is false.   
   * @returns string 
   * @author precious omonze 
   * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :( 
  */ 
   
  function ajax_send($element,$url,$method,$data_stuff,$do_success,$data_type = 'html',$do_ajax_start = '',$do_ajax_end = '',$jstag = false) 
  { 
    $element = trim($element); 
    $do_ajax_start = trim($do_ajax_start); 
    $do_ajax_end = trim($do_ajax_end); 
     $state = "ready";
	 $method = trim($method);
	 $do_success = trim($do_success);
	 $data_type = trim($data_type);
	 $data_stuff = trim($data_stuff);
	 
		$result = ''; 
     
	 $start_tag = '';
	 $end_tag = '';
    if($jstag == true){ 
      $start_tag = "<script type=\"text/javascript\">"; 
      $end_tag = "</script>"; 
    } 
     
	 
    if(!empty($element)){ 
       
        $result .= $start_tag."";
		
		$result .="	
		$.ajax({
			type: \"".$method."\", 
			data: {".$data_stuff."},//$(this).serialize(),
			dataType:\"".$data_type."\",
			url: ".$url.",
			success: function(response){
				alert(response);
			".$do_success."	
		}
		});
		";
		if(!(empty($do_ajax_start) || $do_ajax_start == null)){
		$result .= ajax_load_start($do_ajax_start);
		
		}
		if(!(empty($do_ajax_end) || $do_ajax_end == null)){
		$result .= ajax_load_end($do_ajax_end);
		}
		$result .="
         ".$end_tag."";
    } 
    return $result; 
   
  } 
  

 
   
  /* 
   * loader 
   *  
   * for displaying the loading bla, this function seems unecessary sef :( , but too tired to keep typing it everytime 8-) 
   * 
   *  
   * @var string text(optional), the text that displays with loader, default is nothing. 
   * @var string icon(optional), The icon to display when loading, default is spinner, note it uses the font-awesome icons without the fa- prefix.   
   * @var string rotate(optional),whether to enable the fa-spin or not, default is true. 
   * @returns void 
   * @author precious omonze 
   * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :( 
  */ 
   
  function loader($text = "",$icon = "spinner",$rotate = true) 
  { 
    $text = trim($text); 
    $icon = trim($icon); 
    $result = ''; 
      $spin = 'fa-spin'; 
      $writing = ''; 
      if($rotate == false){ 
        $spin = ''; 
      } 
      if(!empty($text)){ 
        $writing = '<span>'.$text.'</span>'; 
      } 
       
       
        $result = "<div class=\"blanket center\"> 
                    <i class=\"fa fa-".$icon." ".$spin." fa-2x\"></i> 
                    ".$writing." 
                  </div> 
                 "; 
       
         
     
    return $result; 
   
  } 
   
   
  /* 
   * tradesman_info 
   *  
   * for getting the tradesman_info 
   * 
   *  
   * @var int id, the tradesman_id 
   * @returns array , tradesman name--phone number--email--location index--type, otherwise, false otherwise 
   * @author precious omonze 
   * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :( 
  */ 
   
  function tradesman_info($id) 
  { 
  global $delimiter;
 global $site_url;
    $id = trim($id); 
    $curl = new Curl(); 
    $request = $curl->get_auth($site_url."mobile_app/get_vendor_info.php?vendor_id=".$id); 
     
    $result = false; 
    if(!$curl->get_error()){ 
      //start cracking up some things 
      $result = explode($delimiter,$request); 
    } 
    return $result; 
  } 
   
   
  /* 
   * tradesman_email 
   *  
   * for getting the tradesman email 
   * 
   *  
   * @var int id, the tradesman_id 
   * @returns string email, false otherwise 
   * @author precious omonze 
   * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :( 
  */ 
   
  function tradesman_email($id) 
  { 
    $id = trim($id); 
    //call the necessary functions 
     
    $result = tradesman_info($id); 
    if($result){ 
      $result = $result[2]; 
    } 
     
    else{ 
      $result = ''; 
    } 
    return $result; 
  } 
   
  /* 
   * tradesman_phone 
   *  
   * for getting the tradesman phone 
   * 
   *  
   * @var int id, the tradesman_id 
   * @returns string phone, false otherwise 
   * @author precious omonze 
   * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :( 
  */ 
   
  function tradesman_phone($id) 
  { 
    $id = trim($id); 
    //call the necessary functions 
     
    $result = tradesman_info($id); 
    if($result){ 
      $result = $result[1]; 
    } 
    else{ 
      $result = ''; 
    } 
    return $result; 
  } 
     
  /* 
   * tradesman_names 
   *  
   * for getting the tradesman names 
   * 
   *  
   * @var int id, the tradesman_id 
   * @returns string phone, false otherwise 
   * @author precious omonze 
   * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :( 
  */ 
   
  function tradesman_names($id) 
  { 
    $id = trim($id); 
    //call the necessary functions 
     
    $result = tradesman_info($id); 
    if($result){ 
      $result = $result[0]; 
    } 
    else{ 
      $result = ''; 
    } 
    return $result; 
  } 
   
  /* 
   * is_user_tradesman 
   *  
   * for knowing if it's the user's vendor or not 
   * 
   *  
   * @var int id, the tradesman_id 
   * @returns bool 
   * @author precious omonze 
   * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :( 
  */ 
   
  function is_user_tradesman($id) 
  { 
  global $user;
  global $site_url;
    $id = trim($id); 
    $result = false; 
    //curl 
    $curl = new Curl(); 
     
    $url = trim($curl->get_auth($site_url."mobile_app/is_my_vendor.php?vendor_id=".$id."&user_id=".$user)); 
    if(!$curl->get_error()){ 
        $result = $url; 
    } 
    return $result; 
  } 
   
   
  /* 
   * show_add_btn 
   *  
   * to determine if it's to show the add button or to show added. 
   * 
   *  
   * @var int id, the tradesman_id 
   * @returns string 
   * @author precious omonze 
   * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :( 
  */ 
   
  function show_add_btn($id) 
  { 
    $id = trim($id); 
    $result = ''; 
     
    if(is_user_tradesman($id) == "true"){ 
      //the user has already been added 
      $result = "<p class=\"added-btn-statement\" title=\"Already on your tradesman list.\"> 
      <i class=\"icon fa-check\"></i> Added 
     </p>"; 
      
    } 
    else{ 
      //$result = "<a href=\"#add\" onclick=\"add_to_tradesman(".$id.")\" class=\"btn btn-feel\"><i class=\"icon fa-plus\"></i>Add</a>"; 
	$result = "<a href=\"#add-tradesman\" class=\"btn sleek-btn\" onclick=\"addTradesman('".$id."')\"><i class=\"icon fa-plus\"></i>Add</a>";
	} 
     
    return $result; 
  } 
   
   
  /* 
   * show_chat_btn 
   *  
   * to determine if it's to show the chat button or to show added. 
   * 
   *  
   * @var int id, the tradesman_id 
   * @returns string 
   * @author precious omonze 
   * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :( 
  */ 
   
  function show_chat_btn($id) 
  { 
    $id = trim($id); 
    $result = ''; 
     
    //check if the tradesman has the app installed 
       
        $app_result = trim($curl->get_auth($site_url."mobile_app/check_smart_vendor.php?vendor_id=".$id."&user_id=".$user)); 
         
        if(!$curl->get_error()){ 
          if($app_result == "1"){ 
            //the tradesman has a happ. 
            $result = "<a href=\"#message-pop\" onclick=\"show_side_message(".$id.")\" title=\"Message ".$t_name."\"> 
            <i class=\"icon fa-comment\"></i></a>"; 
          } 
        } 
     
    return $result; 
  } 
   
   
   
   
  /* 
   * show_rating 
   *  
   * this converts the rating numbers to graphical stars and all. 
   * 
   *  
   * @var int number 
   * @returns bool 
   * @author precious omonze 
   * @contributors ...add your names here, seperate with commas, please oh, only add if you edit this code, some people are just putting names here, like they know what the function does :( 
  */ 
   
  function show_rating($number) 
  { 
    $number = trim($number); 
    $number = (double)$number; 
    $result = "<span title=\"".$number." out of 5\">"; 
     
    //maximum rating is 5,so show five, 
          //but now determine by showing the rating level, hmm,sounds complex. :( 
          for($r =0; $r < 5.0; $r++){ 
            //only colour if r is less than the rate 
            $rr = $r + 1; 
            if($rr <= $number){//paint the star 
              $result .= "<i class=\"icon fa-star\"></i> "; 
            } 
            else{//empty star 
             
              $result .= "<i class=\"icon fa-star-o\"></i>";  
             
            } 
          }
			$result .= "</span>";
           
    return $result; 
  } 
   
   	
	
?>
