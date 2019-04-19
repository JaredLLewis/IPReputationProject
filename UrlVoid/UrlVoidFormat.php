<!-- This code retrieves and memorises the fields from the URLVoid Report -->
<!-- Author: Geanina F. Tambaliuc-->


<?php

//calling the file that make the connection to the online database
require_once 'class_urlvoidapi.php';


//initialize the class using the API Key provided
$URLVoidAPI = new URLVoidAPI( 'f6137efe0b21809fbd46545b95c9065bae57ceea', 'api1000' );

$array = array();

//Getting the url to check
$url = $_GET["url"];
$parse = parse_url($url);
$domain= $parse['host'];
if(strpos($domain,"www.")!==false)
{
	$domain=str_replace("www.","",$domain);
}


//Getting the Report
$array = $URLVoidAPI->scan_host($domain);



//convert from json object to string
$report=print_r($array,true); 

//Retain the fields from the report
$host=strstr($report,"[host]");
$host=strstr($host,"[updated]",true);
$updated=strstr($report,"[updated]");
$updated=strstr($updated,"[http_response_code]",true);
$http=strstr($report,"[http_response_code]");
$http=strstr($http,"[domain_age]",true);
$age=strstr($report,"[domain_age]");
$age=strstr($age,"[google_page_rank]",true);
$googleRank=strstr($report,"[google_page_rank]");
$googleRank=strstr($googleRank,"[alexa_rank]",true);
$alexaRank=strstr($report,"[alexa_rank]");
$alexaRank=strstr($alexaRank,"[connect_time]",true);
$connectTime=strstr($report,"[connect_time]");
$connectTime=strstr($connectTime,"[header_size]",true);
$headerSize=strstr($report,"[header_size]");
$headerSize=strstr($headerSize,"[download_size]",true);
$downloadSize=strstr($report,"[download_size]");
$downloadSize=strstr($downloadSize,"[speed_download]",true);
$speedDownload=strstr($report,"[speed_download]");
$speedDownload=strstr($speedDownload,"[external_url_redirect]",true);
$ip=strstr($report,"[addr]");
$ip=strstr($ip,"[hostname]",true);
$hostname=strstr($report,"[hostname]");
$hostname=strstr($hostname,"[asn]",true);
$asn=strstr($report,"[asn]");
$asn=strstr($asn,"[asname]",true);
$asnName=strstr($report,"[asname]");
$asnName=strstr($asnName,"[country_code]",true);
$countryCode=strstr($report,"[country_code]");
$countryCode=strstr($countryCode,"[country_name]",true);
$countryName=strstr($report,"[country_name]");
$countryName=strstr($countryName,"[region_name]",true);
$regionName=strstr($report,"[region_name]");
$regionName=strstr($regionName,"[city_name]",true);
$city=strstr($report,"[city_name]");
$city=strstr($city,"[continent_code]",true);
$continentCode=strstr($report,"[continent_code]");
$continentCode=strstr($continentCode,"[continent_name]",true);
$continentName=strstr($report,"[continent_name]");
$continentName=strstr($continentName,"[latitude]",true);
$latitude=strstr($report,"[latitude]");
$latitude=strstr($latitude,"[longitude]",true);
$longitude=strstr($report,"[longitude]");
$longitude=strstr($longitude,")",true);
$detections=strstr($report,"[count]");
$detections=strstr($detections,")",true);

//Modify the format of the fields for print

//Change the print format of the variable: Host 
$hostPrint="";
if(!empty($host))
  {$hostArray=explode("=>",$host);
   $hostPrint=$hostArray[1];
  }

//Change the print format of the variable: Updated 
if(!empty($updated))
  {$updatedArray=explode("=>",$updated);
   $updatedPrint=$updatedArray[1];
  }  

  
//Change the print format of the variable: http
if(!empty($http))
  {$httpArray=explode("=>",$http);
   $httpPrint=$httpArray[1];
  }  
  
//Change the print format of the variable: age
if(!empty($age))
  {$ageArray=explode("=>",$age);
   $agePrint=$ageArray[1];
  }  
 
//Change the print format of the variable: googleRank
if(!empty($googleRank))
  {$googleRankArray=explode("=>",$googleRank);
   $googleRankPrint=$googleRankArray[1];
  }  
  
//Change the print format of the variable: alexaRank
if(!empty($alexaRank))
  {$alexaRankArray=explode("=>",$alexaRank);
   $alexaRankPrint=$alexaRankArray[1];
  } 
 
//Change the print format of the variable: connectTime
if(!empty($connectTime))
  {$connectTimeArray=explode("=>",$connectTime);
   $connectTimePrint=$connectTimeArray[1];
  } 
  
   
//Change the print format of the variable: headerSize
if(!empty($headerSize))
  {$headerSizeArray=explode("=>",$headerSize);
   $headerSizePrint=$headerSizeArray[1];
  } 
  
//Change the print format of the variable: downloadSize
if(!empty($downloadSize))
  {$downloadSizeArray=explode("=>",$downloadSize);
   $downloadSizePrint=$downloadSizeArray[1];
  } 

//Change the print format of the variable: speedDownload
if(!empty($speedDownload))
  {$speedDownloadArray=explode("=>",$speedDownload);
   $speedDownloadPrint=$speedDownloadArray[1];
  }   
  
//Change the print format of the variable: ip
if(!empty($ip))
  {$ipArray=explode("=>",$ip);
   $ipPrint=$ipArray[1];
  }   
 
//Change the print format of the variable: hostname
if(!empty($hostname))
  {$hostnameArray=explode("=>",$hostname);
   $hostnamePrint=$hostnameArray[1];
  }  
  
//Change the print format of the variable: asn
if(!empty($asn))
  {$asnArray=explode("=>",$asn);
   $asnPrint=$asnArray[1];
  }  

//Change the print format of the variable: asnName
if(!empty($asnName))
  {$asnNameArray=explode("=>",$asnName);
   $asnNamePrint=$asnNameArray[1];
  }  
  
//Change the print format of the variable: countryCode
if(!empty($countryCode))
  {$countryCodeArray=explode("=>",$countryCode);
   $countryCodePrint=$countryCodeArray[1];
  } 
  
//Change the print format of the variable: countryName
if(!empty($countryName))
  {$countryNameArray=explode("=>",$countryName);
   $countryNamePrint=$countryNameArray[1];
  } 
  
//Change the print format of the variable: regionName
if(!empty($regionName))
  {$regionNameArray=explode("=>",$regionName);
   $regionNamePrint=$regionNameArray[1];
  } 

//Change the print format of the variable: city
if(!empty($city))
  {$cityArray=explode("=>",$city);
   $cityPrint=$cityArray[1];
  }

//Change the print format of the variable: continentCode
if(!empty($continentCode))
  {$continentCodeArray=explode("=>",$continentCode);
   $continentCodePrint=$continentCodeArray[1];
  }
  
//Change the print format of the variable: continentName
if(!empty($continentName))
  {$continentNameArray=explode("=>",$continentName);
   $continentNamePrint=$continentNameArray[1];
  }
  
//Change the print format of the variable: latitude
if(!empty($latitude))
  {$latitudeArray=explode("=>",$latitude);
   $latitudePrint=$latitudeArray[1];
  }
  
//Change the print format of the variable: longitude
if(!empty($longitude))
  {$longitudeArray=explode("=>",$longitude);
   $longitudePrint=$longitudeArray[1];
  }

//Change the print format of the variable: detections
$detectionsPrint="";
if(!empty($detections))
  {$detectionsArray=explode("=>",$detections);
   $detectionsPrint=$detectionsArray[1];
  }
  
//Check is detectionsPrint is empty or not, 
//if it is, it gets the value 0
if(empty($detectionsPrint))
{
	$detectionsPrint=0;
}

?>