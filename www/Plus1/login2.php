<?php
/*	********************************************* 
	*		PLUS 1 LOGIN/ADD QUESTION SCREEN	*
	*********************************************
	
	Author:		Luke Cheeseman
	Name:		Login.php
	Date:		10/02/2012
	Description:	

	This is the login screen, here a teacher can login
	using a username and password and, if valid they are
	presented with a screen which allows them to input
	data which can then be added to the 'question' table
	in the 'plus1' database
	
*/	
if	(isset($_POST['Submit']))
/*
this test whether or not the user has submitted a username
an password
*/
{
/*
if the user has submitted a username and password then the
following occurs
*/
		$conn = MYSQL_CONNECT('localhost', 'root', '')
					or die('Could not connect to server');
				MYSQL_SELECT_DB('plus1', $conn)
					or die('Could not select the database');
		$uname = TRIM($_POST['Username']);
		$pword = TRIM($_POST['Password']);
		$query = "SELECT *
					FROM teacher
					WHERE
					username = '$uname'
					AND
					password = PASSWORD('$pword')";
		$result = MYSQL_QUERY($query);
		if(MYSQL_NUM_ROWS($result) == 0)
		{
			$Progress=FALSE;
		}
		else
		{
			$Progress=TRUE;
		}
/*
A connection is made with the Plus1 database, then the
blanks are removed from the user input fields for their
username and password, the table 'teacher' is then 
queryed using the username and password, if the result
is 0 the $Progress is set FALSE otherwise it set TRUE
*/
	if($Progress==TRUE)
	{
/*
if $Progress is TRUE then the user is allowed to enter
an new question to the database
*/
		echo
		"
		<HTML lang='en'>
		<HEAD>
		<LINK REL='stylesheet' HREF='Plus1.css' TYPE='text/css'>
		<TITLE>Add Question</TITLE>
		<META http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
		<SCRIPT Language='JavaScript' type='text/JavaScript' src='default.js'></SCRIPT>
		</HEAD>

		<BODY>

		<SCRIPT Language='JavaScript' type='text/JavaScript'>
		start();
		</SCRIPT>
		<SCRIPT Language='JavaScript' type='text/JavaScript' src='ValidateFields.js'></SCRIPT>

		<DIV CLASS='Body'>

			<H1>Please complete all fields and click submit to add a question<H1>
			<br>
			<DIV Class='Form'>
			<FORM METHOD='POST' ACTION='Confirmation.php' onSubmit='return Validate(this)' class='big'>
			<DIV Class='Left'>Question:</Div>
			<DIV class='Right'>
				<INPUT TYPE='text' NAME='Question' Size=50 class='big'>
			</DIV>
			<DIV Class='Left'>Answer:</Div>
			<DIV class='Right'>
				<INPUT TYPE='text' NAME='Answer' Size=50 class='big'>
			</DIV>
			<DIV Class='Left'>Topic:</Div>
			<DIV Class='Right'>
				<SELECT NAME='Topic' class='big'>
					<OPTION VALUE=''>--Topic--
					<OPTION VALUE='3'>Multiplication
					<OPTION VALUE='4'>Division
					<OPTION VALUE='5'>Fractions
					<OPTION VALUE='6'>Decimals
					<OPTION VALUE='7'>Shapes
					<OPTION VALUE='8'>Ordering Numbers
					<OPTION VALUE='9'>Ordering Decimals
				</SELECT>
			</DIV>
			<DIV Class='Left'>Difficulty:</Div>
			<DIV Class='Right'>
				<SELECT NAME='Difficulty' class='big'>
					<OPTION VALUE=''>--Difficulty--
					<OPTION VALUE='1'>1
					<OPTION VALUE='2'>2
					<OPTION VALUE='3'>3
					<OPTION VALUE='4'>4
					<OPTION VALUE='5'>5
				</SELECT>
			<br>
			<br>
			</DIV>
			<DIV Class='Right'>	
				<INPUT TYPE='submit' Value='submit' class='button'>
			</DIV>
			</FORM>
			</DIV>
<!--
A form is created that contains multiple elements, and header prompting
the user to enter data into all fields to enter a question, an input box,
positioned using right, where the user can enter the question, and input
box, uses 'right', where the user can input the answer, an combo box
where the user can select from all of the available topics, this doesn't
include addition nor subtraction as these are randomly created, a combo
box where the user can select the difficulty between 1-5, the combo boxes
are positioned using 'right', the left of each of these elements is a
message to the user, positioned using 'left', that tells the user what 
data is required in the field, these are all formatted using 'big'.
After all of this a button is placed, using 'button' and 'right', that
when clicked submits all the inputted data, if there are blanks in any
field than an error message appears prompting them to input data into the
relevant fields, so that it can be used in the confirmation page, 
Confirmation.php, to add the question the 'question' table in the 'Plus1'
database, and it also takes the user to the confirmation page where the
data they teacher entered is displayed back to them to ensure it is correct 
-->
		</DIV>
		</BODY>
		</HTML>
		";
	}
	else
	{
/*
if $Progress is FALSE then they are presented with an error message as well
as the oppotunity to enter a username and password again
*/
		echo
		"
<!--
This page is exactly the same as the original Login page except the header message has
changed from 'To add a question you must first login' to 'Login failed.  Please check 
your username and password.'
-->
		<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
		<HTML lang='en'>
		<HEAD>
		<LINK REL='stylesheet' HREF='Plus1.css' TYPE='text/css'>
		<TITLE>Teacher Login</TITLE>
		<META http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
		<SCRIPT Language='JavaScript' type='text/JavaScript' src='default.js'></SCRIPT>
		</HEAD>

		<BODY>

		<SCRIPT Language='JavaScript' type='text/JavaScript'>
		start();
		</SCRIPT>
		<SCRIPT Language='JavaScript' type='text/JavaScript' src='ValidateLogin.js'></SCRIPT>

		<DIV CLASS='Body'>

			<H1>Login failed.  Please check your username and password.<H1>
			<br>
			<DIV Class='Form'>
			<FORM METHOD='POST' ACTION='Login2.php' onSubmit='return Validate(this)'>
			<DIV Class='Left'>Username:</Div>
			<DIV class='Right'>
				<INPUT TYPE='text' NAME='Username' Size=30 class='big'>
			</DIV>
			<DIV Class='Left'>Password:</Div>
			<DIV class='Right'>
				<INPUT TYPE='password' NAME='Password' Size=30 class='big'>
			</DIV>
			<br>
			<DIV Class='Right'>
				<INPUT TYPE='Submit' Name='Submit' Value='Submit' class='button'>
			</DIV>
			</FORM>
			</DIV>
		</DIV>
		</BODY>
		</HTML>
		";
	}
}
else
{
	echo
	"
	<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
	<HTML lang='en'>
	<HEAD>
	<LINK REL='stylesheet' HREF='Plus1.css' TYPE='text/css'>
	<TITLE>Teacher Login</TITLE>
	<META http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
	<SCRIPT Language='JavaScript' type='text/JavaScript' src='default.js'></SCRIPT>
	</HEAD>

	<BODY>

	<SCRIPT Language='JavaScript' type='text/JavaScript'>
	start();
	</SCRIPT>
	<SCRIPT Language='JavaScript' type='text/JavaScript' src='ValidateLogin.js'></SCRIPT>
<!--
The Javascript ValidateLogin.js is included that will be used to check the the user hasn't
left the username and password field blank
-->
	<DIV CLASS='Body'>

		<H1>To add a question you must first login<H1>
		<br>
		<DIV Class='Form'>
		<FORM METHOD='POST' ACTION='Login2.php' onSubmit='return Validate(this)' class='big'>
		<DIV Class='Left'>Username:</Div>
		<DIV class='Right'>
			<INPUT TYPE='text' NAME='Username' Size=30 class='big'>
		</DIV>
		<DIV Class='Left'>Password:</Div>
		<DIV class='Right'>
			<INPUT TYPE='password' NAME='Password' Size=30 class='big'>
		</DIV>
		<br>
		<DIV Class='Right'>
			<INPUT TYPE='Submit' Name='Submit' Value='Submit' class='button'>
		</DIV>
		</FORM>
		</DIV>
<!--
The user is promted to enter a username and password via a header message, using H1, 
in this form, which uses 'big' to format the text in the form, the are two input 
boxes, which are positioned using 'right' and formatted using 'big', to the left of
each, the required data is indicated by a message to left of the box, positioned using
'left', also a button is placed, using 'right' and formatted using 'big', that, when
clicked, first uses the ValidateLogin.js to check that the user hasn't left the fields 
blank, if so an error message will be dislpayed, it will then retrun the user to this
page, login.php, where the algorithms will decide whether or not the user can add a 
question
-->
	</DIV>
	</BODY>
	</HTML>
	";
}
?>