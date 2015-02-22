<!-- I CANT SPELL OK -->
<?php
$page ="forums";
$path="../../";
require($path."php/config.php");
//require_once '../../asset/includes/pagination.php';
require $path.'php/classes/forums.class.php';
require $path.'php/classes/user.class.php';
$forums = new forum();
$user = new user();
$db = new db();
?>
<html>
  <head>
    <title><?php echo $GLOBALS['config']['SERVERNAME']." &bull; ". $page?></title>
  	<?php include $path.'asset/includes/css.php'?>
  </head>
  <body>
  	<?php include $path.'asset/includes/nav.php';?>
  	<div>
  		<div class="forum-topic">
 			<!-- FORUMS -->
 			<?php if(!isset($_GET['cid'])){?>
 				<div class="jumbotron">
 					<h1>Welcome to the Forums!</h1>
 					<h2>Just click on any categorie on the side to access the forums</h2>
 				</div>
 			<?php }else{?>
 			<table class="table table-responsive">
 				<!--  <table class="table"> -->
					<tr>
						<th>Topic</th>
						<th>Author</th>
						<th>Replies</th>
					</tr>
					<tr>
						<td>Test</td>
						<td>Root</td>
						<td>3287</td>
					</tr>
				<!-- </table> -->
 			</table>
 			<?php }?>
  		</div>
  		<div class="cats">
			<!-- ADD A WELL FOR THE CAT -->
			<div class="well">
				<h4>Categories</h4>
				<div class="container">
					<h5>
						<?php 
							$pcatq = $db->asc_Where('categories', 'Parent = 0', 'Cat_Order');
							while($pcat = mysqli_fetch_assoc($pcatq)){
								$ptitle = $pcat['Title'];
								$pid = $pcat['id'];
								echo $ptitle.'<br/>';
								$ccatq = $db->asc_Where('categories', 'Parent = '.$pid, 'Cat_Order');
								while($ccat = mysqli_fetch_assoc($ccatq)){
									$cid = $ccat['id'];
									$ctitle = $ccat['Title'];
									echo "<a href='index.php?cid=".$cid."'>".$ctitle."</a>";
								}
							}
						?>
						<b>Cat</b><br/>
						Forums
					</h5>
				</div>
			</div>
  		</div>
  		<div class="page">
  			
  		</div>
  	</div>
  	<?php include $path.'asset/includes/scripts.php'?>
  </body>
</html>
<?php 

?>