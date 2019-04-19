<!-- This code creates the Domain Report page -->
<!-- Author: Geanina F. Tambaliuc-->

<link rel="stylesheet" href="TableFormat.css" type="text/css">
<link rel="stylesheet" href="PageFormat.css" type="text/css">
<html>
<body style="color: black;background-color: #f1f2f2">



<?php
  echo '<font color="black" size="10" face="algerian"><center>Machine Learning Domain Report<br></center></font>';
  echo "<br><br>";
  
  
  $query 	= $_GET["ip"];
  
  

  echo "<font color=\"black\"> <center>Domain Used: ", $query, "</center> </font>";
  echo "<br><br>";
  $command = escapeshellcmd('MachineLearning/src/runner.py \"$query\"');
  
  $output = shell_exec($command);
  echo "<font color=\"black\"><center>", $output, "</center> </font>";

  

  
  
  


?>
</body>
</html>