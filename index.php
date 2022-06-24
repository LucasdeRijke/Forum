<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="./style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Home</title>
    <meta name="author" content="Lucas de Rijke">
    <meta name="description" content="Welcome to this new forum, here you can post all your questions">

    <?php include "./include/conn.php";?>
</head>
<body>
    <!-- navbar -->
    <div class="topnav">
        <a class="active" href="./index.php">Home</a>
        <a href="./post.php">Add Post</a>
        <a href="./login.php">Login</a>
        <a href="./logout.php">Logout</a>
        <div class="search-container">
            <form action="./search.php" methode="GET">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <!-------------------------------------------------------->
    <?php

        //Leaderbord
        $sql = "SELECT username, count(*) AS total_post FROM post GROUP BY username ORDER BY count(*) DESC LIMIT 10";
        $query = $conn->prepare($sql);
        $query->execute(array()); ?>  
        
        <div class='padding'>
        <div class='leaderboard'>
        <p>ScoreBoard</p>
        <?php foreach ($query as $test){ 
            if (strlen($test["username"]) >= 10) {
                $test["username"] = substr($test["username"], 0, 12). ".. ";} ?>
            <div> 
                    <a><?php echo $test["username"];?>:</a>
                    <a><?php echo $test["total_post"];?></a>
                </br>
            </div>
        <?php } ?>
        </div><?php
    //-----------------------------------------------------
    // search 10 posts
    $sql = "SELECT thread, post, date, username FROM post WHERE status = ? ORDER BY id DESC LIMIT 0,10";
        $query = $conn->prepare($sql);
        $query->execute(array("creator"));    

        $data = $query->fetchALL();
        
        foreach ($data as $test) {

            $thread = $test["thread"];

            if (strlen($test["username"]) >= 10) {
                $test["username"] = substr($test["username"], 0, 12). ".. ";} 
            if (strlen($thread) >= 30) {
                $thread = substr($thread, 0, 32). ".. ";} 
 
                ?>

            <!-- Print 10 posts -->
            <form action="./search.php" methode="GET">
                <input type="hidden" value="<?php echo $test['thread'];?>" name="search">
                <input class="postbtn" type="submit" value="Go to">
            </form>
            <div class="home">
                <a class="post-title"><?php echo $thread;?> </a>
                <a class="post-user"><?php echo $test["username"];?> </a>
                <a class="post-date"><?php echo $test["date"];?></a>
            </br></div><?php
            }?>
</body>
</html>