<!-- This code modifies the URLVoid report format for display -->
<!-- Author: Geanina F. Tambaliuc-->

<link rel="stylesheet" href="TableFormat.css" type="text/css">

<?php
 require_once('UrlVoidFormat.php');
 ?>
 

<!-- Printing the URLVoid Details Table-->
 <div  class="scroll-window">
 <table border="1" align="center" class="table table-striped table-hover user-list fixed-header">
	<thead>
	<th colspan="2" style="color:white"><div><B><center>URLVoid Details</center></B></div></th>
	</thead>
	<tr>
		<td style="color:white">Host</td>
		<td style="color:white"><center><?=$hostPrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Updated</td>
		<td style="color:white"><center><?=$updatedPrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Http Response Code</td>
		<td style="color:white"><center><?=$httpPrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Domain Age</td>
		<td style="color:white"><center><?=$agePrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Google Page Rank</td>
		<td style="color:white"><center><?=$googleRankPrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Alexa Rank</td>
		<td style="color:white"><center><?=$alexaRankPrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Connect Time</td>
		<td style="color:white"><center><?=$connectTimePrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Header Size</td>
		<td style="color:white"><center><?=$headerSizePrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Download Size</td>
		<td style="color:white"><center><?=$downloadSizePrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Speed Download</td>
		<td style="color:white"><center><?=$speedDownloadPrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">IP Adress</td>
		<td style="color:white"><center><?=$ipPrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Hostname</td>
		<td style="color:white"><center><?=$hostnamePrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">ASN</td>
		<td style="color:white"><center><?=$asnPrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">ASN Name</td>
		<td style="color:white"><center><?=$asnNamePrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Country Code</td>
		<td style="color:white"><center><?=$countryCodePrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Country Name</td>
		<td style="color:white"><center><?=$countryNamePrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Region Name</td>
		<td style="color:white"><center><?=$regionNamePrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">City Name</td>
		<td style="color:white"><center><?=$cityPrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Continent Code</td>
		<td style="color:white"><center><?=$continentCodePrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Continent Name</td>
		<td style="color:white"><center><?=$continentNamePrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Latitude</td>
		<td style="color:white"><center><?=$latitudePrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Longitude</td>
		<td style="color:white"><center><?=$longitudePrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Detections</td>
		<td style="color:white"><center><?=$detectionsPrint?></center></td>
	</tr>
	<tr>
		<td style="color:white">Checks</td>
		<td style="color:white"><center>35</center></td>
	</tr>
	</table>
 </div>