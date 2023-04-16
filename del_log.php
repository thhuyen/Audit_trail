<?php
    include './connect.php';

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('y-m-d h:i:s');
    $username = $_GET['username'];
    
    if (isset($_POST['btn-del'])) {
        if (isset($_COOKIE['logID']) && isset($_COOKIE['action']) && isset($_COOKIE['actor'])) {
            mysqli_query($conn, "DELETE FROM `logs` WHERE id = '".$_COOKIE['logID']."'");
            mysqli_query($conn, "INSERT INTO `logs`(`id`, `action`, `date`, `username`) 
                                VALUES ('0','<b>delete log:</b> id: {$_COOKIE['logID']} + actor: {$_COOKIE['actor']} + action: {$_COOKIE['action']}','$date','{$username}')");
        }
    }
    Header("Location: ./logs.php?username={$username}");
    
?>