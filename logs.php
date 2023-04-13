
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
                    <div class="tab-item active">LOGS</div>
                    <div class="line"></div>
                </div>
            
                    <!-- NOTICE-BELL -->
               
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

        <!-- form email -->
        <!-- <div class="modal-email">
            <div class="popup-send-mail">
                <div class="mail-content">
                    <h4>Soạn Email</h4>
                        <div class="mail-container">
                            <div class='mail-infor'>
                                <label for='receiver'>Người nhận</label>
                                <input id='receiver' type='text' name="receiver">
                            </div>
                            <span class="invalid-message"></span>
                        </div>
        
                        <div class="mail-container">
                            <div class='mail-infor'>
                                <label for='subject'>Chủ đề</label>
                                <input id='subject' type='text' name="subject">
                            </div>
                            <span class="invalid-message"></span>
                        </div>
        
                        <div class="mail-container">
                            <div class='mail-infor'>
                                <textarea id='mail-des' class="form-control" type='radio' name="mail-des"></textarea>
                            </div>
                            <span class="invalid-message"></span>
                        </div>
        
                        <a href="mailto:">
                            <button id="btn-send-update" class="btn btn-save-form">Gửi</button>
                        </a>
                        <button class="btn btn-exit-form">Hủy</button>
                </div>
            </div>
        </div> -->
    </div>    
        
   
    </section>

    <!-- set content email -->
    <script>
        var modalEmail = document.querySelector('.modal-email');
        var description = document.getElementById('mail-des');
        var subject = document.getElementById('subject');
        var receiver = document.getElementById('receiver');

        let text = "Cảm ơn quý khách đã chọn ALOHA trong kì nghỉ dưỡng / du lịch. Chúng tôi đã nhận được yêu cầu đặt phòng của quý khách và xin xác nhận lại thông tin như sau: \n " +
        "Anh/chị: "; 

        // function find_pos(row, x) {
        //         var updateTableCells = document.querySelector(".update-table").rows[row].cells; // lấy ra các cell của 1 row
        //         var updateTableRows = document.querySelector(".update-table").rows; 
        //         for (let i = 0; i < updateTableRows.length; i++) {
        //             if (updateTableRows[i] === x.parentElement.parentElement) {
        //                 if (updateTableCells[8].innerText.includes("Chọn phòng")) {
        //                     alert("Vui lòng chọn phòng trước khi gửi email!");
        //                     break;
        //                 }
        //                 else {
        //                     modalEmail.classList.add('open');
        //                     subject.value = "Thông tin đặt phòng từ ALOHA"
        //                     receiver.value = updateTableCells[2].childNodes[1].innerText;
        //                     description.value =  "Cảm ơn quý khách đã chọn ALOHA trong kì nghỉ dưỡng / du lịch. Chúng tôi đã nhận được yêu cầu đặt phòng của quý khách và xin xác nhận lại thông tin như sau:\n" +
        //                     "Anh/chị: " + updateTableCells[0].innerText + "\n" + 
        //                     "Số điện thoại: " + updateTableCells[1].innerText + "\n" + 
        //                     "Loại phòng: " + updateTableCells[7].innerText + "\n" +
        //                     "Ngày đặt: " + updateTableCells[3].innerText + "\n" + 
        //                     "Ngày ở: " + updateTableCells[4].innerText + "\n" + 
        //                     "Ngày trả: " + updateTableCells[5].innerText + "\n" +
        //                     "Và chúng tôi đã sắp xếp phòng ở cho quý khách là: phòng " + updateTableCells[8].innerText + "\n" +
        //                     "Một lần nữa, cảm ơn quý khách, chúc quý khách có những trải nghiệm tốt nhất tại ALOHA. 🥰"
        //                     break;
        //                 }
        //             }
        //         }
        //     } 
            
        function openEmail(button) {
            find_pos((button.parentElement).parentElement.rowIndex, button);
        }
        document.querySelector('.popup-send-mail').addEventListener('click', function(e) {
            e.stopPropagation();
        });
        document.querySelector('.btn-exit-form').addEventListener('click', function(){
            modalEmail.classList.remove('open');
        }); 
        modalEmail.addEventListener('click', function() {
            modalEmail.classList.remove('open');
        });

        

    </script>
    <!-- update phòng cho khách -->
    <script>
        function ChooseRoom(select) {
            var id;
            function find_pos(row, x) {
                var updateTableCells = document.querySelector(".update-table").rows[row].cells; // lấy ra các cell của 1 row
                var updateTableRows = document.querySelector(".update-table").rows; 
                for (let i = 0; i< updateTableRows.length; i++) {
                    if (updateTableRows[i] === x.parentElement.parentElement) {
                        id = updateTableRows[i].id;
                        break;
                    }
                }
            } 
            find_pos((select.parentElement).parentElement.rowIndex, select);

            let url = "http://localhost:8080/aloha/admin-manage.html";            
            window.location.href= url + "?IdInvoiceRoomDetail=" + id + "&RoomName=" + select.value;
        } 
    </script>

    <!-- script tab slider -->
    <script src="./assets/javascript/tab-slider.js"></script>

    <script src="https://kit.fontawesome.com/c89546c2fd.js" crossorigin="anonymous"></script>

    <!-- Kiểm tra điều kiện nhập đầy đủ thông tin -->
    <script src="./assets/javascript/formValidation.js"></script>
    <script>
        Validator({
            form: '#form-add',
            formGroupSelector: '.room-container',
            errorSelector: '.invalid-message',
            rules: [
                Validator.isRequired('#room-name', 'Vui lòng nhập tên dịch vụ'),
                Validator.minLength('#room-name', 5), 
                Validator.isRequired('#room-price', 'Vui lòng nhập đơn giá dịch vụ'),
                Validator.isNumber('#room-price'),
                Validator.isRequired('#file', 'Vui lòng chọn hình ảnh'),
                Validator.isRequired('#room-des', 'Vui lòng nhập mô tả dịch vụ'),
                Validator.minLength('#room-des', 20), 
            ],
            onSubmit: function(data) {

            }
        });

        Validator({
            form: '#form-update-room',
            formGroupSelector: '.room-container',
            errorSelector: '.invalid-message',
            rules: [
                Validator.isRequired('#room-name-update', 'Vui lòng nhập tên dịch vụ'),
                Validator.minLength('#room-name-update', 5), 
                Validator.isRequired('#room-price-update', 'Vui lòng nhập đơn giá dịch vụ'),
                Validator.isNumber('#room-price-update'),
                Validator.isRequired('#file-update', 'Vui lòng chọn hình ảnh'),
                Validator.isRequired('#room-des-update', 'Vui lòng nhập mô tả dịch vụ'),
                Validator.minLength('#room-des-update', 20), ,
            ],
            onSubmit: function(data) {

            }
        });
    </script>

    <!-- SEARCH -->
    <script>
        function search_infor() {
            var input, filter, table, tr, td, i, txtValue;
            table = document.getElementById("update-tab");
            tr = table.getElementsByTagName("tr");
            for (i = 1; i < tr.length; i++) {
                name_cus = tr[i].getElementsByTagName("td")[0].innerText.trim();
                phone_cus = tr[i].getElementsByTagName("td")[1].innerText.trim();
                email_cus = tr[i].getElementsByTagName("td")[2].innerText.trim();
                // console.log(document.querySelector('input[name="filter"]:checked').id);
                switch(document.querySelector('input[name="filter"]:checked').value) {
                    case "name": find_keyword(name_cus, tr[i]);
                    break;
                    case "phone": find_keyword(phone_cus, tr[i]);
                    break;
                    default: find_keyword(email_cus, tr[i]);
                }
            }
        }
        function find_keyword(keyword, row) {
            filter = document.getElementById("search").value.toUpperCase();
            if (keyword.toUpperCase().indexOf(filter) > -1) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        }
       document.getElementById("search").addEventListener('keyup', search_infor);
       document.querySelector('.searchButton').addEventListener('click', search_infor);
    </script>
</body>
</html>