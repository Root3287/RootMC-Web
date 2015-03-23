<?php
$page ="forums";
$path ="../../";
require $path.'php/config.php';
?>
<html>
	<head>
		<title>
			<?php echo $CONFIG['SERVERNAME']." &bull; ". strtoupper($page); ?>
		</title>
		<?php include $path.'asset/includes/css.php'; ?>
	</head>
	<body class="home">
		
		<div class="main">
			<div class="nav">
				<?php include $path.'asset/includes/nav.php';?>
			</div>
			<div class="container">
				<div class="jumbotron">
					<h1>Welcome to the Forums</h1>
				</div>
				<div class="home_container">
						<div class="news">
							<h2>News</h2>
							<div class="panel panel-bg">
								<div class="panel-heading">
									Topics
								</div>
								<div class="panel-body">
										TODO:This is where the topics goes to 
									</div>
								</div>
							</div>
							
						<div class="login">
							<h2>Login</h2>
							<div class="panel panel-bg">
								<div class="panel-heading">
										Categories
								</div>
								<div class="panel-body">
										TODO: This is where the Cat goes
									</div>
								</div>
						</div>
				</div>
			</div>
				<?php include $path.'asset/includes/footer.php';?>
			</div>
			
		<?php include $path.'asset/includes/scripts.php';?>
	</body>
</html>
