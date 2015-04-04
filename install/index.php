<?php
	$page="install";
	$path = "../";
	require $path.'php/init.php';
	require $path.'/php/classes/redirect.class.php';
	$redirect = new Redirect();
	
	if(!(isset($_GET['step']))){
		$step = "welcome";
	}else{
		$step = strtolower(htmlspecialchars($_GET['step']));
	}
	
	if($step == "delete"){
		unlink('index.php');
		$redirect->to($path."index.php");
	}
		
	if($step == "sql_setting"){
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
		');'.PHP_EOL.
		'$GLOBALS[\'SQL\'] = array('.PHP_EOL.
		'	"HOST"=>"'.$_POST['mainHost'].'",'.PHP_EOL.
		'	"PORT"=>"'.$_POST['mainPort'].'",'.PHP_EOL.
		'	"USER"=>"'.$_POST['mainUser'].'",'.PHP_EOL.
		'	"PASSWORD"=>"'.$_POST['mainPass'].'",'.PHP_EOL.
		'	"DATABASE"=>"'.$_POST['mainDatabase'].'",'.PHP_EOL.
		'	"PREFIX"=>"'.$_POST['PREFIX'].'",'.PHP_EOL.
		');'.PHP_EOL.
		'$GLOBALS[\'CONFIG\'] = array('.PHP_EOL.
		'	"SERVERNAME"=>"'.$_POST['ServerName'].'",'.PHP_EOL.
		'	"SERVERIP"=>"'.$_POST['ServerIP'].'",'.PHP_EOL.
		'	"DISPLAYIP"=>"'.$_POST['DisplayIP'].'",'.PHP_EOL.
		');'.PHP_EOL.
		'?>';
			
		if(is_writable($path.'php/config.php')){
			$Iconfig = file_get_contents($path.'php/config.php');
			$Iconfig = substr($Iconfig, 6);
		
			$configfile = fopen($path.'php/config.php', 'w');
			fwrite($configfile, $insert.$Iconfig);
			fclose($configfile);
			$redirect->to("index.php?step=finish");
			die();
		}else{
			$Iconfig = file_get_contents('inc/config.php');
			$Iconfig = substr($config, 5);
			$Iconfig = nl2br(htmlspecialchars($insert . $config));
			
			echo $Iconfig;
			die("<br/>Woops! Something went wrong! The file is not readable! you have to insert it manually into home/php/config.php! <a href='?step=finished'>CLICK ME!</a>");
		}
	}
?>
<html>
	<head>
		<title>
			New website &bull; <?php echo $step;?>
		</title>
		<?php include $path.'asset/includes/css.php'?>
	</head>
	<body>
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
						<div class="form-group">
							<input class="form-control" id="Prefix" type="text" name="mainPrefix" placeholder="mySql Prefix (Default: '')(WIP)" autocomplete="off" value=""/>
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
							<input class="form-control" id="ServerDisplayIP" type="hidden" name="DisplayIP" placeholder="DisplayIP" autocomplete="off"/>
						</div>

						<h2>Administrator's Account</h2>
						<div class="form-group">
							<input class="form-control" id="AU" type="hidden" name="AdminUser" value="Administrator"/>
						</div>
						<div class="form-group">
							<input class="form-control" id="AP" type="hidden" name="adminPassword" value="administrator"/>
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
		case "finished":
		?>
			<div class="main">
			<div class="container">
				<div class='alert alert-danger' role='alert'>You <strong>must delete</strong> the install folder to have everything to work correctly!</div>
				<div class="jumbo">
					<div class="jumbotron">
						<h1>Congrats!</h1>
						<h2>Your setup have been complete!</h2>
						<a href="?step=delete" class="btn btn-danger">Danger</a>
					</div>
				</div>
				
				<div class="main-Body">
					<div class="panel panel-info">
						<div class="panel-heading">
							ADMINISTRATOR ACCOUNT
						</div>
						<div class="panel-body">
						Username: Admin<br/>
						Pass: administrator
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		break;
		case "welcome":
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