<?php
require_once 'IP1.php';

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
		echo "129.71.200.66 History - Not Blacklisted";
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
		
		//set timezone to New York 
		date_default_timezone_set('America/New_York');
		
		//get today's date
		$currentDate=date('y-m-d',time());
		
		//print the date for the past 30 days
		for($i=0;$i<30;$i++)
		{	echo "<tr><td style=\"color:white\">";
			echo $currentDate;
			echo "</td><td style=\"color:white\">";
			echo "-";
			echo "</td></tr>";
			$currentDate=date('y-m-d',strtotime($currentDate.'-1 day'));
		}
		echo "</table></div>";
	}
	else
	{ 	
		// check if the IP was blacklisted just once
		if(isset($arr["category"]["0"]))
		{
			//set timezone to New York 
			date_default_timezone_set('America/New_York');
			
			//get today's date
			$currentDate=date('y-m-d',time());
			
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
			echo "129.71.200.66 History - Blacklisted";
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
			
			//print when it was blacklisted and the categories for the past 30 days
			
			for($i=0;$i<30;$i++)
			{	
				if(strcmp($currentDate,$dateDB->format('y-m-d'))==0)
				{
					echo "<tr><td style=\"color:black\" bgcolor=\"#00AABB\">";
					echo $dateDB->format('y-m-d');
					echo "</td><td style=\"color:black\" bgcolor=\"#00AABB\">";
					$index=0;
					while(isset($arr["category"][(string)$index]))
					{
						echo $arr["category"][(string)$index];
						echo "<br>";
						$index=$index+1;
					}
					echo "</td></tr>";
				}
				else
				{
					echo "<tr><td style=\"color:white\">";
					echo $currentDate;
					echo "</td><td style=\"color:white\">";
					echo "-";
					echo "</td></tr>";
					
				}
				$currentDate=date('y-m-d',strtotime($currentDate.'-1day'));
			}
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
				echo "129.71.200.66 History - Blacklisted";
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
				
				//set timezone to New York 
				date_default_timezone_set('America/New_York');
			
				//get today's date
				$currentDate=date('y-m-d',time());
				
				
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
				$stopDate=date('y-m-d',strtotime($currentDate.'-30 days'));
					$j=0; 
					while(strcmp($currentDate,$stopDate)!=0 && $j<sizeof($datesDB))
					{	
						if(strcmp($currentDate,$datesDB[$j]->format('y-m-d'))==0)
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
							$j++;
						}
						else
						{
							echo "<tr><td style=\"color:white\">";
							echo $currentDate;
							echo "</td><td style=\"color:white\">";
							echo "-";
							echo "</td></tr>";
							$currentDate=date('y-m-d',strtotime($currentDate.'-1day'));
						}
						
						
					}
					
					while(strcmp($currentDate,$stopDate)!=0)
					{
						echo "<tr><td style=\"color:white\">";
						echo $currentDate;
						echo "</td><td style=\"color:white\">";
						echo "-";
						echo "</td></tr>";
						$currentDate=date('y-m-d',strtotime($currentDate.'-1day'));
					}
				
				echo "</table></div>";
				
			}
		}
	}
	}
?>