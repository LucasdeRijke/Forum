<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./style.css">
	<title>Search: <?php echo $_GET["search"];?></title>
	<meta name="author" content="Lucas de Rijke">
    <meta name="description" content="Welcome to this new forum, here you can post all your questions">
</head>
<body>
<?php
	//navbar
	include "./include/nav.php";
	//database connection
	include "./include/conn.php";

	$search = $_GET["search"];

	if($search == ""){
		// if empty return to index
		echo "
			<script>alert('thread does not exist')</script>
			<script>window.location = './index.php'</script>
			";
	} else {
		//check if data exist
		$sql = "SELECT thread, post, date, username, status FROM post WHERE thread = ? ";
		$query = $conn->prepare($sql);
		$query->execute(array($search));	

		$data = $query->fetchALL();

		if($data){
			// print data if exist
			echo "<div class='padding'>";
			echo "<button class='postbtn' onclick='myFunction()'>Comment</button>";
			foreach ($data as $test) {?>
				<div class="search">
					<a class="post-data"><?php echo $test["post"];?></a>
					<a class="post-user"><?php echo $test["username"];?></a>
					<a class="post-status"><?php echo $test["status"];?></a>
					<a class="post-date"><?php echo $test["date"];?></a>
				</br></div><?php
			}
			session_start();
			$_SESSION['thread'] = $test['thread'];
		} else {
			// if data does not exist return to index
			echo "
			<script>alert('thread does not exist')</script>
			<script>window.location = './index.php'</script>
			";
		}

	}
	?>
<script>
	// if comment btn is pressed save thread name and send to comment.php
	function myFunction() {
		location.replace("./comment.php")
	}
</script>
</body>
</html>