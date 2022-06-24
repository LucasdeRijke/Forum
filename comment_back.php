<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./style.css">
	<meta name="author" content="Lucas de Rijke">
    <meta name="description" content="Welcome to this new forum, here you can post all your questions">
</head>
<body>
<?php
	include "./include/conn.php";

	session_start();
	$user = $_SESSION["user"];
	$thread = $_SESSION["thread"];
	$post = $_GET["comment"];
	$date = date("Y-m-d H:i");
	$status = "commenter";

	if ($post == ""){
		// if post is empty back to comment.php
		echo "<script>alert('Comment is empty')</script>
			<script>window.location='./comment.php'</script>";
	} else {
		// add comment
		$sql = "INSERT INTO post VALUES ('', ?, ?, ?, ?, ?)";
		$query = $conn->prepare($sql);
		$query->execute(array($thread, $post, $user, $date, $status ));
		echo "<script>alert('Comment made')</script>
			<script>window.location = './index.php'</script>";
	}
?>
</body>
</html>