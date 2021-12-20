<?php
session_start();
if (!$_SESSION['position']) {
    header('location:index.html');
    if (isset($_POST['logout'])) {
        session_destroy();
        header('location:index.html');
    }
}
?>
<script type="text/javascript">
    var postion = "<?php echo $_SESSION['position']; ?>";
    console.log(postion);
</script>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/tableList/css/material-icon.css">
    <link rel="stylesheet" href="vendor/awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/datetimePicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="vendor/css/sweetalert2.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <title>ỨNG DỤNG THỐNG KÊ LỖI</title>
</head>

<body>
    <div class="container-fluid">
        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="assets/img/LOGO.jpg" width="160" height="40" class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" id="home" href="#"><i class="fa fa-home" aria-hidden="true"></i> Nhập lỗi <span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="list" href="#"><i class="fa fa-list" aria-hidden="true"></i> Danh sách lỗi</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bar-chart" aria-hidden="true"></i> Biểu đồ
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="#">Nhà máy</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Xưởng</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Tổ</a>

                            </div>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li> -->
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                    </form>
                </div>
            </nav>
        </div>
        <div class="content">

            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                    <h3>NHẬP THÔNG TIN LỖI</h3>
                    <!-- <p class="blue-text">Just answer a few questions<br> so that we can personalize the right experience for you.</p> -->
                    <div class="card" style="width: 100%;">
                        <h5 class="text-center mb-4" id="idError">Số ID</h5>
                        <form class="form-card" onsubmit="event.preventDefault()">
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Vin Code<span class="text-danger"> *</span></label> <input type="text" id="vincode" name="fname" placeholder="Nhập mã số VIN" onblur="validate(1)"> </div>
                                <div class="form-group col-sm-3 flex-column d-flex"> <label class="form-control-label px-3">Số Lot</label> <input type="text" id="lot" name="lname" placeholder="" readonly> </div>
                                <div class="form-group col-sm-3 flex-column d-flex"> <label class="form-control-label px-3">Số HĐ</label> <input type="text" id="contractNo" name="lname" placeholder="" readonly> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Loại Xe</label> <input type="text" id="bodyType" name="email" placeholder="" readonly> </div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Ngày tháng</label>

                                    <div class='col'>
                                        <input type='text' class="form-control" id='datetimepicker1' />
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Thời gian Lỗi</label>
                                    <select id="timeError" class="form-control">
                                        <option selected></option>

                                    </select>
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Thời gian sản xuất</label>
                                    <select id="timeProduct" class="form-control">
                                        <option selected></option>

                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Xưởng chịu trách nhiệm</label>
                                    <select id="errorShop" class="form-control">
                                        <option selected></option>

                                    </select>
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Chuyền chịu trách nhiệm</label>
                                    <select id="errorChuyen" class="form-control">
                                        <option selected></option>

                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Tổ chịu trách nhiệm</label>
                                    <select id="errorTo" class="form-control">
                                        <option selected></option>

                                    </select>
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">NS chịu trách nhiệm</label> <input type="text" id="human" name="mob" placeholder="Nhập tên NS"> </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nơi phát hiện<span class="text-danger"> *</span></label>
                                    <select id="positionDetect" class="form-control" onblur="validate(2)">
                                        <option selected style="height: 100%;"></option>

                                    </select>
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Số lượng lỗi<span class="text-danger"> *</span></label>
                                    <input type="number" id="amountError" name="mob" placeholder="" onblur="validate(3)">
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Loại lỗi<span class="text-danger"> *</span></label>
                                    <select id="typeError" class="form-control" onblur="validate(4)">
                                        <option selected></option>

                                    </select>
                                </div>

                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">4M</label>
                                    <select id="inf4M" class="form-control">
                                        <option selected></option>

                                    </select>
                                </div>
                                <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Cấp độ lỗi</label>
                                    <select id="levelError" class="form-control">
                                        <option selected></option>

                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Tình huống xảy ra lỗi</label>
                                    <select id="tinhhuong" class="form-control">
                                        <option selected></option>

                                    </select>
                                </div>

                            </div>
                            <div class="row justify-content-between text-left">

                                <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Mô tả lỗi</label>
                                    <div class="form-group">
                                        <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                                        <textarea class="form-control" id="description" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Nguyên nhân?</label>
                                    <div class="form-group">
                                        <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                                        <textarea class="form-control" id="reason" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Giải pháp</label>
                                    <div class="form-group">
                                        <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                                        <textarea class="form-control" id="solution" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Ghi chú</label>
                                    <div class="form-group">
                                        <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                                        <textarea class="form-control" id="note" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-between text-left">
                                <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Ghi chú</label>
                                    <div class="form-group" id="pic1">
                                        <input type="file" id="imgInp" name='imgInp' accept="image/*" capture="camera" />

                                    </div>
                                </div>
                                <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Ghi chú</label>
                                    <div class="form-group" id="pic2">
                                        <input type="file" id="imgInp1" accept="image/*" name='cam2' capture="camera" />

                                    </div>
                                </div>
                                <!-- <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Ghi chú</label>
                                    <div class="form-group">
                                     
                                    </div>
                                </div> -->
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary" id="save">Lưu</button> </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">


            <!-- Small modal -->
            <div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <h4>Đăng xuất <i class="fa fa-lock"></i></h4>
                        </div>
                        <div class="modal-body">
                            <p><i class="fa fa-question-circle"></i>Bạn có muốn đăng xuất? <br /></p>
                            <div class="actionsBtns">
                                <form action="/logout" method="post">
                                    <input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}" />
                                    <input type="submit" id='logout' name='logout' class="btn btn-default btn-primary" data-dismiss="modal" value="Đăng xuất" />
                                    <button class="btn btn-default" data-dismiss="modal">Huỷ bỏ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="messResult">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thông báo</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" id="contentResult">

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <script type="text/javascript" src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/form.js"></script>

        <script src="vendor/jquery/jquery-3.6.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->


        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="vendor/js/moment.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
        <script type="text/javascript" src="vendor/bootstrap/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->


        <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script> -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" /> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js" integrity="sha256-2JRzNxMJiS0aHOJjG+liqsEOuBb6++9cY4dSOyiijX4=" crossorigin="anonymous"></script>-->
        <!-- <link rel="stylesheet" href="vendor/font/css/font-all.css"> -->
        <script type="text/javascript" src="vendor/jquery/query-ui.js"></script>
        <script type="text/javascript" src="vendor/js/sweetalert2.all.min.js"></script>


        <script>
            var pathPic1 = "";
            var pathPic2 = "";
            var idErrorGlobal = "";
            var idShop = '';
            var idChuyen = '';
            var idTo = '';
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                var timePicker = "";
                $('[data-toggle="tooltip"]').tooltip();

                // Select/Deselect checkboxes
                var checkbox = $('table tbody input[type="checkbox"]');
                $("#selectAll").click(function() {
                    if (this.checked) {
                        checkbox.each(function() {
                            this.checked = true;
                        });
                    } else {
                        checkbox.each(function() {
                            this.checked = false;
                        });
                    }
                });
                checkbox.click(function() {
                    if (!this.checked) {
                        $("#selectAll").prop("checked", false);
                    }
                });
                $(function() {
                    $('#datetimepicker1').datetimepicker({
                        format: 'MM-DD-YYYY HH:mm:ss',
                        defaultDate: new Date(),
                    });
                });
                _doit.loadTime();
                $('#vincode').focus();
                $('#vincode').blur(function() {
                    let vincode = ""
                    vincode = $('#vincode').val();
                    _doit.loadVincode(vincode);
                })
                $('#vincode').bind('enterKey', function() {
                    $('#errorShop').focus();
                });
                $('#errorShop').change(function() {
                    let shop = "";
                    shop = $('#errorShop').val();

                    if (shop != '') {
                        _doit.loadError(shop);
                        _doit.loadTime(shop);

                    }
                })
                $('#errorChuyen').change(function() {
                    let shop = $('#errorShop').val();
                    let chuyen = $('#errorChuyen').val();
                    if (chuyen != "") {
                        _doit.loadTime(shop, chuyen);
                    }
                })
                $('#positionDetect').change(function() {

                })
                $('#logout').click(function() {

                    window.location.href = 'index.html';
                })

                imgInp.onchange = evt => {
                    const [file] = imgInp.files
                    if (file) {
                        $('#pic1').append('<img id="blah" class="rounded" src="#" alt="your image" style="width: 100%;"/>');
                        blah.src = URL.createObjectURL(file)
                    }
                }
                imgInp1.onchange = evt => {
                    const [file] = imgInp1.files
                    if (file) {
                        $('#pic2').append('  <img id="blah1" class="rounded" src="#" alt="your image" style="width: 100%;"/>');
                        blah1.src = URL.createObjectURL(file)
                    }
                }
                $('#save').click(function() {

                    let x = $('#positionDetect').val();
                    let y = $('#typeError').val();
                    let z = $('#amountError').val();
                    var res = $("input[type=text]").toArray().some(function(el) {
                        return $(el).css("border-color") === "rgb(255, 0, 0)"
                    });
                    var res2 = $("select").toArray().some(function(el) {
                        return $(el).css("border-color") === "rgb(255, 0, 0)"
                    });
                    // `border-color` === `rgb(255, 0, 0)` , `border-color`:`"red"`
                    if (res || res2 || x == "" || y == "" || z == "") {
                        alert('Vui lòng nhập đủ thông tin trước khi lưu!');
                    } else {
                        _doit.saveimg();
                    };
                    //_doit.showMesss("lỗi","error");



                })
                $('#typeError').change(function() {
                    let id = $('#typeError').val();
                    if (id != "") idErrorGlobal = id; // idErrorGlobal = $(this).val();
                    // console.log(idErrorGlobal);
                })
                // $('#errorShop').click(function() {
                //     idShop = $(this).val();
                //     _doit.loadError(idShop);
                // })
                $('#errorChuyen').click(function() {
                    idChuyen = $(this).val();
                })
                $('#errorTo').click(function() {
                    idTo = $(this).val();
                })
                $('#navbarSupportedContent li').click(function(e) {

                    $('#navbarSupportedContent ').find('.sr-only').removeClass();
                    $('#navbarSupportedContent').find('.active').removeClass();
                    $(this).parent('li').addClass('active');


                })
                $('#list').click(function() {
                    window.location.href = 'loadlist.php';
                })

                _doit.changeDes();
            })
        </script>
</body>




</html>