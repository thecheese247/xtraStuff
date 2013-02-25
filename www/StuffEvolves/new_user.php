<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?php
$conn = MYSQL_CONNECT('localhost', 'root', '')
			or die('Could not connect to server');
		MYSQL_SELECT_DB('stuffevolves', $conn)
			or die('Could not select the database');
		$query = "SELECT Username
				FROM users";
		$result = MYSQL_QUERY($query);
		
/*	$query = "SELECT *
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
		*/
?>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	<title>Stuff-Evolves</title>
</head>
	<body>
	
		<div id="wrapper">
			<?php include('includes/header.php'); ?>
			<?php include('includes/nav.php'); ?>
			<div id="content">
				<H1>Add a new user</H1>
				<br>
				<DIV Class='Form'>
				<!--<FORM METHOD='POST' ACTION='Login.php' onSubmit='return Validate(this)' class='big'--> 
				<!-- what is this?. commented out and it 'worked'-->
				<DIV Class='Left'>Username:</Div>
				<DIV class='Right'>
					<INPUT TYPE='text' NAME='Username' Size=30 class='big'>
				</DIV>
				<br>
				
				<DIV Class='Left'>Password:</Div>
				<DIV class='Right'>
					<INPUT TYPE='password' NAME='Password' Size=30 class='big'>
				</DIV>
				<br>
				
				<DIV Class='Left'>Retype Password:</DIV>
				<DIV>
					<INPUT TYPE='password' NAME='Password#2' Size=30 class='big'>
				</DIV>
				<br>
				
				<DIV Class='Left'>Email:</DIV>
				<DIV>
					<INPUT TYPE='text' NAME='email' Size=30 class = 'big'>
				</DIV>
				<br>
				
				<DIV Class='Right'>
					<INPUT TYPE='Submit' Name='Submit' Value='Submit' class='button'>
				</DIV>
				</FORM>
				</DIV>
				<h2>current users</h2>
				<?php echo $result ?>
				<?php 	
				if	(isset($_POST['Submit']))
				{
					$uname = TRIM($_POST['Username']);
					$pword = TRIM($_POST['Password']);
					$pword2 = TRIM($_POST['Password#2']);
					$email = TRIM($_POST['email']);
					$date; // TODO get date function
					if ($pword = $pword2) //TODO make this work. 
					{
					$sql = "INSERT INTO users (Username, Password, Email , DateJoined)VALUES (\'testU2\' , \'testP2\', \'testE2\', \'18/08/2012\')";
					mysql_query($sql);
					 //TODO this also doesnt work
					}
				}
				?>
			</div> <!-- end #content -->
			<?php include('includes/sidebar.php'); ?>
			<?php include('includes/footer.php'); ?>		
		</div> <!-- End #wrapper -->
	</body>
</html>