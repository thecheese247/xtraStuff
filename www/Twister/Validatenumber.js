<!-- Hide Javascript from old browsers
function Validate(theForm) {
	var error = "";
	
	if ((isNaN(theForm.elements[0].value)) || ((theForm.elements[0].value).replace(/^\s+|\s+$/g,"")== "")) {
			error += "Please enter a time\n";
	}

	if (error !="") {
		error += "\nto continue\n";
		alert(error);
		return false;
	}
	else {
		return true;
	}
}
-->