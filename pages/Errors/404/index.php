<?php
$page = "404 Not Found";
define('path', '../../../');
require path.'php/init.php';
?>
<html>
	<head><title><?php echo config::get('SERVERNAME');?> 404 &bull; Not Found</title></head>
	<body>
		
		<div class="main">
			<div class="nav">
				<?php include path.'asset/includes/nav.php';?>
			</div>
			<div class="container">
					<div class="jumbotron">
					<h1>404 Not Found</h1>
					<h4>Something here wasn't found please check you link and try again!</h4>
				</div>
			</div>
				<?php include path.'asset/includes/footer.php';?>
			</div>
			
		<?php include path.'asset/includes/scripts.php';?>
	</body>
</html>