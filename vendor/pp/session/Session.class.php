 <?php
	//namespace pp\mail;
/*
* Session stuffETC
* 
*/
 class Session{
	 
	 /**
     * determines if smpt is to be used or not.
     * @var bool
	 * @default true;
     */
	 
	 private $use_smtp = true;
	 
	 
	 /**
     * body of the message, usually allows html tags and design
     * @var string
     */
	 
	 private $body = '';
	 
	 /**
     * alt body of the message, plain text
     * @var string
     */
	 
	 private $alt_body = '';
	 
	 private $to ='';
	
	 /**
     * For storing multiple users
     * @var PHPMailer
     */
	 
	 public $subject = '';
	 
	 /**
     * For storing multiple users
     * @var PHPMailer
     */
	 
	 private $recipients = array();
    /**
     * Importing the php mailer.
     * @var PHPMailer
     */
	 private $mail = '';
	 
    /**
     * The HOST FOR SMTP PURPOSES.
     * @var string
     */
	 public $host = '';
	 
    /**
     * SMTP username.
     * @var string
     */
    public $username = '';

    /**
     * SMTP password.
     * @var string
     */
    public $password = '';

    /**
     * The From email address for the message.
     * @var string
     */
	 public $from = '';
	 
    /**
     * The From name for the message.
     * @var string
     */
	 public $from_name = '';
	 
	 
    /**
     * Initialise the mailing stuff
     * @param $use_smtp = 'true' (optional)
     */
	 
	 public function __construct(){
		 
		 
	 }
	 
	 /*
	  * Checks session basically
	  * @param string, the session to check for
	  *
	  * @return boolean, returns true if the session is valid, false otherwise.
	  */
    public function check_session_basically($session_id){
		if(isset($session_id) && !empty($session_id)){
			return true;
		}
		else{
			return false;
		}
    }
    
	 }
 