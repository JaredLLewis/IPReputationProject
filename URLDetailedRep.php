<!-- This code creates the URL Detailed Report page -->
<!-- Author: Geanina F. Tambaliuc-->

<link rel="stylesheet" href="TableFormat.css" type="text/css">
<style>
.button {
    background-color: #00AABB; /* Green */
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
    background-color: #1aecff;
}

ul {
    list-style-type: none;
    margin: 0;
	text-align: center;
    padding: 0;
    overflow: hidden;
    background-color:#00AABB
}

li {
	right:500px;
	text-align: center;
    display:inline;
}

li a {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #1aecff;
}
</style>

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
function showVirusTotal() {
	 var x = document.getElementById("urlwrapper1");
	 var z = document.getElementById("virusTotalButton");
	 if (x.style.display === "none") {
	 x.style.display = "block";
	 z.style.backgroundColor = "#1aecff";
	 }
	 else {
		x.style.display = "none";
		z.style.backgroundColor = "#00AABB";
	 }
}
	 
	

</script>
<html>
<button onclick="window.location.href='http://127.0.0.1/IPReputation2/IPReputation2/IPReputation.html'" class="button">Home Page</button>
<font color="white" size="10" face="algerian"><center>Domain Report<br></center></font>
<font color="grey" size="5"><center>Note: If the number of hits is -1 then the URL is NOT valid!<br><br></center></font>

<ul>
  <li><a onclick="showVirusTotal()" id="virusTotalButton" href="#news">VirusTotal</a></li>

</ul>
</html>
<br><br>

<?php 

//Calling the VirusTotal and UrlVoid files
require_once('VirusTotal\VirusTotalReportFormat.php');



?>
