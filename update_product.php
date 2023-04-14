<?php
    include './connect.php';

    $id = $_POST['product-id_upd'];
    $name = $_POST['product-name_upd'];
    $price = $_POST['product-price_upd'];
    $des = $_POST['product-des_upd'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('y-m-d h:i:s');

    if (isset($_POST['btn-save-update'])) {
        $data = $conn->query("SELECT * FROM products WHERE id = '{$id}'");
        $prev_name; 
        $prev_price; 
        $prev_des; 
        $mess;
        while ($row = $data->fetch_assoc()) {
            $prev_name = $row["product_name"];
            $prev_price = $row["product_price"];
            $prev_des = $row["product_description"];
        }
        if ($prev_name !== $name || $prev_price !== $price || $prev_des !== $des) {
            if ($prev_name !== $name && $prev_price !== $price && $prev_des !== $des)
                $mess = "all fields";
            else if ($prev_name !== $name && $prev_price !== $price)
                $mess = "name field and price field"; 
            else if ($prev_name !== $name && $prev_des !== $des) 
                $mess = "name field and description field"; 
            else if ($prev_price !== $price && $prev_des !== $des)
                $mess = "price field and description field"; 
            else if ($prev_name !== $name)
                $mess = "name field"; 
            else if ($prev_price !== $price)
                $mess = "price field"; 
            else if ($prev_des !== $des)
                $mess = "description field"; 

            mysqli_query($conn, "UPDATE `products` SET `id`='$id',`product_name`='$name',`product_price`='$price',`product_description`='$des' WHERE id = '$id'");
            mysqli_query($conn, "INSERT INTO `logs`(`id`, `action`, `date`, `username`) 
                                VALUES ('0','update {$mess} of product having id - {$id}','$date','huyen')");
        }
    }

    header("Location: ./products.php");    
?>