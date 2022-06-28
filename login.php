<?php 
include './include/nav.php'; 
include './include/conn.php';
include 'include/user.php';
include 'include/validator.php';

if(isset($_POST['submit'])){
$login = new Validator($_POST);
$errors = $login->validateLoginForm();
	if(empty($errors)){
		$user = new User();
		$user->login($_POST, $conn);
		
		if($user == true){
			echo '<script>alert("Logged in")</script>';
    		echo "<script> location.replace('index.php'); </script>";
		} 
	}
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<title>Login</title>
	<meta name="author" content="Lucas de Rijke">
    <meta name="description" content="Welcome to this new forum, here you can post all your questions">
</head>
<body>
<form action="login.php" method="POST">
	<div class="login-box">
		<h1>Login</h1>

		<div class="textbox">
			<input type="text" name="username" placeholder="Username" />
		</div>
		<div class='error'>
			<?php echo $errors['username'] ?? '' ?>
		</div>
		<div  class="textbox">
			<input type="password" name="password" placeholder="Password" />
		</div>
		<div class='error'>
			<?php echo $errors['password'] ?? '' ?>
		</div>
		<input type="submit" name="submit" value='Login' class="btn" id="reg_btn">

		<a href="register.php" class="btn">Registreren</a>
		</div>
	</form>
</body>
</html> 