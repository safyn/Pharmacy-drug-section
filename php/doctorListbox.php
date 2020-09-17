<!--
Name : doctorListbox.php
Purpose : Fetch the values of Doctor Name and Surname column into a select tag
Author: Krzysztof Bas 
Date: 27/03/2020
-->
<?php // start of php tag
include "database.php"; // database connection

// Variable that contains mysql query
$sql = "SELECT Name,Surname from Doctor WHERE exist=1";

// if query execution fails, print error 
if(!$result= mysqli_query($con,$sql)){
    die( 'Error in querying the database' . mysqli_error("$con")); // print error 
}
// Display select tag, whenever value of the select tag is changed, save the value in the session storage
echo "<select name = 'doctorList' id='doctorList' onchange='saveValue(this);' required>";

// Assign query result into the variables 
while($row = mysqli_fetch_array($result)){
	$doctorName = $row['Name'];
	$doctorSurname = $row['Surname'];
  
    echo "<option >$doctorName $doctorSurname</option>"; // Create option tag for the select tag

}
echo "</select>"; // end select tag

mysqli_close($con); // close connection


?> <!-- End of php tag -->