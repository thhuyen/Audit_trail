<?php
    include './connect.php';

    $usernameURL = $_GET['username'];

    $id = $_POST['log_id'];
    $username = $_POST['log_username'];
    $action = $_POST['log_action'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('y-m-d h:i:s');
    
    if (isset($_POST['btn-save-update'])) {
        echo 1;
        mysqli_query($conn,"UPDATE `logs` SET `action`='$action',`username`='$username' WHERE id = '$id'");
        mysqli_query($conn, "INSERT INTO `logs`(`id`, `action`, `date`, `username`) 
                                VALUES ('0','update log having id - {$id}','$date','{$usernameURL}')");
    }
    Header("Location: ./logs.php?username={$usernameURL}");
    
?>