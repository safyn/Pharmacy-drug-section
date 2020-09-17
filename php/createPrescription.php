<!--
Name : createPrescription.php
Purpose : Add prescribed prescription to a prescription table
Author: Krzysztof Bas 
Date: 26/03/2020
-->
<?php // Start of php tag

include "database.php";// include and evaluate external file

$nextid = $_POST[maxid];      // Post max prescription id from the field
$nextid++;					  // increment to get the id of the next prescription
// mySQL query to add new prescription record to a prescription table
$sql =" 
	  INSERT INTO Prescription 
		Values('$nextid','0000-00-00','','','0','1')" ;

// if execution is successful reload page
if(mysqli_query($con,$sql)){
	
	header("Location: https://c2ppharmacy.candept.com/Drug%20Krzysztof%20Bas%20c00239768/dispenseDrugs.html.php"); // reload page
}
// if execution is not successful print out the error 
else{
	echo "Error in querying the database" . mysqli_error($con);   
}

mysqli_close($con); // close connection 

?> <!-- End of php tag -->
