<?php
    include './connect.php';

    $name = $_POST['product-name'];
    $price = $_POST['product-price'];
    $des = $_POST['product-des'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('y-m-d h:i:s');

    $id = uniqid();

    mysqli_query($conn, "INSERT INTO `products`(`id`, `product_name`, `product_price`, `product_description`) 
                        VALUES ('$id','$name','$price','$des')");

    mysqli_query($conn, "INSERT INTO `logs`(`id`, `action`, `date`, `username`) 
                                VALUES ('0','add product having id - {$id}','$date','huyen')");
   
    header("Location: ./products.php");    
?>