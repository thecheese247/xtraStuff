<?php 
session_start();
if ((isset($_POST['Play'])) or (isset($_SESSION['Progress'])))
{
	if (isset($_POST['Stop']))
	{
	unset($_SESSION['Time']);
	unset($_SESSION['Progress']);
	echo
	"<META http-equiv='refresh' content='0.01' > ";
	}
	else
	{
		if (isset($_POST['Play']))
		{
			$_SESSION['Time'] = $_POST['Time'];
		}
		$_SESSION['Progress']=$_SESSION['Progress']+1;
		$Progress=$_SESSION['Progress'];
		$Clothing=mt_rand(0,10);
		$Time = $_SESSION['Time'];
		if ($Clothing==2)
		{
		echo
		"
		<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
					<HTML lang='en'>
					<HEAD>
					<LINK REL='stylesheet' HREF='Plus1.css' TYPE='text/css'>
					<TITLE>Twister</TITLE>
					<META http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
					<META http-equiv='refresh' content='$Time' > 
					</HEAD>
					<BODY>

					<SCRIPT Language='JavaScript' type='text/JavaScript'>
					start();
					</SCRIPT>
					<DIV class='Tbody'>	
					<DIV class='big'>
					<DIV class='center'>It is turn $Progress</DIV>
					<DIV class='center'>Remove an item of clothing!</DIV>
					</DIV>
					</DIV>
					</BODY>
					</HTML>
		";
		}
		else
		{
			$BPart=mt_rand(0, 4);
			$Colour=mt_rand(0, 4);
			switch ($BPart)
				{
					case $BPart==1:
						$BPsource = "'images/lefthand.png' alt= 'lefthand'";
						$BP = "Left Hand";
						break;
					case $BPart==2:
						$BPsource = "'images/righthand.png' alt= 'righthand'";
						$BP = "Right Hand";
						break;
					case $BPart==3:
						$BPsource = "'images/leftfoot.png' alt= 'leftfoot'";
						$BP = "Left Foot";
						break;
					case $BPart==4:
						$BPsource = "'images/rightfoot.png' alt= 'rightfoot'";
						$BP = "Right Foot";
						break;	
				}
			switch ($Colour)
				{
					case $Colour==1:
						$Csource = "'images/green.png' alt= 'green'";
						$C="Green";
						break;
					case $Colour==2:
						$Csource = "'images/red.png' alt= 'red'";
						$C="Red";
						break;
					case $Colour==3:
						$Csource = "'images/yellow.png' alt= 'yellow'";
						$C="Yellow";
						break;
					case $Colour==4:
						$Csource = "'images/blue.png' alt= 'blue'";
						$C="Blue";
						break;	
				}			
			echo
					"
					<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
					<HTML lang='en'>
					<HEAD>
					<LINK REL='stylesheet' HREF='Plus1.css' TYPE='text/css'>
					<TITLE>Twister</TITLE>
					<META http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
					<META http-equiv='refresh' content='$Time' > 
					</HEAD>
					<BODY>

					<SCRIPT Language='JavaScript' type='text/JavaScript'>
					start();
					</SCRIPT>
					<DIV class='Tbody'>	
					<DIV class='center'>It is turn $Progress</DIV>
					<DIV class='left2'>
						$BP
					</DIV>
					<DIV class='MoreRight'>
						$C
					</DIV>
					<DIV class='left2'>
							<IMG src=$BPsource>
					</DIV>
					<DIV class='MoreRight'>
							<IMG src=$Csource>
					</DIV>
					<FORM METHOD='POST' ACTION
					<DIV class='bottom'>
						<INPUT TYPE='submit' NAME='Stop' VALUE='Stop' class='button'>
					</DIV>
					</DIV>
					</BODY>
					</HTML>
					";
		}
	}
}
else
{
	$_SESSION['Progress'] = 0;
	echo
		"
		<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.0 Transitional//EN'>
		<HTML lang='en'>
		<HEAD>
		<LINK REL='stylesheet' HREF='Plus1.css' TYPE='text/css'>
		<TITLE>Twister</TITLE>
		<META http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
		</HEAD>
		<BODY>
		<SCRIPT Language='JavaScript' type='text/JavaScript'>
		start();
		</SCRIPT>
		<SCRIPT Language='JavaScript' type='text/JavaScript' src='Validatenumber.js'></SCRIPT>
		<DIV class='Tbody'>	
		<FORM METHOD='POST' ACTION=twister.php onSubmit='return Validate(this)'>
		<DIV class='center'>Select how long each turn is</DIV><BR>
		<DIV class='center'>
			<INPUT TYPE='text' NAME='Time' Size=5 class='big'> seconds
		</DIV>
		<BR>
		<DIV class='center'>Click 'Play' to begin!</DIV><BR>
		<DIV class='center'>
			<INPUT TYPE='submit' NAME='Play' Value='Play' class='button'>
		</DIV>
		</FORM>
		</BODY>
		</HTML>
		";
}
?>