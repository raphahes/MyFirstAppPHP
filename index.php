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
$services = getenv("VCAP_SERVICES"); 
$services_json = json_decode($services,true); 
$mysql_config = $services_json["mysql-5.5"][0]["credentials"]; 
$db = $mysql_config["name"]; 
$host = $mysql_config["host"]; 
$port = $mysql_config["port"]; 
$username = $mysql_config["user"]; 
$password = $mysql_config["password"];

$conn = mysql_connect($host . ':' . $port, $username, $password); 
if(! $conn ) { die('Could not connect: ' . mysql_error()); } 
mysql_select_db($db);

$sql_create = 'CREATE TABLE FACTS(emp_name CHAR(30), emp_address CHAR(30), emp_salary INT, join_date DATETIME)'; 
$retval = mysql_query($sql_create, $conn ); 
if(! $retval ) { echo('Could not create database table: ' . mysql_error() . '<br/>'); 
} else { echo "Created database table successfully<br/>"; }

$sql_insert = 'INSERT INTO FACTS ' . '(emp_name,emp_address, emp_salary, join_date) '. 'VALUES ( "IBM BlueMix", "Rocks! X ", 1000, NOW() )';

$retval = mysql_query($sql_insert, $conn ); 
if(! $retval ) { die('Could not enter data: ' . mysql_error()); } 
echo "Entered data successfully<br/>";

$sql_read = 'SELECT * FROM FACTS ';

$retval = mysql_query($sql_read, $conn );

if(! $retval ) { die('Could not read FACTS table: ' . mysql_error()); } 
while ($dbfield = mysql_fetch_assoc($retval)) { 
	echo $dbfield['emp_name'] . '<br/>'; 
	echo $dbfield['emp_address'] . $dbfield['emp_salary'] . '<br/>'; 
	echo $dbfield['join_date'] . '<br/>'; 
}

mysql_close($conn); ?>
				
				
				
				
				
				
				
<?php
echo "STEP 1: Set local variables";
$servername = "us-cdbr-iron-east-04.cleardb.net:3306";
$username = "be8cdc50bb3240";
$password = "8641e7fb";

echo "<br>STEP 2: Register JDBC driver";
$link = mysql_connect($servername, $username, $password);

echo "<br>STEP 3: Verify the connection";
if (!$link) {
	echo "<br>Error " . mysql_error();
} else {
	echo "<br>Connected successfully";
}
echo "<br>STEP 4: Closing the connection";
mysql_close($link);

?> 				
				</h3>
				<p class='description'></p> Thanks for creating a <span class="blue">PHP Starter Application</span>.
			</td>
		</tr>
	</table>
</body>
</html>
