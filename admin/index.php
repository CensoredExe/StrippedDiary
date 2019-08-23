<?php
session_start();

    if(!isset($_SESSION['user_id'])){
        echo "<script>window.location = '../login.php'</script>";
    }

    if($_SESSION['user_role'] != 'admin'){
        echo "<script>window.location = '../index.php'</script>";
    }
    include_once "../includes/include.php";
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
            <a class="nav-item btn" href="../me/feedback.php">Feedback</a>

            <a class="nav-item btn" href="../me/settings.php">Settings</a>

            <a class="nav-item btn" href="../me/logout.php" >Logout</a>

            </div>
        </div>
    </header>
    <section style="margin-top: 30px;">
        <div class="row">
            <h1 class="sub-heading" style="font-size:45px;">ADMIN Dashboard</h1>
            <p>Welcome back, <?php echo $_SESSION['user_name']; ?></p>
            
        </div>
        <div class="row">
        <br><br>
        <?php
        $sql = "SELECT * FROM `users`";
        $result = mysqli_query($conn, $sql);
        $num_users = mysqli_num_rows($result);
        $sql = "SELECT * FROM `posts`";
        $result = mysqli_query($conn, $sql);
        $num_al_posts = mysqli_num_rows($result);
        $sql = "SELECT * FROM `deleted`";
        $result = mysqli_query($conn, $sql);
        $num_dl_posts = mysqli_num_rows($result);
        $total = $num_al_posts + $num_dl_posts;

        $avg_posts = $total / $num_users;
        $avg_alive = $num_al_posts / $num_users;

    ?>
    <hr>
    <p>Number of users: <?php echo $num_users; ?></p>
    <p>Number of alive posts: <?php echo $num_al_posts; ?></p>
    <p>Number of deleted posts: <?php echo $num_dl_posts;  ?></p>

    <p>Exact average each user posts : <?php echo $avg_posts; ?></p>
    <p>Average of alive posts per user <?php echo $avg_alive; ?></p>
    <hr>

        </div>
    </section>
    
    </body>
</html>