<?php
/*	********************************************* 
	*		PLUS 1 CONFIRMATION SCREEN		*
	*********************************************
	
	Author:		Luke Cheeseman
	Name:		Confirmation.php
	Date:		12/02/2012
	Description:	

	This page is used to add the inputted data from
	the user, on the add question page, login.php,
	into the 'question' table, it also displays this
	data to the user to ensure that the correct data
	is being entered into the table, it also allows
	the user to return to the topic screen
	
*/	
$Question=$_POST['Question'];
$Answer=$_POST['Answer'];
$TopicID=$_POST['Topic'];
$Diff=$_POST['Difficulty'];
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
Here the data that the user inputted into the add question page
is retrieved and the Question is assigned to $Question, 
Answer to $Answer, TopicID to $TopicID and Difficulty to $Diff,
a conection is also established with the 'Plus1' database, and 
querying the 'topic' table using $TopicID, the actual topic title 
is retrieved and assigned to $Topic
*/			
$query="INSERT INTO question (Question, Answer, TopicID, Difficulty) VALUES ('" . $Question . "','" . $Answer . "','" . $TopicID . "','" . $Diff ."')";
		$result=MYSQL_QUERY($query);
/*
The Question, Answer, TopicID and Difficulty that the user entered
are inserted in the the 'question' Table
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

<DIV CLASS='Body'>
	<H1>Your question has been added, click return to return to the topic slection screen<H1>
	<br>
</DIV>
<!--
A header, using 'H1', is placed that confirming that the users
question has been added to the 'question' table and prompting
them to click return 
-->
<DIV CLASS='AltBody'>
	<FORM Class='big'>
	<DIV Class='Center'>The question was $Question</DIV>
	<br>
	<DIV Class='center'>The answer was $Answer</DIV>
	<br>
	<DIV Class='center'>The topic was $Topic</DIV>
	<br>
	<DIV Class='center'>The difficulty was $Diff</DIV>
	<br>
	</FORM>
<!--
The variables $Question, $Answer, $Topic and $Diff
are all concatenated into strings to inform the user
of the data that has been entered into the 'question'
table, these are formatted using 'center' and are
within a form using 'big'
-->
	<DIV Class='center'>
	<FORM METHOD='POST' ACTION='TopicSelection.php'>
	<DIV Class='left'>
		<INPUT TYPE='submit' Value='Return' class='button'>
	</DIV>
	</FORM>
<!--
A button, placed using 'left' and formatted using 'button',
is placed onscreen that allows the user to return to the topic
selection screen
-->
	</DIV>
</DIV>
</BODY>
</HTML>
";

?>
