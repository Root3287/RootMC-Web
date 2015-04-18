<?php
$page ="PLAY";
define('path', '../../');
require path.'php/init.php';
?>
<html>
	<head>
		<title>
			<?php echo $CONFIG['SERVERNAME']." &bull; ". strtoupper($page); ?>
		</title>
		<?php include path.'asset/includes/css.php'; ?>
	</head>
	<body class="home">
		
		<div class="main">
			<div class="nav">
				<?php include path.'asset/includes/nav.php';?>
			</div>
			<div class="container">
					<div class="jumbotron">
					<h1>Welcome to <?php echo $CONFIG['SERVERNAME'];?></h1>
					<h4><?php echo $CONFIG['SERVERIP'];?></h4>
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
				<?php include path.'asset/includes/footer.php';?>
			</div>
			
		<?php include path.'asset/includes/scripts.php';?>
	</body>
</html>
