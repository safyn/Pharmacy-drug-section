<!--
Name : drugListbox.php
Purpose : Fetch the values from the database into variables, display select box with name of the drug and populate form when drug is selected 
Author: Krzysztof Bas 
Date: 18/02/2020
-->
<?php // start of php tag
include "database.php"; // database connection

// Variable that contains mysql query
$sql = "SELECT DrugID, Brand, Name, form, Strength, SupplierName from Drug where exist =1";

// if execution is not successful print out the error 
if(!$result= mysqli_query($con,$sql)){
    die( 'Error in querying the database' . mysqli_error("$con")); // print error 
}
echo "<select name = 'deleteList' id='deleteList' onclick = 'populateDelete()' >"; // Display select tag

// Assign query result into the variables 
while($row = mysqli_fetch_array($result)){
    $id = $row['DrugID'];
    $brandName = $row['Brand'];
    $genericName = $row['Name'];
    $form = $row['form'];
    $strength = $row['Strength'];
    $supplier = $row['SupplierName'];

 // assign all values into one variable that can be split with "," later on 
    $alltext = "$id,$brandName,$genericName,$supplier,$form,$strength";
    echo "<option value = '$alltext' > $brandName </option>"; // Create option tag for the select tag

}
echo "</select>"; // end select tag

mysqli_close($con); // close connection


?> <!-- Enf of php tag -->