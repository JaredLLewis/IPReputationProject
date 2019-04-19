<!-- This code creates the URL Fast Check page -->
<!-- Author: Geanina F. Tambaliuc-->
<?php

//Calling the VirusTotal and URLVoid files
require_once('VirusTotal\URLScanVirusTotal.php');


//memorise the total # of Hits and Checks
$totalHits=(int)$hits;
$totalChecks=(int)$checks+35;
?>

<!-- Printing the Short Report -->

<div class="urlReport">
	<br><br><br><br><br><br><br>
	<font color="#2ecc71" size="8"><center>This URL was rated unsafe in <?= $totalHits?> DB out of <?= $totalChecks?></center></font> <br>
	<font color="white"> <I><center>*Note: If the score is -1/-1 then the URL is NOT Valid or is NOT in the Database!</I></font>
<?php
if ($totalHits > 0) {
	echo '<font color="white" size="10" face="algerian"><center>The URL is BAD<br></center></font>';
}
else {
	echo '<font color="white" size="10" face="algerian"><center>The URL is Good<br></center></font>';
}
?>	
</div>