<!-- This code creates the connection to the myIP.ms online database and retains the IP report -->

<?php

	// get the IP to check
	$query 	= $_GET["ip"];

	//API details
	$api_id = "id53784";
	$api_key = "53427060-2127427350-449767697";
	$api_url = "https://api.myip.ms";
	
	
	//creating the connection
   	$url  = create_api_url($query, $api_id, $api_key, $api_url);
	$ch = curl_init( $url );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt( $ch, CURLOPT_HEADER, 0);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt( $ch, CURLOPT_TIMEOUT, 90);
	curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 90);
	$data = curl_exec($ch);
	curl_close($ch);
	
	//decoding the json object
   	$arr  = json_decode($data, true);

	
function create_api_url($query, $api_id, $api_key, $api_url, $timestamp = '')
{
	$url = "";
	if (!$timestamp) $timestamp = gmdate("Y-m-d_H:i:s");
	if (trim($query) != '') {
		$url = $api_url."/".$query.'/api_id/'.$api_id.'/api_key/'.$api_key;  
		$signature = md5($url.'/timestamp/'.$timestamp);
		$url .= '/signature/'.$signature.'/timestamp/'.$timestamp;
	}
	return $url;
}

?>