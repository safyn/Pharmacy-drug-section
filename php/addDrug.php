<!--
Name : addDrug.php
Purpose : Add record to the Drug table, in case of an error display error 
Author: Krzysztof Bas 
Date: 02/03/2020
-->
<?php // Start of php tag

include "database.php";// include and evaluate external file

// mySQL query to add Drug record, that contains posted filed values

$sql="INSERT INTO Drug(DrugID,Brand,Name,Form,Strength,usageInstructions,SupplierName,Price,RetailPrice,reorderLevel,ReorderQuantity,sideEffects) 	 							     VALUES('$_POST[id]','$_POST[brandName]','$_POST[genericName]','$_POST[Form]','$_POST[strength]','$_POST[instructions]','$_POST[supplierName]','$_POST[costPrice]','$_POST[retailPrice]',
'$_POST[reorderLevel]','$_POST[reorderQuantity]','$_POST[sideEffects]')";	
			
// if execution is successful reload page
if(mysqli_query($con,$sql)){
	
	header("Location: https://c2ppharmacy.candept.com/Drug%20Krzysztof%20Bas%20c00239768/addDrug.html.php");
}
// if execution is not successful print out the error 
else{
	echo "Error in querying the database" . mysqli_error($con);   
}

mysqli_close($con); // close connection 

?> <!-- End of php tag -->