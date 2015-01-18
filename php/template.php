<?php
$path="../";
require 'php/config.php';

if(isDown()){
header("Location: ".$config['HomeLink']."/pages/downtime");
}
?>
<html>
	<head>
		<title>
			<?php echo $config['SERVERNAME']." &bull; TEMPLATE"?>
		</title>
	</head>
	<body>
		<div class="main">
			<div class="container">
				<h1>THIS IS A TEMPLATE</h1>
			</div>
		</div>
	</body>
</html>
