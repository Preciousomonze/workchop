<?php

	/*
	* HANDLE NAMES, FOR SPLITTING NAMES INTO FIRST AND SECOND
	*/
	
	class Names{
		private $name = '';
		//delimeter
		private $delimeter = " ";
			function __construct($name){
				$this->name = $name;
			}
		public function show_name(){
			echo $this->name;
		}
		public function show_f_name(){
			//$this->name = $name;
			//split
			$split = explode($this->delimeter,$this->name);
			
			return $split[0];
			
		}
		public function show_l_name(){
		//	$this->name = $name;
				//split
			$split = explode($this->delimeter,$this->name);
			
			return $split[1];
		
				
		}
	}
	