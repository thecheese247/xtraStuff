<?php
echo
"
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Untitled Document</title>
<meta name='' content='' />
<style type='text/css'>
<!--
#apDiv1 {
	position:absolute;
	left:8px;
	top:90px;
	width:527px;
	height:210px;
	z-index:1;
}
body {
	background-image: url(Images/MathsNumbers.png);
}
-->
</style>
</head>

<body>
<img src='Images/Plus1Logo.png' width='224' height='92' alt='Plus 1 logo' />
<div id='apDiv1'>
<form id='form1' name='form1' method='post' action='Plus1TopicSelection.php'>
  <p>Welcome to Plus  1, please enter your name and click next to contiue.</p>
    <p>
  <label>
        <div align='center'><br />
        <br />
          Enter Name Here:
          <input name='TxtName' type='text' id='TxtName' />
  </label>
</form>
<div align='right'>
    <p>
      <input type='submit' name='BtnNext1' id='BtnNext1' value='Next&gt;&gt;' />
    </p>
</div>
</body>
</html>
";
?>