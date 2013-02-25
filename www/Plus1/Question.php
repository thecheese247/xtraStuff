<?php
/*	********************************************* 
	*		PLUS 1 QUESTION/SCORE SCREEN		*
	*********************************************
	
	Author:		Luke Cheeseman
	Name:		Question.php
	Date:		02/02/2012
	Description:	

	This is the question selection screen where the pupil is
	asked questions on the topic that they have clicked on
	however if they have answer 5 topics they are presented
	with a score and can pick another topic
*/
$TopicID=$_GET['TopicID'];
$Score=$_GET['Score'];
$Qnumber=($_GET['Qnumber']+1);
/*
The variables, $TopicID, $Score and $Qnumber are aquired from the
previous page
*/
$conn = MYSQL_CONNECT('localhost', 'root', '')
			or die('Could not connect to server');
		MYSQL_SELECT_DB('plus1', $conn)
			or die('Could not select the database');
		$query = "SELECT *
				FROM topic
				WHERE
				TopicID = '$TopicID'";
		$result = MYSQL_QUERY($query);
		while($row = mysql_fetch_array($result))
			{
				$Topic=($row['Topic']);
			}
/*
a connection with the topic table in the Plus1 database is made
and the name of the topic is assigned to $Topic by querying the
database by the TopicID
*/
if ($Qnumber==5)
/*
The value in the variable $Qnumber is inspected and if 
the value is 5, implying the user has answered 5 
questions then they are presented with their score,
otherwise they are asked another question
*/
{
	echo
	"
	<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
	<HTML lang='en'>
	<HEAD>
	<LINK REL='stylesheet' HREF='Plus1.css' TYPE='text/css'>
	<TITLE>Score</TITLE>
	<META http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
	<SCRIPT Language='JavaScript' type='text/JavaScript' src='default.js'></SCRIPT>
	</HEAD>

	<BODY>

	<SCRIPT Language='JavaScript' type='text/JavaScript'>
	start();
	</SCRIPT>

	<DIV class='Altbody'>	
		<DIV Class='Form'>
		<FORM METHOD='POST' ACTION='TopicSelection.php'>
		<DIV Class='big'>
		<DIV Class='Center'>You scored</DIV>
		<br>
		<DIV Class='Center'>$Score</DIV>
		<br>
		<DIV Class='Center'>	
			<INPUT TYPE='submit' Value='pick another topic' class='button'>
		</DIV>
		</DIV>
		</FORM>
		</DIV>
<!--
Here the user is presented with a a message 'You scored' with their
score in $Score variable below this message, these will be positioned
using the center tag. Also a button with the value 'pick another topic
is on this page that will return the user to the topic slection page
TopicSelection.php  
-->	
	</DIV>
	</BODY>
	<DIV class='Bottom'>
		<IMG src='images/AddemScore.png' alt='Addem smiling'>
<!--
the AddemScore.png image is placed in the bottom right of the screen
using the bottom tag, and has alternate text 'Addem smiling' the
location for the image is images/AddemScore.png
-->
	</DIV>
	</HTML>
	";
}
else
{
	if ($Topic=="Addition" OR $Topic=="Subtraction")
/* 
if the Topic is Addition or Subtraction then this
code is executed
*/
	{
		if ($Topic=="Addition")
		{
			$Sign="+";
/* this assigns the variable $sign as '+'*/
			$QNo1=mt_rand(0, 25);
			$QNo2=mt_rand(0, 25);
/*
here two random integers between 0 and 25 are created
and assigned to the variables $QNo1 adn $QNo2
*/
			$Ans = $QNo1 + $QNo2;
	/*
the variable $Ans is assigned by adding the two random
integers together stored in $QNo1 and $QNo2
*/
			switch ($Ans) 
				{
					case $Ans>=41:
						$Diff = 5;
						break;
					case $Ans>=31:
						$Diff = 4;
						break;
					case $Ans>=21:
						$Diff = 3;
						break;
					case $Ans>=11:
						$Diff = 2;
						break;
					case $Ans>=0:
						$Diff = 1;
						break;
/*
From the magnitude of the answer the difficulty of the answer
is worked out, the larger the answer the higher the difficulty,
once a case is true, and value for $Diff is assigned and the
system exits the select case/switch algorithm
*/ 
			}
		}
		else
		{
			$Sign="-";
/* this assigns the variable $sign as '-'*/
			do
			{
			$QNo1=mt_rand(0, 50);
			$QNo2=mt_rand(0, 50);
			$Ans = $QNo1 - $QNo2;
			}
			while ($Ans<0);
/*
This code creates two random integers between 0 and
50, and assigns them to $QNo1 and $QNo2 it then 
subtracts the $QNo2 from $QNo1 to get the answer which
is assigned to $Ans, it repeats this answer until it 
gets a value for $Ans qhich is greater than 0
*/
			switch ($QNo2) 
				{
					case $Ans>=41:
						$Diff = 5;
						break;
					case $Ans>=31:
						$Diff = 4;
						break;
					case $Ans>=21:
						$Diff = 3;
						break;
					case $Ans>=11:
						$Diff = 2;
						break;
					case $Ans>=0:
						$Diff = 1;
						break;
				}
/*
From the magnitude of the answer the difficulty of the answer
is worked out, the larger the range between $QNo1 and $QNo2
the higher the difficulty, once a case is true, and value for
$Diff is assigned the system exits the select case/switch 
algorithm
*/ 
		}
		$Question=($QNo1 . " " . $Sign . " " . $QNo2 . "=");
/*
$QNo1, $QNo2, $Sign and an = are then concatenated into a string
which is assigned to the variable $Question which follow this
formating '$QNo1$Sign$QNo2=' or '2+2='
*/
	}
	else
	{ 
/*
if the topic is anything but Addition or Subtraction
*/
		$query = "SELECT *
				FROM question				
				WHERE
				TopicID = '$TopicID'
				ORDER BY RAND() LIMIT 1";
		$result = MYSQL_QUERY($query);
		while($row = mysql_fetch_array($result))
		{
				$Question=($row['Question']); 
				$Ans=($row['Answer']);
				$Diff=($row['Difficulty']);
		}
	}
/*
the question table in the Plus1 database is queried by TopicID,
the results of the query are then ordered randomly and the first
result is selected, then $Question is assigned the stored question,
$And the stored answer and $Diff the stored difficulty
*/
	echo
		"
		<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
		<HTML lang='en'>
		<HEAD>
		<LINK REL='stylesheet' HREF='Plus1.css' TYPE='text/css'>
		<TITLE>$Topic</TITLE>
		<META http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
		<SCRIPT Language='JavaScript' type='text/JavaScript' src='default.js'></SCRIPT>
		</HEAD>

		<DIV Class='Leftcol'>
			<DIV Class='Heading'>$Topic</DIV>
		</DIV>

		<BODY>

		<SCRIPT Language='JavaScript' type='text/JavaScript'>
		start();
		</SCRIPT>

		<DIV class='body'>	
			<DIV Class='Form'>
			<FORM METHOD='POST' ACTION='Answer.php'>
			<INPUT TYPE='hidden' Name='Ans' value=$Ans>
			<INPUT TYPE='hidden' Name='Diff' value=$Diff>
			<INPUT TYPE='hidden' Name='Score' value=$Score>
			<INPUT TYPE='hidden' Name='Qnumber' value=$Qnumber>
			<INPUT TYPE='hidden' Name='TopicID' value=$TopicID>
			<br>
			<br>
			<br>
			<DIV Class='Question'>$Question</DIV>
			<DIV Class='AnsRight'>
				<INPUT TYPE='text' Name='UAns' Size='5' class='Answer'>
			</DIV>
			<DIV Class='AnsRight'>	
				<INPUT TYPE='submit' Value='submit' class='button'>
			</DIV>
			</FORM>
			</DIV>
<!--
In this form, $Ans, $Diff, $Score, $Qnumber and $TopicID are all posted
when the submit button is pressed, the question that is being asked of
the use, $Question, is position using the Question tag and the text
box next to it uses AnsRight, in this text box the user is able to give
their answer to the question which is posted when the user clicks submit.
This button sends the user to the answer screen where they can find out
whether their answer was right or wrong
-->	
		</DIV>
		<DIV class='Bottom'>
				<IMG src='images/AddemQuestion.png' alt='Addem talking'>
		</DIV>
<!--
the AddemQuestion.png image is placed in the bottom right of the screen
using the bottom tag, and has alternate text 'Addem talking' the
location for the image is images/AddemQuestion.png
-->	
		</BODY>
		</HTML>
		";
}
?>