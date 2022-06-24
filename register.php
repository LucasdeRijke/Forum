<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<title>Registreren</title>
	<meta name="author" content="Lucas de Rijke">
    <meta name="description" content="Welcome to this new forum, here you can post all your questions">
</head>
<body>
	<?php include "./include/nav.php"; ?>
	<form action="register_query.php" method="POST">
		<div class="login-box">
		<h1>Register</h1>

		<div class="textbox">
			<input type="text" name="username" placeholder="Username" />
		</div>
		<div class="textbox">
			<input type="password" name="password" placeholder="Password" />
		</div>
		<div>
			<button name="register" class="btn" id="reg_btn">Register</button>
		</div>
		<a href="./login.php" class="btn">Login</a>
	</form>
</body>
</html>