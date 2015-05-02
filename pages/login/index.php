<?php 
$page = "Login";
define('path', '../../');
require path.'php/init.php';
$user = new User;
if(Input::exists()){
	if(Token::check(Input::get('token'))){
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
				'USER'=> array(
					'required' => true,
				),
				'PASS' => array(
					'required' => true,
				),
		));
		
		if($validation->pass()){
			$remember = (Input::get('remember') === 'on') ? true : false;
			$login = $user->login(Input::get('USER'), input::get('PASS'), $remember);
			if($login){
				Session::flash('home', 'Logged in');
				Redirect::to(path.'index.php');
			}
		}
	}
}
?>
<html>
	<head>
		<title><?php echo $CONFIG['SERVERNAME']." &bull; LOGIN";?></title>
		<?php include path.'asset/includes/css.php';?>
	</head>
	<body>
		<div class="container">
			<?php if(!$validation->pass()){?>
			<div class="alert alert-danger">
			<?php foreach ($validation->errors() as $error){echo $error.'<br/>';}?>
			</div>
			<?php }?>
			<div class="row">
				<form action="" method="post">
					<div class="form-group">
						<input type="text" id="USER" name="USER" placeholder="Username" autocomplete="off">
					</div>
					<div class="form-group">
						<input type="text" id="PASS" name="PASS" placeholder="Password" autocomplete="off"/>
					</div>
					<div class="form-group">
						<input type="checkbox" id="Remember" name="Remeber"/> Remember Me!
					</div>
					<input type="hidden" value="<?php echo token::generate();?>" />
					<div class="row">
						<input type="submit" value="Submit"/>
					</div>
				</form>
			</div>
		</div>
		<?php include path.'asset/includes/scripts.php';?>
	</body>
</html>