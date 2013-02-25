/*	********************************************* 
	*		PLUS 1 DEFAULT JAVASCRIPT			*
	*********************************************
	
	Author:		Luke Cheeseman
	Name:		default.js
	Date:		12/01/2012
	Description:	

	This Javascript creates a default page that the user
	can then add to, it's main process is to create a 
	column on the left of the screen at places the Plus1
	logo at the top left of this column, this can be used
	for every page.
*/
function start() {
	
	document.write("<DIV CLASS='Leftcol'>");	
	/*
		This line writes a line on the page where it is called which
		opens the class 'leftcol' that creates a column to the left of the screen
		where objects can be placed
	*/
	document.write("<DIV CLASS='Logo'>");
	document.write("	<IMG src='\images/Plus1Logo.png' alt='Plus1 Logo'>");
	/* 
		The above lines write lines onto the page where this javascript is called
		which opens the class 'Logo' which will then place the image, whose source
		\images/Plus1Logo.png is given on the second line, at the top left of the 
		column. The second line as gives the alternate text for when the image is
		hovered over that reads 'Plus1 Logo'.
	*/
	document.write("</DIV>");
	document.write("</DIV>");
	/* 
		These last two lines close the previously opened DIV classes
	*/
}