<!-- This code fast checks an IP, database used: MyIP.ms -->
<!-- Author: Geanina F. Tambaliuc-->

<?php
require_once 'myIPFast.php';

	// Check if there was an error or not
	if (isset($arr["status"]) && $arr["status"] == "error")
	{
		echo "Error! ".(isset($arr["error_desc"])?$arr["error_desc"]:"");
	}
	else
	{	
		$blacklist="IP not in the database";
		if(isset($arr["ip_blacklist"]["blacklist"]))
		{
			$blacklist=$arr["ip_blacklist"]["blacklist"];
		}	
	}	
?>