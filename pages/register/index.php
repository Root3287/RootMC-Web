<?php 
define('path', '../../');
$page = "Register";
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
			'FirstName' => array(
					'required' => true,
					'min' => '2'
			),
			'LastName' => array(
					'required' => true,
					'min' => '2'
			),
			'UserName' => array(
					'required' => true,
					'min'=> '2',
					'max'=>'16',
					'unique' => 'users'
			),
			'Email' => array(
					'required' => true,
			),
			'CEmail' => array(
					'required' => true,
					'matches' => 'Email'
			),
			'MCUser' => array(
					'required' => true,
					'max' => '16',
					'unique' => 'users'
			),
			'Password' => array(
					'required' => true,
					'min' => '6'
			),
			'CPass' => array(
					'required' => true,
					'matches' => 'Password',
			),
	));
		if($validation->passed()){
			try{
				$salt = Hash::salt(32);
				$user->create(array(
					'First_Name' => Input::get('FirstName'),
					'Last_Name' => Input::get('LastName'),
					'UserName' => Input::get('UserName'),
					'Email' => Input::get('Email'),
					'MCUser' => Input::get('MCUser'),
					'Salt' => $salt,
					'Password' => Hash::make(Input::get('Password'), $salt),
					'Rank' => 1,
					'Joined' => date("d-m-y H:i:s")
				));
				
				Session::flash('home', 'You have completely registered!');
				Redirect::to(path.'index.php');
			}catch (Exception $e){
				die( $e->getMessage());
			}
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
						<input class="form-control" type="text" name="FirstName" id="FirstName" placeholder="First Name" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('FirstName'));}?>" />
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="LastName" id="LastName" placeholder="LastName" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('LastName'));}?>" />
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="UserName" id="UName" placeholder="User Name" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('UName'));}?>" />
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="Email" id="Email" placeholder="Email" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('EMAIL'));}?>" >
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="CEmail" id="CEmail" placeholder="Confirm Email" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('CEmail'));}?>" />
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="MCUser" id="MCUser" placeholder="MINECRAFT USER" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('MCUSER'));}?>" />
					</div>
					<div class="row">
						<div class="form-group">
							<input class="form-control" type="password" name="Password" id="Password" placeholder="Password" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('Password'));}?>" />
						</div>
						<div class="form-group">
							<input class="form-control" type="password" name="CPass" id="CPass" placeholder="CONFIRM PASSWORD" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('CPass'));}?>" />
						</div>
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
