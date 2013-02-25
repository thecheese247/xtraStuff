<?php
session_start();
if (isset($_POST['LogOut']))
{
Unset ($_SESSION['Loggedin']);
}
if (isset($_SESSION['Loggedin']))
{
	if ($_SESSION['Loggedin']==TRUE) 
	{
	echo "Your are an idiot and are already logged in";
	echo"<br>";
	echo "CUNT";
	echo "
		<FORM METHOD='POST' ACTION='Login.php'>
		<INPUT TYPE='Submit' Name='LogOut' Value='Log Out' class='button'>
		</FORM>
		";
	}
}
	else
	{
		if(isset($_POST['Submit']))
		{
			$conn = MYSQL_CONNECT('localhost', 'root', '')
						or die('Could not connect to server');
					MYSQL_SELECT_DB('stuffevolves', $conn)
						or die('Could not select the database');
			$uname = TRIM($_POST['Username']);
			$pword = TRIM($_POST['Password']);
			$query = "SELECT *
						FROM user
						WHERE
						username = '$uname'
						AND
						password = PASSWORD('$pword')";
			$result = MYSQL_QUERY($query);
			if(MYSQL_NUM_ROWS($result) == 0)
			{
				$_SESSION['Loggedin']=FALSE;
				$woohoo="FAIL";
				echo "you have not been able to log in";
			}
			else
			{
				$_SESSION['Loggedin']=TRUE;
				while($row = mysql_fetch_array($result))
				{
					$_SESSION['Username']=($row['Username']);
					$_SESSION['User_ID']=($row['User_ID']);
					$User_ID=$_SESSION['User_ID'];
					$Username=$_SESSION['Username'];
					$woohoo="WIN";
					echo "You have succesfully logged in $Username";
			        echo "$User_ID  ";
				}
			}
		}
		else
		{
		echo
		"
			<HTML lang='en'>
			<HEAD>
			<LINK REL='stylesheet' HREF='StuffEvolves.css' TYPE='text/css'>
			<TITLE>Login</TITLE>
			<META http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
			<SCRIPT Language='JavaScript' type='text/JavaScript' src='default.js'></SCRIPT>
			</HEAD>

			<BODY>

			<SCRIPT Language='JavaScript' type='text/JavaScript'>
			start();
			</SCRIPT>
			<SCRIPT Language='JavaScript' type='text/JavaScript' src='ValidateLogin.js'></SCRIPT>
			
			<DIV CLASS='Body'>

				<DIV Class='Form'>
				<FORM METHOD='POST' ACTION='Login.php' onSubmit='return Validate(this)' class='big'>
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
				<DIV Class='Right'>
					<INPUT TYPE='Submit' Name='LogOut' Value='Log Out' class='button'>
				</DIV>
				</FORM>
				</DIV>

			</DIV>
			</BODY>
			</HTML>
			";
		}
	}
?>