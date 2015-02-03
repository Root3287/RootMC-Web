<?php
$page ="Forums";
$path="../../";
require($path."php/config.php");
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
  				<li><a href="#">CATEGOR</a></li>
  				<li><a href="#">FORUM</a></li>
  				<li class="active">TOPIC</li>
  			</ol>
  		</div>
  		<div class="forum-content">
 			<!-- ADD A PANEL FOR THE FOURMS THAT CHANGES FOR THE CAT AND TOPICS -->
  		</div>
  		<div class="latus-topics">
  			<!-- ADD THE LATEUS TOPIC PANEL WHEN SOMEONE POST SOMETHING THEN THEN THEY LOGIT IT THE LATEUS TOPIC -->
  		</div>
  		
  		<div class="page">
  			<nav>
  				<ul class="pagination">
    				<li>
      					<a href="#" aria-label="Previous">
        					<span aria-hidden="true">&laquo;</span>
      					</a>
    				</li>
    				<li><a href="#">1</a></li>
   					<li><a href="#">2</a></li>
    				<li><a href="#">3</a></li>
    				<li><a href="#">4</a></li>
    				<li><a href="#">5</a></li>
    				<li>
      					<a href="#" aria-label="Next">
        					<span aria-hidden="true">&raquo;</span>
      					</a>
    				</li>
  				</ul>
			</nav>
  		</div>
  	</div>
  	<?php include $path.'asset/includes/scripts.php'?>
  </body>
</html>
