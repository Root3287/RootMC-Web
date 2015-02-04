<!-- I CANT SPELL OK -->
<?php
$page ="forums";
$path="../../";
require($path."php/config.php");
require_once $path.'asset/includes/pagination.php';

$ppage = isset($_GET['p']) ? ((int) $_GET['p']):1;
$pagination = new Pagination();
$pagination->setCurrent($ppage);
$pagination->setTotal(15);
$markup = $pagination->parse();

$cat = "SELECT * FORM cat";
?>
<html>
  <head>
    <title><?php echo $config['SERVERNAME']." &bull; ". $page?></title>
  	<?php include $path.'asset/includes/css.php'?>
  </head>
  <body>
  	<?php include $path.'asset/includes/nav.php';?>
  	<div class="container">
  		<div class="breadcrumbs">
  			<ol class="breadcrumb">
  				<li><a href="#">CATEGORG</a></li>
  				<li><a href="#">FORUM</a></li>
  				<li class="active">TOPIC</li>
  			</ol>
  		</div>
  		<div class="forum-topics">
 			<!-- FORUMS -->
  		</div>
  		<div class="cats">
			<!-- ADD A WELL FOR THE CAT -->
			<div class="well">
				<h4>Categories</h4>
				<div class="container">
					<h5>
						<b>Cat</b>
						Forums
					</h5>
				</div>
			</div>
  		</div>
  		<div class="page">
  			<?php echo $markup;?>
  		</div>
  	</div>
  	<?php include $path.'asset/includes/scripts.php'?>
  </body>
</html>
