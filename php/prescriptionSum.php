<!--
Name : prescriptionSum.php
Purpose : Retrive and diplay the total price of the current prescription
Author: Krzysztof Bas 
Date: 29/03/2020
-->
<?php // start of php tag
include "database.php"; // database connection

// Select and display total price of items in a given prescription rounded to two decimal places
$sql = "SELECT Round(SUM(DrugPrice),2) as sum from Prescriptiondrug where Prescriptiondrug.PrescriptionID =(SELECT MAX(PrescriptionID) from Prescription)";

// if query execution fails, print error
if(!$result= mysqli_query($con,$sql)){
    die( 'Error in querying the database' . mysqli_error("$con")); // print error 
}
//if query execution is succesfull
else{

// Assign query result into the variables 
while($row = mysqli_fetch_array($result)){
	// value of sum 
	$price = $row['sum'];
	// if price is greater than 0 ( if prescription contains drugs)  display the total sum 
	if($price > 0){
		echo "<h3 id='totalPrice'>Total Price : €" . $price . "</h3>";
	}
 }   

}
mysqli_close($con); // close connection


?> <!-- Enf of php tag -->