<?php
$conn = MYSQL_CONNECT('localhost', 'root', '')
			or die('Could not connect to server');
		MYSQL_SELECT_DB('plus1', $conn)
			or die('Could not select the database');
		$query = "SELECT COUNT(*)
					FROM question";
$count = mysql_query($query);

$query = "SELECT *
				FROM question
				ORDER BY QuestionID ASC";
		$result = MYSQL_QUERY($query);
		while($row = mysql_fetch_array($result))
		{
			$QID = ($row['QuestionID']);
			$record = (($row['QuestionID']) . ($row['Question']) . ($row['Answer']). ($row['TopicID']) . ($row['Difficulty']));
			echo $record;
			echo "<a href='delete.php?QID=$QID&record=$record>edit</a>";
			echo "<a href='delete.php?QID=$QID&record=$record>delete</a><br>";
		}
?>