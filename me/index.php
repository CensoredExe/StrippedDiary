<?php
    session_start();
    include_once "../includes/include.php";
    if(!isset($_SESSION['user_id'])){
        echo "<script>window.location = '../index.php'</script>";
        exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet"> 
    <title>StrippedDiary, create an account and begin writing</title>
    <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
    <header>
        <div class="row">
            <p class="logo"><a class="btn" href="../index.php">StrippedDiary.me</a></p>
            <div class="item-hold">
            <a class="nav-item btn" href="settings.php">Settings</a>

            <a class="nav-item btn" href="logout.php" >Logout</a>

            </div>
        </div>
    </header>
    <section style="margin-top: 30px;">
        <div class="row">
            <h1 class="sub-heading" style="font-size:45px;">Dashboard</h1>
            <p>Welcome back, <?php echo $_SESSION['user_name']; ?></p>
            <p>Your bio: <?php echo $_SESSION['user_bio']; ?></p>
            <br><a href="addpost.php" class="btn">Write a post</a>
        </div>
        <div class="row">

        <?php

        $user_id = $_SESSION['user_id'];

        $sqlpg = "SELECT * FROM posts WHERE post_author='$user_id'";
        $resultpg = mysqli_query($conn, $sqlpg);
        $totalposts = mysqli_num_rows($resultpg);
        $totalpages = ceil($totalposts/9);

        if(isset($_GET['p'])){
            $pageid = $_GET['p'];
            $start = ($pageid*9)-9;
            $sql = "SELECT * FROM posts WHERE post_author='$user_id' ORDER BY post_id DESC LIMIT $start,9";
        }else{
            $sql = "SELECT * FROM posts WHERE post_author='$user_id' ORDER BY post_id DESC LIMIT 0,9";
        }

        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $post_title = $row['post_title'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
            $post_id = $row['post_id'];


            ?>
            <div class="post-hold">
            <h2 class="post-title"><?php echo $post_title; ?></h2>
            <p><?php echo $post_date; ?></p>
            <hr>
            <p class="post-content"><?php echo substr($post_content,0, 300);if(strlen($post_content) > 300){echo"...";} ?></p>
            <a href="post.php?id=<?php echo $post_id; ?>">Read more</a>
            </div>
            <?php
        }
        ?>

            <!-- <div class="post-hold">
            <h2 class="post-title">Post title, something to say here</h2>
            <p>15/08/2019 02:56:28</p>
            <hr>
            <p class="post-content">The very first post. I know, its amazing. A simple website with text input and storing data, how complex. I plan on using this purely for keeping track of my progress with programming etc. I feel it will hold me accountable - if I actually use it that is.</p>
            </div> -->

            <?php 
				echo "<center>";
				for($i=1;$i<=$totalpages;$i++){
					?>
					<a class="btn" href="?p=<?php echo $i; ?>"><?php echo $i; ?></a>&nbsp;
					<?php
				}
				echo "</center>";
			?>
        </div>
    </section>
    <footer>
            <p>&copy; StrippedDiary.me</p>
            <p>An <a class="btn" href="https://github.com/censoredexe/StrippedDiary">open-source</a> project</p>
        </footer>
    </body>
</html>