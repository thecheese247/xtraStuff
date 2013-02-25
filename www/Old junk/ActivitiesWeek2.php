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
		
		
		$host = "127.0.0.1";
		$user = "root";
		$passwd = "";
		$dbname = "activities";
		
		$connection = MYSQL_CONNECT($host, $user, $passwd) or
			die("Failed to connect to server. " . MYSQL_ERROR());
			
		$selected = MYSQL_SELECT_DB($dbname, $connection) or
			die("Failed to connect tothe database. " . MYSQL_ERROR());
		
		$sql="INSERT INTO details values (" . $_POST['FName'] . "," . $_POST['LName'] . "," . $_POST['FGroup'] . "," . $_POST['M1'] . "," . $_POST['M2'] . "," . $_POST['M3'] . "," . $_POST['T1'] . "," . $_POST['T2'] . "," . $_POST['T3'] . "," .$_POST['W1'] . "," . $_POST['W2'] . "," . $_POST['W3'] . "," .$_POST['T1'] . "," . $_POST['T2'] . "," . $_POST['T3'] . ")";
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
		left:274px;
		top:16px;
		width:258px;
		height:58px;
		z-index:1;
		font-family: Georgia, 'Times New Roman', Times, serif;
		font-size: x-large;
		color: #F00;
		text-align: center;
	}
	#apDiv2 {
		position:absolute;
		left:9px;
		top:69px;
		width:121px;
		height:81px;
		z-index:2;
	}
	#apDiv3 {
		position:absolute;
		left:13px;
		top:15px;
		width:40px;
		height:26px;
		z-index:2;
	}
	#apDiv4 {
		position:absolute;
		left:275px;
		top:79px;
		width:492px;
		height:521px;
		z-index:3;
	}
	-->
	</style>
	</head>

	<body>
	<div id='apDiv1'> Activities Week 2011 </div>
	<div id='apDiv3'><img src='images/beths.jpg' alt='beths logo' width='260' height='308' /></div>
	<div id='apDiv4'>
	  <form id='form1' name='form1' method='post' action='ActivitiesWeek.php'>
		<p>
		  <label>First Name
			<input type='text' name='FName' id='FName' />
		  </label>
		</p>
		<p>
		  <label>Last Name
			<input type='text' name='LName' id='LName' />
		  </label>
		</p>
		<p>
		  <label>Form Group
			<select name='FGroup' id='FGroup'>
			  <option>7A</option>
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
				<option>Swimming</option>
				<option>Paintball</option>
				<option>Cricket</option>
				<option>Football</option>
				<option>Polo</option>
			  </select>
			</label></td>
			<td><select name='T1' id='T1'>
			  <option>Fishing</option>
			  <option>Bowling</option>
			  <option>Jacob</option>
			  <option>Games</option>
			  <option>Running</option>
			</select></td>
			<td><select name='W1' id='W1'>
			  <option>Painting</option>
			  <option>Death</option>
			  <option>Wacth making</option>
			  <option>Bird watching</option>
			  <option>Growing grass</option>
			</select></td>
			<td><select name='TH1' id='TH1'>
			  <option>Butcher</option>
			  <option>Farmer</option>
			  <option>Dave</option>
			  <option>Builder</option>
			  <option>Hobo</option>
			</select></td>
		  </tr>
		  <tr>
			<td>2</td>
			<td><select name='M2' id='M2'>
			  <option>Swimming</option>
			  <option>Paintball</option>
			  <option>Cricket</option>
			  <option>Football</option>
			  <option>Polo</option>
			</select></td>
			<td><select name='T2' id='T2'>
			  <option>Fishing</option>
			  <option>Bowling</option>
			  <option>Jacob</option>
			  <option>Games</option>
			  <option>Running</option>
			</select></td>
			<td><select name='W2' id='W2'>
			  <option>Painting</option>
			  <option>Death</option>
			  <option>Wacth making</option>
			  <option>Bird watching</option>
			  <option>Growing grass</option>
			</select></td>
			<td><select name='TH2' id='TH2'>
			 <option>Butcher</option>
			  <option>Farmer</option>
			  <option>Dave</option>
			  <option>Builder</option>
			  <option>Hobo</option>
			</select></td>
		  </tr>
		  <tr>
			<td>3</td>
			<td><select name='M3' id='M3'>
			  <option>Swimming</option>
			  <option>Paintball</option>
			  <option>Cricket</option>
			  <option>Football</option>
			  <option>Polo</option>
			</select></td>
			<td><select name='T3' id='T3'>
			  <option>Fishing</option>
			  <option>Bowling</option>
			  <option>Jacob</option>
			  <option>Games</option>
			  <option>Running</option>
			</select></td>
			<td><select name='W3' id='W3'>
			  <option>Painting</option>
			  <option>Death</option>
			  <option>Wacth making</option>
			  <option>Bird watching</option>
			  <option>Growing grass</option>
			</select></td>
			<td><select name='TH3' id='TH3'>
			  <option>Butcher</option>
			  <option>Farmer</option>
			  <option>Dave</option>
			  <option>Builder</option>
			  <option>Hobo</option>
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