<?php
require path.'php/init.php';
$page = 'forums';
$forums = new forums();
if(!isset($_GET['cid']) && !isset($_GET['tid'])){
	Redirect::to('index.php');
}
$topics = $forums->getTopic();
foreach($topics as $topic){
	$title = $topic['Title'];
	$content = $topic['Content'];
	$author = $topic['Author'];
}
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
