<?php
$page ="Credits";
define('path', '../');
require path.'php/init.php';
if(!isset($_GET['u'])){
	$credit = "";
}
?>
<html>
	<head>
		<title>
			<?php echo $CONFIG['SERVERNAME']." &bull; ". strtoupper($page); ?>
		</title>
		<?php include path.'asset/includes/css.php'; ?>
	</head>
	<body class="home">
		
		<div class="main">
			<div class="nav">
				<?php include path.'asset/includes/nav.php';?>
			</div>
			<div class="container">
					<div class="jumbotron">
					<h1>Welcome to <?php echo $CONFIG['SERVERNAME'];?></h1>
					<h4><?php echo $CONFIG['SERVERIP'];?></h4>
				</div>
				<div class="home_container">
						<div class="news">
							<h2>News</h2>
							<?php switch ($credit){
								case "0":
							?>
							<div class="panel panel-bg">
								<div class="panel-heading">
									Note
								</div>
								<div class="panel-body">
										Click on any people on the side
									</div>
								</div>
							</div>
							<?php break; ?>
							<?php case "1":?>
							<div class="panel panel-bg">
								<div class="panel-heading">
									Samerton
								</div>
								<div class="panel-body">
										Sam helped with the debugging issues he is the "First person" where it comes to bugs on this software.
										Usually I could solve bugs on my own, but when there difficult enough Sam is the first man I go to.
										In my perspective he may think I ask too much(If you do). 
										I just want to understand the language I am leaning.
										He give me useful tips on my code and I do the same on his code(At times). 
										I am usually glad to see him on skype because we could get a conversation on our level. 
										As long were on the same page I am glad to sponsore him in many ways by donating to him on his server or point out bugs.
										Thanks for all the help ideas and tips your ARE the best and only the best. 
										You know more than me by far, when it comes to php.
										I jumped into php with no clue he helped me understand what to do and where is my errors. 
										There is no way that I could survive understanding without him. His code always teach me. 
										Such as his OOP. There absolute way to repay him for as many times i ask him for help. 
										It probably almost everyday I would ask 'Why this no work'.
										Then I have to wait till like after school to ask him because of time differences. 
										I could go on and on but he really helped me with everything, and so on. 
										The only reason why I stay on your server is because of Sam.
										That could also go with php and codeing in General.
										<br>
										Thanks for the inspration, ideas, help, and more. 
										<br>
										<b><a href="https://www.github.com/samerton">Github Page</a></b>
										<b><a href="https://www.worldscapemc.co.uk">Minecraft Page</a></b>
									</div>
								</div>
							</div>
							<?php break;?>
							<?php } ?>
						<div class="login">
							<h2>Other</h2>
							<div class="panel panel-bg">
								<div class="panel-heading">
									Roles	
								</div>
								<div class="panel-body">
									<a href="?u=1">Samerton</a>	 
								</div>
							</div>
						</div>
				</div>
			</div>
				<?php include path.'asset/includes/footer.php';?>
			
		<?php include path.'asset/includes/scripts.php';?>
	</body>
</html>