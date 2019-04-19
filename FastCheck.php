<!-- This code fast checks an IP, URL or domain -->
<!-- Author: Geanina F. Tambaliuc-->
<?php

require_once('CheckInput.php');
$stringValidation="";

if($check=="url")
{   
    //Calling the VirusTotal
	require_once('VirusTotal/FastCheckVirusTotal.php');


	//memorise the total # of Hits and Checks
	$totalHits=(int)$hits;
	$totalChecks=(int)$checks;
	
	if($totalHits!=-1)
		if($totalHits>1) $stringValidation="Your URL is NOT safe! (This URL was reportated in ".$hits." out of ".$checks.")";
		else $stringValidation="Your URL is safe!";
	else $stringValidation="Your URL is not in our database or you reached the 4 request/minute limitation";
	
}
else if($check=="ip")
{
	//VirusTotal Report
	require_once('VirusTotal/FastCheckVirusTotal.php'); 
	$totalHitsVirusTotal=(int)$hits;

	//MyIP.MS Report
	require_once('MyIP/FastCheckMyIP.php');
	$hitsMyIP=$blacklist;

	//Apility.io Report
	require_once('Apility/ApilityIPFastCheck.php');
	$hitsApility=$blacklistApility;

	//AbuseIPDB Report
	require_once('AbuseIPDB/ABuseIPDBFastCheck.php');
	
	$hitsAbuse=$blacklistAbuse;
	
	if($totalHitsVirusTotal>0 || $hitsMyIP=="yes" || $hitsApility=="IP blacklisted" || $hitsAbuse=="IP blacklisted")
	{
		
		$stringValidation="Your IP is NOT safe! (Your IP was blacklisted in the following main databases: ";
		if($totalHitsVirusTotal>0)
			$stringValidation=$stringValidation."VirusTotal";
		if($hitsMyIP=="yes")
			$stringValidation=$stringValidation." MyIP.MS";
		if($hitsApility=="IP blacklisted")
			$stringValidation=$stringValidation." Apility.IO";
		if($hitsAbuse=="IP blacklisted")
			$stringValidation=$stringValidation." AbuseIPDB";
		$stringValidation=$stringValidation.")";
	}
	else
	{
		$stringValidation="Your IP is safe! (Your IP is not blacklisted in our database)";
	}
	
	
}
else if($check=="domain")
{
	//VirusTotal Report
	require_once('VirusTotal/FastCheckVirusTotal.php'); 
	$totalHitsVirusTotal=(int)$hits;
	
	//Apility.io Report
	require_once('Apility/ApilityDomainFastCheck.php');
	$hitsApility=(int)$score; //negative score means that is not safe
	
	
	
	if($totalHitsVirusTotal>0 || $hitsApility<0)
	{
		$stringValidation="Your domain is NOT safe! (Your domain was blacklisted in the following main databases: ";
		
		if($totalHitsVirusTotal>0)
			$stringValidation=$stringValidation." VirusTotal";
		if($hitsApility<0)
			$stringValidation=$stringValidation." Apility.io";
		$stringValidation=$stringValidation.")";
	}
	else
	{
		$stringValidation="Your domain is safe! (Your domain is not blacklisted in our database)";
	}
	
}
else if($check=="invalid")
{
	$stringValidation="Your input is NOT VALID! Please check the format of your input. If you keeep getting this error, then your input is not active in the Domain Name Servers. Therefore it cannot be checked.";
}

?>
<link rel="stylesheet" href="TabDesign.css" type="text/css">
<style>

</style>
<html>
<head>
<script src="jquery-3.4.0.min.js"></script>
<title>Automated IP Reputation Analyzer</title>
</head>

<body>
<br><br><br>
<h1><center>Automated IP Reputation Analyzer</center></h1>

<script type="text/javascript" src="controlTabs.js"></script>
<div class="form-wrap">
		<div class="tabs">
			<h3 class="home-tab"><a class="active" href="#home-tab-content">Home</a></h3>
			<h3 class="history-tab"><a href="#history-tab-content">History</a></h3>
			<h3 class="machine-tab"><a href="#machine-tab-content">Machine Learning</a></h3>
		</div><!--.tabs-->

		<div class="tabs-content">
			<div id="home-tab-content" class="active">
				<form class="home-form" name=f1 method="get" action="FastCheck.php">
					<input type="text" class="input" name="ip" style="" placeholder="Input an IP, URL, or Domain" required="required" />
					<input type="submit" class="button" value="Fast Check"  onclick="this.form.target='';return true;">
					<input type="submit" class="button" value="Detailed Report" onclick="f1.action='DRCheckInput.php';  return true;">
				</form><!--.home-form-->
				
				<div class="help-text">
					 <p><font color="#009CEF" size="4"><I><B><?= $stringValidation?></B></I></font></p>
					
				</div><!--.validation-text-->
				<div class="help-text">
					<p>Authors: Geanina Florentina Tambaliuc, Jared Lee Lewis <br>
					Made with: VirusTotal, Shodan, MyIP.MS, Censys, Apility.io, AbuseIPDB, Codepen.io</p>
				</div><!--.author-text-->
			</div><!--.home-tab-content-->

			<div id="history-tab-content">
				<form class="history-form" action="Automatic.php" method="post">
				<center><input type="submit" class="button" value="History"></center>

					
				</form><!--.history-form-->
			</div><!--.history-tab-content-->
			
			<div id="machine-tab-content">
				<form class="machine-form" action="" method="get" name=f2>
									<input type="text" class="input" name="ip" placeholder="Input an IP, URL, or Domain" required="required" />
					<center><input type="submit" class="button" value="Check Domain Or IP" onclick="f2.action='DRCheckInput2.php';  return true;"></center>
					
				</form><!--.machine-form-->
			</div><!--.machine-tab-content-->
		</div><!--.tabs-content-->
	</div><!--.form-wrap-->

</body>
</html>
