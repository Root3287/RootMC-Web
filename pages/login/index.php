<?php 
define('path', '../../');
$page = "Login";
require path.'php/init.php';
$user = new user();
if($user->isLoggedIn()){
	Session::flash('Home', 'Your already logged in silly');
	Redirect::to(path.'index.php');
}
if(Input::exists()){
	if(Token::check(Input::get('token'))){
	$validate = new Validate();
	$validation = $validate->check($_POST, array(
			'UserName' => array(
					'required' => true,
			),
			'Password' => array(
					'required' => true,
			),
	));
		if($validation->passed()){
			$remember = (Input::get('Remember') === 'on') ? true : false;
			$user->login(escape(Input::get('Username')), escape(Input::get('Password')), $remember);
			Session::flash('home', 'You have completely registered!');
			Redirect::to(path.'index.php');
		}else{
			echo '<div class="alert alert-danger">';
			foreach ($validation->errors() as $errors){
				echo $errors.'<br/>';
			}
			echo '</div>';
		}
	}
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
			<?php
			?>
			<!-- SOME SORT OF ALERT -->
			</div>
			<!-- SOME SORT OF ENDING ALERT -->
			<form action="" method="post">
					<div class="form-group">
						<input class="form-control" type="text" name="UserName" id="UName" placeholder="User Name" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('UName'));}?>" />
					</div>
					<div class="form-group">
						<input class="form-control" type="password" name="Password" id="Password" placeholder="Password" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('Password'));}?>" />
					</div>
					<input type="hidden" name="token" value="<?php echo Token::generate();?>" />
					<div class="form-group">
						<label><input name="Remember" type="checkbox" value="Remember Me"/><p class="white">Remember</p></label>
						<input class="btn btn-primary" type="submit" value="Login"/>
					</div>
				</form>
			</div>
		<?php include path.'asset/includes/scripts.php';?>
	</body>
</html>