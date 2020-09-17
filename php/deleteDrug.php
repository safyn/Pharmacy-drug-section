<!--
Name : addDrug.php
Purpose : Remove a record from the Drug table, in case of an error display error 
Author: Krzysztof Bas 
Date: 02/03/2020
-->
<?php // Start of php tag

include "database.php";// include and evaluate external file

// mySQL query to delete/hide Drug record, that contains posted filed values
$sql = "UPDATE Drug SET Drug.exist=0 WHERE Drug.DrugID ='$_POST[drugID]'"; 

// if execution is successful reload page
if(mysqli_query($con,$sql)){
	
	header("Location: https://c2ppharmacy.candept.com/Drug%20Krzysztof%20Bas%20c00239768/deleteDrug.html.php");
}
// if execution is not successful print out the error 
else{
	echo "Error in querying the database" . mysqli_error($con);   
}

mysqli_close($con); // close connection 

?> <!-- End of php tag -->