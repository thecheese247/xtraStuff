<?php
session_start();
$conn = MYSQL_CONNECT('localhost', 'root', '')
			or die('Could not connect to server');
		MYSQL_SELECT_DB('announcements', $conn)
			or die('Could not select the database');
		$sql = "SHOW TABLES FROM announcements";
		$result = mysql_query($sql);
		while ($row = mysql_fetch_row($result))
		{
		
		echo "Table: {$row[0]} <br>";
		}
		


?>