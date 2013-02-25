<?php
/*	********************************************* 
	*			PLUS 1 ANSWER SCREEN			*
	*********************************************
	
	Author:		Luke Cheeseman
	Name:		Answer.php
	Date:		26/01/2012
	Description:	

	This page compares the users answer from the question page
	with the correct answer, it then informs them whether they
	were right or wrong, if they were right a relevant score
	is calculated from the difficulty of the question and added
	to their current score. This page also displays the correct
	answer, regardless of whether they got the question right
	or wrong, from here they can then answer the next question.
*/
$Topic=$_POST['TopicID'];
$Score=$_POST['Score'];
$Qnumber=$_POST['Qnumber'];
$Ans=$_POST['Ans'];
$UAns=$_POST['UAns'];
$Diff=$_POST['Diff'];
/* 
The current topic, the users current score, question number and their
answer to the question are all retrieve from the previous page as well
as the correct answer for the question and the question difficulty
*/
if ($UAns==$Ans)
{
	$Result="right";
	$Score=$Score+($Diff*5);
}
/*
this section of code compares the users answer with the correct answer
if they answered correctly then, the variable $Result is assigned the
string 'right' and a score is created by multiplying the difficulty
of the question by 5, this value is then added to the users current
score
*/
else
{
	$Result="wrong";
}
/*
echo
"TopicID is " . $Topic . "<BR>" . "User answer is " . $UAns . "<BR>" . "Correct answer is " . $Ans . "<BR>" . "Result is " . $Result . "<BR>" . "Score is " . $Score . "<br>" . "Difficulty is " . $Diff;
*/
/*
if the user gor the question wrong then the string 'wrong' is assigned 
to the variable $Result and the user gets no score
*/

echo
"
<HTML lang='en'>
<HEAD>
<LINK REL='stylesheet' HREF='Plus1.css' TYPE='text/css'>
<TITLE>Answer</TITLE>
<META http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
<SCRIPT Language='JavaScript' type='text/JavaScript' src='Default.js'></SCRIPT>
</HEAD>

<BODY>

<SCRIPT Language='JavaScript' type='text/JavaScript'>
start();
</SCRIPT>

<DIV CLASS='AltBody'>
	<DIV CLASS='Form'>
	<FORM METHOD='GET' ACTION='Question.php'>
	<INPUT TYPE='hidden' Name='Score' value=$Score>
	<INPUT TYPE='hidden' Name='Qnumber' value=$Qnumber>
	<INPUT TYPE='hidden' Name='TopicID' value=$Topic>
	<DIV class='big'>
	<DIV CLASS='Center'>Your answer was $Result</DIV>
	<BR>
	<DIV CLASS='Center'>The correct answer was $Ans</DIV>
	<BR>
	</DIV>
	<DIV CLASS='Center'>
		<INPUT TYPE='submit' Value='next question' class='button'>
	</DIV>
	</FORM>
	</DIV>
<!--
The elements here are initially centred using the tag
AltBody In this form, $Score, $Qnumber and $Topic are all
posted when the submit button is pressed, these are not 
seen by the user. Also the user is taken to the question 
page, Question.php. $Result is concatenated into a string
to tell the user whether they answered the question right
or wrong, this is position using the tag 'Center'. $Ans is 
also concatenated into a string to tell the user the
correct answer, regardless of whether they got the answer
right or wrong, also positioned using 'Center'. A button
with the value 'next question' is placed beneath the two
strings and when click submits the data in the form and 
takes the user to Question.php
-->	
</DIV>
</BODY>
<DIV class='Bottom'>
	<IMG src='images/AddemAnswer.png' alt='Addem thinking'>
</DIV>
<!--
the AddemAnswer.png image is placed in the bottom right of the screen
using the bottom tag, and has alternate text 'Addem thinking' the 
location of the image is images/AddemAnswer.png
-->	
</HTML>	
";

?>