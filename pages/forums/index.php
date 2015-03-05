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
					<h2><?php echo $CONFIG['SERVERNAME']; ?> FORUMS</h2>
				</div>
			</div>
			<div class="page">
  				<table>
  				</table>
  			</div>
  			<div class="cat">
  				<div class="well">
  					<a href="index.php"><b>Main</b></a>
  					<?php
  					$parent = $db->query("SELECT * FROM category WHERE Parent = 0");
  					$child = $db->query("SELECT * FROM category WHERE Parent = 1");
  					?>
  				</div>
  			</div>
		</div>
  	</div>
  	<?php include $path.'asset/includes/scripts.php'?>
  </body>
</html>
