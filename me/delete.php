<?php
    if(isset($_GET['id'])){
        session_start();
        include_once "../includes/include.php";
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        
    }else {
        echo "<script>window.location = 'index.php'</script>";
    }
?>