<?php
$path = "../";
require 'php/config.php';
if(!isDown()){
	header("Location: ".$config['HomeLink']);
}
?>
<html>
	<head>
		<title>
			<?php echo $config['SERVERNAME'].' &bull; DOWN';?>
		</title>
		<link rel="stylesheet" href="<?php echo $config['HomeLink'];?>/css/bootstrap.css" />
	</head>
	<body>
		<div class="container">
			<h1>The Site is down because of:</h1>
			<h1><?php echo $downtime['reason']; ?></h1>
		</div>
	</body>
</html>