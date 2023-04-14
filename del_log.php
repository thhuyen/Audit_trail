<?php
    include './connect.php';

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('y-m-d h:i:s');
    
    if (isset($_POST['btn-del'])) {
        if (isset($_COOKIE['logID'])) {
            mysqli_query($conn, "DELETE FROM `logs` WHERE id = '".$_COOKIE['logID']."'");
            mysqli_query($conn, "INSERT INTO `logs`(`id`, `action`, `date`, `username`) 
                                VALUES ('0','delete log having id - {$_COOKIE['logID']}','$date','huyen')");
        }
    }
    Header("Location: ./logs.php");
    
?>