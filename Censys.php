<!-- This code creates the connection to the Censys online database and retains the IP report -->
<!-- Author: Geanina F. Tambaliuc-->

<?php

$ch = curl_init();

//get the IP to check
$ip = $_GET["ip"];

//API Details
$key="e8ce675e-8788-4477-81ff-eeddc9c0bb1f";
$secret="0ajIsrcBU7mR0rFzMKG2aUeRHdCOIIl9";
curl_setopt($ch, CURLOPT_URL, "https://".$key.":".$secret."@censys.io/api/v1/view/ipv4/".$ip);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//retaining the report
$result = curl_exec($ch);

//decoding the json object
$arr=json_decode($result,true);
$error=curl_errno($ch);

curl_close ($ch);


?>