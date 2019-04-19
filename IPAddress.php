<!-- This code creates the IP Report page -->
<!-- Author: Geanina F. Tambaliuc-->

<link rel="stylesheet" href="TableFormat.css" type="text/css">
<style>
.button {
    background-color: #009CEF; /* Green */
    border: none;
    color: black;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
button:hover {
	
    background-color: #00c4ef;
}

ul {
    list-style-type: none;
    margin: 0;
	text-align: center;
    padding: 0;
    overflow: hidden;
    background-color:#009CEF;
}

li {
	right:500px;
	text-align: center;
	border-right: 1px solid #bbb;
    display:inline;
	cursor: pointer;
}

li a {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
	cursor: pointer;
}

li a:hover {
	cursor: pointer;
    background-color: #00c4ef;
}
div {
	text:black !important;
}
td {
	color:black !important;
	background-color:#f1f2f2 !important;
}

</style>

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
function showVirusTotal() {
	 var x = document.getElementById("wrapper1");
	 var z = document.getElementById("virusTotalButton");
	 if (x.style.display === "none") {
	 x.style.display = "inline-block";
	 z.style.backgroundColor = "#00c4ef";
	 }
	 else {
		x.style.display = "none";
		z.style.backgroundColor = "#009CEF";
	 }
	 
	
	
	
}

function showMyIP() {
	 var x = document.getElementById("wrapper2");
	 var z = document.getElementById("myIPButton");
	 if (x.style.display === "none") {
	 x.style.display = "inline-block";
	 z.style.backgroundColor = "#00c4ef";
	 }
	 else {
		x.style.display = "none";
		z.style.backgroundColor = "#009CEF";
	 }
	 
	
	
	
}
function showApility() {
	 var x = document.getElementById("wrapper3");
	 var z = document.getElementById("apilityButton");
	 if (x.style.display === "none") {
	 x.style.display = "inline-block";
	 z.style.backgroundColor = "#00c4ef";
	 }
	 else {
		x.style.display = "none";
		z.style.backgroundColor = "#009CEF";
	 }
	 
	
	
	
}
function showAbuse() {
	 var x = document.getElementById("wrapper4");
	 var z = document.getElementById("abuseButton");
	 if (x.style.display === "none") {
	 x.style.display = "inline-block";
	 z.style.backgroundColor = "#00c4ef";
	 }
	 else {
		x.style.display = "none";
		z.style.backgroundColor = "#009CEF";
	 }
	 
	
	
	
}
function showShodan() {
	 var x = document.getElementById("wrapper5");
	 var z = document.getElementById("shodanButton");
	 if (x.style.display === "none") {
	 x.style.display = "inline-block";
	 z.style.backgroundColor = "#00c4ef";
	 }
	 else {
		x.style.display = "none";
		z.style.backgroundColor = "#009CEF";
	 }
	 
	
	
	
}
function showCensys() {
	 var x = document.getElementById("wrapper6");
	 var z = document.getElementById("censysButton");
	 if (x.style.display === "none") {
		 	
	 x.style.display = "inline-block";
	 z.style.backgroundColor = "#00c4ef";
	 }
	 else {
		x.style.display = "none";
		z.style.backgroundColor = "#009CEF";
	 }
	 
	
	
	
}
</script>
<html>
<body style="color: black;background-color: #f1f2f2">
<button onclick="window.location.href='index.php'" class="button">Home Page</button>
<font color="black" size="10" face="algerian"><center>IP Address Report<br></center></font>
<ul>
  <li><a onclick="showVirusTotal()" class="active" id="virusTotalButton">Virus Total</a></li>
  <li><a onclick="showMyIP()" id="myIPButton">MyIP</a></li>
  <li><a onclick="showApility()" id="apilityButton">Apility</a></li>
  <li><a onclick="showAbuse()" id="abuseButton">AbuseIPDB</a></li>
  <li><a onclick="showShodan()" id="shodanButton">Shodan</a></li>
  <li><a onclick="showCensys()" id="censysButton">Censys</a></li>

</ul>
</body>
</html>
<?php 

//VirusTotal Report
require_once('VirusTotal/IPAddress.php');

echo "<br><br>";

//MyIP.MS Report
require_once('MyIP/myIPFormat.php');
echo "<br><br>";

//Apility.io Report
require_once('Apility/ApilityIPFormat.php');
echo "<br><br>";

//AbuseIPDB Report
require_once('AbuseIPDB/ABuseIPDBFormat.php');
echo "<br><br>";

//Shodan Report
require_once('Shodan/ShodanFormat.php');
echo "<br><br>";

//Censys Report
require_once('Censys/CensysFormat.php');


?>