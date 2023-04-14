<?php
    include './connect.php';

    if (isset($_POST['btn-del'])) {
        if (isset($_COOKIE['logID'])) {
            mysqli_query($conn, "DELETE FROM `logs` WHERE id = '".$_COOKIE['logID']."'");
        }
    }
    Header("Location: ./logs.php");
    
?>