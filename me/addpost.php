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
            <h1 class="sub-heading" style="font-size:45px;">WRITE A POST</h1>
            <p>Welcome back, <?php echo $_SESSION['user_name']; ?></p>
            <br>
            <p>Please note: all HTML and JS chars are stripped and converted.</p>
            <form method="POST">
            <label for="post_title">Post title</label><br>
            <input name="post_title" id="post_title" type="text" class="form-input" placeholder="Your post title" required><br>
            <label for="post_content">Post content</label><br>
            <textarea id="post_content" name="post_content" class="form-input form-textarea" placeholder="Your post content" required></textarea><br>
            <button type="submit" name="submit" class="form-submit">Post it!</button>
            </form>
            <?php
            if(isset($_POST['submit'])){
                $post_title = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['post_title']));
                $post_content = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['post_content']));
                date_default_timezone_set("Europe/London");
                $post_date = date("d/m/Y H:i:s");
                $post_author = $_SESSION['user_id'];
                if(empty($post_content) || empty($post_title)){
                    echo "Empty fields";
                }else{
                    $sql = "INSERT INTO posts (`post_title`, `post_content`,`post_author`, `post_date`) VALUES ('$post_title', '$post_content', '$post_author', '$post_date');";
                    if(mysqli_query($conn, $sql)){
                        echo "<script>window.location = 'index.php'</script>";
                    }else {
                        echo "Error";
                    }
                }
            }
            ?>
        </div>
    </section>
    <footer>
            <p>&copy; StrippedDiary.me</p>
            <p>An <a class="btn" href="https://github.com/censoredexe/StrippedDiary">open-source</a> project</p>
        </footer>
    </body>
</html>