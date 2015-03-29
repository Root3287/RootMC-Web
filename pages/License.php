<?php
$page ="home";
$path ="";
require $path.'php/init.php';
?>
<html>
	<head>
		<title>
			<?php echo $CONFIG['SERVERNAME']." &bull; ". strtoupper($page); ?>
		</title>
		<?php include $path.'asset/includes/css.php'; ?>
	</head>
	<body class="home">
		
		<div class="main">
			<div class="nav">
				<?php include $path.'asset/includes/nav.php';?>
			</div>
			<div class="container">
				<div class="jumbotron">
					<h1>Welcome to <?php echo $CONFIG['SERVERNAME'];?></h1>
					<h4><?php echo $CONFIG['SERVERIP'];?></h4>
				</div>
				<div class="home_container">
						<div class="news">
							<h2>News</h2>
							<div class="panel panel-bg">
								<div class="panel-heading">
									NEWS
								</div>
								<div class="panel-body">
										The MIT License (MIT)

										Copyright &copy; 2015 Timothy Gibbons

										Permission is hereby granted, free of charge, to any person obtaining a copy
										of this software and associated documentation files (the "Software"), to deal
										in the Software without restriction, including without limitation the rights
										to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
										copies of the Software, and to permit persons to whom the Software is
										furnished to do so, subject to the following conditions:

										The above copyright notice and this permission notice shall be included in all
										copies or substantial portions of the Software.

										THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
										IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
										FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
										AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
										LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
										OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
										SOFTWARE.
								</div>
							</div>
						</div>
							
						<div class="login">
							<h2>Summery</h2>
							<div class="panel panel-bg">
								<div class="panel-heading">
										What you can and cannot do
								</div>
								<div class="panel-body">
									<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> <strong>Required</strong> License and copyright notice <br/>
									<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Commercial Use<br/>
									<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Distribute<br/>
									<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Modify<br>
									<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Privatly use<br/>
									<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Sublicense<br>
									<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> Hold Liable(Responsible)	 
								</div>
							</div>
						</div>	
					</div>
				</div>
				<?php include $path.'asset/includes/footer.php';?>
			</div>
		<?php include $path.'asset/includes/scripts.php';?>
	</body>
</html>