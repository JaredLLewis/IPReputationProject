<!-- This code modifies the IP report format , database used: Censys -->
<!-- Author: Geanina F. Tambaliuc-->
<html>
<p>test 1 </p>
</html>
<?php
require_once 'Censys.php';

	//check if there was an error or not
	if ($error) 
	{
		echo 'Error:' . curl_error($ch);
	}
	
	else
	{	//create and print the details table
			echo "<div style=\"display:none\" id=\"wrapper6\">";
			echo "<div class=\"normalTable\">";
			echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
			echo "<tr>";
			echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
			echo "Censys Details";
			echo "</center></B></td>";
			echo"</tr>";
			if(isset($arr["ports"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Ports: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				$index=0;
				while(isset($arr["ports"][(string)$index]))
				{
					echo $arr["ports"][(string)$index];
					echo "<br>";
					$index=$index+1;
				}
				echo "</td></tr>";
			}
			if(isset($arr["tags"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Tags: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				$index=0;
				while(isset($arr["tags"][(string)$index]))
				{
					echo $arr["tags"][(string)$index];
					echo "<br>";
					$index=$index+1;
				}
				echo "</td></tr>";
			}
			if(isset($arr["protocols"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Protocols: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				$index=0;
				while(isset($arr["protocols"][(string)$index]))
				{
					echo $arr["protocols"][(string)$index];
					echo "<br>";
					$index=$index+1;
				}
				echo "</td></tr>";
			}
			if(isset($arr["ip"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "IP: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["ip"];
				echo "</td></tr>";
			}
			if(isset($arr["updated_at"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Last Updated: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["updated_at"];
				echo "</td></tr>";
			}
			echo "</table></div><br><br>";
			
			
			//create and display the autonomous_system details table
			echo "<div class=\"normalTable\">";
			echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
			echo "<tr>";
			echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
			echo "Censys Autonomous System Details";
			echo "</center></B></td>";
			echo"</tr>";
			if(isset($arr["autonomous_system"]["description"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Description: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["autonomous_system"]["description"];
				echo "</td></tr>";
			}
			if(isset($arr["autonomous_system"]["rir"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "RIR: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["autonomous_system"]["rir"];
				echo "</td></tr>";
			}
			if(isset($arr["autonomous_system"]["routed_prefix"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Routed Prefix: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["autonomous_system"]["routed_prefix"];
				echo "</td></tr>";
			}
			if(isset($arr["autonomous_system"]["country_code"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Country Code: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["autonomous_system"]["country_code"];
				echo "</td></tr>";
			}
			if(isset($arr["autonomous_system"]["organization"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Organization: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["autonomous_system"]["organization"];
				echo "</td></tr>";
			}
			if(isset($arr["autonomous_system"]["asn"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "ASN: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["autonomous_system"]["asn"];
				echo "</td></tr>";
			}
			if(isset($arr["autonomous_system"]["name"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Name: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["autonomous_system"]["name"];
				echo "</td></tr>";
			}
			if(isset($arr["autonomous_system"]["path"]["0"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Paths: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				$index=0;
				while(isset($arr["autonomous_system"]["path"][(string)$index]))
				{
					echo $arr["autonomous_system"]["path"][(string)$index];
					echo "<br>";
					$index=$index+1;
				}
				echo "</td></tr>";
			}
			echo "</table></div><br><br>";
			echo "</div>";
	}
?>