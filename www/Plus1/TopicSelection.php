<?php
/*	********************************************* 
	*		PLUS 1 TOPIC SELECTION SCREEN		*
	*********************************************
	
	Author:		Luke Cheeseman
	Name:		TopicSelection.php
	Date:		12/01/2012
	Description:	

	This is a page where the user can select the topic
	that the wish to play with. This page creates a 
	list of topic hyperlinks in a spry menu that the 
	user can click on. This page also places the image
	images/AddemSpeaks1.png on the page as well as a
	greeting to the user.
*/
if (!isset($_POST['Next']))
{
	$greeting='';
}
else
{
	$name=$_POST['Name'];
	$greeting="Hello $name, follow Add'ems instructions on what to do.";
}
/* 
The above lines of code decide what the greeting will be, this is 
dependant on wether or not the Next button on the welcome screen 
has been clicked, if it has been the the greeting is the name from
the previous page and and message concatenated into a string and 
assigned to $greeting that greets the user and tells them to follow
add'ems instruction, if it hasn't been clicked then $greeting is
assigned as blank or ''
*/
echo
"

<HTML lang='en'>
<HEAD>
<LINK REL='stylesheet' HREF='Plus1.css' TYPE='text/css'>
<TITLE>Topic Selection</TITLE>
<META http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
<SCRIPT Language='JavaScript' type='text/JavaScript' src='Default.js'></SCRIPT>
<script src='SpryAssets/SpryMenuBar.js' type='text/javascript'></script>
<link href='SpryAssets/SpryMenuBarHorizontal.css' rel='stylesheet' type='text/css' />
<link href='SpryAssets/SpryMenuBarVertical.css' rel='stylesheet' type='text/css' />
</HEAD>

<DIV CLASS='Leftcol2'>
<DIV Class='Form'>
<FORM METHOD='POST' ACTION=''>
<DIV CLASS='Left'>
<ul id='MenuBar1' class='MenuBarVertical' name='Topic'>
   <li><a href='Question.php?TopicID=1&Score=0&Qnumber=-1'>Addition</a></li>
   <li><a href='Question.php?TopicID=2&Score=0&Qnumber=-1'>Subtraction</a></li>
   <li><a href='Question.php?TopicID=3&Score=0&Qnumber=-1'>Multiplication</a></li>
   <li><a href='Question.php?TopicID=4&Score=0&Qnumber=-1'>Division</a></li>
   <li><a href='Question.php?TopicID=5&Score=0&Qnumber=-1'>Fractions</a></li>
   <li><a href='Question.php?TopicID=6&Score=0&Qnumber=-1'>Decimals</a></li>
   <li><a href='Question.php?TopicID=7&Score=0&Qnumber=-1'>Shapes</a></li>
   <li><a href='#' class='MenuBarItemSubmenu'>Ordering</a>
   <ul>
   <li><a href='Question.php?TopicID=8&Score=0&Qnumber=-1'>Ordering Numbers</a></li>
   <li><a href='Question.php?TopicID=9&Score=0&Qnumber=-1'>Ordering Decimals</a></li>
   </ul>
   </li>
   <li><a href='login.php'>Add a Question</a></li>
   </ul>
</DIV>
</FORM>
</DIV>
</DIV>
<!--
A Spry Menu contains links with different topic titles, which all link to 
the Question.php page, as well as a link to the 'add question' section of
the game. Each link to the question page passes the question page the
question number as -1, the score as 0 and the relevant TopicID using the
get method. The sprymenu is placed in the left column of the page using
'leftcol2' and then poisitoned in this column using 'left'
-->
<BODY>

<SCRIPT Language='JavaScript' type='text/JavaScript'>
start();
</SCRIPT>

<DIV CLASS='Body'>

	<H1>$greeting</H1>
	<br>
	<IMG src='images/AddemSpeaks1.png' alt='Addem the Octopus'>
<!--
$greeting is presented to the user using the H1 tag and
also the image images/AddemSpeaks1.png is placed with
alternate text 'Addem the Octopus'
-->	
<DIV CLASS='help'>
	<a href='help.docx' target='_blank'>Help</a>
</DIV>
<script type='text/javascript'>
<!--
var MenuBar1 = new Spry.Widget.MenuBar('MenuBar1', {imgRight:'SpryAssets/SpryMenuBarRightHover.gif'});
//-->
</script>
</BODY>
</HTML>
";
?>
