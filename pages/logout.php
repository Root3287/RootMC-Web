<?php
$page = "logout";
define('path', '../');
require path.'php/init.php';

$user= new user();

$user->logout();

Redirect::to(path.'index.php');