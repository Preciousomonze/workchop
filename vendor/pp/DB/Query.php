<?php
/*
	* GET ANY QUERY DONE
	*/
	namespace pp\DB;
	
	
	class Query extends DBCon{
		protected $query = '';
		protected $con = '';
		protected $table = ''; 
		protected $tokens = '';
		
		protected $values,$condition,$content;
		
		function __construct(){
		//	Parent::connect();
		}
		
		/*
		 * GETTING THE NUMBER OF COLUMNS
		*/
		private function columns($values){
			$delimeter = ",";
			$_values = explode($delimeter,$values);
			$store = "";//WHAT WILL STORE THE VALUES
			for($i = 0; $i < count($_values); $i++){
				//STORE THE VALUES
				$counting = count($_values) - $i;//DO ARITHMETIC STUFF TO KNOW WHEN IT'S THE LAST VALUE, SO AS TO REMOVE THE PUTTING OF THE COMMA
				if($counting > 1){
				$store += $_values[$i].",";	
				}
				else if ($counting == 1){//IT'S THE LAST VALUE.
				$store += $_values[$i];
				}
			}
			return $store;
		}
		
		/*
		 * GENERATING DEFAULT ID'S
		 * most id's of tables have the table name mminus the s,so that's the logic
		*/
		private function gen_id($id){
			$delimeter = "";
			$val = explode($delimeter,$id);
			$store = "";
			//NOW GET TO THE LAST VALUE
			for($i = 0; $i < count($val); $i++){
				$counting = count($val) - $i;//DO ARITHMETIC STUFF TO KNOW WHEN IT'S THE LAST VALUE, SO AS TO REMOVE THE PUTTING OF THE COMMA
				if($counting > 1){
					$store += $val[$i];	
				}
				else if($counting == 1){//ITS THE LAST VALUE
					$store += "";
				}
				//WE'VE FILTERED THE LAST LETTER
				return $store;
				
			}
		}
		
		/*
		 * TO retrieve info from a table 
		 * @$condition: holds the conditions like using the where clause,it's optional
		*/
		
		public function get($table,$condition = ""){
			//$this->values = $values;
			$this->table = $table;
			$this->condition = $condition;
			$this->content = (Query::columns($this->values));
			$exec = $this->query(2);
			return $exec;
		}
		
		/*
		 * To update info in a table 
	     * @$condition: holds the conditions like using the where clause,it's optional
		 * This should have a default of "where user_id = "
		*/
		
		public function change($values,$table,$condition = ""){
			$this->values = $values;
			$this->table = $table;
			$this->condition = $condition;
			$this->content = (Query::columns($this->values));
			$exec = $this->query(3);
			return $exec;
		}
		
		/*
		 * To add info into a table 
		 * 
		*/
		
		public function add($table,){
			$this->values = $values;
			$this->table = $table;
			$this->content = (Query::columns($this->values));
			$exec = $this->query(1);
			return $exec;
		}
		
		/*
		 * TO delete info from a table 
		 * 
		*/
		
		public function remove($table,$condition = ""){
			$this->table = $table;
			$this->condition = $condition;
			$this->content = (Query::columns($this->values));
			$exec = $this->query(4);
			return $exec;
			//CALL THE DELETED CLASS
			//Deleted::delete($this->table,$this->token,$this->token_name);
		}
		
		/*
		 * THE QUERY THAT IS CALLED BY ALL THE FUNCTIONS
		 * @param int $token: to determine which to use
		*/
		protected function query($token){
			$this->token = $token;
			/*
			 * GET THE RESPECTIVE VALUES
			*/
			$insert = 1; //Insert request;
			$select = 2; //select request
			$update = 3;//update request;
			$delete = 4;//if it's a delete request;
			
		//	//KEEP ACCEPTING INPUT FROM THE VALUE, SINCE IT'S AN ARRAY, TO KNOW THE COLUMNS TO RECIEVE
		
		
			if($this->token == $insert){
				$q = "INSERT into ".$this->table."(".$this->content.") VALUES(".$results.")";
			}
			else if($this->token == $select){
				$q = "SELECT ".$this->content." FROM ".$this->table." ".$this->condition."";	
			}
			else if($this->token == $update){
				$q = "UPDATE ".$this->table." SET ".$this->content." ".$this->condition."";	
			
			}
			else if($this->token == $delete){
		         $q = "UPDATE ".$this->table." SET deleted = '1' ".$this->condition."";		
			}
			
			$query = $this->sql->query($q) or die("imbe");
			return $query;
		}
	}
	