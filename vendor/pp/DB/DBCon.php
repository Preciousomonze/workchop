<?php
/*
 *
*/
	namespace pp\DB;
	/*
	 * DATABASE CONNECTION, 
	 * I DON'T KNOW WHY IT'S NOT GETTING THE $_con VARIABLE, SO I'M DOING THIS CLASS TO SOLVE THAT ISSUE
	 *
	*/
	class DBCon{
		private $_con;// mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
		protected $server,$username,$passowrd,$db;
		protected $sql;
		
		function __construct(){
			 
		}
		/*
		 * CREATING A CONNECTION TO THE DATABASE
		 * if no argument is passed, it means the programmer isn't a thomas, he doesn't like arguing :)
		 * so the default connection is used.
		*/
		function connect($server = DB_SERVER,$username = DB_USERNAME,$password = DB_PASSWORD,$db = DB_DATABASE){
			$this->server = $server;
			$this->username = $username;
			$this->password = $password;
			$this->db = $db;
				$this->sql = new mysqli($this->server,$this->username,$this->password,$this->db);
		
			 return $this->sql;
		}
	}
	