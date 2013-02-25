<?php
$Sign="-";
/* this assigns the variable $sign as '-'*/
do
{
$QNo1=mt_rand(0, 50);
$QNo2=mt_rand(0, 50);
$Ans = $QNo1 - $QNo2;
}
while ($Ans<0);
/*
This code creates two random integers between 0 and
50, and assigns them to $QNo1 and $QNo2 it then 
subtracts the $QNo2 from $QNo1 to get the answer which
is assigned to $Ans, it repeats this answer until it 
gets a value for $Ans qhich is greater than 0
*/
switch ($QNo2) 
	{
		case $Ans>=41:
			$Diff = 5;
			break;
		case $Ans>=31:
			$Diff = 4;
			break;
		case $Ans>=21:
			$Diff = 3;
			break;
		case $Ans>=11:
			$Diff = 2;
			break;
		case $Ans>=0:
			$Diff = 1;
			break;
	}
/*
From the magnitude of the answer the difficulty of the answer
is worked out, the larger the range between $QNo1 and $QNo2
the higher the difficulty, once a case is true, and value for
$Diff is assigned the system exits the select case/switch 
algorithm
*/ 
$Question=$QNo1 . $Sign . $QNo2 . "=";
/*
$QNo1, $QNo2, $Sign and an = are then concatenated into a string
which is assigned to the variable $Question which follow this
formating '$QNo1$Sign$QNo2=' or '2+2='
*/
echo
"Question is " . $Question;
echo
"<br>";
echo
"Answer is " . $Ans;
echo
"<br>";
echo
"Difficulty is " . $Diff;
/*then all the variables are echoed so that they can be inspected*/
?>