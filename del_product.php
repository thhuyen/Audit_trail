<?php
    include './connect.php';

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('y-m-d h:i:s');
    $username = $_GET['username'];
    echo $username;
    if (isset($_POST['btn-del'])) {
        if (isset($_COOKIE['productID'])) {
            mysqli_query($conn, "DELETE FROM `products` WHERE id = '".$_COOKIE['productID']."'");
            mysqli_query($conn, "INSERT INTO `logs`(`id`, `action`, `date`, `username`) 
                                VALUES ('0','delete product having id - {$_COOKIE['productID']}','$date','{$username}')");
        }
    }
    Header("Location: ./products.php?username={$username}");
?>