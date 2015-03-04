<!-- I CANT SPELL OK -->
<?php
$page ="forums";
$path="../../";
require($path."php/config.php");

?>
<html>
  <head>
    <title><?php echo $CONFIG['SERVERNAME']." &bull; ". $page?></title>
  	<?php include $path.'asset/includes/css.php'?>
  </head>
  <body>
  	<?php include $path.'asset/includes/nav.php';?>
	<div>
  	<div class="container">
		<div class="forums-Welcome">
			<div class="jumbotron">
				<H1>NAMELESS FORUMS</H1>
			</div>
		</div>
		<div class="page">
  			
  		</div>
	</div>
  	</div>
  	<?php include $path.'asset/includes/scripts.php'?>
  </body>
</html>