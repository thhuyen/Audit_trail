<?php
    include './connect.php';

    $id = $_POST['log_id'];
    $username = $_POST['log_username'];
    $action = $_POST['log_action'];

    if (isset($_POST['btn-save-update'])) {
        echo 1;
        mysqli_query($conn,"UPDATE `logs` SET `action`='$action',`username`='$username' WHERE id = '$id'");
        mysqli_query($conn, "INSERT INTO `logs`(`id`, `action`, `date`, `username`) 
                                VALUES ('0','update log having id - {$id}','$date','huyen')");
    }
    Header("Location: ./logs.php");
    
?>