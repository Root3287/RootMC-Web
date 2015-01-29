<?php
if (file_exists($path."install/setup.php")){
	// whatever you'll do, eg die();
	die("PLEASE DELETE SETUP.PHP WHEN YOUR DONE USEING THE FILE!");
}else{

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
		"USER"=>"user",
		"Cat"=>"CAT",
		"Forums"=>"Forums",
		"Topics"=>"Topics",
		"Rank"=>"Ranks"
); 
//The configuration for your server
$config = array(
	"SERVERNAME"=>"SERVICE NAME",
	"SERVERIP"=>"localhost",
	"DISPLAYIP"=>"SERVERHERE",	
	"HomeLink"=>"http://{yourdomain-here}.{com, net, org, co, us}"
);
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
