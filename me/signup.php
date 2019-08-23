<?php
    session_start();
    include_once "../includes/include.php";
    if(isset($_SESSION['user_id'])){
        echo "<script>window.location = 'index.php'</script>";
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
        <div class="form-hold">
            <h1>Make an account</h1>
            <form method="POST" action="test.php">
            <label for="user_name">Your name</label><br>
            <input id="user_name" name="user_name" type="text" class="form-input" placeholder="Your prefered name" required autofocus><br>
            <label for="user_email">Your email</label><br>
            <input id="user_email" name="user_email" type="email" class="form-input" placeholder="Your prefered email" required ><br>
            <label for="user_password">Your password</label><br>
            <input id="user_password" name="user_password" type="password" class="form-input" placeholder="********" required ><br>
            <label for="user_password_conf">Confirm your password</label><br>
            <input id="user_password_conf" name="user_password_conf" type="password" class="form-input" placeholder="********" required ><br>
            <button class="form-submit" name="submit">Signup</button>
            </form>
            
            <a class="btn" href="login.php">Already have an account?</a><br>
            <a class="btn" href="../index.php">Go back</a>
        </div>
        <footer>
            <p>&copy; StrippedDiary.me</p>
            <p>An <a class="btn" href="https://github.com/censoredexe/StrippedDiary">open-source</a> project</p>
        </footer>
    </header>
    </body>
</html>