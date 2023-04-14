
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./assets/CSS/base-admin.css"> -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/base.css">


    <title>ALOHA Admin</title>
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
                        ADD PRODUCTS
                    </div>
                    <div class="tab-item manage">
                        MANAGE PRODUCTS
                    </div>

                    <div class="line"></div>
                </div>
            
                    <!-- NOTICE-BELL -->
               
            </div>
        </div>

<!-- HEADING -->
        <div class="heading">
            <h1>PRODUCTS</h1>
        </div>
<!-- FORM -->

    
    <div class="tab-content">
        <!-- ADD -->
        <div class="tab-pane add active">
            <div class="container add">
                <form id="form-add" action="./add_product.php" method="POST"> 
                    <div class="room-container">
                        <div class="room-infor">
                            <label for="product-name" class="form-label">PRODUCT NAME *</label>
                            <input id="product-name" class="form-control" placeholder="Product name" type="text" name="product-name">
                        </div>
                    </div> 
                    <div class="room-container">
                        <div class="room-infor">
                            <label for="product-price" class="form-label">PRODUCT PRICE *</label>
                            <input id="product-price" class="form-control" placeholder="Product price" type="text" name="product-price">
                        </div>
                    </div>
                    <div class="room-container">
                        <div class='room-infor'>
                            <label for="product-des" class="form-label">DESCRIPTION *</label>
                            <textarea id="product-des" class="form-control" placeholder="Description" name="product-des" rows="5"></textarea>
                        </div>
                    </div>

                    <button type="submit" id="btn-save" class="btn" name="btn-add-room">Thêm</button>
                </form>
            </div>
        </div>

        <!-- MANAGE -->
        <div class="tab-pane">
            <div class='container' style="width:1200px;">
                <table id="update-tab" class="update-table table-infor">
                    <tr>
                        <td class="head-table">STT</td>
                        <td class="head-table">Product ID</td>
                        <td class="head-table">Products name</td>
                        <td class="head-table">Product price</td>
                        <td class="head-table">Product description</td>
                        <td class="head-table">Actions</td>
                    </tr>                    
                    <?php
                        include './connect.php';
                        $data = mysqli_query($conn, "SELECT * FROM products");
                        $i = 0;
                        while($rows = $data->fetch_assoc())
                            { $i++;
                    ?>

                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $rows['id'];?></td>
                        <td><?php echo $rows['product_name'];?></td>
                        <td><?php echo $rows['product_price'];?></td>
                        <td><?php echo $rows['product_description'];?></td>
                        <td>
                            <button class="upd-btn btn-table" onclick="openUpdate(this)" style="margin: 5px;">Update</button>
                            <button type="button" class="del-btn btn-table" data-bs-toggle="modal"
                            data-bs-target="#delete-room" style="margin-bottom: 5px;" onclick="openModalDelete(this)">Delete</button>
                        </td>
                    </tr> 


                    <?php }?>
                </tr>  
                </table>   
            </div>                  
        </div>

        <!-- UPDATE FORM -->
        <div>
            <div class='container add form' style="margin-top: 0;">
                <form id="form-update-room" class='set' method="post" action="./update_product.php">
                    <div class="room-container">
                        <div class="room-infor">
                            <label for="product-id_upd" class="form-label">PRODUCT ID *</label>
                            <input id="product-id_upd" class="form-control" type="text" name="product-id_upd" readonly>
                        </div>
                    </div> 
                    <div class="room-container">
                        <div class="room-infor">
                            <label for="product-name_upd" class="form-label">PRODUCT NAME *</label>
                            <input id="product-name_upd" class="form-control" placeholder="Product name" type="text" name="product-name_upd">
                        </div>
                    </div> 
                    <div class="room-container">
                        <div class="room-infor">
                            <label for="product-price_upd" class="form-label">PRODUCT PRICE *</label>
                            <input id="product-price_upd" class="form-control" placeholder="Product price" type="text" name="product-price_upd">
                        </div>
                    </div>
                    <div class="room-container">
                        <div class='room-infor'>
                            <label for="product-des_upd" class="form-label">DESCRIPTION *</label>
                            <textarea id="product-des_upd" class="form-control" placeholder="Description" name="product-des_upd" rows="5"></textarea>
                        </div>
                    </div>
                    <button type="submit" id="btn-save-update" name="btn-save-update" class="btn btn-save-form">Lưu</button>
                    <button type="button" class="btn btn-exit-form" onclick="exitUpdate()">Thoát</button>
                </form>
            </div>
        </div>

   
    <!-- form xóa -->
    <form action="./del_product.php" method="POST">
        <div class="modal fade" id="delete-room" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">DELETE PRODUCTS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body notice-content">
                        <p>Are you sure to delete <span class="room-name-notice"></span></p>
                        <p><i class="fa-solid fa-circle-exclamation icon-exclamation"></i></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Quay lại</button>
                        <button type="submit" name ="btn-del" class="btn btn-danger" onclick="DeleteRoom(this)">Xóa</button>
                        <!-- Bắt sự kiện khi bấm button Xóa phòng -->                                
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
   
    </section>

    <script>
    // event delete ask
    let pd_id;
      function openModalDelete(button) {
        function find_pos(row, x) {
            var updateTableCells = document.querySelector(".update-table").rows[row].cells; // lấy ra các cell của 1 row
            var updateTableRows = document.querySelector(".update-table").rows; 
            for (let i = 0; i< updateTableRows.length; i++) {
                if (updateTableRows[i] === x.parentElement.parentElement ) {
                    return [updateTableCells[1].innerText, updateTableCells[2].innerText];
                }
            }
            return false;
        } 
        name = find_pos((button.parentElement).parentElement.rowIndex, button)[1];
        pd_id = find_pos((button.parentElement).parentElement.rowIndex, button)[0];
        document.querySelector('.room-name-notice').innerText = name;
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
        createCookie("productID", pd_id, 60);
    }   

    // event open form
    function openUpdate(button) {
        btnExitForm.style.display = "block";
        updateRoomForm.style.display="block";
        updateTab.classList.add('close');

        function find_pos(row, x) {
            var updateTableCells = document.querySelector(".update-table").rows[row].cells; // lấy ra các cell của 1 row
            var updateTableRows = document.querySelector(".update-table").rows; 
            for (let i = 0; i< updateTableRows.length; i++) {
                if (updateTableRows[i] === x.parentElement.parentElement ) {
                    document.getElementById('product-id_upd').value = updateTableCells[1].innerText.trim();
                    document.getElementById('product-name_upd').value = updateTableCells[2].innerText.trim();
                    document.getElementById('product-price_upd').value = updateTableCells[3].innerText.trim();
                    document.getElementById('product-des_upd').value = updateTableCells[4].innerText.trim();
                    
                    break;
                }
            }
        } 
        find_pos((button.parentElement).parentElement.rowIndex, button);
    } 

    </script>
    <script src="./tab.slider.js"></script>
</body>
</html>