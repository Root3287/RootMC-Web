<?php
	$path ="../../";
	require $path.'php/config.php';
	
	$FNAME = $_POST['FirstName'];
	$LNAME = $_POST['LastName'];
	$UNAME = $_POST['UName'];
	$EMAIL = $_POST['EMAIL'];
	$CEMAIL = $_POST['CEmail'];
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