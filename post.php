<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./style.css">
	<title>Add Post</title>
	<meta name="author" content="Lucas de Rijke">
    <meta name="description" content="Welcome to this new forum, here you can post all your questions">
</head>
<body>
<?php
	include "./include/nav.php";
	// Check if logged in
	session_start();  
 	if(isset($_SESSION['user'])){
 	// post form
 	?>
 	<div class="post">
    <form action='post_back.php' method='GET' onkeydown="return event.key != 'Enter';">
		<section>
			<label>Title</label></br>
				<input class='textbox1' type='text' name='thread' placeholder='Be specific'>
		</section>
		<section>
			<label>Post</label></br>
				<input class='textbox1' type='text' name='post' placeholder='Type here'>
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