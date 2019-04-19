<!-- This code creates the Domain Report page -->
<!-- Author: Geanina F. Tambaliuc-->

<link rel="stylesheet" href="TableFormat.css" type="text/css">
<link rel="stylesheet" href="PageFormat.css" type="text/css">
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
function showMyIP() {
	 var x = document.getElementById("domainwrapper1");
	 var z = document.getElementById("myIPButton");
	 if (x.style.display === "none") {
	 x.style.display = "block";
	 z.style.backgroundColor = "#00c4ef";
	 }
	 else {
		x.style.display = "none";
		z.style.backgroundColor = "#009CEF";
	 }
	 
	
	
	
}
function showApility() {
	 var x = document.getElementById("domainwrapper2");
	 var z = document.getElementById("apilityButton");
	 if (x.style.display === "none") {
	 x.style.display = "block";
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
<button onclick="window.location.href='IPReputationMain.html'" class="button">Home Page</button>
<font color="black" size="10" face="algerian"><center>Domain Report<br></center></font>
<ul>
  <li><a onclick="showMyIP()" id="myIPButton">MyIP</a></li>
  <li><a onclick="showApility()" id="apilityButton" >Apility</a></li>

</ul>
</body>
</html>



<?php

 //Print Title
  echo "<br><br>";
  
  //myIp Report
  require_once('MyIP/myIPDomainFormat.php');
  echo "<br>";
  
  //Apility Report
  require_once('Apility/ApilityDomainFormat.php');
  echo "<br>";

?>