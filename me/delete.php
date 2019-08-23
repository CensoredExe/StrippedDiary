
<?php
session_start();
ini_set('display_errors', 1);



    if(isset($_GET['id'])){
        include_once "../includes/include.php";
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM `posts` WHERE post_id='$id' AND post_author='$user_id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1){
            while($row = mysqli_fetch_assoc($result)){
                $post_title = mysqli_real_escape_string($conn, $row['post_title']);
                $post_date = $row['post_date'];
                $post_content = mysqli_real_escape_string($conn, $row['post_content']);
                $post_id = $row['post_id'];
                $post_author = $row['post_author'];
                
                $sqladd = "INSERT INTO `deleted` (`post_title`, `post_date`, `post_content`, `post_id`, `post_author`) VALUES ('$post_title', '$post_date', '$post_content', '$post_id', '$post_author');";
                if(mysqli_query($conn, $sqladd)){
                    $sql = "DELETE FROM posts WHERE post_id='$post_id'";
                    if(mysqli_query($conn, $sql)){
                        echo "<script>window.location = 'index.php'</script>";
                    }else {
                        echo "Error 2";
                    }
                }else {
                    echo mysqli_error($conn);
                }
            }
        }else {
            echo "Post doesnt exist or you dont own it.";
            exit();
        }
    }else {
        echo "<script>window.location = 'index.php'</script>";
    }
