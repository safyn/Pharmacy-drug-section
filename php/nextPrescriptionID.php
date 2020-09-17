<!--
Name : nextPrescriptionID.php
Purpose : Get the biggest PrescriptionID and store it as hidden input field
Author: Krzysztof Bas 
Date: 26/03/2020
-->
<?php // start of php tag
include "database.php"; // database connection

// Variable that contains mysql query and select the maximum value of prescription ID
$sql = "SELECT MAX(PrescriptionID) from Prescription";

// if Query execution fails print error 
if(!$result= mysqli_query($con,$sql)){
    die( 'Error in querying the database' . mysqli_error("$con")); // print error 
}
// if execution of query is succesfull 
else{
		// Assign query result into the variables 
	while($row = mysqli_fetch_array($result)){
		$id = $row['MAX(PrescriptionID)'];
		// print hidden input field with Prescription ID value
	 	echo "<input name = 'maxid' id='maxid' value='$id' hidden>";
	}
}

mysqli_close($con); // close connection

?> <!-- Enf of php tag -->