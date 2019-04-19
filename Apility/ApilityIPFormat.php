<!-- This code modifies the ip report format , database used: Apility.io -->
<!-- Author: Geanina F. Tambaliuc-->
<html>
</html>
<?php
require_once 'ApilityIPBlacklist.php';
require_once 'ApilityGeoIP.php';
//check is there was an error or not
if ($err) {
  echo "cURL Error #:" . $err;
} else {
	
	//create and display the Report table
	echo "<div style=\"display:none\" id=\"wrapper3\">";
	if($ok==0 && isset($arr["response"]["0"]))
	{	
		//blacklisted table
		
		echo "<div class=\"normalTable\">";
		echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
		echo "<tr>";
		echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
		echo "Apility Report";
		echo "</center></B></td>";
		echo"</tr>";
		echo "<tr>";
		echo "<td style=\"color:#00AABB\">";
		echo "IP Type: ";
		echo "</td><td style=\"color:black\">";
		echo "Bad IP";
		echo "</td></tr>";
		echo "<tr>";
		echo "<td style=\"color:#00AABB\">";
		echo "The IP was blacklisted in: ";
		echo "</td><td style=\"color:black\">";
		$index=0;
		while(isset($arr["response"][(string)$index]))
		{
			echo $arr["response"][(string)$index];
			echo "<br>";
			$index=$index+1;
		}
		echo "</td></tr>";
		echo "</table></div><br>";
	}
	else 
	{	//not blacklisted table
		echo "<div class=\"normalTable\">";
		echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
		echo "<tr>";
		echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
		echo "Apility Report";
		echo "</center></B></td>";
		echo"</tr>";
		echo "<tr>";
		echo "<td style=\"color:#00AABB\">";
		echo "IP Type: ";
		echo "</td><td style=\"color:black\">";
		echo "Not Blacklisted";
		echo "</td></tr>";
		echo "</table></div><br>";
	}
}

if ($errGeo) {
  echo "cURL Error #:" . $errGeo;
} else {
	//geo location table
		echo "<div class=\"normalTable\">";
		echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
		echo "<tr>";
		echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
		echo "Apility Geo Location Details";
		echo "</center></B></td>";
		echo"</tr>";
		if(isset($geo["ip"]["as"]["name"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Name: ";
			echo "</td><td style=\"color:black\">";
			echo $geo["ip"]["as"]["name"];
			echo "</td></tr>";
		}
		if(isset($geo["ip"]["adress"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "IP Address: ";
			echo "</td><td style=\"color:black\">";
			echo $geo["ip"]["adress"];
			echo "</td></tr>";
		}
		if(isset($geo["ip"]["as"]["asn"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "ASN: ";
			echo "</td><td style=\"color:black\">";
			echo $geo["ip"]["as"]["asn"];
			echo "</td></tr>";
		}
		if(isset($geo["ip"]["as"]["country"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Country: ";
			echo "</td><td style=\"color:black\">";
			echo $geo["ip"]["as"]["country"];
			echo "</td></tr>";
		}
		if(isset($geo["ip"]["longitude"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Longitude: ";
			echo "</td><td style=\"color:black\">";
			echo $geo["ip"]["longitude"];
			echo "</td></tr>";
		}
		if(isset($geo["ip"]["latitude"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Latitude: ";
			echo "</td><td style=\"color:black\">";
			echo $geo["ip"]["latitude"];
			echo "</td></tr>";
		}
		if(isset($geo["ip"]["accuracy_radius"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Accuracy Radius: ";
			echo "</td><td style=\"color:black\">";
			echo $geo["ip"]["accuracy_radius"];
			echo "</td></tr>";
		}
		
		if(isset($geo["ip"]["city_names"]))
		{
			echo "<tr >";
			echo "<td  style=\"color:#00AABB\">";
			echo "City Name: ";
			echo "</td>";
			echo "<td style=\"color:black\">";
			if(isset($geo["ip"]["city_names"]["en"]))
				echo "English Name:".$geo["ip"]["city_names"]["en"]."<br>";
			if(isset($geo["ip"]["city_names"]["ja"]))
				echo "Japanese Name:".$geo["ip"]["city_names"]["ja"]."<br>";
			if(isset($geo["ip"]["city_names"]["zh-CN"]))
				echo "Chinese Name:".$geo["ip"]["city_names"]["zh-CN"]."<br>";
			if(isset($geo["ip"]["city_names"]["ru"]))
				echo "Russian Name:".$geo["ip"]["city_names"]["ru"]."<br>";
			echo "</td></tr>";
			}
		if(isset($geo["ip"]["region_names"]))
		{
			echo "<tr >";
			echo "<td  style=\"color:#00AABB\">";
			echo "Region Name: ";
			echo "</td>";
			echo "<td style=\"color:black\">";
			if(isset($geo["ip"]["region_names"]["en"]))
				echo "English Name:".$geo["ip"]["region_names"]["en"]."<br>";
			if(isset($geo["ip"]["region_names"]["ja"]))
				echo "Japanese Name:".$geo["ip"]["region_names"]["ja"]."<br>";
			if(isset($geo["ip"]["region_names"]["es"]))
				echo "Spanish Name:".$geo["ip"]["region_names"]["es"]."<br>";
			if(isset($geo["ip"]["region_names"]["ru"]))
				echo "Russian Name:".$geo["ip"]["region_names"]["ru"]."<br>";
			if(isset($geo["ip"]["region_names"]["fr"]))
				echo "French Name:".$geo["ip"]["region_names"]["fr"]."<br>";
			echo "</td></tr>";
			}
		if(isset($geo["ip"]["time_zone"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Time Zone: ";
			echo "</td><td style=\"color:black\">";
			echo $geo["ip"]["time_zone"];
			echo "</td></tr>";
		}
		if(isset($geo["ip"]["postal"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Postal Code: ";
			echo "</td><td style=\"color:black\">";
			echo $geo["ip"]["postal"];
			echo "</td></tr>";
		}
		if(isset($geo["ip"]["region_geoname_id"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Region Geoname ID: ";
			echo "</td><td style=\"color:black\">";
			echo $geo["ip"]["region_geoname_id"];
			echo "</td></tr>";
		}
		if(isset($geo["ip"]["continent_geoname_id"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Continent Geoname ID: ";
			echo "</td><td style=\"color:black\">";
			echo $geo["ip"]["continent_geoname_id"];
			echo "</td></tr>";
		}
		if(isset($geo["ip"]["continent_names"]))
		{
			echo "<tr >";
			echo "<td  style=\"color:#00AABB\">";
			echo "Continent Name: ";
			echo "</td>";
			echo "<td style=\"color:black\">";
			if(isset($geo["ip"]["continent_names"]["en"]))
				echo "English Name:".$geo["ip"]["continent_names"]["en"]."<br>";
			if(isset($geo["ip"]["continent_names"]["ja"]))
				echo "Japanese Name:".$geo["ip"]["continent_names"]["ja"]."<br>";
			if(isset($geo["ip"]["continent_names"]["es"]))
				echo "Spanish Name:".$geo["ip"]["continent_names"]["es"]."<br>";
			if(isset($geo["ip"]["continent_names"]["ru"]))
				echo "Russian Name:".$geo["ip"]["continent_names"]["ru"]."<br>";
			if(isset($geo["ip"]["continent_names"]["fr"]))
				echo "French Name:".$geo["ip"]["continent_names"]["fr"]."<br>";
			if(isset($geo["ip"]["continent_names"]["de"]))
				echo "German Name:".$geo["ip"]["continent_names"]["de"]."<br>";
			if(isset($geo["ip"]["continent_names"]["zh-CN"]))
				echo "Chinese Name:".$geo["ip"]["continent_names"]["zh-CN"]."<br>";
			echo "</td></tr>";
			}
			echo "</table></div><br>";
			
			if(isset($geo["ip"]["as"]["networks"]["0"]))
		{	echo "<div class=\"normalTable\">";
			echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
			echo "<tr>";
			echo "<td style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
			echo "Apility IP Networks";
			echo "</center></B></td>";
			echo"</tr>";
			$count=0;
			while(isset($geo["ip"]["as"]["networks"][(string)$count]))
			{
				$count=$count+1;
			}
			echo "<tr >";
			for($index=0;$index<$count;$index++)
			{
				echo "<td style=\"color:black\">";
				echo $geo["ip"]["as"]["networks"][(string)$index];
				echo "</td></tr>";
				
				
			}
			echo "</table></div>";
			
		}
}
echo "</div>";
?>