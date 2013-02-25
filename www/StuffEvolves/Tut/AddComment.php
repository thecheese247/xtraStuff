<?php
session_start();
/*
make an include that sets user rights that can be included in every page

*/
if ($_SESSION['Loggedin']==TRUE)
{
$conn1 = MYSQL_CONNECT('localhost', 'root', '')
			or die('Could not connect to server');
		MYSQL_SELECT_DB('stuffevolvesforums', $conn1)
			or die('Could not select the database');

$NewComment=$_POST['NewComment'];
$User_ID=$_SESSION['User_ID'];
$Forum_ID=1;
$Addcommentquery="INSERT INTO test (Forum_ID, User_ID, comment) VALUES ('" . $Forum_ID . "','" . $User_ID . "','" . $NewComment . "')";
		$commresult=MYSQL_QUERY($Addcommentquery);		
			
echo
"
<HTML lang='en'>
					<HEAD>
					<LINK REL='stylesheet' HREF='StuffEvolves.css' TYPE='text/css'>
					<TITLE>AddComment</TITLE>
					<META http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
					<META http-equiv='refresh' content='1 ; url=http://127.0.0.1/StuffEvolves/Tut/Forum.php' > 
					</HEAD>
					
Your Comment has been added
";
}
else
echo
"
<HTML lang='en'>
					<HEAD>
					<LINK REL='stylesheet' HREF='StuffEvolves.css' TYPE='text/css'>
					<TITLE>AddComment</TITLE>
					<META http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
					<META http-equiv='refresh' content='1 ; url=http://127.0.0.1/StuffEvolves/Tut/Forum.php' > 
					</HEAD>
					
Fuck Woo
";
?>