<?php
	if(isset($_POST['submit']))
	{
		$uname = trim($_POST['username']);
		$pword = trim($_POST['password']);
		
		if((empty($uname)) OR (empty($pword)))
		{
			echo 
			"
				'Enter a Username AND Password'
				<form name=login method=POST action=problem.php>
					<label>Username</label>
					<input type=text name=username value='     '>					
					<br>
					<label>Password</label>
					<input type=password name=password value='     '>					
					<br>					
					<input type=submit name=submit value='Submit'>
				</form>
			";			
		}
		else
		{
			
		}
	}
	else
	{
		echo
		"
				<form name=login method=POST action=problem.php>
					<label>Username</label>
					<input type=text name=username value='     '>
					<br>
					<label>Password</label>
					<input type=password name=password value='     '>					
					<br>
					<input type=submit name=submit value='Submit'>
				</form>
		";
	}
?>