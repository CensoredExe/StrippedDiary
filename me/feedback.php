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
            <a class="nav-item btn" href="feedback.php">Feedback</a>

            <a class="nav-item btn" href="settings.php">Settings</a>

            <a class="nav-item btn" href="logout.php" >Logout</a>

            </div>

        </div>
    </header>
    <section style="margin-top: 30px;">
        <div class="row">
            <h1 class="sub-heading" style="font-size:45px;">FEEDBACK</h1>
            <p>Welcome back, <?php echo $_SESSION['user_name']; ?></p>
            <br>
            <p>Please report all bugs + suggestions through here. Keep in mind this is work in progress.</p><br>
            <form method="POST" action="fb.php">
                <h2>We appreciate your feedback.</h2><br>
                <label class="form-label" for="fb_content">Your message</label><br>
                <textarea name="fb_content" id="fb_content" class="form-input form-textarea" placeholder="I found a bug on the posting page; I have a suggestion... "></textarea><br>
                <button type="submit" name="form-submit" class="form-submit">Send</button>
            </form>
                
        
        </div>
    </section>
    
    </body>
</html>