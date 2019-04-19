
<?php

/* Make the connection to the online database*/

$ch = curl_init();

//get the IP to check
$ip= "129.71.252.10";

//set the API key
$api_key='MNylmS0ycE1z1oW88vgJKKZfpgA7UPq08BtVUTmM';
$days='365';
curl_setopt($ch, CURLOPT_URL, "https://www.abuseipdb.com/check/".$ip."/json?key=".$api_key."&days=".$days);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = "Content-Type: application/json";
$headers[] = "Api-Key: MNylmS0ycE1z1oW88vgJKKZfpgA7UPq08BtVUTmM";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

//retaining the report
$result = curl_exec($ch);
$err = curl_errno($ch);
$arr=json_decode($result,true);

curl_close ($ch);

/*change the format of the report*/


if ($err) 
	{
		echo 'Error:' . curl_error($ch);
	}
	else
	{
		//check if the IP wasn't blacklisted
	if(!isset($arr["category"]["0"]) && !isset($arr["0"]["category"]["0"]))
	{
		echo "<div class=\"normalTable\">";
		echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
		echo "<tr>";
		echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
		echo "129.71.252.10 Highlights - Not Blacklisted";
		echo "</center></B></td>";
		echo"</tr>";
		echo"</tr>";
		echo "<tr>";
		echo "<td style=\"color:#00AABB\">";
		echo "Date (y-m-d): ";
		echo "</td>";
		echo "<td style=\"color:#00AABB\">";
		echo "Category: ";
		echo "</td></tr>";
		echo "<tr><td colspan=\"2\" style=\"color:#00AABB\">";
		echo "This IP wasn't reported in the last 365 days";
		echo "</td></tr>";
		echo "</table></div>";
	}
	else
	{ 	
		// check if the IP was blacklisted just once
		if(isset($arr["category"]["0"]))
		{
			
			//date from report in GMT 
			$dateDB=$arr["created"];
			$d=strstr($dateDB," ");
			$d=strstr($d,"+",true);
			$pieces=explode(" ",$d);
			$dayDB=$pieces[1];
			$monthDB=$pieces[2];
			$yearDB=$pieces[3];
			$timeDB=$pieces[4];
			
			//convert from GMT to New York
			$dateDB=date_create($yearDB."-".$monthDB."-".$dayDB." ".$timeDB,timezone_open('GMT'));
			date_timezone_set($dateDB,timezone_open('America/New_York'));
			
			//table header
			echo "<div class=\"normalTable\">";
			echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
			echo "<tr>";
			echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
			echo "129.71.252.10 Highlights - Blacklisted";
			echo "</center></B></td>";
			echo"</tr>";
			echo"</tr>";
			echo "<tr>";
			echo "<td style=\"color:#00AABB\">";
			echo "Date (y-m-d): ";
			echo "</td>";
			echo "<td style=\"color:#00AABB\">";
			echo "Category: ";
			echo "</td></tr>";
			echo "<tr><td style=\"color:#00AABB\">";
			echo $dateDB->format('y-m-d');
			echo "</td>";
			echo "<td style=\"color:#00AABB\">";
			$index=0;
				while(isset($arr["category"][(string)$index]))
					{
						echo $arr["category"][(string)$index];
						echo "<br>";
						$index=$index+1;
					}
			echo "</td></tr>";
			echo "</table></div>";
			
			
		}
		else
		{
			//IP was blacklisted more than once
			if(isset($arr["0"]["category"]["0"]))
			{
				//table header
				echo "<div class=\"normalTable\">";
				echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
				echo "<tr>";
				echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
				echo "129.71.252.10 Highlights - Blacklisted";
				echo "</center></B></td>";
				echo"</tr>";
				echo"</tr>";
				echo "<tr>";
				echo "<td style=\"color:#00AABB\">";
				echo "Date (y-m-d): ";
				echo "</td>";
				echo "<td style=\"color:#00AABB\">";
				echo "Category: ";
				echo "</td></tr>";
				
				
				//array to memorise the dates when was blacklisted
				$datesDB=array();
				$i=0;
				while(isset($arr[(string)$i]["category"]["0"]))
				{
					//date from report in GMT 
					$dateDB=$arr[(string)$i]["created"];
					$d=strstr($dateDB," ");
					$d=strstr($d,"+",true);
					$pieces=explode(" ",$d);
					$dayDB=$pieces[1];
					$monthDB=$pieces[2];
					$yearDB=$pieces[3];
					$timeDB=$pieces[4];
					
					//convert from GMT to New York
					$dateDB=date_create($yearDB."-".$monthDB."-".$dayDB." ".$timeDB,timezone_open('GMT'));
					date_timezone_set($dateDB,timezone_open('America/New_York'));
					
					$datesDB[$i]=$dateDB;
					$i++;
					
				}
				for($j=0;$j<sizeof($datesDB);$j++)
				{
							echo "<tr><td style=\"color:black\" bgcolor=\"#00AABB\">";
							echo $datesDB[$j]->format('y-m-d');
							echo "</td><td style=\"color:black\" bgcolor=\"#00AABB\">";
							$index=0;
							while(isset($arr[$j]["category"][(string)$index]))
							{
								echo $arr[$j]["category"][(string)$index];
								echo "<br>";
								$index=$index+1;
							}
							echo "</td></tr>";
				}
				
				echo "</table></div>";
				
			}
		}
	}
	}




?>