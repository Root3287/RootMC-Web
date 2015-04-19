<?php
require path.'php/config.php';

if(file_exists(path.'install/index.php')&&(!($page==="install"))){
	///die("SETUP STILL EXSITS DELETE OR USE IT");
	echo '<div class="alert alert-danger" role="alert"><strong>Warning</strong> Install Exists Please use it or delete it by useing the AdminCP or manual deletion </div>';
}
if($page === 'install'){
	return;					//Breaking point for install
}
spl_autoload_register(function($class){
	require_once path.'php/classes/'.$class.'.class.php';
});
require path.'php/functions.php';

$db = db::getInstance();

if(Cookies::exists(config::get('Cookies/Remember/Name')) && Session::exsits(config::get('Session/name'))){
	$hash = Cookies::get(config::get('cookie/Name'));
	$hashCheck = $db->get('sessions', array('hash', '=' ,$hash));
}
?>
