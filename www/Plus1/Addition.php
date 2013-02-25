<?php
$Sign="+";
/* this assigns the variable $sign as '+'*/
			$QNo1=mt_rand(0, 25);
			$QNo2=mt_rand(0, 25);
/*
here two random integers between 0 and 25 are created
and assigned to the variables $QNo1 adn $QNo2
*/
			$Ans = $QNo1 + $QNo2;
/*
the variable $Ans is assigned by adding the two random
integers together stored in $QNo1 and $QNo2
*/
			switch ($Ans) 
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
is worked out, the larger the answer the higher the difficulty,
once a case is true, and value for $Diff is assigned and the
system exits the select case/switch algorithm
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