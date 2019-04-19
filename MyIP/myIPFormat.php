<!-- This code modifies the ip report format , database used: MyIP.ms -->
<!-- Author: Geanina F. Tambaliuc-->

<?php
require_once 'myIP.php';

	// Check if there was an error or not
	if (isset($arr["status"]) && $arr["status"] == "error")
	{
		echo "Error! ".(isset($arr["error_desc"])?$arr["error_desc"]:"");
	}
	else
	{
		// create and display the details table
		echo "<div style=\"display:none\" id=\"wrapper2\">";
		echo "<div class=\"normalTable\">";
		echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
		echo "<tr>";
		echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
		echo "MyIP.MS Details";
		echo "</center></B></td>";
		echo"</tr>";
		if(isset($arr["ip_address"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "IP Address: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["ip_address"];
			echo "</td></tr>";
		}
		if (isset($arr["owners"]["owner"]["ownerName"])) 
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Owner: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["owners"]["owner"]["ownerName"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Address: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["owners"]["owner"]["address"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Country: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["owners"]["owner"]["countryName"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Phone: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["owners"]["owner"]["phone"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Owner Range: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["owners"]["owner"]["range"];
			echo "</td></tr>";
			
		}
		if (isset($arr["owners"]["parent_owner"]["ownerName"])) 
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Parent Owner: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["owners"]["parent_owner"]["ownerName"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Address: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["owners"]["parent_owner"]["address"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Country: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["owners"]["parent_owner"]["countryName"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Owner Range: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["owners"]["parent_owner"]["range"];
			echo "</td></tr>";
		}
		if (isset($arr["owners"]["top_parent_owner"]["ownerName"])) 
		{ 	
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Top Parent Owner: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["owners"]["top_parent_owner"]["ownerName"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Address: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["owners"]["top_parent_owner"]["address"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Country: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["owners"]["top_parent_owner"]["countryName"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Owner Range: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["owners"]["top_parent_owner"]["range"];
			echo "</td></tr>";
		}
		
		if(isset($arr["owners"]["owner"]["cidr"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Cidr: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["owners"]["owner"]["cidr"];
			echo "</td></tr>";
		}
		
		if(isset($arr["ip_blacklist"]["blacklist"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Blacklist: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["ip_blacklist"]["blacklist"];
			echo "</td></tr>";
		}
		echo "</table></div>";
		echo "<br><br>";
		
		if(isset($arr["dns_on_ip"]["0"]["nameserver"]))
		{
			echo "<div class=\"normalTable\">";
			echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
			echo "<tr>";
			echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
			echo "MyIP.MS DNS Details";
			echo "</center></B></td>";
			echo"</tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Name Server: ";
			echo "</td>";
			echo "<td style=\"color:#00AABB\">";
			echo "Sites: ";
			echo "</td></tr>";
			$index=0;
			while(isset($arr["dns_on_ip"][(string)$index]["nameserver"]))
			{
				echo "<tr>";
				echo "<td style=\"color:black\">";
				echo $arr["dns_on_ip"][(string)$index]["nameserver"];
				echo "</td>";
				echo "<td style=\"color:black\">";
				echo $arr["dns_on_ip"][(string)$index]["sites"];
				echo "</td></tr>";
				$index=$index+1;
				
			}
			echo "</table></div>";
			
			
			
		}
		echo "<br><br>";
			
			// IP Statistics
			
		if(isset($arr["statistics"]))
		{
			echo "<div class=\"normalTable\">";
			echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
			echo "<tr>";
			echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
			echo "MyIP.MS IP Statistics";
			echo "</center></B></td>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Total Websites on IP Now: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["statistics"]["total_websites_on_ip_now"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Total Websites on IP Before: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["statistics"]["total_websites_on_ip_before"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Total Not Working Websites on IP: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["statistics"]["total_not_working_websites_on_ip"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Total DNS on IP: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["statistics"]["total_dns_on_ip"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Total OS on IP: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["statistics"]["total_os_on_ip"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Total Browsers on IP: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["statistics"]["total_browsers_on_ip"];
			echo "</td></tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Total User Agents on IP: ";
			echo "</td><td style=\"color:black\">";
			echo $arr["statistics"]["total_useragents_on_ip"];
			echo "</td></tr>";
			echo "</table></div>";
			echo "<br><br>";
			
		}
		if(strcmp($arr["statistics"]["total_websites_on_ip_now"],"0")!=0)
		{
			
			echo "<div class=\"normalTable\">";
			echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
			echo "<tr>";
			echo "<td colspan=\"3\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
			echo "MyIP.MS Websites on IP Now";
			echo "</center></B></td>";
			echo"</tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Website ";
			echo "</td>";
			echo "<td style=\"color:#00AABB\">";
			echo "Rank ";
			echo "</td>";
			echo "<td style=\"color:#00AABB\">";
			echo "Visitors ";
			echo "</td></tr>";
			
			$index=0;
			while(isset($arr["websites_on_ip_now"][(string)$index]["website"]))
			{
				echo "<tr>";
				echo "<td style=\"color:black\">";
				echo $arr["websites_on_ip_now"][(string)$index]["website"];
				echo "</td>";
				echo "<td style=\"color:black\">";
				echo $arr["websites_on_ip_now"][(string)$index]["rank"];
				echo "</td>";
				echo "<td style=\"color:black\">";
				echo $arr["websites_on_ip_now"][(string)$index]["text"];
				echo "</td></tr>";
				$index=$index+1;
			}
			echo "</table></div>";
			echo "<br><br>";
		}
		if(strcmp($arr["statistics"]["total_websites_on_ip_before"],"0")!=0)
		{
			echo "<div class=\"normalTable\">";
			echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
			echo "<tr>";
			echo "<td colspan=\"5\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
			echo "MyIP.MS Websites on IP Before";
			echo "</center></B></td>";
			echo"</tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Website ";
			echo "</td>";
			echo "<td style=\"color:#00AABB\">";
			echo "Rank ";
			echo "</td>";
			echo "<td style=\"color:#00AABB\">";
			echo "Visitors ";
			echo "</td>";
			echo "<td style=\"color:#00AABB\">";
			echo "Date When Website Was Using IP";
			echo "</td>";
			echo "<td style=\"color:#00AABB\">";
			echo "Date When Website Changed IP ";
			echo "</td></tr>";
			
			$index=0;
			while(isset($arr["websites_on_ip_before"][(string)$index]["website"]))
			{
				echo "<tr>";
				echo "<td style=\"color:black\">";
				echo $arr["websites_on_ip_before"][(string)$index]["website"];
				echo "</td>";
				echo "<td style=\"color:black\">";
				echo $arr["websites_on_ip_before"][(string)$index]["rank"];
				echo "</td>";
				echo "<td style=\"color:black\">";
				echo $arr["websites_on_ip_before"][(string)$index]["text"];
				echo "</td>";
				echo "<td style=\"color:black\">";
				echo $arr["websites_on_ip_before"][(string)$index]["date_when_website_was_using_ip"];
				echo "</td>";
				echo "<td style=\"color:black\">";
				echo $arr["websites_on_ip_before"][(string)$index]["date_when_found_that_website_changed_ip"];
				echo "</td></tr>";
				$index=$index+1;
			}
			echo "</table></div>";
			echo "<br><br>";
			echo "</div>";
		}
	}
	
	
	
	
?>