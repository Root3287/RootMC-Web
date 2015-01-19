<?php
	require 'php/config.php';
	
	$FNAME = $_POST['FirstName'];
	$LNAME = $_POST['LastName'];
	$EMAIL = $_POST['EMAIL'];
	$CEMAIL = $_POST['CEMAIL'];
	$MCUSER = $_POST['MCUSER'];
	$PASS = $_POST['Password'];
	$CPASS = $_POST['CPass'];
	
	if((!($FNAME=="")) && (!($LNAME=="")) && (!($EMAIL=="")) && (!($CEMAIL=="")) && (!($MCUSER=="")) && (!($PASS=="")) && (!($CPASS=="")))
	{
		echo "YOU MUST FILL ALL FORMS!";
	}else{
		$QUERY = "INSERT INTO users (FirstName, LastName, Email, MCUSER, UUID, Pass) "
		getMysql()->query($query);
	}
?>