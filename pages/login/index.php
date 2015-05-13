<?php 
define('path', '../../');
$page = "Login";
require path.'php/init.php';
$user = new user();
if($user->isLoggedIn()){
	Session::flash('Home', 'Your already logged in silly');
	Redirect::to(path.'index.php');
}
?>
<html>
	<head>
		<title><?php echo $CONFIG['SERVERNAME']." &bull; Register"?></title>
		<?php include path.'asset/includes/css.php';?>
	</head>
	<body>
		<?php include path.'asset/includes/nav.php';?>
		<div class="container">
			<div class="row">
			<!-- SOME SORT OF ALERT -->
			<?php 
			if(Input::exists()){
				if(Token::check(Input::get('token'))){
					$validate = new Validate();
					$validation = $validate->check($_POST, array(
							'UName' => array(
								'required' => true,
								'unique' => 'users',		
							),
							'Password' => array(
								'required' => true,
								'min' => '8'		
							),
					));
					if($validation->pass()){
						//TODO: Login USER
						echo 'The login is still in beta';
						// $user->login(Input::get('Uname', Input::get('Password'), Input::get('Remember')))
						//Session::flash('home', 'You have registered Successfully!');
						//Redirect::to(path.'index.php');
					}else{
						echo '<div class="alert alert-danger">';
						foreach ($validation->errors() as $error){
							echo $error.'<br/>';
						}
						echo '</div>';
					}
				}
			}
			?>
			</div>
			<!-- SOME SORT OF ENDING ALERT -->
			<form action="" method="post">
					<div class="form-group">
						<input class="form-control" type="text" name="UName" id="UName" placeholder="User Name" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('UName'));}?>" />
					</div>
					<div class="form-group">
						<input class="form-control" type="password" name="Password" id="Password" placeholder="Password" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('Password'));}?>" />
					</div>
					<input type="hidden" name="token" value="<?php echo Token::generate();?>" />
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Register"/>
					</div>
				</form>
			</div>
		<?php include path.'asset/includes/scripts.php';?>
	</body>
</html>
