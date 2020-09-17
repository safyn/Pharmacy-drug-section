<!--
Name : updateDrug.php
Purpose : Update Drug table record, in case of an error display error 
Author: Krzysztof Bas 
Date: 18/02/2020
-->
<?php // Start of php tag

include "database.php";// include and evaluate external file

// mySQL query that updates the drug table record,contains posted filed values
$sql = " UPDATE Drug SET Brand ='". $_POST['brandName'] . "' ,
        Name='".$_POST['genericName']."', Form='".$_POST['Form']."',
        Strength='".$_POST['strength_']."', usageInstructions='".$_POST['instructions']."',
               SupplierName ='".$_POST['supplierName']."' , Price ='".$_POST['costPrice']."' ,
              RetailPrice ='".$_POST['retailPrice']."' , reorderLevel ='".$_POST['reorderLevel']."' ,
               ReorderQuantity ='".$_POST['reorderQuantity']."' , sideEffects ='". $_POST['sideEffects']."' WHERE DrugID ='".$_POST['drugID']."' ";

// if execution is successful reload page
if(mysqli_query($con,$sql)){
	header("Location: https://c2ppharmacy.candept.com/Drug%20Krzysztof%20Bas%20c00239768/amendDrug.html.php");

}
// if execution is not successful print out the error 
else{
	echo "Error in querying the database" . mysqli_error($con);
    
}

mysqli_close($con); // close connection 

?> <!-- End of php tag -->