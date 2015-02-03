<?php
	$page="install";
	$path = "../";
	require $path.'php/config.php';
	
	if(!(isset($_GET['step']))){
		$step = "setup";
	}else{
		$step = strtolower(htmlspecialchars($_GET['step']));
	}
		//Create Databsse if not Exsit
		//$create_database = "CREATE DATABASE ";
	
		//Create Table if not Exsit
		//USER: FIRST_NAME, LAST_NAME, UNAME ,EMAIL, MCUSER, UUID. PASSWORD
		$create_table_user = "CREATE TABLE users(id int NOT NULL AUTO_INCREMENT, FIRST_NAME text(30), LAST_NAME text(30), UNAME varchar(100), EMAIL varchar(100), MCUSER varchar(16), UUID varchar(100), PASSWORD varchar(255), Rank_id int(20),PRIMARY KEY(id))";
		$create_table_cat = "CREATE TABLE cat(id int PRIMARY KEY AUTO_INCREMENT, CAT_TITLE varchar(255) NOT NULL, CAT_DESC varchar(255) NOT NULL)";
		$create_table_forums = "CREATE TABLE forums(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, CAT_ID int(20), Forum_Name varchar(255), Forum_DESC varchar(255))";
		$create_table_topic = "CREATE TABLE topics(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, Forum_ID int(20), Topic_Name varchar(255), Topic_Content LONGTEXT, Type Enum('o','r'), Orignal_Post int(100), Author text(255), Locked Enum('n','y'))";
		// a= ADMINISTRATOR d= DONOR S=Special m=MEMBER
		$create_table_ranks = "CREATE TABLE ranks(id int NOT NULL AUTO_INCREMENT, name text, Display_Name text, Rank Enum('a','d','s','m'), PRIMARY KEY(id))";
	
		$admin_rank = "INSERT INTO ranks(name, Display_Name, Rank) VALUES ('Admin','ADMIN','a')";
		$admin_hashed_password = hash('sha256', "adminisrator");
		$admin = "INSERT INTO users(FIRST_NAME, LAST_NAME, UNAME, EMAIL, MCUSER, UUID, PASSWORD, Rank_id) values ('Admin', 'Admin' ,'Administrator', 'admin@admin.com, 'admin', '-----', '".$admin_hashed_password."')";
		//sql_query($create_database);
		//sql_query($create_table_user);
		//sql_query($create_table_cat);
		//sql_query($create_table_forums);
		//sql_query($create_table_topic);
		//sql_query($create_table_ranks);	
		//sql_query($admin_rank);
		//sql_query($admin);
?>
<html>
	<head>
		<title>
			New website &bull; Setup
		</title>
		<?php include $path.'asset/includes/css.php'?>
	</head>
	<body>
	<?php //include $path.'asset/includes/nav.php';?>
	<?php
		switch($step){
			case "setup":
			?>
			<div class="main">
			<div class="container">
				<div class="jumbo">
					<div class="jumbotron">
						<h1>Welcome!</h1>
						<h2>To the Setup. Just scroll down and fill everything out to get started!</h2>
					</div>
				</div>
				<div class="main-Body">
					<!-- MYSQL STUFF-->
					<form action="index.php?step=sql_setting" method="post">
						<h2>mySql Setup</h2>
						<div class="form-group">
							<input class="form-control" type="text" name="mainHost" placeholder="mySql Host"/>
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="mainUser" placeholder="mySql User"/>
						</div>
						<div class="form-group">
							<input class="form-control" type="password" name="mainPass" placeholder="mySql Password"/>
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="mainPort" placeholder="mySql Port (Default: 3360)"/>
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="mainDatabase" placeholder="Database"/>
						</div>
						<br/>
						<br/>
						<h2>Website Configuation</h2>
						<div class="form-group">
							<input class="form-control" type="text" name="ServerName" placeholder="Server Name"/>
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="ServerIP" placeholder="ServerIP"/>
						</div>
						<div class="form-group">
							<input class="form-control" type="text" name="DisplayIP" placeholder="DisplayIP"/>
						</div>
						<div class="form-group">
							<input class="form-control" type="submit" value="Submit"/>
						</div>
					</form>
					<!--Config Stuff-->
				</div>
			</div>
		</div>
		<?php 
		break;
		case "sql_setting";
			if(!$_POST['DisplayIP'] !="" && !$_POST['mainDatabase'] !="" && !$_POST['mainHost'] !="" && !$_POST['mainPass'] !="" && !$_POST['mainPort'] !="" && !$_POST['mainUser'] !="" && !$_POST['ServerIP'] !="" && !$_POST['ServerName'] !=""){
				die("Please Fill in all the forms! <a href='index.php'>back</a>");
			}
			$test = new mysqli($_POST['mainHost'], $_POST['mainUser'], $_POST['mainPass']);
			if($test->connect_error){
				die("ERROR CONNECTING");
			}
			//TABLE SETUP
			$test->query("CREATE DATABASE ".$_POST['mainDatabase']);
			$test->close();
			
			$test2 = new mysqli($_POST['mainHost'], $_POST['mainUser'], $_POST['mainPass'], $_POST['mainDatabase']) or die("Cannot connect to the second mysqli");
			
			
			$test2->query($create_table_forums);
			$test2->query($create_table_ranks);
			$test2->query($create_table_topic);
			$test2->query($create_table_user);
			$test2->query($create_table_cat);
			
			//ADMINISTRATOR SETUP
			$test2->query($admin_rank);
			$test2->query($admin);
			$test2->close();
			
			if(is_writable($path.'php/config.php')){
				$config = file_get_contents($path.'php/config.php');
				$config = substr($config, 6);
				
				$insert=
				'<?php'.PHP_EOL.
				'$mySql = array('.PHP_EOL.
				'	"HOST"=>"'.$_POST['mainHost'].'",'.PHP_EOL.
				'	"PORT"=>"'.$_POST['mainPort'].'",'.PHP_EOL.
				'	"USER"=>"'.$_POST['mainUser'].'",'.PHP_EOL.
				'	"PASSWORD"=>"'.$_POST['mainPass'].'",'.PHP_EOL.
				'	"DATABASE"=>"'.$_POST['mainDatabase'].'",'.PHP_EOL.
				');'.PHP_EOL.
				''.PHP_EOL.
				'//The configuration for your server'.PHP_EOL.
				'$config = array('.PHP_EOL.
				'		"SERVERNAME"=>"'.$_POST['ServerName'].'",'.PHP_EOL.
				'		"SERVERIP"=>"'.$_POST['ServerIP'].'",'.PHP_EOL.
				'		"DISPLAYIP"=>"'.$_POST['DisplayIP'].'",'.PHP_EOL.
				');';
				$configfile = fopen($path.'php/config.php', 'w');
				fwrite($configfile, $insert.$config);
				fclose($configfile);
				die("YOUR FINISHED HEAD OVER <a href='../index.php'>here</a>");
			}else{
				die("you have to insert it manually!");
			}
		break;
		case "finsihed":
		?>
			<div class="main">
			<div class="container">
				<div class="jumbo">
					<div class="jumbotron">
						<h1>Congrats!</h1>
						<h2>Your setup have been complete!</h2>
					</div>
				</div>
				<div class="main-Body">
					<div class="panel panel-info">
						<div class="panel-heading">
							ADMINISTRATOR ACCOUNT
						</div>
						<div class="panel-body">
						Username: Administrator
						Pass: administrator
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		break;
		case "":
		?>
			<div class="main">
			<div class="container">
				<div class="jumbo">
					<div class="jumbotron">
						<h1>Welcome!</h1>
						<h2>To the Setup. Just click setup button!</h2>
						<a class="btn btn-primary" href="index.php?step=setup">Setup</a>
					</div>
				</div>
			</div>
			</div>
		<?php
		break;
		}
		include $path.'asset/includes/scripts.php' ;
		?>
	</body>
</html>