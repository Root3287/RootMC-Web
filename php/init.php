<?php
require $path.'php/config.php';

if(file_exists($path.'install/index.php')&&(!($page==="install"))){
	///die("SETUP STILL EXSITS DELETE OR USE IT");
	echo '<div class="alert alert-danger" role="alert"><strong>Warning</strong> Install Exists Please use it or delete it by useing the AdminCP or manual deletion </div>';
}
if($page === 'install'){
	return;					//Breaking point for install
}
spl_autoload_register(function($class){
	require_once $path.'php/classes/'.$class.'.class.php';
});
$db = db::getInstance;
?>
