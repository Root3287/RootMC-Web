<?php
$path="../../"; //for each directory that it's in add another ../
require 'php/config.php';
?>
<html>
	<head>
		<title>
			<?php echo $config['SERVERNAME']." &bull; (NAME OF PAGE)"?>
		</title>
		<?php include 'asset/includes/css.php';?>
	</head>
	<body>
		<div class="main">
			<div class="container">
				<h1>THIS IS A TEMPLATE</h1>
			</div>
		</div>
		<?php include 'asset/includes/scripts.php';?>
	</body>
</html>
