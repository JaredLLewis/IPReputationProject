<?php

/*
 * Query URLVoid database through the API
 * http://www.urlvoid.com/
 *
 */

class URLVoidAPI
{
	private $_api;
	private $_plan;
	
    public $_output;
	public $_error;
	
	public function __construct( $api, $plan )
	{
		$this->_api = $api;
		$this->_plan = $plan;
	}
	
	/*
	 * Set key for the API call
	 */
	public function set_api( $api )
	{
		$this->_api = $api;
	}
	
	/*
	 * Set plan identifier for the API call
	 */
	public function set_plan( $plan )
	{
		$this->_plan = $plan;
	}

	/*
	 * Call the API
	 */
	public function query_urlvoid_api( $website )
	{
	    $curl = curl_init();
		curl_setopt ($curl, CURLOPT_URL, "http://api.urlvoid.com/".$this->_plan."/".$this->_api."/host/".$website."/" );
		curl_setopt ($curl, CURLOPT_USERAGENT, "API");
    	curl_setopt ($curl, CURLOPT_TIMEOUT, 30);
    	curl_setopt ($curl, CURLOPT_CONNECTTIMEOUT, 30);
    	curl_setopt ($curl, CURLOPT_HEADER, 0);
    	curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, false);
    	curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec( $curl );
		curl_close( $curl );
		return $result;
	}
	
	/*
	 * Convert array of engines to string
	 */
	public function show_engines_array_as_string( $engines, $last_char = ", " )
	{
   		if ( is_array($engines) )
		{
   		    foreach( $engines as $item ) $str .= trim($item).$last_char;
   		    return rtrim( $str, $last_char );
		}
		else
		{
		    return $engines;
		}
	}
	
	public function scan_host( $host )
	{
	    $output = $this->query_urlvoid_api( $host );

		$this->_output = $output;
		
		$this->_error = ( preg_match( "/<error>(.*)<\/error>/is", $output, $parts ) ) ? $parts[1] : '';
		
		return json_decode( json_encode( simplexml_load_string( $output, 'SimpleXMLElement', LIBXML_NOERROR | LIBXML_NOWARNING ) ), true );
	}
	
}

?>