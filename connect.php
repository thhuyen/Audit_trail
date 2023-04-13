<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "audit_trail";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8"); // Truy xuất tiếng việt
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>