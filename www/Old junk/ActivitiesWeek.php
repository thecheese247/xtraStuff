<?php

	if(isset($_POST['Submit']))
	{
		echo "Submit Button Pressed";
		echo "<br>";
		echo "First name is " . $_POST['FName'];
		echo "<br>";
		echo "Last name is " . $_POST['LName'];
		echo "<br>";
		echo "Form group is " . $_POST['FGroup'];
		echo "<br>";
		
		
		$host = "127.0.0.1";
		$user = "root";
		$passwd = "";
		$dbname = "activities";
		
		$connection = MYSQL_CONNECT($host, $user, $passwd) or
			die("Failed to connect to server. " . MYSQL_ERROR());
			
		$selected = MYSQL_SELECT_DB($dbname, $connection) or
			die("Failed to connect tothe database. " . MYSQL_ERROR());
			
		$formtext = $_POST['FName'] . "','" . $_POST['LName'] . "','" . $_POST['FGroup'] . "','" . $_POST['M1'] . "','" . $_POST['M2'] . "','" . $_POST['M3'] . "','" . $_POST['T1'] . "','" . $_POST['T2'] . "','" . $_POST['T3'] . "','" .$_POST['W1'] . "','" . $_POST['W2'] . "','" . $_POST['W3'] . "','" .$_POST['T1'] . "','" . $_POST['T2'] . "','" . $_POST['T3'];
	
	   /* Open file for appending data, if file does not exist, PHP will try to create it */

		if (!$fp = fopen("formdata.txt","a")) 
		{
			Printf ("could not open file");
		} 
		else 
		{
			fwrite($fp, $formtext);
			fclose($fp);
		}
		
		$sql="INSERT INTO options values ('" . $_POST['FName'] . "','" . $_POST['LName'] . "','" . $_POST['FGroup'] . "','" . $_POST['M1'] . "','" . $_POST['M2'] . "','" . $_POST['M3'] . "','" . $_POST['T1'] . "','" . $_POST['T2'] . "','" . $_POST['T3'] . "','" .$_POST['W1'] . "','" . $_POST['W2'] . "','" . $_POST['W3'] . "','" .$_POST['T1'] . "','" . $_POST['T2'] . "','" . $_POST['T3'] . "')";
		echo $sql;
		$result=MYSQL_QUERY($sql);

	}
	else
	{
	echo
	"
	<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
		<html xmlns='http://www.w3.org/1999/xhtml'>
		<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<title>Activities Week</title>
		<style type='text/css'>
		<!--
		#apDiv1 {
			position:absolute;
			left:159px;
			top:5px;
			width:612px;
			height:48px;
			z-index:1;
			font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
			font-size: 36px;
			color: #060;
			background-color: #000000;
			text-align: center;
		}
		#apDiv2 {
			position:absolute;
			left:4px;
			top:6px;
			width:153px;
			height:178px;
			z-index:2;
		}
#apDiv3 	{
	position:absolute;
	left:158px;
	top:53px;
	width:613px;
	height:543px;
	z-index:3;
	font-size: 36;
	background-color: #000000;
}
#apDiv3 #form1 p {
	color: #060;
}
#apDiv3 #form1 table {
	color: #060;
	font-weight: bold;
}
#apDiv3 #form1 p label {
	font-weight: bold;
}
-->
</style>
</head>

<body>

<div id='apDiv1'> Activites week 2011</div>
<div id='apDiv2'><img src='images/beths_logo.jpg' alt='Beths logo' width='154' height='182' /></div>
<div id='apDiv3'>
  <form id='form1' name='form1' method='post' action='ActivitiesWeek.php'>
    <p>
      <label>First Name
        <input type='text' name='txt_FN' id='txt_FN' />
      </label>
    </p>
    <p>
      <label>Last Name
        <input name='txt_SN' type='text' id='txt_SN' />
      </label>
    </p>
    <p>
      <label>Form Group
        <select name='Sel_FG' id='Sel_FG'>
          <option selected='selected'>7A</option>
          <option>7B</option>
          <option>7C</option>
          <option>7E</option>
          <option>7H</option>
          <option>8A</option>
          <option>8B</option>
          <option>8C</option>
          <option>8E</option>
          <option>8H</option>
          <option>9A</option>
          <option>9B</option>
          <option>9C</option>
          <option>9E</option>
          <option>9H</option>
          <option>10A</option>
          <option>10B</option>
          <option>10C</option>
          <option>10E</option>
          <option>10H</option>
          <option>11A</option>
          <option>11B</option>
          <option>11C</option>
          <option>11E</option>
          <option>11H</option>
        </select>
      </label>
		</p>
		<table width='200' border='1'>
		  <tr>
			<td>Option</td>
			<td>Monday</td>
			<td>Tuesday</td>
			<td>Wednesday</td>
			<td>Thursday</td>
		  </tr>
		  <tr>
			<td>1</td>
			<td><label>
			  <select name='M1' id='M1'>
			  ";
				
				$host = '127.0.0.1' ;
				$user = 'root';
				$passwd = '';
				$dbname = 'activities';

				/* This code creates a connection to my database,
				if it fails to connectto the database then it shows 'Failed to connect to databse'*/

				$connection = mysql_connect ($host, $user, $passwd) or
					die('Failed to connect to the database. ' . mysql_error());

				$Selected = mysql_select_db($dbname, $connection) or
					die('Failed to connect to the databse. ' . mysql_error());
				
				$sql = "SELECT * FROM events
				where
				Day = 'Monday'"
				;
				$result = MYSQL_QUERY($sql);
			 
				while($row=MYSQL_FETCH_ARRAY($result))
				{
						$activity = $row['Activity'];
						
				echo '<option value=' . $activity .'>' . $activity .'</option>';
				}
				
			echo
			"

			  </select>
			</label></td>
			<td><select name='T1' id='T1'>
			";
			$sql = "SELECT * FROM events
				where
				Day = 'Tuesday'"
				;
			$result = MYSQL_QUERY($sql);
			 
				while($row=MYSQL_FETCH_ARRAY($result))
				{
						$activity = $row['Activity'];
						
				echo '<option value=' . $activity .'>' . $activity .'</option>';
				}
				echo "
			</select></td>
			<td><select name='W1' id='W1'>
			";
			$sql = "SELECT * FROM events
				where
				Day = 'Wednesday'"
				;
				$result = MYSQL_QUERY($sql);
			 
				while($row=MYSQL_FETCH_ARRAY($result))
				{
						$activity = $row['Activity'];
						
				echo '<option value=' . $activity .'>' . $activity .'</option>';
				}
				echo
				"
			</select></td>
			<td><select name='TH1' id='TH1'>
			";
			$sql = "SELECT * FROM events
				where
				Day = 'Thursday'"
				;
				$result = MYSQL_QUERY($sql);
			 
				while($row=MYSQL_FETCH_ARRAY($result))
				{
						$activity = $row['Activity'];
						
				echo '<option value=' . $activity .'>' . $activity .'</option>';
				}
				echo "
			</select></td>
		  </tr>
		  <tr>
			<td>2</td>
			<td><select name='M2' id='M2'>
			";
			  $sql = "SELECT * FROM events
				where
				Day = 'Monday'"
				;
				$result = MYSQL_QUERY($sql);
			 
				while($row=MYSQL_FETCH_ARRAY($result))
				{
						$activity = $row['Activity'];
						
				echo '<option value=' . $activity .'>' . $activity .'</option>';
				}
				echo"
			</select></td>
			<td><select name='T2' id='T2'>
			";
			 $sql = "SELECT * FROM events
				where
				Day = 'Tuesday'"
				;
				$result = MYSQL_QUERY($sql);
			 
				while($row=MYSQL_FETCH_ARRAY($result))
				{
						$activity = $row['Activity'];
						
				echo '<option value=' . $activity .'>' . $activity .'</option>';
				}
				echo "
			</select></td>
			<td><select name='W2' id='W2'>
			";
			  $sql = "SELECT * FROM events
				where
				Day = 'Wednesday'"
				;
				$result = MYSQL_QUERY($sql);
			 
				while($row=MYSQL_FETCH_ARRAY($result))
				{
						$activity = $row['Activity'];
						
				echo '<option value=' . $activity .'>' . $activity .'</option>';
				}
				echo "
			</select></td>
			<td><select name='TH2' id='TH2'>
			";
			$sql = "SELECT * FROM events
				where
				Day = 'Thursday'"
				;
				$result = MYSQL_QUERY($sql);
			 
				while($row=MYSQL_FETCH_ARRAY($result))
				{
						$activity = $row['Activity'];
						
				echo '<option value=' . $activity .'>' . $activity .'</option>';
				}
				echo "
			</select></td>
		  </tr>
		  <tr>
			<td>3</td>
			<td><select name='M3' id='M3'>
			";
			$sql = "SELECT * FROM events
				where
				Day = 'Monday'"
				;
				$result = MYSQL_QUERY($sql);
			 
				while($row=MYSQL_FETCH_ARRAY($result))
				{
						$activity = $row['Activity'];
						
				echo '<option value=' . $activity .'>' . $activity .'</option>';
				}
				echo "
			</select></td>
			<td><select name='T3' id='T3'>
			";
			 $sql = "SELECT * FROM events
				where
				Day = 'Tuesday'"
				;
				$result = MYSQL_QUERY($sql);
			 
				while($row=MYSQL_FETCH_ARRAY($result))
				{
						$activity = $row['Activity'];
						
				echo '<option value=' . $activity .'>' . $activity .'</option>';
				}
				echo "
			</select></td>
			<td><select name='W3' id='W3'>
			";
			  $sql = "SELECT * FROM events
				where
				Day = 'Wednesday'"
				;
				$result = MYSQL_QUERY($sql);
			 
				while($row=MYSQL_FETCH_ARRAY($result))
				{
						$activity = $row['Activity'];
						
				echo '<option value=' . $activity .'>' . $activity .'</option>';
				}
				echo "
			</select></td>
			<td><select name='TH3' id='TH3'>
			";
			$sql = "SELECT * FROM events
				where
				Day = 'Thursday'"
				;
				$result = MYSQL_QUERY($sql);
			 
				while($row=MYSQL_FETCH_ARRAY($result))
				{
						$activity = $row['Activity'];
						
				echo '<option value=' . $activity .'>' . $activity .'</option>';
				}
				echo "
			</select></td>
		  </tr>
		</table>
		<p>
		  <label>
			<input type='submit' name='Submit' id='Submit' value='Submit' />
		  </label>
		  <label>
			<input type='reset' name='Reset' id='button' value='Reset' />
		  </label>
		</p>
	  </form>
	</div>
	</body>
	</html>
	";
	}
	
?>