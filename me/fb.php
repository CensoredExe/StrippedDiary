<?php
session_start();
ini_set('display_errors', 1);
include_once "../includes/include.php";
                if(isset($_POST['form-submit'])){
                    $fb_content = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['fb_content']));
                    $fb_author = $_SESSION['user_id'];
                    $fb_date = date("d/m/y H:i:s");
                    
                    if(empty($fb_content)){
                        echo "Error: Textarea is empty";
                        exit();
                    }else {
                        $sql = "INSERT INTO `feedback` (`fb_content`, `fb_author`, `fb_date`) VALUES ('$fb_content', '$fb_author', '$fb_date');";
                        if(mysqli_query($conn, $sql)){
                            echo "Thanks for the feedback, its highly appreciated.";
                            echo "<br><a href='index.php'>Go back</a>";
                            exit();
                        }else {
                            echo mysqli_error($conn);
                        }
                    }

                }
                ?>