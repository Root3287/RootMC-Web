<?php 
$path ="../../";
require $path.'php/init.php';
$user = new User;
if((!(isset($_GET['mode']))) && (!($_GET['mode']=="login")))){
?>
<html>
	<head>
		<title><?php echo $CONFIG['SERVERNAME']." &bull; LOGIN";?></title>
		<?php include $path.'asset/includes/css.php';?>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<form action="?mode=login" method="post">
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
<?php
}else{
	$username = $_POST['USER'];
	$password = $_POST['PASS'];
	$user->login($username, $password);
}
?>
