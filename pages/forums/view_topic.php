<?php
require path.'php/init.php';
$page = 'forums';
$forums = new forums();
if(!isset($_GET['cid']) && !isset($_GET['tid'])){
	Redirect::to('index.php');
}
$topics = $forums->getTopic($tid);
?>
<html>
	<head>
		<title>
			<?php echo $CONFIG['SERVERNAME'].' &bull; '. strtoupper($page);?>
		</title>
	</head>
	<body>
		<div class="main">
			<?php include path.'asset/includes/nav.php';?>
			<div class="container">
				<div class="op">
					<?php
					foreach($topics as $topic){
					?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<?php echo $topic->Title; ?>
						</div>
						<div class="panel-body">
							<div class="author">
								<?php echo $topic->Author; ?>
							</div>
							<div class="information">
								<?php echo $topic->Content;?>
							</div>
						</div>
					</div>
					<?php
					}
					?>
				</div>
				
				<div class="reply">
					<?php
					foreach($replies as $reply){
					?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<?php echo $reply->Title;?>
						</div>
						<div class="panel-body">
							<div class="author">
								<?php echo $reply->Author;?>
							</div>
							<div class="information">
								<?php echo $reply->Content;?>
							</div>
						</div>
					</div>
					<?php
					}
					?>
				</div>
				<div class="cats">
					<div class="well">
						<div class="container">
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
