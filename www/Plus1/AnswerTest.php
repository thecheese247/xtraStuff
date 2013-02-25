<?php
$Score=$_POST['Score'];
$Ans=$_POST['Ans'];
$UAns=$_POST['UAns'];
$Diff=$_POST['Diff'];
/*
retrives variable data from previous page, Users Score, the correct answer,
the users answer and the difficulty
*/
if ($UAns==$Ans)
{
	$Result="right";
	$Score=$Score+($Diff*5);
}
/*
this section of code compares the users answer with the correct answer
if they answered correctly then, the variable $Result is assigned the
string 'right' and a score is created by multiplying the difficulty
of the question by 5, this value is then added to the users current
score
*/
else
{
	$Result="wrong";
}
/*
if the user gor the question wrong then the string 'wrong' is assigned 
to the variable $Result and the user gets no score
*/
echo
"You were " . $Result;
echo
"<br>";
echo
"correct answer was " . $Ans;
echo
"<br>";
echo
"score is " . $Score;
?>