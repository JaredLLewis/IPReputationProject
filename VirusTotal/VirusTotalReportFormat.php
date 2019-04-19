<!-- This code modifies the VirusTotal report format for display -->
<!-- Author: Geanina F. Tambaliuc-->


<link rel="stylesheet" href="PageFormat.css" type="text/css">
<?php
require_once('URLScanVirusTotal.php');

//print Title and subTitle
echo "<div style=\"display:none\"id=\"urlwrapper1\">";

//print short report table
echo '
<div  class="scroll-window2">
<table border="1" align="center" class="table table-striped table-hover user-list fixed-header" >
<thead>
	<th colspan="2" style="color:black"><div><B><center>VirusTotal Report</center></B></div></th>
</thead>
<tr>
<td style="color:black">URL</td>
<td style="color:black">'.$url.'</td>
</tr>
<tr>
<td style="color:black">Number of Hits</td>
<td style="color:black"><center>'.$hits.'</center></td>
</tr>
<tr>
<td style="color:black">Total Number of Checks</td>
<td style="color:black"><center>'.$checks.'</center></td>
</tr>
	</table></div>';
	
	

$rep=print_r($report,true);
$test=strstr($rep,"scans");
$test2=strstr($test,"[");
$test3=str_replace("[detail] =>"," ",$test2);


//print the VirusTotal Databases table
echo "<br><br>";
$strArray = explode('=>',$test3);
echo "<div  class=\"scroll-window\">";
echo "<table border=\"1\" align=\"center\" class=\"table table-striped table-hover user-list fixed-header\">";
echo "<thead>";
echo "<th colspan=\"2\" style=\"color:black\"><div><B><center>";
echo "VirusTotal Databases";
echo "</center></B></div></th>";
echo"</thead>";
echo "<tr><td style=\"color:black\">";
echo $strArray[0];
echo "</td>";
$index=$api->getTotalNumberOfChecks($report);
$order=3;
while($index>0)
{
	$split=explode(')',$strArray[$order]);
	$split2=explode("site",$split[0]);
	if(sizeof($split2)>1)
	{
		echo "<td style=\"color:black\">";
		echo $split2[0];
		echo " site";
		echo "</td>";
	}
	else
	{
	echo"<td style=\"color:black\">";
	echo $split[0];
	echo"</td>";
	}
	echo "</tr>";
	if($index>1)
	{echo "<tr>";
	echo "<td style=\"color:black\">";
	echo $split[1];
	echo "</td>";}
	$order=$order+3;
	$index=$index-1;
}
echo "</table>";
echo "</div>";
echo "</div>";

?>