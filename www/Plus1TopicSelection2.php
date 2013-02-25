<?php
if (isset($_POST['BtnNext1']))
{
echo
"Hello " . $_POST['TxtName'];
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
	left:10px;
	top:12px;
	width:617px;
	height:429px;
	z-index:1;
	text-align: left;
}
-->
</style>
<script src='SpryAssets/SpryMenuBar.js' type='text/javascript'></script>
<link href='SpryAssets/SpryMenuBarVertical.css' rel='stylesheet' type='text/css' />
</head>

<body>
<div id='apDiv1'>
 
  <p>
    <label>Please select a topic</label>.
  </p>
  <ul id='MenuBar1' class='MenuBarVertical'>
    <li><a href='Plus1Addition2.php'>Addition</a>    </li>
    <li><a href='Plus1Subtraction2.php'>Subtraction</a></li>
    <li><a href='Plus1Multplication2.php'>Multiplcation</a>    </li>
    <li><a href='Plus1Division2.php'>Division</a></li>
    <li><a href='Plus1Fractions2.php'>Fractions</a></li>
    <li><a href='Plus1Decimals2.php'>Decimals</a></li>
    <li><a href='#' class='MenuBarItemSubmenu'>Ordering</a>
      <ul>
        <li><a href='Plus1OrderingNumbers2.php'>Ordering Numbers</a></li>
        <li><a href='Plus1OrderingDecimals2.php'>Ordering Decimals</a></li>
      </ul>
    </li>
    <li><a href='#'>Add a Question</a></li>
  </ul>
</div>
<script type='text/javascript'>
<!--
var MenuBar1 = new Spry.Widget.MenuBar('MenuBar1', {imgRight:'SpryAssets/SpryMenuBarRightHover.gif'});
//-->
</script>
</body>
</html>
";
?>