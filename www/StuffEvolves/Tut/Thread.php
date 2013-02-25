<?php
session_start();
$Forum=$_GET['Forum'];
$Thread=$_GET['Thread'];
if (isset($_SESSION['Loggedin']))
{
	if ($_SESSION['Loggedin']==TRUE)
	{
	$CanReply=TRUE;
	}
	else
	{
	$CanReply=FALSE;
	}
}
else
{
$CanReply=FALSE;
}	

$conn1 = MYSQL_CONNECT('localhost', 'root', '')
			or die('Could not connect to server');
		MYSQL_SELECT_DB($Forum , $conn1)
			or die('Could not select the database');
		$query1 = "SELECT *
				FROM $Thread";
		$result1 = MYSQL_QUERY($query1);


$Arraydef=0;

		
$conn2 = MYSQL_CONNECT('localhost', 'root', '')
			or die('Could not connect to server');
		MYSQL_SELECT_DB('stuffevolves', $conn2)
			or die('Could not select the database');

echo
"
<HTML lang='en'>
<HEAD>
<LINK REL='stylesheet' HREF='StuffEvolves.css' TYPE='text/css'>
<TITLE>Test</TITLE>
<META http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
</HEAD>
<FORM METHOD='POST' ACTION='AddComment.php'>
<table border='1'>
<tr>
<th>User</th>
<th>Comment</th>
</tr>
";

while($row = mysql_fetch_array($result1))
			{
				$Arraydef = $Arraydef + 1;
				$ArrComment[$Arraydef]=($row['comment']);
				$ArrUser_ID[$Arraydef]=($row['User_ID']);
				$queryuser = " SELECT *
							FROM user
							WHERE User_ID = $ArrUser_ID[$Arraydef]
							";
				$resultuser = MYSQL_QUERY($queryuser);
				while($row = mysql_fetch_array($resultuser))
							{
							$ArrUsername[$Arraydef]=($row['Username']);
							$ArrJDate[$Arraydef]=($row['Date Joined']);
							}
		
echo
"
<tr>
<td> Username: $ArrUsername[$Arraydef] <br> Date Joined: $ArrJDate[$Arraydef]</td>
<td>$ArrComment[$Arraydef]</td>
</tr>
";
}
echo 
"
</table>
<br>
";
if ($CanReply==TRUE)
{
echo
"
<textarea rows='5' cols='50' NAME='NewComment'> Write your reply here... </textarea> <br>
<INPUT TYPE='submit' NAME='submit' Value='submit' class='button'>
</FORM>
";
}
else
{
echo
"
</FORM>
";
}
?>