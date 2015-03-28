<?php
$page ="admincp";
$path ="../../../";
require $path.'php/config.php';

$install = $path."install/index.php";

if(file_exists($install)){
	$installExists = "true";
} 

if( !(isset($_GET['p'])) && $_GET['p'] !=int ){
	$pagenum = '0';
}else{
	$pagenum = $_GET['p'];
}
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
					<h1>Welcome to <?php echo $page;?></h1>
					<h4>
						<?php
							// WELCOME BACK _____! 
							//echo $CONFIG['SERVERIP'];
						?>
					</h4>
				</div>
				<div class="home_container">
						<div class="news">
							<h2>Content</h2>
							<?php 
							switch ($pagenum){
								case "0":
							?>
							<div class="panel panel-bg">
								<div class="panel-heading">
									NO SELECTION!
								</div>
								<div class="panel-body">
										There is no current selection please choose one!
								</div>
							</div>
							<?php 
								break;
								case"1":
							?>
							<div class="panel panel-bg">
								<div class="panel-heading">
									Blog
								</div>
								<div class="panel-body">
										TODO: BLOG
								</div>
							</div>
							<?php 
								break;
							?>
							
							<?php 
								case"2":
							?>
							<div class="panel panel-bg">
								<div class="panel-heading">
									Users
								</div>
								<div class="panel-body">
										TODO: Users
								</div>
							</div>
							<?php 
								break;
							?>
							<?php 
								case"3":
							?>
							<div class="panel panel-bg">
								<div class="panel-heading">
									Groups
								</div>
								<div class="panel-body">
										TODO: Groups
								</div>
							</div>
							<?php 
								break;
							?>
							<?php 
								case"4":
							?>
							<div class="panel panel-bg">
								<div class="panel-heading">
									Theme
								</div>
								<div class="panel-body">
										TODO: Theme
								</div>
							</div>
							<?php 
								break;
							?>
							<?php 
								case"5":
							?>
							<div class="panel panel-bg">
								<div class="panel-heading">
									Databases
								</div>
								<div class="panel-body">
										TODO: Databases
								</div>
							</div>
							<?php 
								break;
							?>
							<?php 
								case"6":
							?>
							<div class="panel panel-bg">
								<div class="panel-heading">
									Servers
								</div>
								<div class="panel-body">
										TODO: Servers
								</div>
							</div>
							<?php 
								break;
							?>
							<?php 
								case"7":
							?>
							<div class="panel panel-bg">
								<div class="panel-heading">
									Links
								</div>
								<div class="panel-body">
										TODO: Links
								</div>
							</div>
							<?php 
								break;
							?>
							<?php 
								case"8":
							?>
							<div class="panel panel-bg">
								<div class="panel-heading">
									DELETE INSTALL
								</div>
								<div class="panel-body">
										<?php 
										if(!unlink($install)){
											echo 'The Function has not been completed due to the following<br/><ul><li>File is not writeable</li><li>File has already been deleted</li><li>File is linked to the wrong path</li><li>ect.</li></ul>';
										}else{
											echo 'File has been deleted!';
										}
										?>
								</div>
							</div>
							<?php 
								break;
							?>
							<?php 
								case"9":
							?>
							<div class="panel panel-bg">
								<div class="panel-heading">
									Panels
								</div>
								<div class="panel-body">
										TODO: Panels
								</div>
							</div>
							<?php 
								break;
							?>
							<?php 
								case"10":
							?>
							<div class="panel panel-bg">
								<div class="panel-heading">
									Password Hash
								</div>
								<div class="panel-body">
								From data hello
								<?php
									$data = "hello"; 

									foreach (hash_algos() as $v) { 
									        $r = hash($v, $data, false); 
									        printf("%-12s %3d %s\n", $v, strlen($r), $r); 
									}
								?> 
								</div>
							</div>
							<?php
								break; 
								}
							?>
				</div>
				<div class="login">
							<h2>Menu</h2>
							<div class="panel panel-bg">
								<div class="panel-heading">
										Items
								</div>
								<div class="panel-body">
										<ul>
											<?php if($pagenum =="1"){?><li>Blog</li><?php }else{?><li><a href="?p=1">Blog</a></li><?php }?>
											<?php if($pagenum =="2"){?><li>Users</li><?php }else{?><li><a href="?p=2">Users</a></li><?php }?>
											<?php if($pagenum =="3"){?><li>Groups</li><?php }else{?><li><a href="?p=3">Groups</a></li><?php }?>
											<?php if($pagenum =="4"){?><li>Themes</li><?php }else{?><li><a href="?p=4">Themes</a></li><?php }?>
											<?php if($pagenum =="5"){?><li>Databases</li><?php }else{?><li><a href="?p=5">Databases</a></li><?php }?>
											<?php if($pagenum =="6"){?><li>Servers</li><?php }else{?><li><a href="?p=6">Servers</a></li><?php }?>
											<?php if($pagenum =="7"){?><li>Links</li><?php }else{?><li><a href="?p=7">Links</a></li><?php }?>
											<?php if($pagenum =="8" && $installExists == "true"){?><li>DELETE INSTALL</li><?php }else{?><li><a href="?p=8">DELETE INSTALL</a></li><?php }?>
											<?php if($pagenum =="9"){?><li>Panels</li><?php }else{?><li><a href="?p=9">Panels</a></li><?php }?>
											<?php if($pagenum =="10"){?><li>Password hashes</li><?php }else{?><li><a href="?p=10">Password hashes</a></li><?php }?>
										</ul> 
									</div>
								</div>
						</div>
			</div>
				<?php include $path.'asset/includes/footer.php';?>
			</div>
		</div>	
		<?php include $path.'asset/includes/scripts.php';?>
	</body>
</html>