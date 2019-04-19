<!-- This code validates the users input -->
<!-- Author: Geanina F. Tambaliuc-->
<?php
$input=$_GET["ip"];
$url=$input;
$ip=$input;
$domain=$input;
$check="";

//Check if the input is an IP
if (filter_var($ip, FILTER_VALIDATE_IP)) {
	$check="ip";
	header("Location: IPAddress.php?ip=$ip");
	}
else
{
	//Check if the input is a valid url
	if (filter_var($url, FILTER_VALIDATE_URL)) {
    $check="url";
	header("Location: DomainReport.php?domain=$ip");
	}
	else {
		//Check if the input is a domain
		if(filter_var(gethostbyname($domain), FILTER_VALIDATE_IP))
		{
			$check="domain";
			header("Location: DomainReport.php?domain=$ip");
		}
		else
		{
			$check="invalid";
			header("Location: IPReputationMain.html?error");
		}
   
	}
}

?>