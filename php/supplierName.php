<!--
Name : supplierName.php
Purpose : Fetch the values for supplier Name column into a select tag
Author: Krzysztof Bas 
Date: 18/02/2020
-->
<?php // start of php tag
include "database.php"; // database connection

// Variable that contains mysql query
$sql = "SELECT Name from Supplier WHERE exist=1";

// if query execution fails, print error  
if(!$result= mysqli_query($con,$sql)){
    die( 'Error in querying the database' . mysqli_error("$con")); // print error 
}
// Display select tag that is initialy disabled
echo "<select name = 'supplierName' id='supplierName' disabled  >"; 

// Assign query result into the variables 
while($row = mysqli_fetch_array($result)){
	$supplierName = $row['Name'];
  
    echo "<option >$supplierName</option>"; // Create option tag for the select tag 

}
echo "</select>"; // end select tag

mysqli_close($con); // close connection


?> <!-- Enf of php tag -->