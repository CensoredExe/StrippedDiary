<?php
session_start();
ini_set('display_errors', 1);
include_once "../includes/include.php";
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
                        $role = "user";
                        $default = "Hasnt entered bio";
                        $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_password`, `user_role`, `user_bio`,`user_font`) VALUES ('$user_name', '$user_email', '$hash', '$role', '$default','TO BE ADDED');";
                        if(mysqli_query($conn, $sql)){
                            echo "<script>window.location = 'login.php?message=Account created'</script>";
                            exit();
                        }else {
                            echo mysqli_error($conn);
                        }
                    }else {
                        echo "<br>Account already exists.";
                    }
                }

            }
            ?>