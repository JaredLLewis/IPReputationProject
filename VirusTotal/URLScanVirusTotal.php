<!-- This code creates the VirusTotal Short Report for URL Fast Check -->
<!-- Author: Geanina F. Tambaliuc-->

<link rel="stylesheet" href="PageFormat.css" type="text/css">
<?php

//call the file that makes the connection to the VirusTotal online database
require_once('VirusTotalApiV2.php');


if($_SERVER["REQUEST_METHOD"]=="GET"){
//Initialize the VirusTotalApi class with the API Key
$api = new VirusTotalAPIV2('81057c71441b8206edc0c7aeb94b24e60ffaf8430b5771664b674948f956c07f');

//Scan an URL
$result = $api->scanURL($_GET["url"]);
$scanId = $api->getScanID($result); 


//Get the URL report
$report = $api->getURLReport($_GET["url"]);
$checks =$api->getTotalNumberOfChecks($report);
$hits=$api->getNumberHits($report);
$url=$_GET["url"];

}

?>
