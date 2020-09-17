<!--
Name : database.php
Purpose : Connect to the database 
Author: Krzysztof Bas 
Date: 18/02/2020
-->
<?php // start of php tag

// Connection info
$host = "localhost";
$username = "pharmacy";
$password = "pharmacy";
$dbname = "pharmacy123";

// connect
$con = mysqli_connect($host, $username, $password, $dbname);
	
	// if connection fails print the error
	if(!$con) {
		die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
	} 


?>  <!-- End of php tag -->