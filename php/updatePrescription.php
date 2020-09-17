<!--
Name : updatePrescription.php
Purpose : Update a prescription table record and create a new prescription record in case of an error display error
Author: Krzysztof Bas 
Date: 26/03/2020
-->
<?php // Start of php tag

include "database.php";// include and evaluate external file


$updatePrescription =
		" UPDATE Prescription
		SET DateOfPrescription = '$_POST[prescriptionDate]', DoctorName= '$_POST[doctorList]',CustomerName = '$_POST[customerName]', 
		TotalCost = (SELECT Round(SUM(DrugPrice),2) from Prescriptiondrug where Prescriptiondrug.PrescriptionID ='$_POST[maxid]')
		WHERE PrescriptionID = '$_POST[maxid]'";

$newPrescription =
	  	" INSERT INTO Prescription 
		Values('$nextid','0000-00-00','','','0','1') " ;

// if execution of $updatePrescription is successful calculate next id and execute next query
if(mysqli_query($con,$updatePrescription)){
	
	$nextid = $_POST[maxid];		// current biggest id
	$nextid++;						//  next prescription id

		// if execution of $newPrescription is successful, reload page
		if(mysqli_query($con,$sql2)){
		
			header("Location: https://c2ppharmacy.candept.com/Drug%20Krzysztof%20Bas%20c00239768/dispenseDrugs.html.php");
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

?> <!-- End of php tag -->