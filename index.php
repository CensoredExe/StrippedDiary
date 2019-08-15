<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet"> 
    <title>StrippedDiary - The visually stripped diary.</title>
    <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <header>
        <div class="txt-box">
            <h1 class="heading">STRIPPED DIARY</h1>
            <p class="sub-heading">A visually stripped diary</p>
            <p>An easy to use diary thats completely anonymous and private.<br>Ideal for writing about your progress, keeping notes or just as a diary.</p>
            <?php
            session_start();
            if(isset($_SESSION['user_id'])){
                ?>
                <a href="me/index.php" class="main-btn">DASHBOARD</a>
                <?php
            }else {
                ?>
                <a href="me/login.php" class="main-btn">LOGIN</a><a class="main-btn" href="me/signup.php">SIGNUP</a>
                <?php
            }
            ?>
            <br>
            <?php
            include_once "includes/include.php";
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            $num_users = mysqli_num_rows($result);
            $sql = "SELECT * FROM posts";
            $result = mysqli_query($conn, $sql);
            $num_posts = mysqli_num_rows($result);
            $sql = "SELECT * FROM deleted";
            $result = mysqli_query($conn, $sql);
            $deleted_posts = mysqli_num_rows($result);
            $total = $num_posts + $deleted_posts;
            $avg = ceil($total / $num_users);
            ?><br>
            <p><?php echo $num_users; ?> users | <?php echo $total; ?> posts</p>
            <p>On average, each user posts <?php echo $avg; ?> times</p>
            
        </div>
        <footer>
            <p>&copy; StrippedDiary.me</p>
            <p>An <a class="btn" href="https://github.com/censoredexe/StrippedDiary">open-source</a> project</p>
        </footer>
    </header>
    </body>
</html>