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
            <p class="logo"><a class="btn" href="index.php">StrippedDiary.me</a></p>
            <div class="item-hold">
            <a class="nav-item btn" href="settings.php">Settings</a>

            <a class="nav-item btn" href="logout.php" >Logout</a>

            </div>

        </div>
    </header>
    <section style="margin-top: 30px;">
        <div class="row">
            <h1 class="sub-heading" style="font-size:45px;">SETTINGS</h1>
            <p>Welcome back, <?php echo $_SESSION['user_name']; ?></p>
            <br>
            <p>Please note: all HTML and JS chars are stripped and converted.</p>
            <form method="POST">
                <label for="user_name" class="form-label">User name</label><br>
                <input type="text" class="form-input" name="user_name" id="user_name" value="<?php echo $_SESSION['user_name']; ?>" placeholder="User name"><br>
                <label for="user_email" class="form-label">User email (Login with this)</label><br>
                <input type="email" class="form-input" name="user_email" id="user_email" value="<?php echo $_SESSION['user_email']; ?>" placeholder="User email"><br>
                <label for="user_bio" class="form-label">User bio</label><br>
                <textarea class="form-textarea-small form-input"><?php echo $_SESSION['user_bio']; ?></textarea><br>
                <button type="submit" name="submit" class="form-submit">Change</button>
            </form>
            <?php
            if(isset($_POST['submit'])){
                $user_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['user_name']));
            }
            ?>
        <a class="btn" href="password.php">Change password</a><br>
        <a class="btn" href="font.php">Change font</a>
        </div>
    </section>
    <footer>
            <p>&copy; StrippedDiary.me</p>
            <p>An <a class="btn" href="https://github.com/censoredexe/StrippedDiary">open-source</a> project</p>
        </footer>
    </body>
</html>