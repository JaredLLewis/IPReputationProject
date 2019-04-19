<!-- This code fast check an IP, database used: Apility.io -->
<!-- Author: Geanina F. Tambaliuc-->

<?php
require_once 'ApilityIPBlacklistFast.php';


//check is there was an error or not
if ($err) {
  echo "cURL Error #:" . $err;
} else {
	
	//create and display the Report table
	if($ok==0 && isset($arr["response"]["0"]))
	{	
		$blacklistApility="IP blacklisted";
	}
	else 
	{	
		$blacklistApility="IP not blacklisted";
	}
}

?>