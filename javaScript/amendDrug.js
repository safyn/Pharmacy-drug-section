/*
Name : amendDrugs.js
Purpose : JavaScript functions that are used by the amend/view Drug form
Author: Krzysztof Bas 
Date: 18/02/2020
*/
// Function that populates amendForm with values
function populate(){
	// gets element by ID and assigns it to a variable
    var select = document.getElementById("listbox");	
	// create new option elements
	var optStrength = document.createElement('option');    
	var optForm = document.createElement('option');
	var supplierName = document.createElement('option');
	// select options from the selected index of listbox
    var result = select.options[select.selectedIndex].value;
	// split the variable when encounters ","
    var drugDetails = result.split(',');

	// Assign values from the selected index into the related input tags
    document.getElementById("drugID").value = drugDetails[0];
    document.getElementById("brandName").value = drugDetails[1];
    document.getElementById("genericName").value = drugDetails[2];

	// Assign value from the select tag "form" to a variable
	var formValue = document.getElementById('form')
	// create text node to add to option element 
	optForm.appendChild( document.createTextNode(drugDetails[3]));
	// set as selected
	optForm.selected = true;
	// set as hidden when field is enabled
	optForm.hidden = true;
	// set value of the option property 
	optForm.value = drugDetails[3];
	// add option to end of select box 
	formValue.appendChild(optForm);
	
	// Assign value from the select tag "strength" to a variable
	var strengthValue = document.getElementById('strength');
	// create text node to add to option element 
	optStrength.appendChild( document.createTextNode(drugDetails[4]));
	// set as selected	
	optStrength.selected = true;
	// set as hidden when field is enabled	
	optStrength.hidden = true;
	// set value property of opt
	optStrength.value = drugDetails[4];
	// add opt to end of select box (sel)
	strengthValue.appendChild(optStrength);
	
	// Assign values from the selected index into the related input and textarea tags
    document.getElementById("instructions").value = drugDetails[5];
	
	var suppName = document.getElementById('supplierName');
	supplierName.appendChild(document.createTextNode(drugDetails[6]));
	supplierName.selected = true;
	supplierName.hidden=true;
	supplierName.value = drugDetails[6];
	suppName.appendChild(supplierName);

    document.getElementById("costPrice").value = drugDetails[7];
    document.getElementById("retailPrice").value = drugDetails[8];
    document.getElementById("reorderLevel").value = drugDetails[9];
    document.getElementById("reorderQuantity").value = drugDetails[10];
    document.getElementById("sideEffects").value = drugDetails[11];
}

// Function that disables and enables form fields
function toggleLock(){
	
	// if buttons value is equal to "Amend Details" enable all fields and set value to "View Details"
    if(document.getElementById("amendViewButton").value == "Amend Details"){
		// Enable fields
        document.getElementById("brandName").disabled = false;
        document.getElementById("genericName").disabled = false;
        document.getElementById("form").disabled = false;
        document.getElementById("strength").disabled = false;
        document.getElementById("instructions").disabled = false;
        document.getElementById("supplierName").disabled = false;
        document.getElementById("costPrice").disabled = false;
        document.getElementById("retailPrice").disabled = false;
        document.getElementById("reorderLevel").disabled = false;
        document.getElementById("reorderQuantity").disabled = false;
        document.getElementById("sideEffects").disabled = false;
		// change the buttons value
        document.getElementById("amendViewButton").value = "View Details";
    }
	// if button value is not equal to "Amend Details" disable all fields and set value to "Amend Details"
    else{
		// Disable fields
        document.getElementById("brandName").disabled = true;
        document.getElementById("genericName").disabled = true;
        document.getElementById("form").disabled = true;
        document.getElementById("strength").disabled = true;
        document.getElementById("instructions").disabled =true;
        document.getElementById("supplierName").disabled = true;
        document.getElementById("costPrice").disabled = true;
        document.getElementById("retailPrice").disabled = true;
        document.getElementById("reorderLevel").disabled = true;
        document.getElementById("reorderQuantity").disabled = true;
        document.getElementById("sideEffects").disabled = true;
		// change the buttons value
        document.getElementById("amendViewButton").value = "Amend Details";
    }

}
// Function that ask user for confirmation and enables or disables form fields
function confirmCheck(e){
	// ask user for confirmation
    response = confirm('Are you sure you want to save these changes ?');
	// if response == true enable form fields and return true
    if(response){
		// Enable fields
        document.getElementById("brandName").disabled = false;
        document.getElementById("genericName").disabled = false;
        document.getElementById("form").disabled = false;
        document.getElementById("strength").disabled = false;
        document.getElementById("instructions").disabled = false;
        document.getElementById("supplierName").disabled = false;
        document.getElementById("costPrice").disabled = false;
        document.getElementById("retailPrice").disabled = false;
        document.getElementById("reorderLevel").disabled = false;
        document.getElementById("reorderQuantity").disabled = false;
        document.getElementById("sideEffects").disabled = false;
        return true;
		alert('Drug updated');
    }
	// if response != true populate, disable fields and return false
    else{

        populate();					// populate fields with values
        toggleLock();				// disable the fields
		alert('Cancelled !');		// display message that the form submition was cancelled	
       	e.preventDefault();			// Prevent default submition
		return false;				// return false
    }
}	

// Function that asks user for confirmation, displays corresponding messages and prevents the default submit of the form
function confirmAdd(e){
	// ask for a confirmation
	conf = confirm('Are you sure you want to add this drug?');
	// display message if accepted
	if(conf){
   		alert('Drug Added to the database');
	}
	// display message if rejected and prevent default submition of the form
 	else {
 		alert('Cancelled !');			
  		e.preventDefault();	
	}	
}

// Function that asks user for confirmation, displays corresponding messages and prevents the default submit of the form
function confirmDelete(e){
	// ask for a confirmation
	conf = confirm('Are you sure you want to delete this drug?');
	// display message if accepted
	if(conf){
   		alert('Drug deleted from the database');
	}
	// if rejected
 	else {
 		alert('Cancelled !'); 		//display message
  		e.preventDefault();			// Prevent default submition
	}	
}

// Function that populates deleteForm with values
function populateDelete(){
	// gets element by ID and assigns it to a variable
    var select = document.getElementById("deleteList");	
	// select options from the selected index of listbox
    var result = select.options[select.selectedIndex].value;
	// split the variable when encounters ","
    var drugDetails = result.split(',');

	// Assign values from the selected index into the related input tags
    document.getElementById("drugID").value = drugDetails[0];
    document.getElementById("brandName").value = drugDetails[1];
    document.getElementById("genericName").value = drugDetails[2];
    document.getElementById("supplierName").value = drugDetails[3];
	document.getElementById("form").value = drugDetails[4];
	document.getElementById("strength").value = drugDetails[5];
	
}

// Function that populates deleteForm with values
function populateCustomer(){
	
	// gets element by ID and assigns it to a variable
    var select = document.getElementById("customerList");	
	// select options from the selected index of listbox
    var result = select.options[select.selectedIndex].value;
	// split the variable when encounters ","
    var customerDetails = result.split(',');
	
	document.getElementById("customerName").value= customerDetails[0];		// set the value into a field
	sessionStorage.setItem("customerName", customerDetails[0]);				// Save value in the session Storage
	
	document.getElementById("customerAddress").value= customerDetails[1];	// set the value into a field
	sessionStorage.setItem("customerAddress", customerDetails[1]);			// Save value in the session Storage
	
	document.getElementById("customerDOB").value= customerDetails[2];		// set the value into a field
	sessionStorage.setItem("customerDOB", customerDetails[2]);				// Save value in the session Storage
	
}

// Function that populates fields with values
function populateDrugDispense(){

	// gets element by ID and assigns it to a variable
    var select = document.getElementById("drugName");	
	// create new option elements
	
	// select options from the selected index of listbox
    var result = select.options[select.selectedIndex].value;
	// split the variable when encounters ","
    var drugDetails = result.split(',');
	
		

	//document.getElementById("drugName").value = drugDetails[0];
	
	document.getElementById("drugID").value= drugDetails[1];
	document.getElementById("drugUnitPrice").value= drugDetails[2];

		var opt = document.createElement('option');    
		// Assign value from the select tag "strength" to a variable

	// create text node to add to option element 
	opt.appendChild( document.createTextNode(drugDetails[0]));
	// set as selected	
	optdrug.selected = true;
	// set as hidden when field is enabled	
	optdrug.hidden = true;
	// set value property of opt
	optdrug.value = "";
	// add opt to end of select box (sel)
	select.appendChild(optdrug)
	
}

// Save the value in the session storage
function saveValue(e) {
	var id = e.id; // get the sender's id to save it . 
	var val = e.value; // get the value. 
	sessionStorage.setItem(id, val); // Save the value in the session Storage
}
// Load the values from the session storage
function loadSessionValues(){
	// Assign values from session storage 
	document.getElementById("doctorList").value = sessionStorage.getItem("doctorList"); 
	document.getElementById("prescriptionDate").value = sessionStorage.getItem("prescriptionDate"); 
	document.getElementById("customerName").value = sessionStorage.getItem("customerName");
	document.getElementById("customerAddress").value = sessionStorage.getItem("customerAddress"); 
	document.getElementById("customerDOB").value = sessionStorage.getItem("customerDOB"); 
}	
	
	
	