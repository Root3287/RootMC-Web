<?php
	$page="install";
	define('path', '../');
	require path.'php/init.php';
	require path.'install/install.class.php';
	require path.'/php/classes/redirect.class.php';
	$redirect = new Redirect();
	$install = new install($redirect);
	
	if(!(isset($_GET['step']))){
		$step = "welcome";
	}else{
		$step = strtolower(htmlspecialchars($_GET['step']));
	}
	
	if($step == "delete"){
		unlink('index.php');
		unlink('install.class.php');
		$redirect->to(path."index.php");
	}

	if($step == "sql_setting"){
		$install->insert(path, $_POST['mainHost'], $_POST['mainUser'], $_POST['mainPass'], $_POST['mainDatabase'], $_POST['mainPort'], $_POST['mainPrefix'], $_POST['ServerName'], $_POST['ServerIP'], $_POST['DisplayIP']);
		$install->put();
	}else if($step == "config_setting"){
		$install->newConfig(/*CONFIG SETUP HERE*/);
	}
?>
<html>
	<head>
		<title>
			New website &bull; <?php echo $step;?>
		</title>
		<?php include path.'asset/includes/css.php'?>
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
							<input class="form-control" id="ServerDisplayIP" type="text" name="DisplayIP" placeholder="DisplayIP" autocomplete="off"/>
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
		</div>
		<?php 
		break;
		case "config":
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
					<form action="index.php?step=config_setting" method="post">
					<!-- CONFIG -->
						<div class="form-group">
							<input class="form-control" id="Submit" type="submit" value="Submit"/>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php
		break;
		case "finish":
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
		include path.'asset/includes/scripts.php' ;
		?>
	</body>
</html>
