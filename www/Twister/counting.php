<?php
	$Progress=$_COOKIE["Progress"]+1;
	setcookie("Progress", "$Progress", time()+3600);
echo
	$Progress;
echo
	"<META http-equiv='refresh' content='0.1' > ";
?>