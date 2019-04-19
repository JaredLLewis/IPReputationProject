<!-- This code creates the connection to the AbuseIPDB online database and retains the ip report-->

<?php
$ch = curl_init();

//get the IP to check
$ip= $input;

//set the API key
$api_key='MNylmS0ycE1z1oW88vgJKKZfpgA7UPq08BtVUTmM';
$days='30';
curl_setopt($ch, CURLOPT_URL, "https://www.abuseipdb.com/check/".$ip."/json?key=".$api_key."&days=".$days);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = "Content-Type: application/json";
$headers[] = "Api-Key: MNylmS0ycE1z1oW88vgJKKZfpgA7UPq08BtVUTmM";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

//retaining the report
$result = curl_exec($ch);
$err = curl_errno($ch);
$arr=json_decode($result,true);
curl_close ($ch);
?>