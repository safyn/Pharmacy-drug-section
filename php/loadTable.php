<!--
Name : loadTable.php
Purpose : Load Prescriptiondrug table of a prescription being currently dispensed 
Author: Krzysztof Bas 
Date: 28/03/2020
-->
<?php
include "database.php";// include and evaluate external file

// mySQL query to select and join prescriptiondrug table with Brand column from Drug table of the Prescription being currently processed
$sql ="SELECT Prescriptiondrug.*, Drug.Brand
FROM Prescriptiondrug
LEFT JOIN Drug
ON Prescriptiondrug.DrugID = Drug.DrugID
WHERE Prescriptiondrug.PrescriptionID=(Select MAX(PrescriptionID) from Prescription)";

// if execution is successful reload page
if($result = mysqli_query($con,$sql)){
	// Start of table tag, print out and initialize tables Header cells
	echo "<table class='prescriptionTable' id='prescriptionTable' > 
					
							<thead>
							<tr>
							<th>Prescription ID</th>
							<th>Drug ID</th>
							<th>Usage Instruction</th>	
							<th>Unit Price</th>
							<th>Dosage</th>
							<th>Dosage Frequency</th>
							<th>Drug Cycle</th>
							<th>Drug Name</th>
							</tr> 
						</thead> ";
// assign query results into the variables and print the out inside of the table cells	
while($row = mysqli_fetch_array($result)) {
	// Standard table cells
    echo "<tr>";    // start of table row
    echo "<td>" . $row['PrescriptionID'] . "</td>";
    echo "<td>" . $row['DrugID'] . "</td>";
    echo "<td>" . $row['Instructions'] . "</td>";
    echo "<td>" . $row['DrugPrice'] . "</td>";
    echo "<td>" . $row['DrugDosage'] . "</td>";
    echo "<td>" . $row['DrugFrequency'] . "</td>";
    echo "<td>" . $row['DrugLength'] . "</td>";
	echo "<td>" . $row['Brand'] . "</td>";
    echo "</tr>"; // end of table row

}
echo "</table>"; // close table tag
}
// if execution is not successful print out the error 
else{
	echo "Error in querying the database" . mysqli_error($con);    
}

mysqli_close($con); // close connection 

?><!-- End of php tag -->