<!-- This code modifies the ip report format , database used: AbuseIPDB -->
<!-- Author: Geanina F. Tambaliuc-->

<?php
require_once 'AbuseIPDB.php';

if ($err) {
    echo 'Error:' . curl_error($ch);
}
else
{	// create and display the report table
		echo "<div style=\"display:none\" id=\"wrapper4\">";
		echo "<div class=\"normalTable\">";
		echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
		echo "<tr>";
		echo "<td colspan=\"2\"  style=\"color:#333\" bgcolor=\"#00AABB\"><B><center>";
		echo "AbuseIPDB Report";
		echo "</center></B></td>";
		echo"</tr>";
		echo"</tr>";
		echo "<tr>";
		echo "<td style=\"color:#00AABB\">";
		echo "Category: ";
		echo "</td>";
		echo "<td style=\"color:#00AABB\">";
		echo "Date: ";
		echo "</td></tr>";
		if(!(isset($arr["0"]["category"]["0"])) && !(isset($arr["category"]["0"])))
		{	echo "<tr><td style=\"color:black\">";
			echo "IP was not found in our database";
			echo "</td><td>";
			echo "</td></tr>";
			echo "</table></div>";
		}
		else
		{
			if(isset($arr["category"]["0"]))
			{
			$index=0;
			while(isset($arr["category"][(string)$index]))
			{
				echo "<tr>";
				echo "<td style=\"color:black\">";
				echo $arr["category"][(string)$index];
				echo "</td>";
				echo "<td style=\"color:black\">";
				echo $arr["created"];
				echo "</td></tr>";
				$index=$index+1;
				
			}
			
			}
			else
			{
				if(isset($arr["0"]["category"]["0"]))
				{
					$mainIndex=0;
					while((isset($arr[(string)$mainIndex]["category"])))
					{
						$index=0;
						while(isset($arr[(string)$mainIndex]["category"][(string)$index]))
						{
						echo "<tr>";
						echo "<td style=\"color:black\">";
						echo $arr[(string)$mainIndex]["category"][(string)$index];
						echo "</td>";
						echo "<td style=\"color:black\">";
						echo $arr[(string)$mainIndex]["created"];
						echo "</td></tr>";
						$index=$index+1;
						}
						
						$mainIndex=$mainIndex+1;
					}
				}
			}
			echo "</table></div>";
		}
		
		//Categories Interpretation Table
		echo "<br><br>";
		echo "<div class=\"normalTable\">";
		echo "<table border=\"1\" align=\"center\" width=\"100%\" style=\"table-layout: fixed\">";
		echo "<tr>";
		echo "<td colspan=\"3\" style=\"color:#333 \" bgcolor=\"#00AABB\"><B><center>";
		echo "AbuseIPDB Category Interpretation";
		echo "</center></B></td>";
		echo"</tr>";
		echo "<tr>";
		echo "<td  style=\"color:#00AABB\">";
		echo "<B>ID</B>";
		echo "</td><td  style=\"color:#00AABB\">";
		echo "<B>Title</B>";
		echo "</td><td  style=\"color:#00AABB\">";
		echo "<B>Description</B>";
		echo "</td></tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "3";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Fraud Orders";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Fraudulent orders.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "4";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "DDoS Attack";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Participating in distributed denial-of-service (usually part of botnet).";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "5";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "FTP Brute-Force";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "FTP Brute-Force.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "6";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Ping of Death";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Oversized IP packet.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "7";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Phishing";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Phishing websites and/or email.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "8";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Fraud VoIP";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Fraud VoIP.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "9";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Open Proxy";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Open proxy, open relay, or Tor exit node.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "10";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Web Spam";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Comment/forum spam, HTTP referer spam, or other CMS spam.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "11";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Email Spam";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Spam email content, infected attachments, phishing emails, and spoofed senders (typically via exploited host or SMTP server abuse).";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "12";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Blog Spam";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "CMS blog comment spam.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "13";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "VPN IP";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Conjunctive category.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "14";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Port Scan";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Scanning for open ports and vulnerable services.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "15";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Hacking";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Hacking.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "16";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "SQL Injection";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Attempts at SQL injection.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "17";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Spoofing";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Spoofing.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "18";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Brute-Force";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Credential brute-force attacks on webpage logins and services like SSH, FTP, SIP, SMTP, RDP, etc. This category is seperate from DDoS attacks.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "19";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Bad Web Bot";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Webpage scraping (for email addresses, content, etc) and crawlers that do not honor robots.txt. Excessive requests and user agent spoofing can also be reported here.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "20";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Exploited Host";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Host is likely infected with malware and being used for other attacks or to host malicious content. The host owner may not be aware of the compromise. This category is often used in combination with other attack categories.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "21";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Web App Attack";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Attempts to probe for or exploit installed web applications such as a CMS like WordPress/Drupal, e-commerce solutions, forum software, phpMyAdmin and various other software plugins/solutions.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "22";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "SSH";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Secure Shell (SSH) abuse. Use this category in combination with more specific categories.";
		echo "</font></td>";
		echo "</tr>";
		echo "<tr><td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "23";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "IoT Targeted";
		echo "</font></td>";
		echo "<td style=\"word-wrap: break-word\"  ><font color=\"black\">"; 
		echo "Abuse was targeted at an Internet of Things type device. Include information about what type of device was targeted in the comments.";
		echo "</font></td>";
		echo "</tr>";
		echo "</table></div>";
		echo "<br><br>";
		echo "</div>";
}



?>