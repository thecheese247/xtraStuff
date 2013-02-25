/*
	********************************************* 
	*		PLUS 1 VALIDATE LOGIN JAVASCRIPT	*
	*********************************************
	
	Author:		Luke Cheeseman
	Name:		ValidateFields.js
	Date:		13/02/2012
	Description:	

	This is the javascript used to validate the
	add question fields on Login.php
*/
<!-- Hide Javascript from old browsers
function Validate(theForm) {
/*
this is the function title and alsot the parameters
it is being passed, namely the form that it is 
validating 
*/	
	
	
	var error = "";
/* initialising the variable error to nothing*/		
	if (theForm.elements[0].value == "") {
			error += "Please enter a question\n";
	}
		
/*
this checks the first field and, if blank, adds
'please enter a question' to the error list
*/	
	if (theForm.elements[1].value == "") {
			error += "Please enter an answer\n";
	}
/*
this checks the second field and, if blank, adds
'please enter an answer' to the error list
*/
	if (theForm.elements[2].value == "") {
			error += "Please enter a topic\n";
	}
/*
this checks the third field and, if blank, adds
'please enter a topic' to the error list
*/	
	if (theForm.elements[3].value == "") {
			error += "Please enter a difficulty\n";
	}

/*
this checks the fourth field and, if blank, adds
'please enter a difficulty' to the error list
*/
	if (theForm.elements[0].value.length > 255) {
		error += "Please reduce question length\n";
	}
/*
this checks the first field and, if the entered
string is greater than 255 characters adds
'Please reduce question length' to the error list
*/	
	if (theForm.elements[1].value.length > 255) {
		error += "Please reduce answer length\n";
	}
/*
this checks the second field and, if the entered
string is greater than 255 characters adds
'Please reduce answer length' to the error list
*/		
	if (error !="") {
		error += "\nto continue\n";
		alert(error);
		return false;
	}
	else {
		return true;
	}
/*
if the error list is empty then the returned value
is true and the user is allowed to progress to the
next screen, otherwise flase is returned and an 
error message is presented to the user showing the 
errors prompting them to correct the to continue
*/
}
-->
