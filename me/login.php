<!DOCTYPE html>
<html>
    <head>
    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet"> 
    <title>StrippedDiary, create an account and begin writing</title>
    <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
    <header>
        <div class="form-hold">
            <h1>Login to your account</h1>
            <form method="POST">
            
            <label for="user_email">Your email</label><br>
            <input id="user_email" name="user_email" type="email" class="form-input" placeholder="Your prefered email" required ><br>
            <label for="user_password">Your password</label><br>
            <input id="user_password" name="user_password" type="password" class="form-input" placeholder="********" required ><br>
            <button class="form-submit" name="submit">Signup</button>
            </form>
            <?php
            if(isset($_POST['submit'])){
                if(empty($user_email) || empty($user_password)){
                    echo "<br>Empty fields, please fix.";
                    exit();
                }
                
            }
            ?>
            <a class="btn" href="signup.php">Dont have an account?</a><br>
            <a class="btn" href="../index.php">Go back</a>
        </div>
        <footer>
            <p>&copy; StrippedDiary.me</p>
            <p>An <a class="btn" href="https://github.com/censoredexe/StrippedDiary">open-source</a> project</p>
        </footer>
    </header>
    </body>
</html>