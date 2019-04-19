<!-- This code modifies the Shodan report format for display -->
<!-- Author: Geanina F. Tambaliuc-->

<?php
//require the connection file
require_once 'shodan.php';

	//check if there was an error or not
	if ($error) 
	{
		echo 'Error:' . curl_error($ch);
	}
	else
	{
		// check if the location details are in the report
		if(isset($arr["data"]["0"]["location"]))
		{
			//create the location details table
			echo "<div style=\"display:none\" id=\"wrapper5\">";
			echo "<div class=\"normalTable\">";
			echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
			echo "<tr>";
			echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
			echo "Shodan Location Details";
			echo "</center></B></td>";
			echo"</tr>";
			if(isset($arr["data"]["0"]["location"]["city"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "City: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["data"]["0"]["location"]["city"];
				echo "</td></tr>";
			}
			if(isset($arr["data"]["0"]["location"]["region_code"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Region Code: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["data"]["0"]["location"]["region_code"];
				echo "</td></tr>";
			}
			if(isset($arr["data"]["0"]["location"]["longitude"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Longitude: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["data"]["0"]["location"]["longitude"];
				echo "</td></tr>";
			}
			if(isset($arr["data"]["0"]["location"]["latitude"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Latitude: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["data"]["0"]["location"]["latitude"];
				echo "</td></tr>";
			}
			if(isset($arr["data"]["0"]["location"]["coutry_code"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Country Code: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["data"]["0"]["location"]["coutry_code"];
				echo "</td></tr>";
			}
			if(isset($arr["data"]["0"]["location"]["coutry_name"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Country Name: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["data"]["0"]["location"]["coutry_name"];
				echo "</td></tr>";
			}
			if(isset($arr["data"]["0"]["location"]["postal_code"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Postal Code: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["data"]["0"]["location"]["postal_code"];
				echo "</td></tr>";
			}
			if(isset($arr["data"]["0"]["location"]["dma_code"]))
			{
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "DMA Code: ";
				echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
				echo $arr["data"]["0"]["location"]["dma_code"];
				echo "</td></tr>";
			}
			echo "</table></div><br><br>";
		}
		
		// creating the Port details tables for each port
		$index=0;
			while(isset($arr["data"][(string)$index]))
			{
				echo "<div class=\"normalTable\">";
				echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
				echo "<tr>";
				echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
				echo "Shodan ".$arr["data"][(string)$index]["port"]." Port Details";
				echo "</center></B></td>";
				echo"</tr>";
			if(isset($arr["data"][(string)$index]["info"]))
				{
					echo "<tr>";
					echo "<td style=\"color:#00AABB\">";
					echo "Info: ";
					echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
					echo $arr["data"][(string)$index]["info"];
					echo "</td></tr>";
				}
			if(isset($arr["data"][(string)$index]["port"]))
				{
					echo "<tr>";
					echo "<td style=\"color:#00AABB\">";
					echo "Port: ";
					echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
					echo $arr["data"][(string)$index]["port"];
					echo "</td></tr>";
				}
			if(isset($arr["data"][(string)$index]["hash"]))
				{
					echo "<tr>";
					echo "<td style=\"color:#00AABB\">";
					echo "Hash: ";
					echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
					echo $arr["data"][(string)$index]["hash"];
					echo "</td></tr>";
				}
			if(isset($arr["data"][(string)$index]["org"]))
				{
					echo "<tr>";
					echo "<td style=\"color:#00AABB\">";
					echo "Organization: ";
					echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
					echo $arr["data"][(string)$index]["org"];
					echo "</td></tr>";
				}
			if(isset($arr["data"][(string)$index]["isp"]))
				{
					echo "<tr>";
					echo "<td style=\"color:#00AABB\">";
					echo "Internet Service Provider: ";
					echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
					echo $arr["data"][(string)$index]["isp"];
					echo "</td></tr>";
				}	
			if(isset($arr["data"][(string)$index]["asn"]))
				{
					echo "<tr>";
					echo "<td style=\"color:#00AABB\">";
					echo "ASN: ";
					echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
					echo $arr["data"][(string)$index]["asn"];
					echo "</td></tr>";
				}
			if(isset($arr["data"][(string)$index]["data"]))
				{
					echo "<tr>";
					echo "<td style=\"color:#00AABB\">";
					echo "Data: ";
					echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
					echo $arr["data"][(string)$index]["data"];
					echo "</td></tr>";
				}
			if(isset($arr["data"][(string)$index]["ssh"]["mac"]))
				{
					echo "<tr>";
					echo "<td style=\"color:#00AABB\">";
					echo "SSH Mac: ";
					echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
					echo $arr["data"][(string)$index]["ssh"]["mac"];
					echo "</td></tr>";
				}
			if(isset($arr["data"][(string)$index]["ssh"]["cipher"]))
				{
					echo "<tr>";
					echo "<td style=\"color:#00AABB\">";
					echo "SSH Cipher: ";
					echo "</td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
					echo $arr["data"][(string)$index]["ssh"]["cipher"];
					echo "</td></tr>";
				}	
			echo "</table></div><br><br>";
			$index=$index+1;
			}
			
			//creating the hostnames and vulnerability table
			if(isset($arr["hostnames"]["0"]) || isset($arr["vulns"]["0"]) )
			{
				echo "<div class=\"normalTable\">";
				echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
				echo "<tr>";
				echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
				echo "Shodan Hostname & Vulnerability Details";
				echo "</center></B></td>";
				echo"</tr>";
				if(isset($arr["hostnames"]["0"]))
				{
					echo "<tr>";
					echo "<td style=\"color:#00AABB\"><center>";
					echo "Hostnames: ";
					echo "</center></td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
					$index=0;
					while(isset($arr["hostnames"][(string)$index]))
					{
					   echo $arr["hostnames"][(string)$index];
					   echo "<br>";
					   $index=$index+1;
					}
					echo "</td></tr>";
				}
				if(isset($arr["vulns"]["0"]))
				{
					echo "<tr>";
					echo "<td style=\"color:#00AABB\"><center>";
					echo "Vulnerabilities: ";
					echo "</center></td><td style=\"word-wrap: break-word\" ><font color=\"black\">";
					$index=0;
					while(isset($arr["vulns"][(string)$index]))
					{
					   echo $arr["vulns"][(string)$index];
					   echo "<br>";
					   $index=$index+1;
					}
					echo "</td></tr>";
				}
				echo "</table></div><br><br>";
				echo "</div>";
			}
	}
?>