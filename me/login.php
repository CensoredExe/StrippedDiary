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
            <h1>Login to your account</h1>
            <form method="POST">
            
            <label for="user_email">Your email</label><br>
            <input id="user_email" name="user_email" type="email" class="form-input" placeholder="Your prefered email" required ><br>
            <label for="user_password">Your password</label><br>
            <input id="user_password" name="user_password" type="password" class="form-input" placeholder="********" required ><br>
            <button class="form-submit" name="submit">Login</button>
            </form>
            
            <a class="btn" href="signup.php">Dont have an account?</a><br>
            <a class="btn" href="../index.php">Go back</a>
            <?php
            
            if(isset($_POST['submit'])){
                $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
                $user_password = $_POST['user_password'];
                if(empty($user_email) || empty($user_password)){
                    echo "<br>Empty fields, please fix.";
                    exit();
                }
                if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
                    echo "<br>Error, incorrect email";
                    
                }else {
                    $sql = "SELECT * FROM users WHERE user_email = '$user_email'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) == 1){
                        while($row = mysqli_fetch_assoc($result)){
                            if(password_verify($user_password, $row['user_password'])){
                                $_SESSION['user_id'] = $row['user_id'];
                                $_SESSION['user_name'] = $row['user_name'];
                                $_SESSION['user_email'] = $row['user_email'];
                                $_SESSION['user_bio'] = $row['user_bio'];
                                echo "<script>window.location = 'index.php'</script>";
                            }else {
                                echo "<br>Wrong password";
                                
                            }
                        }
                    }else {
                        echo "<br>Account doesnt exist";
                        
                    }
                }


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