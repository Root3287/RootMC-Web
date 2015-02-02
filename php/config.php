<?php
if (file_exists($path."install/index.php")){
	// whatever you'll do, eg die();
	die("Please pages/install/index.php When you set up and finish useing the file!");
}else{
//TODO: MAKE SETUP CHANGE: $mysql,$mySqlTables, $config, $infraction, $downtime
//Enter Your MySql information here to use the forums or other stuff
/*$mySql = array(
		"HOST"=>"localhost",
		"PORT"=>"3306",
		"USER"=>"root",
		"PASSWORD"=>"password",
		"DATABASE"=>"data",
);

//The configuration for your server
$config = array(
	"SERVERNAME"=>"SERVICE NAME",
	"SERVERIP"=>"localhost",
	"DISPLAYIP"=>"SERVERHERE",	
	"HomeLink"=>"http://{yourdomain-here}.{com, net, org, co, us}"
);*/


	
$infractions = array(
	"enable"=>"true",
	"database"=>array(
		"Host"=>"localhost",
		"User"=>"root",
		"Pass"=>"password",
		"Database"=>"data"
	)
);
//IF you want to work on the website
$downtime = array(
		"ENABLE"=>false,
		"REASON"=>"SOME REASON HERE"
);
include $path.'php/functions.php';
include $path.'php/infractionFunction.php';

$edit=false;
}
?>
