<?php
    include './connect.php';
    if (isset($_POST['btn-logout'])) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('y-m-d h:i:s');
        $username = $_GET['username'];
        mysqli_query($conn, "INSERT INTO `logs`(`id`, `action`, `date`, `username`) 
                                VALUES ('0','logout system','$date','{$username}')");
        Header("Location: ./login.php");
    }

?>

<form action="#" method="post">
    <button type="submit" name="btn-logout">
        <i class="dropbtn fa-solid fa-arrow-right-from-bracket"></i>
    </button>
</form>

