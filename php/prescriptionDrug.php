<!--
Name : prescriptionDrug.php
Purpose : Dispense drug to a prescription and update drug table values after the drug is dispensed
Author: Krzysztof Bas 
Date: 26/03/2020
-->
<?php // Start of php tag

include "database.php";// include and evaluate external file

// mySQL query to add prescription to a prescription table
$sql =" INSERT INTO Prescriptiondrug (PrescriptionID,DrugID,DrugPrice,Instructions,DrugDosage,DrugFrequency,DrugLength)
		Values('$_POST[maxid]','$_POST[drugID]','$_POST[drugUnitPrice]','$_POST[instructions]','$_POST[strength]','$_POST[frequency]','$_POST[cycle]')";

// Query to update drug quantitity after drug is dispensed
$updateStock = " UPDATE Drug
				Set Quantity = (Quantity - ('$_POST[cycle]'*'$_POST[strength]'*'$_POST[frequency]'))
				WHERE DrugID = '$_POST[drugID]' ";

// if query($sql) execution is successful execute another query ($updateStock)
if(mysqli_query($con,$sql)){
	// if execution is succesfull reload page 
	if(mysqli_query($con,$updateStock)){	
		header("Location: https://c2ppharmacy.candept.com/Drug%20Krzysztof%20Bas%20c00239768/dispenseDrugs.html.php"); // reload page
	}
	// if execution is not successful print out the error 
	else{
		echo "Error in querying the database" . mysqli_error($con);   
	}
	
}
// if execution is not successful print out the error 
else{
	echo "Error in querying the database" . mysqli_error($con);   
}

mysqli_close($con); // close connection 

?> <!-- End of php tag -->7