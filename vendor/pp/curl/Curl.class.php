<?php
	
	/*
	* For handling curl requests
	*/
	
	class Curl{
	 
    /**
     * the curl holder
     * @var object
     */
    private $curl = '';

		 
    /**
     * return transfer
     * @var int
     */
//	private $return_transfer = 1;
		
    /**
     * return transfer
     * @var int
     */
	private $return_transfer = 1;
	
    /**
     * the url
     * @var string
     */	
	public $url = '';
		
	/**
     * result
     * @var string
     */	
	public $result = false;
		
		
		public function __construct(){
			//initialise
			$this->curl = curl_init();
		}
	/**
     * Sends a request to the specified url.
     *
     * @param string $url url to use.
     *
     * @return false - if there is an error executing the request, true - if the request executed without error and CURLOPT_RETURNTRANSFER is set to false, the result - if the request executed without error and CURLOPT_RETURNTRANSFER is set to true
     */
		public function get_auth($url){
			$this->url = $url;
			
			// do your thing, curl ;)
			
			curl_setopt_array($this->curl,array(
			CURLOPT_RETURNTRANSFER => $this->return_transfer,
			CURLOPT_URL => $this->url
			)
			);
			$this->result = curl_exec($this->curl);
			
			//curl_close($this->curl);
			
			return $this->result;
			
		}
		
	/**
     * Get an error if there's an error
     *
     * @return false if no error is found, or returns the error message.
     */		
		public function get_error(){
			if(!curl_exec($this->curl)){
				//return the error message
				return curl_error($this->curl);
			}
			else{
				return false;
			}
		}
	/**
     * Get an error number if there's an error
     *
     * @return false if no error is found, or returns the error number.
     */		
		public function get_errno(){
			if(!curl_exec($this->curl)){
				//return the error message
				return curl_errno($this->curl);
			}
			else{
				return false;
			}
		}
		
	}
	
	