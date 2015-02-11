<?php
$page ="home";
$path ="";
require $path.'php/config.php';
?>
<html>
	<head>
		<title>
			<?php echo $config['SERVERNAME']." &bull; ". strtoupper($page); ?>
		</title>
		<?php include $path.'asset/includes/css.php'; ?>
		<style>
			.jumbotron {
				margin-bottom: 0px;
				background-image: url(asset/img/Home-BG.png);
				background-position: 0% 25%;
				background-size: cover;
				background-repeat: no-repeat;
				color: white;
			}
			body.home{
				/*margin-bottom: 0px;*/
				background-image: url(asset/img/Home-BG.png);
				background-repeat: repeat;
				/*background-position: 0% 25%;
				background-size: cover;
				background-repeat: repeat;
				color: white;*/
				color:white;
			}
		</style>
	</head>
	<body class="home">
		<div class="main">
			<div class="nav">
				<?php include $path.'asset/includes/nav.php';?>
			</div>
			<div class="container">
					<div class="jumbotron">
					<h1>Welcome to <?php echo $config['SERVERNAME'];?></h1>
					<h4><?php echo $config['SERVERIP'];?></h4>
				</div>
				<div class="home_container">
						<div class="news">
							<h2>News</h2>
							<div class="panel panel-bg">
								<div class="panel-heading">
									NEWS
								</div>
								<div class="panel-body">
										TODO:This is where the news goes to 
									</div>
								</div>
							</div>
							
						<div class="login">
							<h2>Login</h2>
							<div class="panel panel-bg">
								<div class="panel-heading">
										<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];}else{?>REGISTER/LOGINS<?php } ?>
								</div>
								<div class="panel-body">
										TODO:This is where the Login goes to 
									</div>
								</div>
						</div>
						
				</div>
			</div>
				<?php include $path.'asset/includes/copyright.php';?>
			</div>
			
		<?php include $path.'asset/includes/scripts.php';?>
	</body>
</html>
