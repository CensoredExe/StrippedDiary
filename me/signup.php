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
    <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet"> 
    <title>StrippedDiary, create an account and begin writing</title>
    <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
    <header>
        <div class="form-hold">
            <h1>Make an account</h1>
            <form method="POST">
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
            <?php
            if(isset($_POST['submit'])){
                $user_name = strip_tags(mysqli_real_escape_string($conn, $_POST['user_name']));
                $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
                $user_password = $_POST['user_password'];
                $user_password_conf = $_POST['user_password_conf'];

                if(empty($user_name) || empty($user_email) || empty($user_password) || empty($user_password_conf)){
                    echo "<br>Empty fields, please fix.";
                    exit();
                }
                if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
                    echo "<br>Incorrect email";
                    exit();
                }
                if($user_password == $user_password_conf){
                    $hash = password_hash($user_password, PASSWORD_DEFAULT);
                    $sql = "SELECT * FROM users WHERE user_email = '$user_email'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) <= 0){
                        
                        $sql = "INSERT INTO users (`user_name`, `user_email`, `user_password`, `user_role`) VALUES ('$user_name', '$user_email', '$hash', 'user');";
                        if(mysqli_query($conn, $sql)){
                            echo "<script>window.location = 'login.php?message=Account created'</script>";
                            exit();
                        }else {
                            echo "DATABASE ERROR";
                        }
                    }else {
                        echo "<br>Account already exists.";
                    }
                }

            }
            ?>
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