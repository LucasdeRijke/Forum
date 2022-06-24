<!DOCTYPE html>
<html lang="nl">
	<meta name="author" content="Lucas de Rijke">
    <meta name="description" content="Welcome to this new forum, here you can post all your questions">
	<head>
	</head>
	<style>
		body{
			background-color: black;
		}
	</style>
	<body>
		<?php
			//Database connectie
			include "./include/conn.php";

			$username = $_POST['username'];
			$password = $_POST['password'];

			//Checken of username en password ingevuld zijn
			if($username == "" || $password == ""){
				echo "username en password zijn niet ingevuld";
			} else {
				// Username en password zijn ingevuld
				$sql = "SELECT * FROM user WHERE username = ? AND password = ?";
				$query = $conn->prepare($sql);
				$query->execute(array($username, $password));
				// echo $query->debugDumpParams();

				// Haal 1 rij data op
				$data = $query->fetch();

				if ($data) {
					// Als het gevonden is
					//echo "Login succesfull";
					session_start();
					$_SESSION["user"] = $data["username"];
					// Naar homepage
					echo "
						<script>alert('Login succesfull')</script>
						<script>window.location = './index.php'</script>
						";
					// header("refresh: 5; index.php");
				} else {
					// Als het niet gevonden is
					//echo "Login failed";
					// Naar loginpage
					echo "
						<script>alert('Login failed')</script>
						<script>window.location = './login.php'</script>
						";
				}
			}

		?>
	</body>
</html>