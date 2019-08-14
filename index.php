<!DOCTYPE html>
<html>
    <head>
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
            
            
        </div>
        <footer>
            <p>&copy; StrippedDiary.me</p>
            <p>An <a class="btn" href="https://github.com/censoredexe/StrippedDiary">open-source</a> project</p>
        </footer>
    </header>
    </body>
</html>