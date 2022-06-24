<!DOCTYPE html>
<html lang="nl">
<head>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<title>Login</title>
	<meta name="author" content="Lucas de Rijke">
    <meta name="description" content="Welcome to this new forum, here you can post all your questions">
</head>
<body>
<?php include "./include/nav.php"; ?>
<form action="login_query.php" method="POST">
	<div class="login-box">
		<h1>Login</h1>

		<div class="textbox">
			<input type="text" name="username" placeholder="Username" />
		</div>
		
		<div  class="textbox">
			<input type="password" name="password" placeholder="Password" />
		</div>

		<button class="btn" name="login" id="reg_btn">Login</button>

		<a href="register.php" class="btn">Registreren</a>
		</div>
	</form>
</body>
</html>