<?php 
	$path = "../../";
	require $path.'php/config.php';
?>
<html>
	<head>
		<title><?php echo $config['SERVERNAME']." &bull; Register"?></title>
		<?php include $path.'asset/includes/css.php';?>
	</head>
	<body>
		<!-- TODO: NAV -->
		<div class="container">
			<div class="row">
			<form action="register.php" method="post">
					<div class="form-group">
						<input type="text" name="FirstName" id="FirstName "placeholder="FirstName"/>
					</div>
					<div class="form-group">
						<input type="text" name="LastName" id="LastName" placeholder="LastName"/>
					</div>
					<div class="form-group">
						<input type="text" name="UName" id="UName" placeholder="User Name"/>
					</div>
					<div class="form-group">
						<input type="text" name="EMAIL" id="EMAIL" placeholder="Email">
					</div>
					<div class="form-group">
						<input type="text" name="CEmail" id="CEmail" placeholder="ConfirmEmail"/>
					</div>
					<div class="form-group">
						<input type="text" name="MCUSER" id="MCUSER" placeholder="MINECRAFT USER"/>
					</div>
					<div class="row">
						<div class="form-group">
							<input type="text" name="Password" id="Password" placeholder="Password"/>
						</div>
						<div class="form-group">
							<input type="text" name="CPass" id="CPass" placeholder="CONFIRM PASSWORD"/>
						</div>
					</div>
					<input type="submit" value="Submit"/>
				</form>
			</div>
		</div>
		<?php include $path.'asset/includes/scripts.php';?>
	</body>
</html>