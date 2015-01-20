<?php
	require 'php/config.php';
	
	$FNAME = $_POST['FirstName'];
	$LNAME = $_POST['LastName'];
	$UNAME = $_POST['Uname'];
	$EMAIL = $_POST['EMAIL'];
	$CEMAIL = $_POST['CEMAIL'];
	$MCUSER = $_POST['MCUSER'];
	$PASS = $_POST['Password'];
	$CPASS = $_POST['CPass'];
	
	$hash = hash('sha256',$PASS);
	
	if(($FNAME=="") || ($LNAME=="") || ($UNAME=="") ||($EMAIL=="") || ($CEMAIL=="") || ($MCUSER=="") || ($PASS=="") || ($CPASS==""))
	{
		echo "YOU MUST FILL ALL FORMS!";
	}else{
		addUser($FNAME, $LNAME, $UNAME,$EMAIL, $MCUSER, $PASS);
	}
?>