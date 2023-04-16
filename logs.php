
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./assets/CSS/base-admin.css"> -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/base.css">


    <title>LOGS</title>
    <link rel="icon" href="./assets/img/logo/logo.png" type="image/x-icon" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/c89546c2fd.js" crossorigin="anonymous"></script>
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
                    <div class="tab-item active">LOGS</div>
                    <div class="line"></div>
                </div>
            
                    <!-- LOGOUT-ICON -->
            <?php
                include './logout.php'
            ?>
            </div>
        </div>

<!-- HEADING -->
        <div class="heading">
            <h1>AUDIT LOGS</h1>
        </div>
<!-- FORM -->
    <div class="tab-content" style="overflow-x: hidden;">
        <div class="tab-pane add active">
            <div class='container' style="width:1330px;">
                <table id="update-tab" class="update-table table-infor">
                    <tr>
                        <td class="head-table">STT</td>
                        <td class="head-table">ID</td>
                        <td class="head-table">Username</td>
                        <td class="head-table">Action</td>
                        <td class="head-table">Time</td>
                        <td class="head-table">Action</td>
                    </tr>       
                    <?php
                        include './connect.php';
                        $data = mysqli_query($conn, "SELECT * FROM logs");
                        $i = 0;
                        while($rows = $data->fetch_assoc())
                            { $i++;
                    ?>

                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $rows['id']; ?></td>
                        <td><?php echo $rows['username'];?></td>
                        <td><?php echo $rows['action'];?></td>
                        <td><?php echo $rows['date'];?></td>
                        <td>
                            <button class="upd-btn btn-table" onclick="openUpdate(this)" style="margin: 5px;">Update</button>
                            <button type="button" class="del-btn btn-table" data-bs-toggle="modal"
                            data-bs-target="#delete-room" style="margin-bottom: 5px;" onclick="openModalDelete(this)">Delete</button>
                        </td>
                    </tr> 

                    <?php }?>             
                </table>   
            </div>                  
        </div>

        <!-- update form -->
        <div>
            <div class='container add form' style="margin-top: 0;">
                <form id="form-update-room" class='set' method="post" action="./update_log.php?username=<?= $_GET['username']?>">
                    <div class="room-container">
                        <div class="room-infor">
                            <label for="log_id" class="form-label">ID *</label>
                            <input id="log_id" class="form-control" type="text" name="log_id" readonly>
                        </div>
                    </div> 
                    <div class="room-container">
                        <div class="room-infor">
                            <label for="log_username" class="form-label">Username *</label>
                            <input id="log_username" class="form-control" type="text" name="log_username">
                        </div>
                    </div>
                    <div class="room-container">
                        <div class="room-infor">
                            <label for="log_action" class="form-label">Action *</label>
                            <input id="log_action" class="form-control" placeholder="log_action" type="text" name="log_action">
                        </div>
                    </div> 
                    
                    <button type="submit" id="btn-save-update" name="btn-save-update" class="btn btn-save-form">Lưu</button>
                    <button type="button" class="btn btn-exit-form" onclick="exitUpdate()">Thoát</button>
                </form>
            </div>
        </div>
    </div>    
    
    <!-- delete form -->
    <form action="./del_log.php?username=<?= $_GET['username']?>" method="POST">
        <div class="modal fade" id="delete-room" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">DELETE PRODUCTS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body notice-content">
                        <p>Are you sure to delete log at <span class="room-name-notice"></span></p>
                        <p><i class="fa-solid fa-circle-exclamation icon-exclamation"></i></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Quay lại</button>
                        <button type="submit" name ="btn-del" class="btn btn-danger" onclick="DeleteRoom(this)">Xóa</button>                        
                    </div>
                </div>
            </div>
        </div>
    </form>
   
    </section>

     <!-- script tab slider -->
     <script src="./tab.slider.js"></script>

    <script>
        // event delete ask
        let log_id, action, actor;
        if (username === 'huyen' || username === 'diep') {
            function openModalDelete(button) {
                function find_pos(row, x) {
                    var updateTableCells = document.querySelector(".update-table").rows[row].cells; // lấy ra các cell của 1 row
                    var updateTableRows = document.querySelector(".update-table").rows; 
                    for (let i = 0; i< updateTableRows.length; i++) {
                        if (updateTableRows[i] === x.parentElement.parentElement ) {
                            return [updateTableCells[0].innerText, updateTableCells[1].innerText,updateTableCells[2].innerText.trim(), updateTableCells[3].innerText.trim()];
                        }
                    }
                    return false;
                } 
                stt = find_pos((button.parentElement).parentElement.rowIndex, button)[0];
                log_id = find_pos((button.parentElement).parentElement.rowIndex, button)[1];
                actor = find_pos((button.parentElement).parentElement.rowIndex, button)[2];
                action = find_pos((button.parentElement).parentElement.rowIndex, button)[3];
                document.querySelector('.room-name-notice').innerText = stt;
            }
    
            // HÀM SET COOKIE HẾT HẠN TRONG N GIÂY
            function createCookie(name, value, second) {
                var date = new Date();
                date.setTime(date.getTime()+(second*1000));
                var expires = "; expires="+date.toGMTString();
                document.cookie = name+"="+value+expires+"; path=/";
            }
            // event delete product
            function DeleteRoom(button) {
                createCookie("logID", log_id, 60);
                createCookie("action", action, 30);
                createCookie("actor", actor, 30);
            }  
    
            // event open form
            function openUpdate(button) {
                btnExitForm.style.display = "block";
            updateRoomForm.style.display="block";
            updateTab.classList.add('close');
                let action_prev;
                function find_pos(row, x) {
                    var updateTableCells = document.querySelector(".update-table").rows[row].cells; // lấy ra các cell của 1 row
                    var updateTableRows = document.querySelector(".update-table").rows; 
                    for (let i = 0; i< updateTableRows.length; i++) {
                        if (updateTableRows[i] === x.parentElement.parentElement ) {
                            document.getElementById('log_id').value = updateTableCells[1].innerText.trim();
                            document.getElementById('log_username').value = updateTableCells[2].innerText.trim();
                            action_prev = document.getElementById('log_action').value = updateTableCells[3].innerText.trim();
                            
                            break;
                        }
                    }
                } 
                find_pos((button.parentElement).parentElement.rowIndex, button);
                createCookie("action_prev", action_prev, 30);
            } 
        }
        else {
            document.querySelectorAll('.upd-btn').forEach(function(button) {
                button.style.cursor = 'no-drop';
            })
            document.querySelectorAll('.upd-btn').forEach(function(button) {
                button.style.opacity = '.5';
            })
            document.querySelectorAll('.del-btn').forEach(function(button) {
                button.style.cursor = 'no-drop';
                button.removeAttribute("data-bs-toggle");
                button.removeAttribute("data-bs-target");
            })
            document.querySelectorAll('.del-btn').forEach(function(button) {
                button.style.opacity = '.5';
            })
            function openUpdate(button) {
                alert("You don't have permission to do this!")
            }
            function openModalDelete(button) {
                alert("You don't have permission to do this!")
            }
        }
    </script>

   
    <script src="https://kit.fontawesome.com/c89546c2fd.js" crossorigin="anonymous"></script>

</body>
</html>