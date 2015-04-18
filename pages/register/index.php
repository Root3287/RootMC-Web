<?php 
	define('path', '../../');
require path.'php/init.php';
?>
<html>
	<head>
		<title><?php echo $CONFIG['SERVERNAME']." &bull; Register"?></title>
		<?php include path.'asset/includes/css.php';?>
	</head>
	<body>
		<!-- TODO: NAV -->
		<div class="container">
			<div class="row">
			<?php 
			$FNAME = $_POST['FirstName'];
			$LNAME = $_POST['LastName'];
			$UNAME = $_POST['UName'];
			$EMAIL = $_POST['EMAIL'];
			$CEMAIL = $_POST['CEmail'];
			$MCUSER = $_POST['MCUSER'];
			$PASS = $_POST['Password'];
			$CPASS = $_POST['CPass'];
			
			$hash = hash('sha256',$PASS);
			//TODO: Make a if(Cpass == Pass)
			//TOTO: ReDO if State ments
			/*
			 * but, if the user doesn't enter an email and a password, for example
				[6:30:23 AM] Sam: it'll only display the error for the email
			 */
			if(($FNAME !="") && ($LNAME !="") && ($UNAME !="") && ($EMAIL !="") && ($CEMAIL !="") && ($MCUSER !="") && ($PASS !="") && ($CPASS !=""))
			{
				if($PASS==$CPASS){
					addUser($FNAME, $LNAME, $UNAME,$EMAIL, $MCUSER, $PASS);
				}
			}else if(($FNAME == "")){
				echo "<div class='alert alert-danger'>You must enter a <strong>first</strong> name!</div>";
			}else if($LNAME == ""){
				echo "<div class='alert alert-danger'>You must enter a <strong>last</strong> name!</div>";
			}else if($UNAME == ""){
				echo "<div class='alert alert-danger'>You must enter a <strong>username</strong>!</div>";
			}else if($EMAIL == ""){
				echo "<div class='alert alert-danger'>You must enter a <strong>Email</strong>!</div>";
			}else if($CMAIL == ""){
				echo "<div class='alert alert-danger'>You must confirm your <strong>Email</strong>!</div>";
			}else if($MCUSER == ""){
				echo "<div class='alert alert-danger'>You must hava a <strong>Paied Minecraft User Account</strong>!</div>";
			}else if($PASS == ""){
				echo "<div class='alert alert-danger'>You must enter a <strong>Password</strong>!</div>";
			}else if($CPASS == ""){
				echo "<div class='alert alert-danger'>You must confirm your <strong>Password</strong>!</div>";
			}
			?>
			<form action="" method="post">
					<div class="form-group">
						<input type="text" name="FirstName" id="FirstName "placeholder="FirstName"/>
					</div>
					<div class="form-group">
						<input type="text" name="LastName" id="LastName" placeholder="LastName"/>
					</div>
					<div class="form-group">
						<input type="text" name="UName" id="UName" placeholder="User Name"/>
					</div>
					<div class="form-group">
						<input type="text" name="EMAIL" id="EMAIL" placeholder="Email">
					</div>
					<div class="form-group">
						<input type="text" name="CEmail" id="CEmail" placeholder="ConfirmEmail"/>
					</div>
					<div class="form-group">
						<input type="text" name="MCUSER" id="MCUSER" placeholder="MINECRAFT USER"/>
					</div>
					<div class="row">
						<div class="form-group">
							<input type="text" name="Password" id="Password" placeholder="Password"/>
						</div>
						<div class="form-group">
							<input type="text" name="CPass" id="CPass" placeholder="CONFIRM PASSWORD"/>
						</div>
					</div>
					<input type="submit" value="Submit"/>
				</form>
			</div>
		</div>
		<?php include path.'asset/includes/scripts.php';?>
	</body>
</html>
