<?php
$page ="HOME";
$path ="/";
require 'php/config.php';
?>
<html>
	<head>
		<title>
			<?php echo $config['SERVERNAME']." &bull; ". $page; ?>
		</title>
		<?php include $path.'asset/includes/css.php'; ?>
	</head>
	<body>
		<div class="main">
			<div class="nav">
				<?php include $path.'asset/includes/nav.php';?>
			</div>
			<div class="container">
				<div class="body">
					<div class="jumbotron">
						<h1>Welcome to <?php echo $config['SERVERNAME'];?></h1>
						<h4><?php echo $config['SERVERIP'];?></h4>
					</div>
					<div class="news">
						<div class="panel panel-default">
							<div class="panel-heading">
								NEWS
							</div>
							<div class="panel-body">
								TODO:This is where the news goes to 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include $path.'asset/includes/scripts.php';?>
	</body>
</html>
