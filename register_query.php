<?php
	// connectie met de database leggen
	include "./include/conn.php";

	// gegevens ophalen uit register.php
	$username = $_POST["username"];
	$password = $_POST["password"];

	// username lengte meten
	$len_usename = strlen($username);

	if ($len_usename > 3 && $len_usename < 50){

		// kijken of gebruiker al bestaat
		$sql = "SELECT * FROM user WHERE username = ?";
		$query = $conn->prepare($sql);
		$query->execute(array($username));	

		$data = $query->fetch();

		if ($data) {
			// gebruiker bestaat al
			echo "<script>alert('Gebruikersnaam bestaat al')</script>
				  <script>window.location = 'register.php'</script>";

		} else {
			// account toevoegen aan databse
			$sql = "INSERT INTO user VALUES ('', ?, ?)";
			$query = $conn->prepare($sql);
			$query->execute(array($username, $password));
			echo "<script>alert('Accout aangemaakt')</script>
				  <script>window.location = 'login.php'</script>";
		}
		
	} else {
		// usename te kort
		echo "<script>alert('Gebruikersnaam te kort')</script>
			  <script>window.location = 'register.php'</script>";
	}

?>