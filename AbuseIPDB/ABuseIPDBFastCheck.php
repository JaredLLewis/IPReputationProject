<!-- This code fast checks an IP , database used: AbuseIPDB -->
<!-- Author: Geanina F. Tambaliuc-->

<?php
require_once 'AbuseIPDBFast.php';

if ($err) {
    echo 'Error:' . curl_error($ch);
}
else
{		// create and display the report table
		if(!(isset($arr["0"]["category"]["0"])) && !(isset($arr["category"]["0"])))
		{	
			$blacklistAbuse="IP was not found in our database";
			
		}
		else
		{
			if(isset($arr["category"]["0"]) || isset($arr["0"]["category"]["0"]))
			{
			$blacklistAbuse="IP blacklisted";
			}
		}
}

?>