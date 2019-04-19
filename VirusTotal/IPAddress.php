<!-- This code makes the connection to the online database and modifies the VirusTotal IP report format for display -->
<!-- Author: Geanina F. Tambaliuc-->

<link rel="stylesheet" href="PageFormat.css" type="text/css">
<link rel="stylesheet" href="TableFormat.css" type="text/css">
<?php
//setting the API KEY
$api_key = getenv('VT_API_KEY') ? getenv('VT_API_KEY') :'81057c71441b8206edc0c7aeb94b24e60ffaf8430b5771664b674948f956c07f';
$report_ip =$_GET["ip"];
 
// making the connection to the VirusTotal online database
$data = array('apikey' => $api_key,'ip'=> $report_ip);
$ch = curl_init();
$url = 'https://www.virustotal.com/vtapi/v2/ip-address/report?';
$url .= http_build_query($data); // append query params
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_VERBOSE, 1); 
curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate'); 
curl_setopt($ch, CURLOPT_USERAGENT, "gzip, My php curl client");
curl_setopt($ch, CURLOPT_RETURNTRANSFER ,True);

//get the report and status code
$result=curl_exec ($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//get each field
if ($status_code == 200) { // OK
  $js = json_decode($result, true);
  $report=print_r($js,true);
  $undUrl=strstr($report, "[undetected_downloaded_samples",true);
  $undDownload=strstr($report,"[undetected_downloaded_samples");
  $undDownload=strstr($undDownload, "[detected_downloaded_samples]",true);
  $detDownload=strstr($report,"[detected_downloaded_samples]");
  $detDownload=strstr($detDownload,"[response_code]",true);
  $code=strstr($report,"[response_code]");
  $code=strstr($code,"[as_owner]",true);
  $owner=strstr($report,"[as_owner]");
  $owner=strstr($owner,"[detected_urls]",true);
  $detUrl=strstr($report,"[detected_urls]");
  $detUrl=strstr($detUrl,"[verbose_msg]",true);
  $msg= strstr($report,"[verbose_msg]");
  $msg=strstr($msg,"[country]",true);
  $country=strstr($report,"[country]");
  $country=strstr($country,"[resolutions]",true);
  $communicating=strstr($report,"[detected_communicating_samples]");
  $communicating=strstr($communicating,"[undetected_communicating_samples]",true);
  $resolutions=strstr($report,"[resolutions]");
	if(empty($communicating))
		$resolutions=strstr($resolutions,"[asn]",true);
	else 
	  $resolutions=strstr($resolutions,"[detected_communicating_samples]",true);
  $unComm=strstr($report,"[undetected_communicating_samples]");
  $unComm=strstr($unComm,"[asn]",true);
  $asn=strstr($report,"[asn]");
  
  //Declare Variables for Print
  $asnPrint="";
  $codePrint="";
  $msgPrint="";
  $ownerPrint="";
  $countryPrint="";
  
  // Form of asn for print
  if(!empty($asn))
  {$asnArray=explode("=>",$asn);
  $asnArray[1]=strstr($asnArray[1],")",true);
  $asnPrint=$asnArray[1];
  }
  
  // Form of response_code for print
  if(!empty($code))
  {$codeArray=explode("=>",$code);
  $codePrint=$codeArray[1];
  }
  
  // Form of verbose_msg for print
  if(!empty($msg))
  {$msgArray=explode("=>",$msg);
  $msgPrint=$msgArray[1];
  }
  
  // Form of as_owner for print
  if(!empty($owner))
  {$ownerArray=explode("=>",$owner);
  $ownerPrint=$ownerArray[1];
  }
  
  // Form of country to print
  if(!empty($country))
  {$countryArray=explode("=>",$country);
  $countryPrint=$countryArray[1];
  }
  
  //Print Title
  echo "<br><br>";
  
  // Print Legend Table
  echo '
    <div id="wrapper1" style="display:none"  >
	<div class="scroll-window"  >
	<table  border="1" align="center" class="table table-striped table-hover user-list fixed-header" >
	<thead>
		<th colspan="2"><center><div>VirusTotal Legend </div></center></font></th>
	</thead>
	<tr>
		<td style="color:#00AABB"><center><B>ASN</B></center></td>
		<td style="color:black"><center>Autonomous System Number</center></td>
	</tr>
	<tr>
		<td style="color:#00AABB"><center><B>Owner</B></center></td>
		<td style="color:black"><center>The owner name of the autonomous system.</center></td>
	</tr>
	<tr>
		<td style="color:#00AABB" ><center><B>Country</B></center></td>
		<td style="color:black"><center>Country where IP Address is located.</center></td>
	</tr>
	<tr>
		<td style="color:#00AABB" ><center><B>Resolutions</B></center></td>
		<td style="color:black"><center>Hostnames that have resolved to this IP address. We resolve it when a file or URL related to this IP address is seen on VirusTotal.</center></td>
	</tr>
	<tr>
		<td style="color:#00AABB" ><center><B>Detected URLs</B></center></td>
		<td style="color:black"><center>URLs hosted at this IP address that have url scanner postive detections.</center></td>
	</tr>
	<tr>
		<td style="color:#00AABB" ><center><B>Undetected URLs</B></center></td>
		<td style="color:black"><center>URLs hosted at this IP address that DO NOT have url scanner postive detections.</center></td>
	</tr>
	<tr>
		<td style="color:#00AABB" ><center><B>Detected Downloaded Samples</B></center></td>
		<td style="color:black"><center>Latest 100 files that have been downloaded from this IP address, with antivirus detections.</center></td>
	</tr>
	
	<tr>
		<td style="color:#00AABB" ><center><B>Detected Communicating Samples</B></center></td>
		<td style="color:black"><center>Latest 100 files submitted to VirusTotal that are detected by one or more antivirus solutions and communicate with the IP address provided when executed in a sandboxed environment.</center></td>
	</tr>
	<tr>
		<td style="color:#00AABB" ><center><B>Undetected Communicating Samples</B></center></td>
		<td style="color:black"><center>Latest 100 files submitted to VirusTotal that are NOT detected by one or more antivirus solutions and communicate with the IP address provided when executed in a sandboxed environment.</center></td>
	</tr>
	<tr>
		<td rowspan="3" style="color:#00AABB" ><center><B>Response Code</B></center></td>
		<td style="color:black"><center> -1 : Invalid IP address </center></td>
	</tr>
	<tr>
		<td style="color:black"><center> 0 : IP Address not in our dataset  </center></td>
	</tr>
	<tr>
		<td style="color:black"><center> 1: Successfully found IP address  </center></td>
	</tr>
	<tr>
		<td style="color:#00AABB" ><center><B>Verbose MSG</B></center></td>
		<td style="color:black"><center>Verbose response message of status.</center></td>
	</tr>
	</table></div>';
  echo "<br><br>";
  
  // Short Report Table
  
  echo '
  <div class="scroll-window2">
	<table border="1" align="center" class="table table-striped table-hover user-list fixed-header" >
	<thead>
		<th colspan="2"><B><center><div>VirusTotal Short Report</div></center></B></th>
	</thead>
	<tr>
		<td style="color:black"><center>IP</center></td>
		<td style="color:black"><center>'.$report_ip.'</td>
	</tr>
	<tr>
		<td style="color:black"><center>ASN</center></td>
		<td style="color:black"><center>'.$asnPrint.'</td>
	</tr>
	<tr>
		<td style="color:black"><center>Response Code</center></td>
		<td style="color:black"><center>'.$codePrint.'</td>
	</tr>
	<tr>
		<td style="color:black"><center>Verbose MSG</center></td>
		<td style="color:black"><center>'.$msgPrint.'</td>
	</tr>
	<tr>
		<td style="color:black"><center>Owner</center></td>
		<td style="color:black"><center>'.$ownerPrint.'</td>
	</tr>
	<tr>
		<td style="color:black"><center>Country</center></td>
		<td style="color:black"><center>'.$countryPrint.'</td>
	</tr>
	</table></div>';
  
  echo "<br><br>";
 
//Undetected URLs Table
if(!empty($undUrl))
{ $undUrl=str_replace("Array","",$undUrl);
  $undUrl=str_replace("(","",$undUrl);
  $undUrl=str_replace(")","",$undUrl);
  $undUrlArray=explode("=>",$undUrl);
  $index=sizeof($undUrlArray);
  
  $len=sizeof($undUrlArray)-2;
  $len=$len/6;
  $lenC=$len;
  $i=3;
	echo "<div class=\"normalTable\">";
	echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
	echo "<tr>";
	echo "<td colspan=\"5\" style=\"color:#333 \" bgcolor=\"#00AABB\"><B><center>";
	echo "VirusTotal Undetected URLs";
	echo "</center></B></td>";
	echo"</tr>";
	echo "<tr>";
	echo "<td width=\"30\" style=\"color:#00AABB\">";
	echo "<B>URL</B>";
	echo "</td><td  width=\"30\" style=\"color:#00AABB\">";
	echo "<B>Sha-256 Hash</B>";
	echo "</td><td  width=\"30\" style=\"color:#00AABB\">";
	echo "<B>Hits</B>";
	echo "</td><td  width=\"30\" style=\"color:#00AABB\">";
	echo "<B>Checks</B>";
	echo "</td><td  width=\"30\" style=\"color:#00AABB\">";
	echo "<B>Date</B>";
	echo "</td></tr>";
	
  while($len>0)
  {
	  echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  $undUrlArray[$i]=strstr($undUrlArray[$i],"[",true);
	  echo $undUrlArray[$i];
	  echo "</font></td>";
	  
	  $undUrlArray[$i+1]=strstr($undUrlArray[$i+1],"[",true);
	  echo "<td style=\"word-wrap: break-word\"><font color=\"black\">";
	  echo $undUrlArray[$i+1];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"><font color=\"black\">";
	  $undUrlArray[$i+2]=strstr($undUrlArray[$i+2],"[",true);
	  echo $undUrlArray[$i+2];
	  echo "</font></td>";
	  
	  
	  echo "<td style=\"word-wrap: break-word\"><font color=\"black\">";
	  $undUrlArray[$i+3]=strstr($undUrlArray[$i+3],"[",true);
	  echo $undUrlArray[$i+3];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"><font color=\"black\">";
	  $undUrlArray[$i+4]=$undUrlArray[$i+4] . "[";
	  $undUrlArray[$i+4]=strstr($undUrlArray[$i+4],"[",true);
	  echo $undUrlArray[$i+4];
	  echo "</font></td>";
	  echo "</tr>";
	  $i=$i+6;
	  $len=$len-1;
  }
   echo "</table></div>";
  echo "<br><br>";
}

//Undetected Downloaded Samples Table
  
if(!empty($undDownload))
{ $undDownload=str_replace("Array","",$undDownload);
  $undDownload=str_replace("(","",$undDownload);
  $undDownload=str_replace(")","",$undDownload);
  $undDowArray=explode("=>",$undDownload);
  
  $len=sizeof($undDowArray)-2;
  $len=$len/5;
  $i=3;
  echo "<div class=\"normalTable\">";
  echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
	echo "<tr>";
	echo "<td colspan=\"4\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
	echo "VirusTotal Undetected Downloaded Samples";
	echo "</center></B></td>";
	echo"</tr>";
	echo "<tr>";
	echo "<td style=\"color:#00AABB\">";
	echo "<B>Date</B>";
	echo "</td><td style=\"color:#00AABB\">";
	echo "<B>Hits</B>";
	echo "</td><td style=\"color:#00AABB\">";
	echo "<B>Checks</B>";
	echo "</td><td style=\"color:#00AABB\">";
	echo "<B>Sha-256 Hash</B>";
	echo "</td></tr>";
  while($len>0)
  {
	  echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  $undDowArray[$i]=strstr($undDowArray[$i],"[",true);
	  echo $undDowArray[$i];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $undDowArray[$i+1]=strstr($undDowArray[$i+1],"[",true);
	  echo $undDowArray[$i+1];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">";;
	  $undDowArray[$i+2]=strstr($undDowArray[$i+2],"[",true);
	  echo $undDowArray[$i+2];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $undDowArray[$i+3]=$undDowArray[$i+3] . "["; 
	  $undDowArray[$i+3]=strstr($undDowArray[$i+3],"[",true);
	  echo $undDowArray[$i+3];
	  echo "</font></td>";
	  echo "</tr>";
	  $i=$i+5;
	  $len=$len-1;
  }
  echo "</table></div>";
  echo "<br><br>";
} 
  // Detected Downloaded Samples Table
  
if(!empty($detDownload))
{ $detDownload=str_replace("Array","",$detDownload);
  $detDownload=str_replace("(","",$detDownload);
  $detDownload=str_replace(")","",$detDownload);
  $detDownloadArray=explode("=>",$detDownload);
  
  $len=sizeof($detDownloadArray)-2;
  $len=$len/5;
  $i=3;
	echo "<div class=\"normalTable\">";
    echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
	echo "<tr>";
	echo "<td colspan=\"4\" style=\"color:#333 \" bgcolor=\"#00AABB\"><B><center>";
	echo "VirusTotal Detected Downloaded Samples";
	echo "</center></B></td>";
	echo"</tr>";
	echo "<tr>";
	echo "<td style=\"color:#00AABB\">";
	echo "<B>Date</B>";
	echo "</td><td style=\"color:#00AABB\">";
	echo "<B>Hits</B>";
	echo "</td><td style=\"color:#00AABB\">";
	echo "<B>Checks</B>";
	echo "</td><td style=\"color:#00AABB\">";
	echo "<B>Sha-256 Hash</B>";
	echo "</td></tr>";
  while($len>0)
  {
	  echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  $detDownloadArray[$i]=strstr($detDownloadArray[$i],"[",true);
	  echo $detDownloadArray[$i];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $detDownloadArray[$i+1]=strstr($detDownloadArray[$i+1],"[",true);
	  echo $detDownloadArray[$i+1];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $detDownloadArray[$i+2]=strstr($detDownloadArray[$i+2],"[",true);
	  echo $detDownloadArray[$i+2];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $detDownloadArray[$i+3]=$detDownloadArray[$i+3] . "["; 
	  $detDownloadArray[$i+3]=strstr($detDownloadArray[$i+3],"[",true);
	  echo $detDownloadArray[$i+3];
	  echo "</font></td>";
	  echo "</tr>";
	  $i=$i+5;
	  $len=$len-1;
  }
  
  echo "</table></div>";
  echo "<br><br>";
}
  // Detected URLs Table
  
if(!empty($detUrl))
{ $detUrl=str_replace("Array","",$detUrl);
  $detUrl=str_replace("(","",$detUrl);
  $detUrl=str_replace(")","",$detUrl);
  $detUrlArray=explode("=>",$detUrl);
  
  $len=sizeof($detUrlArray)-2;
  $len=$len/5;
  $i=3;
	echo "<div class=\"normalTable\">";
	echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
	echo "<tr>";
	echo "<td colspan=\"4\" style=\"color:#333 \" bgcolor=\"#00AABB\"><B><center>";
	echo "VirusTotal Detected URLs";
	echo "</center></B></td>";
	echo"</tr>";
	echo "<tr>";
	echo "<td style=\"color:#00AABB\">";
	echo "<B>URL</B>";
	echo "</td><td style=\"color:#00AABB\">";
	echo "<B>Hits</B>";
	echo "</td><td style=\"color:#00AABB\">";
	echo "<B>Checks</B>";
	echo "</td><td style=\"color:#00AABB\">";
	echo "<B>Date</B>";
	echo "</td></tr>";
  while($len>0)
  {
	  echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  $detUrlArray[$i]=strstr($detUrlArray[$i],"[",true);
	  echo $detUrlArray[$i];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $detUrlArray[$i+1]=strstr($detUrlArray[$i+1],"[",true);
	  echo $detUrlArray[$i+1];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $detUrlArray[$i+2]=strstr($detUrlArray[$i+2],"[",true);
	  echo $detUrlArray[$i+2];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $detUrlArray[$i+3]=$detUrlArray[$i+3] . "["; 
	  $detUrlArray[$i+3]=strstr($detUrlArray[$i+3],"[",true);
	  echo $detUrlArray[$i+3];
	  echo "</font></td>";
	  echo "</tr>";
	  $i=$i+5;
	  $len=$len-1;
  }
  
   echo "</table></div>";
  
  echo "<br><br>";
} 
  
  // Resolutions Table
 if(!empty($resolutions))
 { $resolutions=str_replace("Array","",$resolutions);
  $resolutions=str_replace("(","",$resolutions);
  $resolutions=str_replace(")","",$resolutions);
  $resolutionsArray=explode("=>",$resolutions);
  
  $len=sizeof($resolutionsArray)-2;
  $len=$len/3;
  $i=3;
	echo "<div class=\"normalTable\">";
    echo "<table border=\"1\" align=\"center\"  width=\"100%\" style=\"table-layout: fixed\">";
	echo "<tr>";
	echo "<td colspan=\"2\" style=\"color:#333 \" bgcolor=\"#00AABB\"><B><center>";
	echo "<B>VirusTotal Resolutions</B>";
	echo "</center></B></td>";
	echo"</tr>";
	echo "<tr>";
	echo "<td style=\"color:#00AABB\">";
	echo "<B>Last Resolved</B>";
	echo "</td><td style=\"color:#00AABB\">";
	echo "<B>Hostname</B>";
	echo "</td></tr>";
  while($len>0)
  {
	  echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $resolutionsArray[$i]=strstr($resolutionsArray[$i],"[",true);
	  echo $resolutionsArray[$i];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $resolutionsArray[$i+1]=$resolutionsArray[$i+1] . "[";
	  $resolutionsArray[$i+1]=strstr($resolutionsArray[$i+1],"[",true);
	  echo $resolutionsArray[$i+1];
	  echo "</font></td>";
	  echo "</tr>";
	  $i=$i+3;
	  $len=$len-1;
  }
 
  echo "</table></div>";
  echo "<br><br>";
 }  
  //Detected Communicating Samples
  if(!empty($communicating))
  {
	  
	$communicating=str_replace("Array","",$communicating);
	$communicating=str_replace("(","",$communicating);
	$communicating=str_replace(")","",$communicating);
	$communicatingArray=explode("=>",$communicating);
	
	$len=sizeof($communicatingArray)-2;
	$len=$len/5;
	$i=3;
	echo "<div class=\"normalTable\">";
    echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\" >";
	echo "<tr>";
	echo "<td colspan=\"4\" style=\"color:#333 \" bgcolor=\"#00AABB\"><B><center>";
	echo "VirusTotal Detected Communicating Samples";
	echo "</center></B></td>";
	echo"</tr>";
	echo "<tr>";
	echo "<td style=\"color:#00AABB\">";
	echo "<B>Date</B>";
	echo "</td><td style=\"color:#00AABB\">";
	echo "<B>Hits</B>";
	echo "</td><td style=\"color:#00AABB\">";
	echo "<B>Checks</B>";
	echo "</td><td style=\"color:#00AABB\">";
	echo "<B>Sha-256</B>";
	echo "</td></tr>";
	while($len>0)
	{
	  echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $communicatingArray[$i]=strstr($communicatingArray[$i],"[",true);
	  echo $communicatingArray[$i];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $communicatingArray[$i+1]=$communicatingArray[$i+1] . "[";
	  $communicatingArray[$i+1]=strstr($communicatingArray[$i+1],"[",true);
	  echo $communicatingArray[$i+1];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $communicatingArray[$i+2]=$communicatingArray[$i+2] . "[";
	  $communicatingArray[$i+2]=strstr($communicatingArray[$i+2],"[",true);
	  echo $communicatingArray[$i+2];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $communicatingArray[$i+3]=$communicatingArray[$i+3] . "[";
	  $communicatingArray[$i+3]=strstr($communicatingArray[$i+3],"[",true);
	  echo $communicatingArray[$i+3];
	  echo "</font></td>";
	  echo "</tr>";
	  
	  $i=$i+5;
	  $len=$len-1;
	}
 
	echo "</table></div>";
	echo "<br><br>";
	  
  }
  
  //Undetected Communicating Samples
  if(!empty($unComm))
  {
	  
	$unComm=str_replace("Array","",$unComm);
	$unComm=str_replace("(","",$unComm);
	$unComm=str_replace(")","",$unComm);
	$unCommArray=explode("=>",$unComm);
	
	$len=sizeof($unCommArray)-2;
	$len=$len/5;
	$i=3;
	echo "<div class=\"normalTable\">";
    echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
	echo "<tr>";
	echo "<td colspan=\"4\" style=\"color:#333 \" bgcolor=\"#00AABB\"><B><center>";
	echo "VirusTotal Undetected Communicating Samples";
	echo "</center></B></td>";
	echo"</tr>";
	echo "<tr>";
	echo "<td style=\"color:#00AABB\">";
	echo "<B>Date</B>";
	echo "</td><td style=\"color:#00AABB\">";
	echo "<B>Hits</B>";
	echo "</td><td style=\"color:#00AABB\">";
	echo "<B>Checks</B>";
	echo "</td><td style=\"color:#00AABB\">";
	echo "<B>Sha-256</B>";
	echo "</td></tr>";
	while($len>0)
	{
	  echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $unCommArray[$i]=strstr($unCommArray[$i],"[",true);
	  echo $unCommArray[$i];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $unCommArray[$i+1]=$unCommArray[$i+1] . "[";
	  $unCommArray[$i+1]=strstr($unCommArray[$i+1],"[",true);
	  echo $unCommArray[$i+1];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $unCommArray[$i+2]=$unCommArray[$i+2] . "[";
	  $unCommArray[$i+2]=strstr($unCommArray[$i+2],"[",true);
	  echo $unCommArray[$i+2];
	  echo "</font></td>";
	  
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">";
	  $unCommArray[$i+3]=$unCommArray[$i+3] . "[";
	  $unCommArray[$i+3]=strstr($unCommArray[$i+3],"[",true);
	  echo $unCommArray[$i+3];
	  echo "</font></td>";
	  echo "</tr>";
	  
	  $i=$i+5;
	  $len=$len-1;
	}
 
	echo "</table></div>";
	
	  
  }
  echo "</div>";
} else {  // Error occured
  print($result);
}
curl_close ($ch);
?>