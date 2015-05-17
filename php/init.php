<?php
session_start();
//Get the config
require path.'php/config.php';

//Check if the intaller is still there
if(file_exists(path.'install/index.php')&&(!($page==="install"))){
	///die("SETUP STILL exists DELETE OR USE IT");
	echo '<div class="alert alert-danger" role="alert"><strong>Warning</strong> Install exists Please use it or delete it by useing the AdminCP or manual deletion </div>';
}
if($page === 'install'){ // If the page is the installer
	return;					//Breaking point for install
}
spl_autoload_register(function($class){
	require_once path.'php/classes/'.$class.'.class.php';
});

require path.'php/sanitize.php';

$db = db::getInstance();

if(Cookies::exists(config::get('Cookies/Remember/cookie_name')) && Session::exists(config::get('Session/session_name'))){
	$hash = Cookies::get(config::get('cookie/Remember/cookie_name'));
	$hashCheck = $db->get('sessions', array('hash', '=' ,$hash));
}
?>
