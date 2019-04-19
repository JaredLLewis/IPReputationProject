<!-- This code modifies the domain report format , database used: MyIP.ms -->
<!-- Author: Geanina F. Tambaliuc-->

<?php
echo "<div style=\"display:none\"id=\"domainwrapper1\">";
require_once 'myIPDomain.php';

	//Check if there was an error or not
	if (isset($arr["status"]) && $arr["status"] == "error")
	{
		echo "Error! ".(isset($arr["error_desc"])?$arr["error_desc"]:"");
	}
	else
	{
		//Create and print the details table
		
		echo "<div class=\"normalTable\">";
		echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
		echo "<tr>";
		echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
		echo "MyIP.MS Details";
		echo "</center></B></td>";
		echo"</tr>";
		if(isset($arr["website"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Website: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["website"];
			echo "</td></tr>";
		}
		if (isset($arr["owners"]["owner"]["ownerName"])) 
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Owner: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["owners"]["owner"]["ownerName"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Address: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["owners"]["owner"]["address"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Country: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["owners"]["owner"]["countryName"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Phone: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["owners"]["owner"]["phone"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Owner Range: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["owners"]["owner"]["range"];
			echo "</td></tr>";
			
		}
		if (isset($arr["owners"]["parent_owner"]["ownerName"])) 
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Parent Owner: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["owners"]["parent_owner"]["ownerName"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Address: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["owners"]["parent_owner"]["address"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Country: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["owners"]["parent_owner"]["countryName"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Owner Range: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["owners"]["parent_owner"]["range"];
			echo "</td></tr>";
		}
		if (isset($arr["owners"]["top_parent_owner"]["ownerName"])) 
		{ 	
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Top Parent Owner: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["owners"]["top_parent_owner"]["ownerName"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Address: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["owners"]["top_parent_owner"]["address"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Country: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["owners"]["top_parent_owner"]["countryName"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Owner Range: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["owners"]["top_parent_owner"]["range"];
			echo "</td></tr>";
		}
		if(isset($arr["ip_address"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "IP Address: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["ip_address"];
			echo "</td></tr>";
		}
		if(isset($arr["ipv6_address"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "IP V6 Address: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["ipv6_address"];
			echo "</td></tr>";
		}
		if(isset($arr["owners"]["owner"]["cidr"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Cidr: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["owners"]["owner"]["cidr"];
			echo "</td></tr>";
		}
		if(isset($arr["popularity"]["rank"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Popularity Rank: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["popularity"]["rank"];
			echo "</td></tr>";
		}
		if(isset($arr["popularity"]["text"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Visitors: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["popularity"]["text"];
			echo "</td></tr>";
		}
		if(isset($arr["reverse_dns"]["host"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Host: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["reverse_dns"]["host"];
			echo "</td></tr>";
		}
		if(isset($arr["reverse_dns"]["topHost"]["topHostName"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Top Host Name: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["reverse_dns"]["topHost"]["topHostName"];
			echo "</td></tr>";
		}
		
		if(isset($arr["reverse_dns"]["topHost"]["text"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Sites: ";
			echo "</td><td style=\"color:white\">";
			echo $arr["reverse_dns"]["topHost"]["text"];
			echo "</td></tr>";
		}
		echo "</table></div>";
		echo "<br><br>";
		
		if(isset($arr["dns"]["0"]["nameserver"]))
		{
			echo "<div class=\"normalTable\">";
			echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
			echo "<tr>";
			echo "<td colspan=\"4\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
			echo "MyIP.MS DNS Details";
			echo "</center></B></td>";
			echo"</tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Name Server: ";
			echo "</td>";
			echo "<td style=\"color:#00AABB\">";
			echo "IP Address: ";
			echo "</td>";
			echo "<td style=\"color:#00AABB\">";
			echo "Country ID: ";
			echo "</td>";
			echo "<td style=\"color:#00AABB\">";
			echo "Country Name: ";
			echo "</td></tr>";
			$index=0;
			while(isset($arr["dns"][(string)$index]["nameserver"]))
			{
				echo "<tr>";
				echo "<td style=\"color:white\">";
				echo $arr["dns"][(string)$index]["nameserver"];
				echo "</td>";
				echo "<td style=\"color:white\">";
				echo $arr["dns"][(string)$index]["ip_address"];
				echo "</td>";
				echo "<td style=\"color:white\">";
				echo $arr["dns"][(string)$index]["countryID"];
				echo "</td>";
				echo "<td style=\"color:white\">";
				echo $arr["dns"][(string)$index]["countryName"];
				echo "</td></tr>";
				$index=$index+1;
				
			}
			echo "</table></div>";
			
			
			
		}
		echo "<br><br>";
			
			// IP Change History
			
		if(isset($arr["ip_change_history"]["0"]["ip_address"]))
		{
			echo "<div class=\"normalTable\">";
			echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
			echo "<tr>";
			echo "<td colspan=\"3\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
			echo "MyIP.MS IP Change History";
			echo "</center></B></td>";
			echo"</tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "IP Address: ";
			echo "</td>";
			echo "<td style=\"color:#00AABB\">";
			echo "Host: ";
			echo "</td>";
			echo "<td style=\"color:#00AABB\">";
			echo "Date: ";
			echo "</td></tr>";
			$index=0;
			while(isset($arr["ip_change_history"][(string)$index]["ip_address"]))
			{
				echo "<tr>";
				echo "<td style=\"color:white\">";
				echo $arr["ip_change_history"][(string)$index]["ip_address"];
				echo "</td>";
				echo "<td style=\"color:white\">";
				echo $arr["ip_change_history"][(string)$index]["host"];
				echo "</td>";
				echo "<td style=\"color:white\">";
				echo $arr["ip_change_history"][(string)$index]["date_when_website_was_using_ip"];
				echo "</td></tr>";
				$index=$index+1;
				
			}
			echo "</table></div>";
			
			
			
			
		}
	}
	echo "</div>";
	
	
	
?>