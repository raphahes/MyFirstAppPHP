<!DOCTYPE html>
<html>
<head>
	<title>PHP Starter Application</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<table>
		<tr>
			<td style='width: 30%;'>
				<img class = 'newappIcon' src='images/newapp-icon.png'>
			</td>
			<td>
				<h3 id = "message">
<?php
echo "STEP 1: Set local variables";
$servername = "us-cdbr-iron-east-04.cleardb.net:3306";
$username = "be8cdc50bb3240";
$password = "8641e7fb";

echo "<br>STEP 2: Register JDBC driver";
$link = new mysql_connect($servername, $username, $password);

// Check connection
if (!$link) {
    die("Connection failed: " . mysql_error());
}

mysql_close($link);
echo "Connected successfully";
?> 				
				</h3>
				<p class='description'></p> Thanks for creating a <span class="blue">PHP Starter Application</span>.
			</td>
		</tr>
	</table>
</body>
</html>
