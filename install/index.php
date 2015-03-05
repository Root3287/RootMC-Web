<?php
	$page="install";
	$path = "../";
	require $path.'php/config.php';
	
	if(!(isset($_GET['step']))){
		$step = "";
	}else{
		$step = strtolower(htmlspecialchars($_GET['step']));
	}
		//Create Databsse if not Exsit
		//$create_database = "CREATE DATABASE ";
	
		//Create Table if not Exsit
		//USER: FIRST_NAME, LAST_NAME, UNAME ,EMAIL, MCUSER, UUID. PASSWORD
		$create_table_user = "CREATE TABLE users(Id int NOT NULL AUTO_INCREMENT, First_Name text(30), Last_Name text(30), UserName varchar(100), Email varchar(100), MCUser varchar(20), UUID varchar(100), Password varchar(255), RankId int(20), PRIMARY KEY(id))";
		$create_table_cat = "CREATE TABLE categories(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, Cat_Title varchar(255), Cat_Desc varchar(255), Parent int(11) DEFAULT '0', Parent_ID int(22) DEFAULT '0', Cat_Order int(11), Front_Page int(11) DEFAULT '0', view_access int(11) DEFAULT '0')";
		$create_table_reply = "CREATE TABLE reply(Id int PRIMARY KEY NOT NULL AUTO_INCREMENT, TId, Title varchar(255), Author int(11), Time datetime)";
		$create_table_topic = "CREATE TABLE topics(id int PRIMARY KEY NOT NULL AUTO_INCREMENT, Cid int(20), Tid int(20), Author int(11), Content LONGTEXT, data datetime)";
		
		$create_table_friends="CREATE TABLE friends(Id int PRIMARY KEY NOT NULL AUTO_INCREMENT, UserID int(255), FriendID int(255))";
		
		
		// a= ADMINISTRATOR D= DONOR S=Special m=DEFAULT
		$create_table_ranks = "CREATE TABLE ranks(id int NOT NULL AUTO_INCREMENT, name text, Display_Name text, Rank Enum('a','d','s','m'), PRIMARY KEY(id))";
	
		$admin_rank = "INSERT INTO ranks(name, Display_Name, Rank) VALUES ('Admin','ADMIN','a')";
		$admin_hashed_password = hash('sha256', "adminisrator");
		$admin = "INSERT INTO users(FIRST_NAME, LAST_NAME, UNAME, EMAIL, MCUSER, UUID, PASSWORD, Rank_id) values ('Admin', 'Admin' ,'Administrator', 'admin@admin.com', 'admin', '-----', '".$admin_hashed_password."','1')";
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
			<div class='alert alert-danger' role='alert'>You <strong>must delete</strong> the install folder to have everything to work correctly!</div>
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
							<input class="form-control" id="Host" type="text" name="mainHost" placeholder="mySql Host" autocomplete="off"/>
						</div>
						<div class="form-group">
							<input class="form-control" id="User" type="text" name="mainUser" placeholder="mySql User" autocomplete="off"/>
						</div>
						<div class="form-group">
							<input class="form-control" id="Pass" type="password" name="mainPass" placeholder="mySql Password" autocomplete="off"/>
						</div>
						<div class="form-group">
							<input class="form-control" id="Port" type="text" name="mainPort" placeholder="mySql Port (Default: 3306)" autocomplete="off"/>
						</div>
						<div class="form-group">
							<input class="form-control" id="Database" type="text" name="mainDatabase" placeholder="Database" autocomplete="off"/>
						</div>
						<br/>
						<br/>
						<h2>Website Configuation</h2>
						<div class="form-group">
							<input class="form-control" id="ServerName" type="text" name="ServerName" placeholder="Server Name" autocomplete="off"/>
						</div>
						<div class="form-group">
							<input class="form-control" id="ServerIP" type="text" name="ServerIP" placeholder="ServerIP" autocomplete="off"/>
						</div>
						<div class="form-group">
							<input class="form-control" id="ServerDisplayIP" type="text" name="DisplayIP" placeholder="DisplayIP" autocomplete="off"/>
						</div>

						<h2>Administrator's Account</h2>
						<div class="form-group">
							<input class="form-control" id="AU" type="text" name="AdminUser"/>
						</div>
						<div class="form-group">
							<input class="form-control" id="AP" type="password" name="adminPassword"/>
						</div>
						<div class="form-group">
							<input class="form-control" id="Submit" type="submit" value="Submit"/>
						</div>
					</form>
					<!--Config Stuff-->
				</div>
			</div>
			<script>
			</script>
		</div>
		<?php 
		break;
		case "sql_setting";
			if(!$_POST['DisplayIP'] !="" && !$_POST['mainDatabase'] !="" && !$_POST['mainHost'] !="" && !$_POST['mainPass'] !="" && !$_POST['mainPort'] !="" && !$_POST['mainUser'] !="" && !$_POST['ServerIP'] !="" && !$_POST['ServerName'] !="" && !$_POST['AdminUSER'] && !$_POST['AdminPass']){
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
			
			
			//$test2->query($create_table_forums);
			$test2->query($create_table_ranks);
			$test2->query($create_table_topic);
			$test2->query($create_table_user);
			$test2->query($create_table_cat);
			$test2->query($create_table_friends);
			//$test2->query($create_table_reply);
			//ADMINISTRATOR SETUP
			$test2->query($admin_rank);
			$test2->query($admin);
			$test2->query($create_table_post);
			$test2->close();
			
			if(is_writable($path.'php/init.php')){
				$Iconfig = file_get_contents($path.'php/init.php');
				$Iconfig = substr($Iconfig, 6);
				/*
				$insert=
				'<?php'.PHP_EOL.
				'$GLOBALS[\'SQL\'] = array('.PHP_EOL.
				'	"HOST"=>"'.$_POST['mainHost'].'",'.PHP_EOL.
				'	"PORT"=>"'.$_POST['mainPort'].'",'.PHP_EOL.
				'	"USER"=>"'.$_POST['mainUser'].'",'.PHP_EOL.
				'	"PASSWORD"=>"'.$_POST['mainPass'].'",'.PHP_EOL.
				'	"DATABASE"=>"'.$_POST['mainDatabase'].'",'.PHP_EOL.
				'	"PREFIX"=>"'.$_POST['PREFIX'].'",'.PHP_EOL.
				');'.PHP_EOL.
				''.PHP_EOL.
				'//The configuration for your server'.PHP_EOL.
				'$GLOBALS[\'config\'] = array('.PHP_EOL.
				'	"SERVERNAME"=>"'.$_POST['ServerName'].'",'.PHP_EOL.
				'	"SERVERIP"=>"'.$_POST['ServerIP'].'",'.PHP_EOL.
				'	"DISPLAYIP"=>"'.$_POST['DisplayIP'].'",'.PHP_EOL.
				');';*/
				
				$insert=
				'<?php'.PHP_EOL.
				'$SQL = array('.PHP_EOL.
				'	"HOST"=>"'.$_POST['mainHost'].'",'.PHP_EOL.
				'	"PORT"=>"'.$_POST['mainPort'].'",'.PHP_EOL.
				'	"USER"=>"'.$_POST['mainUser'].'",'.PHP_EOL.
				'	"PASSWORD"=>"'.$_POST['mainPass'].'",'.PHP_EOL.
				'	"DATABASE"=>"'.$_POST['mainDatabase'].'",'.PHP_EOL.
				'	"PREFIX"=>"'.$_POST['PREFIX'].'",'.PHP_EOL.
				');'.PHP_EOL.
				''.PHP_EOL.
				'//The configuration for your server'.PHP_EOL.
				'$CONFIG = array('.PHP_EOL.
				'	"SERVERNAME"=>"'.$_POST['ServerName'].'",'.PHP_EOL.
				'	"SERVERIP"=>"'.$_POST['ServerIP'].'",'.PHP_EOL.
				'	"DISPLAYIP"=>"'.$_POST['DisplayIP'].'",'.PHP_EOL.
				');';
				$configfile = fopen($path.'php/init.php', 'w');
				fwrite($configfile, $insert.$Iconfig);
				fclose($configfile);
				die("<a href='index.php?step=finished'>CLICK ME!</a>");
			}else{
				die("you have to insert it manually!");
			}
		break;
		case "finished":
		?>
			<div class="main">
			<div class="container">
				<div class='alert alert-danger' role='alert'>You <strong>must delete</strong> the install folder to have everything to work correctly!</div>
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
						Username: Administrator<br/>
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
			<div class='alert alert-danger' role='alert'>You <strong>must delete</strong> the install folder to have everything to work correctly!</div>
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