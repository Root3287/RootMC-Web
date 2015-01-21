<?php
require 'MinecraftUUID.php';
if (file_exists($path."setup.php")) {
	// whatever you'll do, eg die();
	die("PLEASE DELETE SETUP.PHP WHEN YOUR DONE USEING THE FILE!");
}

//Enter Your MySql information here to use the forums or other stuff
$mySql = array(
		"HOST"=>"localhost",
		"PORT"=>"3306",
		"USER"=>"root",
		"PASSWORD"=>"password",
		"DATABASE"=>"data",
);
// Have all the table here
$mySqlTables=array(
		"USERS"=>"USER"
); 
//The configuration for your server
$config = array(
	"SERVERNAME"=>"SERVICE NAME",
	"SERVERIP"=>"localhost",
	"DISPLAYIP"=>"SERVERHERE",	
	"HomeLink"=>"http://{yourdomain-here}.{com, net, org, co, us}"
);
//IF you want to work on the website
$downtime = array(
		"ENABLE"=>false,
		"REASON"=>"SOME REASON HERE"
);

function getMysql(){
	$conn = new mysqli($mySql['HOST'], $mySql['USER'], $mySql['PASSWORD'], $mySql['DATABASE'], $mySql['PORT']);
	if($conn->connect_error){
		die("Error: ". $conn->connect_error);
	}
	return $conn;
}
function cookieTime($type,$time){
	if($type==="years"){
		return $time*31556926;
	}else if($type ==="monthes"){
		return $time*2629743.83;
	}elseif($type==="weeks"){
		return $time*604800;
	}else if($type==="days"){
		return $time*86400;
	}else if($type==="hours"){
		return $time*3600;
	}else if($type==="minute"){
		return $time*60;
	}
}
function makeCookies($name,$value,$time){
	setcookie($name,$value,time()+$time);
}
function addUser($FNAME, $LNAME, $UNAME ,$EMAIL, $MCUSER ,$PASS){
	$profile = ProfileUtils::getProfile($MCUSER);
	$result = $profile->getProfileAsArray();
	$HASH = password_hash($PASS, 'sha256');
	$QUERY="INSERT INTO ".$mySql['PREFIX']."_".$mySqlTables['USERS']." (FIRST_NAME, LAST_NAME, UNAME ,EMAIL, MCUSER, UUID. PASSWORD) VALUES ('".$FNAME."','".$LNAME."','".$UNAME."','".$EMAIL."','".$MCUSER."','".$result['UUID']."','".$HASH."')";
	getMysql()->query($QUERY);
}
function getUser($name){
	// SELECT * FROM site_USERS WHERE UNAME=$name OR MCUSERS="$NAME"
	$QUERY = "SELECT * FROM ".$mySql['PREFIX']."_".$mySqlTables['USERS']." WHERE UNAME='".$name."' OR MCUSER='".$name."'";
	getMysql()->query($QUERY);
}
$edit=false;
?>