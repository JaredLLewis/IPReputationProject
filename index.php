<link rel="stylesheet" href="TabDesign.css" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<html>
<head>
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
				<form class="home-form" name=f1 method="get" action="FastCheck.php" target="_blank">
					<input type="text" class="input" name="ip" placeholder="Input an IP, URL, or Domain" required="required" />
					<input type="submit" class="button" value="Fast Check"  onclick="this.form.target='';return true;">
					<input type="submit" class="button" value="Detailed Report" onclick="f1.action='DRCheckInput.php';  return true;">
				</form><!--.home-form-->
				<div class="help-text">
					<p>Authors: Geanina Florentina Tambaliuc, Jared Lee Lewis <br>
					Made with: VirusTotal, Shodan, MyIP.MS, Censys, Apility.io, AbuseIPDB, Codepen.io</p>
				</div><!--.author-text-->
			</div><!--.home-tab-content-->

			<div id="history-tab-content">
				<form class="history-form" action="Automatic.php" method="get" target="_blank">
				<center><input type="submit" class="button" value="History"></center>

					
				</form><!--.history-form-->
			</div><!--.history-tab-content-->
			
			<div id="machine-tab-content">
				<form class="machine-form" action="" method="get" name=f2 target="_blank">
									<input type="text" class="input" name="ip" placeholder="Input an IP, URL, or Domain" required="required" />
					<center><input type="submit" class="button" value="Check Domain Or IP" onclick="f2.action='DRCheckInput2.php';  return true;"></center>
					
				</form><!--.machine-form-->
			</div><!--.machine-tab-content-->
		</div><!--.tabs-content-->
	</div><!--.form-wrap-->

</body>
</html>