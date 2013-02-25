<?php
	echo
	"
		Username is $uname
		<form name=comm method=POST action=login2.php>
			<label>Comment:</label>
			<br>
			<textarea name=comment> </textarea>
			<br>
			<input type=submit name=submitc value='submit comment'>
			<input type=hidden name=uname value=$uname>
		</form>
	";
?>