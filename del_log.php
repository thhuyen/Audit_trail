<?php
    include './connect.php';

    if (isset($_POST['btn-del'])) {
        if (isset($_COOKIE['logID'])) {
            mysqli_query($conn, "DELETE FROM `logs` WHERE id = '".$_COOKIE['logID']."'");
            mysqli_query($conn, "INSERT INTO `logs`(`id`, `action`, `date`, `username`) 
                                VALUES ('0','delete log having id - {$_COOKIE['logID']}','$date','huyen')");
        }
    }
    Header("Location: ./logs.php");
    
?>