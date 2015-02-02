<?php
if(!(isset($_GET['page']))){
$_GET['page']=="user";
}else{
	switch($_GET['page']){
		case "user":
		include 'user/user.php';
		break;
		
		case "admin":		
		include 'admin/admin.php';
		break;
		
		case "mod":
		include "mod/mod.php";
		break;
	}
}