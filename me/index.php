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
    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet"> 
    <title>StrippedDiary, create an account and begin writing</title>
    <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
    <header>
        <div class="row">
            <p class="logo">StrippedDiary.me</p>
            <a style="float:right;margin-top:30px;" href="logout.php" class="btn" >Logout</a>
            <a style="float:right;margin-top:30px; margin-right:20px;" href="settings.php" class="btn" >Settings</a>
        </div>
    </header>
    <section style="margin-top: 30px;">
        <div class="row">
            <h1>Dashboard</h1>
            <p>Welcome back, <?php echo $_SESSION['user_name']; ?></p>
            <p>Your bio: <?php echo $_SESSION['user_bio']; ?></p>
        </div>
    </section>
    </body>
</html>