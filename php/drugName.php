<!--
Name : supplierName.php
Purpose : Fetch the values drug table into a select tag
Author: Krzysztof Bas 
Date: 18/02/2020
-->
<?php // start of php tag
include "database.php"; // database connection

// Variable that contains mysql query that selects Brand,DrugID,Price from existing drug
$sql = "SELECT Brand,DrugID,Price from Drug WHERE exist=1";

/// if query execution fails, print error
if(!$result= mysqli_query($con,$sql)){
    die( 'Error in querying the database' . mysqli_error("$con")); // print error 
}
// Display select tag, whenever value is selected, populate the form with corresponding values
echo "<select name = 'drugName' id='drugName' onclick='populateDrugDispense()'  > "; // Display select tag

// Assign query result into the variables 
while($row = mysqli_fetch_array($result)){
	$drugName = $row['Brand'];
	$drugID = $row['DrugID'];
	$unitPrice = $row['Price'];
	// value to be splitted 
	$all = "$drugName,$drugID,$unitPrice";

    echo "<option value='$all' >$drugName</option>"; // Create option tag for the select tag

}
 echo "<option value='' disabled hidden selected></option>"; // Create empty option that cannot be selected
echo "</select>"; // end select tag

mysqli_close($con); // close connection


?> <!-- End of php tag -->