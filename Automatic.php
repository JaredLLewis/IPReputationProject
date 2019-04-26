<link rel="stylesheet" href="PageFormat.css" type="text/css">
<link rel="stylesheet" href="TableFormat.css" type="text/css">
<link rel="stylesheet" href="TabDesign.css" type="text/css">
<br><br>
<font color="black" size="10" face="algerian"><center>History of Target IPS<br></center></font>
<br>




<?php 

$username = getenv('USERNAME');
$password = getenv('PASS');
$servername = "us-cdbr-iron-east-02.cleardb.net";

// Create connection


$dbname = "heroku_d2727727c391dd6";
$database = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($database->connect_error) {
    die("Connection failed: " . $database->connect_error);
} 
echo "Connected successfully";






#$database = new SQLite3('scheduleddb/_main.db_');
$virustotalscan1 = 0;
$abuseipscan1 = 0;
$apilityscan1 = 0;
$myipscan1 = 0;
$daycount = 0;
if (isset($_GET['name'])) {
	$maxdaycount = $_GET["name"];
}
else {
	$maxdaycount = 30;
}


?>

<form action="Automatic.php" method="get" style="margin-left:80px;">
Days: <input type="text" name="name" style="width:100px;" value="<?php echo htmlspecialchars($maxdaycount); ?>" placeholder="30">
<input type="submit" class="button" style="width:100px;">
</form>
<?php



	echo "<div class=\"normalTable\">";
	echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
	echo "<tr>";
	echo "<td colspan=\"6\" style=\"color:#333 \" bgcolor=\"#00AABB\"><B><center>";
	echo "Daily Report of IP 129.71.200.66";
	echo "</center></B></td>";
	echo"</tr>";
	echo "<tr>";
	echo "<td  style=\"color:#00AABB\">";
	echo "<B>Scan Date</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Virus Total Score</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Shodan Open Ports</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>AbuseIPDB</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Apility</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>MyIP</B>";
	echo "</td></tr>";
	
	$sql =    "SELECT * from IP1 ORDER  BY scandate DESC LIMIT 30;";
	
	if (!$result = $database->query($sql)) {
    die ('There was an error running query[' . $database->error . ']');
}


   while($row = $result->fetch_array()) {
	  echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">";
      echo $row['scandate'];
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
      echo $row['virustotalextra'] .  '(<a href="' . $row['virustotalurl'] . '" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['shodanports'] .  '(<a href="https://www.shodan.io/host/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['abuseipdbbool'] . "[" . $row['abuseipdbcats'] . "]" .   '(<a href="' . $row['abuseipdburl'] . '" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['apilitybool'] .  '(<a href="https://apility.io/search/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['myipbool'] .  '(<a href="https://myip.ms/info/whois/129.71.200.66" target="_blank">URL</a>)' ;
	  
	  echo "</font></td>";
	  
	  if ($row['virustotalbool'] == "True") {
		  $virustotalscan1++;
	  }
	  if ($row['abuseipdbbool'] == "True") {
		  $abuseipscan1++;
	  }
	  if ($row['apilitybool'] == "True") {
		  $apilityscan1++;
	  }
	  if ($row['apilitybool'] == "True") {
		  $myipscan1++;
	  }
	  
	  $daycount++;
	  
	  if ($daycount >= $maxdaycount) {
		  break;
	  }
	  
	  
   }
    echo "</table></div>";
    echo "<div align=\"center\" style=\"color:black\">";
	echo "<p> In the last ". $maxdaycount . " days on 129.71.200.66: </p>";
	echo " Virus Total found <b>". $virustotalscan1 . "</b> threats, ";
	echo "AbuseIPDB found <b>". $abuseipscan1 . "</b> threats, ";
	echo "Apility found <b>". $apilityscan1. "</b> threats, ";
	echo "MyIP found <b>". $myipscan1. "</b> threats, ";
	echo "<br><br>";
	echo "</div>";
	


$sql =<<<EOF
      SELECT * from IP1 WHERE susbool="True" AND checkedbool ="False" ORDER  BY scandate DESC LIMIT 30;
EOF;


	echo "<div class=\"normalTable\">";
	echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
	echo "<tr>";
	echo "<td colspan=\"7\" style=\"color:#333 \" bgcolor=\"#00AABB\"><B><center>";
	echo "Malicious History of IP 129.71.200.66";
	echo "</center></B></td>";
	echo"</tr>";
	echo "<tr>";
	echo "<td  style=\"color:#00AABB\">";
	echo "<B>Scan Date</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Virus Total Score</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Shodan Open Ports</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>AbuseIPDB</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Apility</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>MyIP</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Mark</B>";
	
	echo "</td></tr>";
	
	if (!$result = $database->query($sql)) {
    die ('There was an error running query[' . $database->error . ']');
}


   while($row = $result->fetch_array()) {
	  echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">";
      echo $row['scandate'];
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
      echo $row['virustotalextra'] .  '(<a href="' . $row['virustotalurl'] . '" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['shodanports'] .  '(<a href="https://www.shodan.io/host/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['abuseipdbbool'] . "[" . $row['abuseipdbcats'] . "]" .   '(<a href="' . $row['abuseipdburl'] . '" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['apilitybool'] .  '(<a href="https://apility.io/search/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['myipbool'] .  '(<a href="https://myip.ms/info/whois/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo "<span>";
	  echo "<form action=\"Automatic.php\" method=\"get\">";
	  echo "<input type=\"checkbox\" name=\"check\" value=". $row['id']. ">";
	  echo "<input type=\"submit\" name=\"submit\" style=\"width:100px;\">";
	  echo "</span";
	  echo "</form>";
	  
	  if (isset($_GET['submit'])) {
		echo '<div class="form" id="form3"><br><br><br><br><br><br>
		<Span>Data Updated Successfuly......!!</span></div>';
		$var = $row['id'];
		echo $var;
		$sql = "UPDATE IP1 SET checkedbool=\"True\" WHERE id=". $var .  "" ;



		$database->query($sql);
}
	  
	  
	  if ($row['virustotalbool'] == "True") {
		  $virustotalscan1++;
	  }
	  if ($row['abuseipdbbool'] == "True") {
		  $abuseipscan1++;
	  }
	  if ($row['apilitybool'] == "True") {
		  $apilityscan1++;
	  }
	  if ($row['apilitybool'] == "True") {
		  $myipscan1++;
	  }
	  
	  $daycount++;
	  
	  if ($daycount >= $maxdaycount) {
		  break;
	  }
	  
	  
   }
    echo "</table></div>";
	echo "<hr>";



















	
$virustotalscan1 = 0;
$abuseipscan1 = 0;
$apilityscan1 = 0;
$myipscan1 = 0;
$daycount = 0;	
   
	
	
	
	$sql =<<<EOF
      SELECT * from IP2 ORDER  BY scandate DESC LIMIT 30;
EOF;
	echo "<div class=\"normalTable\">";
	echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
	echo "<tr>";
	echo "<td colspan=\"6\" style=\"color:#333 \" bgcolor=\"#00AABB\"><B><center>";
	echo "Daily Report of IP 129.71.202.12";
	echo "</center></B></td>";
	echo"</tr>";
	echo "<tr>";
	echo "<td  style=\"color:#00AABB\">";
	echo "<B>Scan Date</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Virus Total Score</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Shodan Open Ports</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>AbuseIPDB</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Apility</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>MyIP</B>";
	echo "</td></tr>";

	if (!$result = $database->query($sql)) {
    die ('There was an error running query[' . $database->error . ']');
}


   while($row = $result->fetch_array()) {
	  echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">";
      echo $row['scandate'];
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
      echo $row['virustotalextra'] .  '(<a href="' . $row['virustotalurl'] . '" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['shodanports'] .  '(<a href="https://www.shodan.io/host/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['abuseipdbbool'] . "[" . $row['abuseipdbcats'] . "]" .   '(<a href="' . $row['abuseipdburl'] . '" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['apilitybool'] .  '(<a href="https://apility.io/search/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['myipbool'] .  '(<a href="https://myip.ms/info/whois/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  
	  
	  if ($row['virustotalbool'] == "True") {
		  $virustotalscan1++;
	  }
	  if ($row['abuseipdbbool'] == "True") {
		  $abuseipscan1++;
	  }
	  if ($row['apilitybool'] == "True") {
		  $apilityscan1++;
	  }
	  if ($row['apilitybool'] == "True") {
		  $myipscan1++;
	  }
	  
	  $daycount++;
	  
	  if ($daycount >= $maxdaycount) {
		  break;
	  }
	  
   }
	echo "</table></div>";
    echo "<div align=\"center\" style=\"color:black\">";
	echo "<p> In the last ". $maxdaycount . " days on 129.71.202.12: </p>";
	echo " Virus Total found <b>". $virustotalscan1 . "</b> threats, ";
	echo "AbuseIPDB found <b>". $abuseipscan1 . "</b> threats, ";
	echo "Apility found <b>". $apilityscan1. "</b> threats, ";
	echo "MyIP found <b>". $myipscan1. "</b> threats, ";
	echo "<br><br>";
	echo "</div>";
   
 $sql =<<<EOF
      SELECT * from IP2 WHERE susbool="True" AND checkedbool ="False" ORDER  BY scandate DESC LIMIT 30;
EOF;


	echo "<div class=\"normalTable\">";
	echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
	echo "<tr>";
	echo "<td colspan=\"7\" style=\"color:#333 \" bgcolor=\"#00AABB\"><B><center>";
	echo "Malicious History of IP 129.71.202.12";
	echo "</center></B></td>";
	echo"</tr>";
	echo "<tr>";
	echo "<td  style=\"color:#00AABB\">";
	echo "<B>Scan Date</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Virus Total Score</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Shodan Open Ports</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>AbuseIPDB</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Apility</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>MyIP</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Mark</B>";
	
	echo "</td></tr>";
	
	if (!$result = $database->query($sql)) {
    die ('There was an error running query[' . $database->error . ']');
}


   while($row = $result->fetch_array()) {
	  echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">";
      echo $row['scandate'];
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
      echo $row['virustotalextra'] .  '(<a href="' . $row['virustotalurl'] . '" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['shodanports'] .  '(<a href="https://www.shodan.io/host/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['abuseipdbbool'] . "[" . $row['abuseipdbcats'] . "]" .   '(<a href="' . $row['abuseipdburl'] . '" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['apilitybool'] .  '(<a href="https://apility.io/search/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['myipbool'] .  '(<a href="https://myip.ms/info/whois/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo "<span>";
	  echo "<form action=\"Automatic.php\" method=\"get\">";
	  echo "<input type=\"checkbox\" name=\"check\" value=". $row['id']. ">";
	  echo "<input type=\"submit\" name=\"submit\" style=\"width:100px;\">";
	  echo "</span";
	  echo "</form>";
	  
	  if (isset($_GET['submit'])) {
		echo '<div class="form" id="form3"><br><br><br><br><br><br>
		<Span>Data Updated Successfuly......!!</span></div>';
		$var = $row['id'];
		echo $var;
		$sql = "UPDATE IP1 SET checkedbool=\"True\" WHERE id=". $var .  "" ;



		$database->query($sql);
}
	  
	  
	  if ($row['virustotalbool'] == "True") {
		  $virustotalscan1++;
	  }
	  if ($row['abuseipdbbool'] == "True") {
		  $abuseipscan1++;
	  }
	  if ($row['apilitybool'] == "True") {
		  $apilityscan1++;
	  }
	  if ($row['apilitybool'] == "True") {
		  $myipscan1++;
	  }
	  
	  $daycount++;
	  
	  if ($daycount >= $maxdaycount) {
		  break;
	  }
	  
	  
   }
    echo "</table></div>";

	echo "<hr>";
 
   
   
   


$virustotalscan1 = 0;
$abuseipscan1 = 0;
$apilityscan1 = 0;
$myipscan1 = 0;
$daycount = 0;	

	
		$sql =<<<EOF
      SELECT * from IP3 ORDER  BY scandate DESC LIMIT 30;
EOF;
	echo "<div class=\"normalTable\">";
	echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
	echo "<tr>";
	echo "<td colspan=\"6\" style=\"color:#333 \" bgcolor=\"#00AABB\"><B><center>";
	echo "Daily Report of IP 129.71.252.10";
	echo "</center></B></td>";
	echo"</tr>";
	echo "<tr>";
	echo "<td  style=\"color:#00AABB\">";
	echo "<B>Scan Date</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Virus Total Score</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Shodan Open Ports</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>AbuseIPDB</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Apility</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>MyIP</B>";
	echo "</td></tr>";

	if (!$result = $database->query($sql)) {
    die ('There was an error running query[' . $database->error . ']');
}


   while($row = $result->fetch_array()) {
	  echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">";
      echo $row['scandate'];
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
      echo $row['virustotalextra'] .  '(<a href="' . $row['virustotalurl'] . '" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['shodanports'] .  '(<a href="https://www.shodan.io/host/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['abuseipdbbool'] . "[" . $row['abuseipdbcats'] . "]" .   '(<a href="' . $row['abuseipdburl'] . '" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['apilitybool'] .  '(<a href="https://apility.io/search/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['myipbool'] .  '(<a href="https://myip.ms/info/whois/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  
	  if ($row['virustotalbool'] == "True") {
		  $virustotalscan1++;
	  }
	  if ($row['abuseipdbbool'] == "True") {
		  $abuseipscan1++;
	  }
	  if ($row['apilitybool'] == "True") {
		  $apilityscan1++;
	  }
	  if ($row['apilitybool'] == "True") {
		  $myipscan1++;
	  }
	  
	  $daycount++;
	  
	  if ($daycount >= $maxdaycount) {
		  break;
	  }
	  
	  
   }
   
	echo "</table></div>";
    echo "<div align=\"center\" style=\"color:black\">";
	echo "<p> In the last ". $maxdaycount . " days on 129.71.252.10: </p>";
	echo " Virus Total found <b>". $virustotalscan1 . "</b> threats, ";
	echo "AbuseIPDB found <b>". $abuseipscan1 . "</b> threats, ";
	echo "Apility found <b>". $apilityscan1. "</b> threats, ";
	echo "MyIP found <b>". $myipscan1. "</b> threats, ";
	echo "<br><br>";
	echo "</div>";
	echo "<br><br>";
	
	 $sql =<<<EOF
      SELECT * from IP3 WHERE susbool="True" AND checkedbool ="False" ORDER  BY scandate DESC LIMIT 30;
EOF;


	echo "<div class=\"normalTable\">";
	echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
	echo "<tr>";
	echo "<td colspan=\"7\" style=\"color:#333 \" bgcolor=\"#00AABB\"><B><center>";
	echo "Malicious History of IP 129.71.252.10";
	echo "</center></B></td>";
	echo"</tr>";
	echo "<tr>";
	echo "<td  style=\"color:#00AABB\">";
	echo "<B>Scan Date</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Virus Total Score</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Shodan Open Ports</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>AbuseIPDB</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Apility</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>MyIP</B>";
	echo "</td><td  style=\"color:#00AABB\">";
	echo "<B>Mark</B>";
	
	echo "</td></tr>";
	
	if (!$result = $database->query($sql)) {
    die ('There was an error running query[' . $database->error . ']');
}


   while($row = $result->fetch_array()) {
	  echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">";
      echo $row['scandate'];
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
      echo $row['virustotalextra'] .  '(<a href="' . $row['virustotalurl'] . '" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['shodanports'] .  '(<a href="https://www.shodan.io/host/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['abuseipdbbool'] . "[" . $row['abuseipdbcats'] . "]" .   '(<a href="' . $row['abuseipdburl'] . '" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['apilitybool'] .  '(<a href="https://apility.io/search/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo $row['myipbool'] .  '(<a href="https://myip.ms/info/whois/129.71.200.66" target="_blank">URL</a>)' ;
	  echo "</font></td>";
	  echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
	  echo "<span>";
	  echo "<form action=\"Automatic.php\" method=\"get\">";
	  echo "<input type=\"checkbox\" name=\"check\" value=". $row['id']. ">";
	  echo "<input type=\"submit\" name=\"submit\" style=\"width:100px;\">";
	  echo "</span";
	  echo "</form>";
	  
	  if (isset($_GET['submit'])) {
		echo '<div class="form" id="form3"><br><br><br><br><br><br>
		<Span>Data Updated Successfuly......!!</span></div>';
		$var = $row['id'];
		echo $var;
		$sql = "UPDATE IP1 SET checkedbool=\"True\" WHERE id=". $var .  "" ;



		$database->query($sql);
}
	  
	  
	  if ($row['virustotalbool'] == "True") {
		  $virustotalscan1++;
	  }
	  if ($row['abuseipdbbool'] == "True") {
		  $abuseipscan1++;
	  }
	  if ($row['apilitybool'] == "True") {
		  $apilityscan1++;
	  }
	  if ($row['apilitybool'] == "True") {
		  $myipscan1++;
	  }
	  
	  $daycount++;
	  
	  if ($daycount >= $maxdaycount) {
		  break;
	  }
	  
	  
   }
    echo "</table></div>";


 
	
	
	
	
	
	
   $database->close();
   /*


		//Categories Interpretation Table
		echo "<br><br>";
		echo "<div class=\"normalTable\">";
		echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
		echo "<tr>";
		echo "<td colspan=\"3\" style=\"color:#333 \" bgcolor=\"#00AABB\"><B><center>";
		echo "AbuseIPDB Category Interpretation";
		echo "</center></B></td>";
		echo"</tr>";
		echo "<tr>";
		echo "<td  style=\"color:#00AABB\">";
		echo "<B>ID</B>";
		echo "</td><td  style=\"color:#00AABB\">";
		echo "<B>Title</B>";
		echo "</td><td  style=\"color:#00AABB\">";
		echo "<B>Description</B>";
		echo "</td></tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "3";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Fraud Orders";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Fraudulent orders.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "4";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "DDoS Attack";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Participating in distributed denial-of-service (usually part of botnet).";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "5";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "FTP Brute-Force";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "FTP Brute-Force.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "6";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Ping of Death";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Oversized IP packet.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "7";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Phishing";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Phishing websites and/or email.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "8";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Fraud VoIP";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Fraud VoIP.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "9";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Open Proxy";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Open proxy, open relay, or Tor exit node.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "10";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Web Spam";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Comment/forum spam, HTTP referer spam, or other CMS spam.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "11";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Email Spam";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Spam email content, infected attachments, phishing emails, and spoofed senders (typically via exploited host or SMTP server abuse).";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "12";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Blog Spam";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "CMS blog comment spam.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "13";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "VPN IP";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Conjunctive category.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "14";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Port Scan";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Scanning for open ports and vulnerable services.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "15";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Hacking";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Hacking.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "16";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "SQL Injection";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Attempts at SQL injection.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "17";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Spoofing";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Spoofing.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "18";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Brute-Force";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Credential brute-force attacks on webpage logins and services like SSH, FTP, SIP, SMTP, RDP, etc. This category is seperate from DDoS attacks.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "19";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Bad Web Bot";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Webpage scraping (for email addresses, content, etc) and crawlers that do not honor robots.txt. Excessive requests and user agent spoofing can also be reported here.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "20";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Exploited Host";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Host is likely infected with malware and being used for other attacks or to host malicious content. The host owner may not be aware of the compromise. This category is often used in combination with other attack categories.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "21";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Web App Attack";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Attempts to probe for or exploit installed web applications such as a CMS like WordPress/Drupal, e-commerce solutions, forum software, phpMyAdmin and various other software plugins/solutions.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "22";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "SSH";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Secure Shell (SSH) abuse. Use this category in combination with more specific categories.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "23";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "IoT Targeted";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Abuse was targeted at an Internet of Things type device. Include information about what type of device was targeted in the comments.";
		echo "</font></td>";
		echo "</tr>";
		echo "</table></div>";
		echo "<br><br>";
//First IP Table
require_once('../IPReputation/Automatic/IP1format.php');
echo "<br><br>";

//Weekly Report from the previous year
require_once('../IPReputation/Automatic/IP1weekPrevYear.php');
echo "<br><br>";

//Highlights for IP1
require_once('../IPReputation/Automatic/IP1Highlights.php');
echo "<br><br>";

//Second IP Table
require_once('../IPReputation/Automatic/IP2format.php');
echo "<br><br>";

//Weekly Report from the previous year
require_once('../IPReputation/Automatic/IP2weekPrevYear.php');
echo "<br><br>";

//Highlights for IP2
require_once('../IPReputation/Automatic/IP2Highlights.php');
echo "<br><br>";

//Third IP Table
require_once('../IPReputation/Automatic/IP3format.php');
echo "<br><br>";

//Weekly Report from the previous year
require_once('../IPReputation/Automatic/IP3weekPrevYear.php');
echo "<br><br>";

//Highlights for IP3
require_once('../IPReputation/Automatic/IP3Highlights.php');
echo "<br><br>";
*/
?>