<?php 
define('path', '../../');
$page = "Register";
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
							"FirstName" => array(
									'required' => true,
									'min' => '2',
									'max' => '20',
							),
							"LastName" => array(
									'required' => true,
									'min' => '2',
									'max' => '20',
							),
							"UName" => array(
									'required' => true,
									'min' => '2',
									'max' => '20',
									'unique' => 'users'
							),
							"EMAIL" => array(
									'required' => true,
									'min' => '2',
									'max' => '20',
							),
							"CEmail" => array(
									'required' => true,
									'matches' => 'EMAIL'
							),
							"MCUSER" => array(
									'required' => true,
									'max' => '16',
							),
							"Password" => array(
									'required' => true,
									'min' => '8',
									'max' => '50',
							),
							"CPass" => array(
									'required' => true,
									'matches' => 'Password',
							),
					));
					if($validation->pass()){
							
						$salt = Hash::salt(32);
						try{
							//TODO: Fix database name
							$user->create(array(
									'First_name' => Input::get('FirstName'),
									'Last_Name' => Input::get('LastName'),
									'UserName' => Input::get('UName'),
									'Email' => Input::get('Email'),
									'Salt' => $salt,
									'MCUser' => Input::get('MCUser'),
									'Password' => Input::get('Password'),
									'Joined' => data('M-D-Y H:i:s'),
									'Rank' => "1"
							));
						}catch (Exception $e){
							$e->getMessage();
						}
							
						Session::flash('home', 'You have registered Successfully!');
						Redirect::to(path.'index.php');
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
			<form action="index.php" method="post">
					<div class="form-group">
						<input class="form-control" type="text" name="FirstName" id="FirstName" placeholder="FirstName" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('FirstName'));}?>" />
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="LastName" id="LastName" placeholder="LastName" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('LastName'));}?>" />
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="UName" id="UName" placeholder="User Name" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('UName'));}?>" />
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="EMAIL" id="EMAIL" placeholder="Email" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('EMAIL'));}?>" >
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="CEmail" id="CEmail" placeholder="ConfirmEmail" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('CEmail'));}?>" />
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="MCUSER" id="MCUSER" placeholder="MINECRAFT USER" autocomplete="off" value="<?php if(Input::exists()){echo escape(Input::get('MCUSER'));}?>" />
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
