<?php
$path ="/";
require $path.'php/config.php';
?>
<html>
	<head>
		<title>
			<?php echo $config['SERVERNAME']."&bull; Home"; ?>
		</title>
		<?php include $path.'asset/includes/css.php'; ?>
	</head>
	<body>
		<div class="body">
			THIS IS SOME TEXT
		</div>
		<?php include $path.'asset/includes/scripts.php';?>
	</body>
</html>
