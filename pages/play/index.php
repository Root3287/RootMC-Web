<?php
	$path = "../../";
	require $path.'php/config.php';
?>
<html>
	<head>
		<title><?php echo $CONFIG['SERVERNAME'];?>	&bull; PLAY </title>	
	</head>
	<body>
		<div class="main">
			<div class="container">
				<div class="jumbotronara">
					<div class="jumbotron">
						<h1>Welcome to <?php echo $CONFIG['SERVERNAME'];?></h1>
					</div>
				</div>
				<div class="serverinfo">
					<div class="server-info">
						<div class="panel panel-info">
							<div class="panel-heading">
							</div>
							<div class="panel-body">
							</div>
						</div>
					</div>
					<div class="players">
						<?//TODO: MAKE A PLAYERS AREA ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>