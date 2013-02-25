<?php
$Score=0;
$Qnumber=-1;
echo
"
<HTML lang='en'>
<HEAD>
<LINK REL='stylesheet' HREF='Plus1.css' TYPE='text/css'>
<TITLE>Test</TITLE>
<META http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
<SCRIPT Language='JavaScript' type='text/JavaScript' src='Default.js'></SCRIPT>
</HEAD>

<BODY>

<SCRIPT Language='JavaScript' type='text/JavaScript'>
start();
</SCRIPT>
<SCRIPT Language='JavaScript' type='text/JavaScript' src='Validate.js'></SCRIPT>

<DIV CLASS='Body'>
	<DIV CLASS='Form'>
	<FORM METHOD='POST' ACTION='Question.php' onSubmit='return Validate(this)'>
	<INPUT TYPE='hidden' Name='Score' value=$Score>
	<INPUT TYPE='hidden' Name='Qnumber' value=$Qnumber>
		<DIV Class='Right'>
		<SELECT NAME='Topic'>
			<OPTION VALUE=''>--Topic--
			<OPTION VALUE='1'>Addition
			<OPTION VALUE='2'>Subtraction
			<OPTION VALUE='3'>Multiplication
			<OPTION VALUE='4'>Division
			<OPTION VALUE='5'>Fractions
			<OPTION VALUE='6'>Decimals
			<OPTION VALUE='7'>Shapes
			<OPTION VALUE='8'>Ordering Numbers
			<OPTION VALUE='9'>Ordering Decimals
		</SELECT>
	</DIV>
	<DIV CLASS='Left'>
		<INPUT TYPE='submit' Value='Question'>
	</DIV>
	</FORM>
	</DIV>
</DIV>
</BODY>
</HTML>	
";
?>