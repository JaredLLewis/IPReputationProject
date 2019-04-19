<!-- This code fast check a domain , database used: Apility.io -->
<!-- Author: Geanina F. Tambaliuc-->

<?php
require_once 'ApilityDomainFast.php';

//check if there was an error or not
if ($err) {
  echo "cURL Error #:" . $err;
} 
else {
	// check if the score is present in the report
	if(isset($arr["response"]["score"]))
	{	
		
		$score=$arr["response"]["score"];
		
	}
}
?>