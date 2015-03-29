<?php
include $path.'php/init.php';

//IF you want to work on the website
$downtime = array(
		"ENABLE"=>"false",
		"REASON"=>"SOME REASON HERE"
);

$edit=false;
if(file_exists($path.'install/index.php')&&(!($page==="install"))){
	///die("SETUP STILL EXSITS DELETE OR USE IT");
	echo '<div class="alert alert-danger" role="alert"><strong>Warning</strong> Install Exists Please use it or delete it by useing the AdminCP or manual deletion </div>';
}
if($page === 'install'){
	return;
}
include_once $path.'php/classes/db.class.php';
$db = new db();

//include $path.'php/functions.php';
include $path.'php/infractionFunction.php';
?>
