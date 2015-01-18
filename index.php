<?php 
require 'php/config.php';

if($downtime['ENABLE']){
	header("Location: ".$config['HomeLink']."/downtime");
	exit;
}
?>
<html>
	<head>
		<title>
			RootMC &bull; Home
		</title>
		<link href="asset/css/bootstrap.css" rel="stylesheet">
	</head>
	<body>
		<div class="body">
			THIS IS SOME TEXT
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="asset/js/bootstrap.min.js"></script>
	</body>
</html>