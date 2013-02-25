<?php
session_start();
$Forum=$_GET['Forum'];
echo
"
$Forum <br>
";
$conn = MYSQL_CONNECT('localhost', 'root', '')
			or die('Could not connect to server');
		MYSQL_SELECT_DB($Forum, $conn)
			or die('Could not select the database');
		$sql = "SHOW TABLES FROM $Forum";
		$result = mysql_query($sql);
		while ($row = mysql_fetch_row($result))
		{
		echo " <a href='http://127.0.0.1/StuffEvolves/Tut/Thread.php?Forum=$Forum&Thread={$row[0]}'>{$row[0]} </a> <br>";
		}
		


?>