<?php
	require 'php/config.php';
	
	if(!(isset($_GET['step']))){
		$step = "start";
	}else{
		$step = strtolower(htmlspecialchars($_GET['step']));
	}
	
	function maketables(){
		//Create Databsse if not Exsit
		$create_database = "CREATE DATABASE ".$mySql['DATABASE'];
	
		//Create Table if not Exsit
		//USER: FIRST_NAME, LAST_NAME, UNAME ,EMAIL, MCUSER, UUID. PASSWORD
		$create_table_user = "CREATE TABLE users(id int NOT NULL AUTO_INCREMENT, FIRST_NAME text(30), LAST_NAME text(30), UNAME varchar(100), EMAIL varchar(100), MCUSER varchar(16), UUID varchar(100), PASSWORD varchar(255), Rank_id int(20),PRIMARY KEY(id))";
		$create_table_cat = "CREATE TABLE cat(id int NOT NULL AUTO_INCREMENT, NAME varchar(255), DESC varchar(255), PRIMARY KEY(id))";
		$create_table_forums = "CREATE TABLE forums(id int NOT NULL AUTO_INCREMENT, CAT_ID int(20), Forum_Name varchar(255), Forum_DESC varchar(255), )";
		$create_table_topic = "CREATE TABLE topics(id int NOT NULL AUTO_INCREMENT, Forum_ID int(20), Topic_Name varchar(255), Topic_Content LONGTEXT, Type Enum('o','r'), Orignal_Post int(100), Author text)";
		// a= ADMINISTRATOR d= DONOR S=Special m=MEMBER
		$create_table_ranks = "CREATE TABLE ranks(id int NOT NULL AUTO_INCREMENT, name text, Display_Name text, Rank Enum('a','d','s','m'), PRIMARY KEY(id))";
	
		$admin_rank = "INSERT INTO ranks(name, Display_Name, Rank) VALUES ('Admin','ADMIN','a')";
		$admin_hashed_password = hash('sha256', "adminisrator");
		$admin = "INSERT INTO users(FIRST_NAME, LAST_NAME, UNAME, EMAIL, MCUSER, UUID, PASSWORD, Rank_id) values ('Admin', 'Admin' ,'Administrator', 'admin@admin.com, 'admin', '-----', '".$admin_hashed_password."')";
	
	
		sql_query($create_database);
		sql_query($create_table_user);
		sql_query($create_table_cat);
		sql_query($create_table_forums);
		sql_query($create_table_topic);
		sql_query($create_table_ranks);	
		sql_query($admin_rank);
		sql_query($admin);
	}
?>
<html>
	<head>
		<title>
			New website &bull; Setup
		</title>
	</head>
	<body>
	<?php
		switch($step){
			case "setup":
			?>
			<div class="main">
			<div class="container">
				<div class="jumbo">
					<div class="jumbotron">
						<h1>Welcome!</h1>
						<h2>To the Setup. Just scroll down to get started!</h2>
					</div>
				</div>
				<div class="main-Body">
					<!-- MYSQL STUFF-->
					<form action="?step=sql_setting" method="post">
						<input type="text" name="mainHost" placeholder="mySql Host"/>
						<input type="text" name="mainUser" placeholder="mySql User"/>
						<input type="password" name="mainPass" placeholder="mySql Password"/>
						<input type="text" name="mainPort" placeholder="mySql Port (Default: 3360)"/>
						<input type="text" name="mainDatabase" placeholder="Database"/>
						
						<input type="text" name="ServerName" placeholder="Server Name"/>
						<input type="text" name="ServerIP" placeholder="ServerIP"/>
						<input type="text" name="DisplayIP" placeholder="DisplayIP"/>
						<input type="submit" value="Submit"/>
					</form>
					<!--Config Stuff-->
				</div>
			</div>
		</div>
		<?php 
		break;
		case "sql_setting";
			$test = new mysqli($_POST['mainHost'], $_POST['mainUser'], $_POST['mainPass'], $_POST['mainDatabase'], $_POST['mainPort']);
			if($test->connect_error){
				die("ERROR CONNECTING");
			}
		
			if(is_writable($path.'php/config.php')){
				$config = file_get_contents($path.'php/config');
				$config = substr($config, 662);
				
				$insert=
				'$mySql = array('.PHP_EOL.
				'	"HOST"=>'.$_POST['mainHost'].','.PHP_EOL.
				'	"PORT"=>'.$_POST['mainPort'].','.PHP_EOL.
				'	"USER"=>'.$_POST['mainUser'].','.PHP_EOL.
				'	"PASSWORD"=>'.$_POST['mainPass'].','.PHP_EOL.
				'	"DATABASE"=>'.$_POST['mainDatabase'].','.PHP_EOL.
				');'.PHP_EOL.
				''.PHP_EOL.
				'//The configuration for your server'.PHP_EOL.
				'$config = array('.PHP_EOL.
				'		"SERVERNAME"=>"SERVICE NAME",'.PHP_EOL.
				'		"SERVERIP"=>"localhost",'.PHP_EOL.
				'		"DISPLAYIP"=>"SERVERHERE",'.PHP_EOL.
				');';
				$configfile = fopen($path.'php/config.php', w);
				fwrite($configfile, $insert.$config);
				fclose($configfile);
				header("Location index.php?step=mysqlSetup");
				die();
			}
		break;
		}
		?>
	</body>
</html>