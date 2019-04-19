<!-- This code modifies the domain report format , database used: Apility.io -->
<!-- Author: Geanina F. Tambaliuc-->

<?php
echo "<div style=\"display:none\"id=\"domainwrapper2\">";
require_once 'ApilityDomain.php';

//check if there was an error or not
if ($err) {
  echo "cURL Error #:" . $err;
} 
else {
	// check if the score is present in the report
	if(isset($arr["response"]["score"]))
	{	
		//create and display the domain score table
		
		echo "<div class=\"normalTable\">";
		echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
		echo "<tr>";
		echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
		echo "Apility Domain Score";
		echo "</center></B></td>";
		echo"</tr>";
		echo "<tr>";
		echo "<td style=\"color:#00AABB\">";
		echo "General Score: ";
		echo "</td><td style=\"color:black\">";
		echo $arr["response"]["score"];
		echo "</td></tr>";
		echo "<tr>";
		echo "<td style=\"color:#00AABB\">";
		echo "Score Interpretation: ";
		echo "</td><td style=\"word-wrap: break-word\"  ><font color=\"black\">";
		echo "Global Score is the sum of individual scores of each group. As a rule of thumb, negative values are assigned to high risk domains, positive value means the domain is trustable, and a zero value is neutral.";
		echo "</td></tr>";
		echo "</table></div><br>";
	}
	
	if(isset($arr["response"]["domain"]))
	{	echo "<div class=\"normalTable\">";
		echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
		echo "<tr>";
		echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
		echo "Apility Domain Databases Checked";
		echo "</center></B></td>";
		echo"</tr>";
		
		if(isset($arr["response"]["domain"]["mx"]["0"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Not Blacklisted in Mx Databases: ";
			echo "</td><td style=\"color:black\">";
			$index=0;
			while(isset($arr["response"]["domain"]["mx"][(string)$index]))
			{
			echo $arr["response"]["domain"]["mx"][(string)$index];
			echo "<br>";
			$index=$index+1;
			}
			echo "</td></tr>";
			
		}
		if(isset($arr["response"]["domain"]["ns"]["0"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Not Blacklisted in Ns Databases: ";
			echo "</td><td style=\"color:black\">";
			$index=0;
			while(isset($arr["response"]["domain"]["ns"][(string)$index]))
			{
			echo $arr["response"]["domain"]["ns"][(string)$index];
			echo "<br>";
			$index=$index+1;
			}
			echo "</td></tr>";
		}
		if(isset($arr["response"]["domain"]["blacklist_ns"]["0"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Blacklisted in Ns Databases: ";
			echo "</td><td style=\"color:black\">";
			$index=0;
			while(isset($arr["response"]["domain"]["blacklist_ns"][(string)$index]))
			{
			echo $arr["response"]["domain"]["blacklist_ns"][(string)$index];
			echo "<br>";
			$index=$index+1;
			}
			echo "</td></tr>";
		}
		if(isset($arr["response"]["domain"]["blacklist_mx"]["0"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Blacklisted in Mx Databases: ";
			echo "</td><td style=\"color:black\">";
			$index=0;
			while(isset($arr["response"]["domain"]["blacklist_mx"][(string)$index]))
			{
			echo $arr["response"]["domain"]["blacklist_mx"][(string)$index];
			echo "<br>";
			$index=$index+1;
			}
			echo "</td></tr>";
		}
		if(isset($arr["response"]["domain"]["blacklist"]["0"]))
		{
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Blacklisted in: ";
			echo "</td><td style=\"color:black\">";
			$index=0;
			while(isset($arr["response"]["domain"]["blacklist"][(string)$index]))
			{
			echo $arr["response"]["domain"]["blacklist"][(string)$index];
			echo "<br>";
			$index=$index+1;
			}
			echo "</td></tr>";
		}
		echo "</table></div><br>";
		
	}
	echo "</div>";
	
}
?>