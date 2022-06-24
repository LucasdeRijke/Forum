<!DOCTYPE html>
<html lang="nl">
<head>
</head>
<body>
<?php
	include "./include/conn.php";

	$thread = $_GET["thread"];
	$post = $_GET["post"];
	$date = date("Y-m-d H:i");
	$status = "creator";

	if ($thread == "" || $post == ""){
		// if post is empty back to post.php
		echo "<script>alert('Title or post are empty')</script>
			<script>window.location='post.php'</script>";
	}else{
		$sql = "SELECT * FROM post WHERE thread = ? AND status = ?";
		$query = $conn->prepare($sql);
		$query->execute(array($thread, "creator"));

		$data = $query->fetch();

		if($data){
			echo "<script>alert('Title already exist')</script>
				<script>window.location = './post.php'</script>";
		} else {
			session_start();
			$user = $_SESSION["user"];
			// Thread toegevoegd
			$sql = "INSERT INTO post VALUES ('', ?, ?, ?, ?, ?)";
			$query = $conn->prepare($sql);
			$query->execute(array($thread, $post, $user, $date, $status ));
			echo "<script>alert('Thread made')</script>
				<script>window.location = './index.php'</script>";
		}
	}
	?>
</body>
</html>

