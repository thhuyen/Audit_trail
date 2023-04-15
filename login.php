<?php
    include './connect.php';
    $flag = 0;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('y-m-d h:i:s');

    if(isset($_POST["btn-login"])) {
        $data = $conn->query("SELECT * FROM users");
        while ($row = $data->fetch_assoc()) {
            if ($row["username"] === $_POST["username"] && $row["password"] === $_POST["password"]) {
                $conn->query("INSERT INTO `logs`(`id`, `action`, `date`, `username`) 
                            VALUES ('0','login to system','$date','{$_POST["username"]}')");
                Header("Location: ./products.php?username={$row["username"]}");      
            }
            else 
                $flag = 1;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
    <style>
        html, body{
            height:100%;
        }
    </style>
</head>
<body class="bg-dark bg-gradient">
   <div class="h-100 d-flex jsutify-content-center align-items-center">
       <div class='w-100'>
        <h3 class="py-5 text-center text-light">Audit Trail/Audit Log</h3>
        <div class="card my-3 col-md-4 offset-md-4">
            <div class="card-body">
                <form action="#" id="login-form" method="post">
                    <center><small><?= $flag === 1 ? 'Wrong username or password' : '' ?></small></center>
                    <div class="form-group">
                        <label for="username" class="control-label">Username</label>
                        <input type="text" id="username" autofocus name="username" class="form-control form-control-sm rounded-0" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" id="password" autofocus name="password" class="form-control form-control-sm rounded-0" required>
                    </div>
                    <div class="form-group d-flex w-100 justify-content-end">
                        <button class="btn btn-sm btn-primary rounded-0 my-1" name="btn-login">Login</button>
                    </div>
                </form>
            </div>
        </div>
       </div>
   </div>
</body>
<script>