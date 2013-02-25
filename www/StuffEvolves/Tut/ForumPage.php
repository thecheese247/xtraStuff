<?php
session_start();
$conn = MYSQL_CONNECT('localhost', 'root', '')
			or die('Could not connect to server');
		MYSQL_SELECT_DB('announcements', $conn)
			or die('Could not select the database');
		$sql = "SHOW DATABASES";
		$result = mysql_query($sql);
		while ($row = mysql_fetch_row($result))
		{
		echo " <a href='http://127.0.0.1/StuffEvolves/Tut/Forum.php?Forum={$row[0]}'>{$row[0]} </a> <br>";
		}
?>