<?php
    include './connect.php';

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('y-m-d h:i:s');

    if (isset($_POST['btn-del'])) {
        if (isset($_COOKIE['productID'])) {
            mysqli_query($conn, "DELETE FROM `products` WHERE id = '".$_COOKIE['productID']."'");
            mysqli_query($conn, "INSERT INTO `logs`(`id`, `action_name`, `date`, `username`) 
                                VALUES ('0','delete product having id - {$_COOKIE['productID']}','$date','huyen')");
        }
    }
    Header("Location: ./products.php");
    
?>