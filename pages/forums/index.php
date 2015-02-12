<!-- I CANT SPELL OK -->
<?php
$page ="forums";
$path="../../";
require($path."php/config.php");
require_once '../../asset/includes/pagination.php';

//Forums
if(isset($_GET['cid'])){
	$catByID = getCatById($_GET['id']);
}else{
	$cat = "";
}

//if(isset($_GET['fid'])){
//	$forum = getForumById($_GET['fid']);
//}else{
//	$forum = "";
//}

//pagination
$ppage = isset($_GET['page']) ? ((int) $_GET['page']):1;
$pagination = new Pagination();
$pagination->setCurrent($ppage);
$pagination->setTotal(15);
$markup = $pagination->parse();
?>
<html>
  <head>
    <title><?php echo $GLOBALS['config']['SERVERNAME']." &bull; ". $page?></title>
  	<?php include $path.'asset/includes/css.php'?>
  </head>
  <body>
  	<?php include $path.'asset/includes/nav.php';?>
  	<div class="container">
  		<div class="breadcrumbs">
  			<ol class="breadcrumb">
  				<?php if(isset($_GET['cid'])){?><li><a href="#"><?php echo $cat['CAT_TITLE']?></a></li><?php }?>
  				<?php if((isset($_GET['fid'])) && (isset($_GET['cid']))){?><li><a href="#"><?php //echo $forum['Forum_Name'];?></a></li><?php }?>
  			</ol>
  		</div>
  		<div class="forum-topic">
 			<!-- FORUMS -->
 			<table class="table table-responsive">
 				<!--  <table class="table"> -->
					<tr>
						<th>Topic</th>
						<th>Author</th>
						<th>Views</th>
						<th>Replies</th>
					</tr>
					<tr>
						<td>Test</td>
						<td>Root</td>
						<td>3287</td>
						<td>3287</td>
				<!-- </table> -->
 			</table>
  		</div>
  		<div class="cats">
			<!-- ADD A WELL FOR THE CAT -->
			<div class="well">
				<h4>Categories</h4>
				<div class="container">
					<h5>
						<b>Cat</b><br/>
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
