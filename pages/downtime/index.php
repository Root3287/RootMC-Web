<?php
$path = "../../";
$page = "DOWN";
require $path.'php/config.php';
if($downtime['ENABLE']=="true"){
	header("Location: ".$path);
}
?>
<html>
	<head>
		<title>
			<?php echo $GLOBALS['config']['SERVERNAME']." &bull; ". $page;?>
		</title>
		<?php include $path.'asset/includes/css.php';?>
	</head>
	<body>
		<div class="container">
			<h1>The Site is down because of:</h1>
			<h1><?php echo $downtime['REASON']; ?></h1>
		</div>
		<?php include $path.'asset/includes/scripts.php';?>
	</body>
</html>
