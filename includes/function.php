<?php
function getName($name){
    $conn = mysqli_connect("localhost", "root", "", "stripped");
    $sql = "SELECT * FROM users WHERE user_id='$name'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1){
        while($row = mysqli_fetch_assoc($result)){
            echo $row['user_name'];
        }
    }else {
        echo "Error";
    }
}
?>