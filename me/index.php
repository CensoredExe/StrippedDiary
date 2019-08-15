<?php
    session_start();
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
    </section>
    <footer>
            <p>&copy; StrippedDiary.me</p>
            <p>An <a class="btn" href="https://github.com/censoredexe/StrippedDiary">open-source</a> project</p>
        </footer>
    </body>
</html>