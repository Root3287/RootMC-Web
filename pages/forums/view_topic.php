<?php
$path = '../../';
require $path.'php/config.php';
$page = 'forums';

if(!isset($_GET['cid']) && !isset($_GET['tid'])){
	header("Location: $path.pages/404.html");
}
?>
<html>
	<head>
		<title>
			<?php echo $CONFIG['SERVERNAME'].' &bull; '. strtoupper($page);?>
		</title>
	</head>
	<body>
		<img src='asset/img/Home-BG.png' class='bg-image' width="2122" height="1412 "/>
		<div class="main">
			<?php include $path.'asset/includes/nav.php';?>
			<div class="container">
				<div class="op">
					<div class="panel panel-default">
						<div class="panel-heading">
							title
						</div>
						<div class="panel-body">
							<div class="author">
								SOMEBODY
							</div>
							<div class="information">
								this is my oppion
							</div>
						</div>
					</div>
				</div>
				<div class="cats">
					<div class="well">
						<div class="container">
						</div>
					</div>
				</div>
				<div class="reply">
					<div class="panel panel-default">
						<div class="panel-heading">
							title
						</div>
						<div class="panel-body">
							<div class="author">
								SOMEBODY
							</div>
							<div class="information">
								this is my oppion
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
