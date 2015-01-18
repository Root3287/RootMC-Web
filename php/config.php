<?php

if (file_exists("setup.php")) {
	// whatever you'll do, eg die();
	die("PLEASE DELETE SETUP.PHP WHEN YOUR DONE USEING THE FILE!");
}

//Enter Your MySql information here to use the forums or other stuff
$mySql = array(
		"HOST"=>"localhost",
		"PORT"=>"3306",
		"USER"=>"root",
		"PASSWORD"=>"password",
		"DATABASE"=>"database"
);
//If you have exturnal users in a database turn extrunal to true and this will use that site users
$ExturnalUser = array(
	"EXTURNAL"=>false,
	"SQLHOST"=>"localhost",
	"SQLUSER"=>"root",
	"SQLPASS"=>"password",
	"database"=>""
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
		"DOWN"=>"false",
		"REASON"=>"SOME REASON HERE"
);

function getMysql(){
	$conn = new mysqli($mySql['HOST'], $mySql['USER'], $mySql['PASSWORD'], $mySql['DATABASE'], $mySql['PORT']);
	if($conn->connect_error){
		die("Error: ". $conn->connect_error);
	}
}

function isDown(){ 
	return $downtime['DOWN'];
}
?>