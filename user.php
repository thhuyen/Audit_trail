
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./assets/CSS/base-admin.css"> -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/base.css">


    <title>USERS</title>
    <link rel="icon" href="./assets/img/logo/logo.png" type="image/x-icon" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include './sidebar.php'
    ?>
    <section>
        <div class="notice">
            <div class="dropdown">
                <div class="tabs">
                    <!-- header -->
                    <div class="tab-item add active">
                        USERS
                    </div>
                    <div class="line"></div>
                </div>
            
                    <!-- NOTICE-BELL -->
               
            </div>
        </div>

<!-- HEADING -->
        <div class="heading">
            <h1>USERS</h1>
        </div>
<!-- FORM -->

        <div class="tab-content">
            <!-- ADD -->
            <div class="tab-pane add active">
                <div class='container' style="width:1000px;">
                    <table id="update-tab" class="update-table table-infor">
                        <tr>
                            <td class="head-table">STT</td>
                            <td class="head-table">username</td>
                            <td class="head-table">Level</td>
                        </tr>                    
                        <?php
                            include './connect.php';
                            $data = mysqli_query($conn, "SELECT * FROM users");
                            $i = 0;
                            while($rows = $data->fetch_assoc())
                                { $i++;
                        ?>

                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $rows['username'];?></td>
                            <td><?php echo $rows['level'];?></td>
                        </tr> 


                        <?php }?>
                    </tr>  
                    </table>   
                </div>                  
            </div>   
        </div>
    </section>

    <script src="https://kit.fontawesome.com/c89546c2fd.js" crossorigin="anonymous"></script>
    <script src="./tab.slider.js"></script>
</body>
</html>