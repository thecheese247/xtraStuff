<?php
if (isset($_POST['BtenNext1']))
{
	$TxtName = TRIM($_POST['TxtName']);
	if (empty($TxtName))
	{
	echo
		'error message';
	}	
	else
	{
	echo
		"Hello, " . $_POST['TxtName'];
	}
}
echo
"
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Untitled Document</title>
<style type='text/css'>
<!--
#apDiv1 {
	position:absolute;
	left:14px;
	top:102px;
	width:699px;
	height:395px;
	z-index:1;
	text-align: left;
}
-->
</style>
<script src='SpryAssets/SpryMenuBar.js' type='text/javascript'></script>
<link href='SpryAssets/SpryMenuBarVertical.css' rel='stylesheet' type='text/css' />
<style type='text/css'>
<!--
#apDiv2 {
	position:absolute;
	left:281px;
	top:143px;
	width:284px;
	height:353px;
	z-index:2;
}
#apDiv3 {
	position:absolute;
	left:12px;
	top:9px;
	width:151px;
	height:53px;
	z-index:3;
}
body {
	background-color: #FF9;
}
#apDiv4 {
	position:absolute;
	left:483px;
	top:138px;
	width:174px;
	height:100px;
	z-index:4;
}
-->
</style>
</head>

<body>
<div id='apDiv1'>
 
  <p>&nbsp;</p>
  <ul id='MenuBar1' class='MenuBarVertical'>
	<li><a href='Plus1Addition.html'>Addition</a></li>
<li><a href='#'>Subtraction</a></li>
	<li><a href='#'>Multiplcation</a></li>
	<li><a href='#'>Division</a></li>
	<li><a href='#'>Fractions</a></li>
	<li><a href='#'>Decimals</a></li>
	<li><a href='#'>Shapes</a></li>
	<li><a href='#' class='MenuBarItemSubmenu'>Ordering</a>
	  <ul>
		<li><a href='#'>Ordering Numbers</a></li>
		<li><a href='#'>Ordering Decimals</a></li>
	  </ul>
	</li>
	<li><a href='#'>Add a Question</a></li>
  </ul>
</div>
<div id='apDiv2'><img src='Images/Add'em the Octopus smaller.png' width='272' height='345' alt='add'em the octopus' /></div>
<div id='apDiv3'><img src='Images/Plus1Logo.png' width='224' height='92' alt='Plus1 Logo' /></div>
<div id='apDiv4'><img src='Images/Speech1.PNG' width='232' height='114' alt='Hi, I'm Add'em the Octopus. Click a topic title to continue.' /></div>
<script type='text/javascript'>
<!--
var MenuBar1 = new Spry.Widget.MenuBar('MenuBar1', {imgRight:'SpryAssets/SpryMenuBarRightHover.gif'});
//-->
</script>
</body>
</html>
";
?>