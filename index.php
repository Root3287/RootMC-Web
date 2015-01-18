<?php 
require 'php/config.php';

if(isDown()=="false"){
	header("Location: ".$config['HomeLink']."/downtime");
}
?>
<html>
	<head>
		<title>
			RootMC &bull; Home
		</title>
		<link href="<?php echo $config['HomeLink'];?>/asset/css/bootstrap.css" rel="stylesheet">
	</head>
	<body>
		<div class="body">
			THIS IS SOME TEXT
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="<?php echo $config['HomeLink'];?>asset/js/bootstrap.min.js"></script>
	</body>
</html>