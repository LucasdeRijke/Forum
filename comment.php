<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./style.css">
	<title>Comment</title>
	<meta name="author" content="Lucas de Rijke">
    <meta name="description" content="Welcome to this new forum, here you can post all your questions">
</head>
<body>
<?php
	include "./include/nav.php";
	
	//session_start();
	//echo $_SESSION['thread'];

	session_start();  
 	if(isset($_SESSION['user'])){
 	// comment form
 	?>
 	<div class='post'>
	<form action='comment_back.php' methode='GET' onkeydown="return event.key != 'Enter';">
		<section>
			<label>Comment</label></br>
				<input class="textbox1" type='text' name='comment' placeholder='Type here'>
		</section>

		<button>Submit</button>
	</form>
	</div><?php
	} else {
		// if not logged in send to login.php
		?>
      	<script>alert('You need to be logged in')</script>
			<script>window.location = './login.php'</script>";
	<?php }
?>
</body>
</html>

