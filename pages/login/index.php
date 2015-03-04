<?php 
$path ="../../";
require $path.'php/config.php';
if(file_exists("setup.php")){
	header("Location: ".$path."pages/downtime");
}
?>
<html>
	<head>
		<title><?php echo $CONFIG['SERVERNAME']." &bull; LOGIN";?></title>
		<?php include $path.'asset/includes/css.php';?>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<form action="login.php" method="post">
					<div class="form-group">
						<input type="text" id="USER" name="USER" placeholder="Username, Email or Minecraft Username">
					</div>
					<div class="form-group">
						<input type="text" id="PASS" name="PASS" placeholder="Password"/>
					</div>
					<div class="row">
						<input type="submit" value="Submit"/>
					</div>
				</form>
			</div>
		</div>
		<?php include $path.'asset/includes/scripts.php';?>
	</body>
</html>