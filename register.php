<?php 
// includes
include 'include/nav.php';
include 'include/conn.php';
include 'include/user.php';
include 'include/validator.php';

if(isset($_POST['submit'])){
	$register = new Validator($_POST);
	$errors = $register->validateRegisterForm();
	if(empty($errors)){
		$user = new User();
		$user->create($_POST, $conn);
		
		if($user == true){
			echo '<script>alert("Account is created")</script>';
    		echo "<script> location.replace('login.php'); </script>";
	} 
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./style.css">
	<meta name="author" content="Lucas de Rijke">
	<title>Register</title>
</head>
<body>
	<div>

		<!-- Register form to add a user -->
		<form action="register.php" method="post">
			<div class="login-box">
				<h1>Register</h1>
				<div class="textbox">
					<input type="text" name="username" placeholder="Username">
				</div>
				<div class='error'>
					<?php echo $errors['username'] ?? '' ?>
				</div>
				<div class="textbox">
					<input type="password" name="password" placeholder="Password">
				</div>
				<div class='error'>
					<?php echo $errors['password'] ?? '' ?>
				</div>
				<div>
					<input type="submit" name="submit" value='Register' class="btn" id="reg_btn">
				</div>
				<a href="./login.php" class="btn">Login</a>
			</div>
		</form>
	</div>
</body>
</html>