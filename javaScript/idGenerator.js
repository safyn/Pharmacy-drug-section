/*
Name : idGenerator.js
Purpose : Generate time from 1970 in milliseconds. The generated value can be used as unique id 
Author: Krzysztof Bas 
Date: 17/02/2020
*/


function generateId() {
	var uid = (new Date().getTime());          		/* Generate time count in milliseconds */
  	document.getElementById('id').value = uid;		/* Assign time variable into a input field */
}

