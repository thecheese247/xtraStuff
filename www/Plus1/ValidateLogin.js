/*
	********************************************* 
	*		PLUS 1 VALIDATE LOGIN JAVASCRIPT	*
	*********************************************
	
	Author:		Luke Cheeseman
	Name:		ValidateLogin.js
	Date:		13/02/2012
	Description:	

	This is the javascript used to validate the
	teacher login on Login.php
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
			error += "Please enter a username\n";
	}
/*
this checks the first field and, if blank adds
'please enter a usernamename' to the error list
*/	
	if (theForm.elements[1].value == "") {
			error += "Please enter a password\n";
	}
/*
this checks the second field and, if blank adds
'please enter a password' to the error list
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