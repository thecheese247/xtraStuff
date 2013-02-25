<?php
	$conn = MYSQL_CONNECT('localhost', 'root', '')
			or die('Could not connect to server');
	MYSQL_SELECT_DB('userprofiles', $conn)
			or die('Could not select the database');
	
		if(isset($_POST['submitc']))
		{
			$comment = $_POST['comment'];
			$uname = $_POST['uname'];
				$sql="INSERT INTO comment(username, comment) values ('$uname','$comment')";
				echo $sql;
				MYSQL_QUERY($sql);
				unset($_POST['submitc']);
				echo				
				"				
					<META HTTP-EQUIV='refresh' content='1; login2.php'>
				";				
			}
			else
			{
			if(!isset($_POST['submit']))
			{
				{	
				echo
				"
					<form name=login method=POST action=login2.php>
						<label>Username</label>
						<input type=text name=uname>
						<br>
						<label>Password</label>
						<input type=password name=pword>
						<br>
						<input type=submit name=submit value='Login'>
					</form>
				";
				}
			}
			else
			{
				$uname = TRIM($_POST['uname']);
				$pword = TRIM($_POST['pword']);
				if((empty($uname)) OR (empty($pword)))
				{
					echo
					"
						Please enter a username and a password.
					";
				}
				else
				{
					$query = "SELECT *
								FROM users
								WHERE
								username = '$uname'
								AND
								password = PASSWORD('$pword')";
					$result = MYSQL_QUERY($query);
					if(MYSQL_NUM_ROWS($result) == 0)
					{			
						echo
						"
							Login failed.  Please check your username and password.
						";
					}
					else
					{
					include 'form.php';	
					
					$sql_2 = "SELECT * FROM comment";
					$result = MYSQL_QUERY($sql_2);
			 
					while($row=MYSQL_FETCH_ARRAY($result))
					{
						$username_2 = $row['username'];
						$com_ID = $row['id_comment'];
						$comment_2 = $row['comment'];
						
					echo 
					"
					$com_ID
					<br>
					$username_2
					$comment_2
					<br>
					<input type=submit name=delete value='delete comment'>
					<input type=submit name=edit value='edit comment'>
					<br>
					";
					}
					if(isset($_POST['delete']))
					{
					$query2= "DELETE 
							FROM comment
							WHERE
							id_comment = '$com_ID'";
					MYSQL_QUERY($query2);
					}
					unset($_POST['submitc']);

					
					
					/* DELETE FROM
						table_name
						WHERE
						columm1 =
						
					UPDATE
					table_name
					SET
					
					WHERE
					*/
					
					}							
				}
			}
		}
	
?>