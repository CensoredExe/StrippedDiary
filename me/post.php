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
    <section style="margin: 30px 0;">
        <div class="row">
            <h1 class="sub-heading" style="font-size:45px;">Read a post</h1>
            <p>Welcome back, <?php echo $_SESSION['user_name']; ?></p>
            <hr>
        </div>
        
        <div style="margin-top: 20px;" class="row">
        
        <?php
        if(!isset($_GET['id'])){
            echo "<script>window.location = 'index.php'</script>";
            exit();
        }
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM posts WHERE post_id='$id' AND post_author='$user_id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1){
            while($row = mysqli_fetch_assoc($result)){
                $post_title = $row['post_title'];
                $post_date = $row['post_date'];
                $post_content = $row['post_content'];
                $post_id = $row['post_id'];
                ?>
                <p><?php echo $post_date;  ?> <a onClick="return confirm('Are you sure? This will permenantly delete your post.');" href="delete.php?id=<?php echo $post_id; ?>" style="color:red;">DELETE</a></p>
                <h1 class="full-post-title"><?php echo $post_title; ?></h1>
                <p class="full-post-content"><?php echo $post_content; ?></p>
                <?php
            }
        }else {
            echo "<h1>Post doesnt exist.</h1>";
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