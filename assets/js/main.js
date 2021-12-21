function doit() {
    var sefl = this;
    this.loadVincode = (vincode, id) => {
        let vinCode = vincode;
        let returnResult = true;
        $.ajax({
            type: "post",
            url: "./be/getInfoVin.php",
            data: {
                vincode: vinCode,
                id: id
            },
            dataType: "json",
            success: function(result) {
                console.log(result);
                if (result.code == 200) {
                    let loadList = result.loadList;

                    let time = result.time;
                    let shop_ = result.shop;
                    let inf4M = result.if4M;
                    let tinhhuong = result.tinhhuong;
                    let level = result.level;
                    if (loadEdit == "") {
                        $('#contractNo').val(result.contractNo);
                        $('#lot').val(result.lot);
                        $('#bodyType').val(result.bodyType);
                        $('#vincode').val(result.vincode);
                    }

                    if (loadEdit == "") {
                        $('#timeError option').remove();
                        $('#errorShop option').remove();
                        $('#inf4M option').remove();
                        $('#tinhhuong option').remove();
                        $('#levelError option').remove();
                    } else {
                        $('#timeError').append('<option>' + loadList['DETECT_TIME'] + '</option>');
                        $('#timeProduct').append('<option>' + loadList['PRODUCT_TIME'] + '</option>');
                    }

                    $('#timeError').append('<option></option>');
                    for (let i = 0; i < time.length; i++) {
                        $('#timeError').append('<option>' + time[i] + '</option>');
                        $('#timeProduct').append('<option>' + time[i] + '</option>');

                    }

                    $('#errorShop').append('<option value="" selected></option>');
                    $('#positionDetect option').remove();
                    $('#positionDetect').append('<option selected></option>');
                    for (let i = 0; i < shop_.length; i++) {

                        $('#errorShop').append("<option value=" + shop_[i]['IDShop'] + ">" + shop_[i]['Shop_name'] + "</option>");
                        $('#positionDetect').append("<option>" + shop_[i]['Shop_name'] + "</option>");
                    }


                    $('#inf4M').append('<option detected value=""></option>');
                    for (let i = 0; i < inf4M.length; i++) {

                        $('#inf4M').append("<option value=" + inf4M[i]['ID'] + ">" + inf4M[i]['NAME'] + "</option>");
                    }

                    $('#tinhhuong').append('<option value=""></option>');
                    for (let i = 0; i < tinhhuong.length; i++) {

                        $('#tinhhuong').append("<option value=" + tinhhuong[i]['ID'] + ">" + tinhhuong[i]['NAME'] + "</option>");
                    }


                    $('#levelError').append('<option value=""></option>');
                    for (let i = 0; i < level.length; i++) {

                        $('#levelError').append("<option value=" + level[i]['ID'] + ">" + level[i]['LEVEL'] + "</option>");
                    }

                    // $('#typeError option').remove();
                    // $('#typeError').append('<option value=""></option>');
                    // for (let i = 0; i < typeError.length; i++) {

                    //     $('#typeError').append("<option value='" + idError[i] + "'>" + typeError[i] + "</option>");
                    // }
                } else if (result.code == 201)
                    alert("Lỗi lấy thông tin số VIN");
                else if (result.code == 202) alert("Số VIN không đủ. Vui lòng nhập 8 kí tự cuối");
            },
            error: function(error) {
                console.log(error.responseText);
            },
            complete: function() {
                return returnResult;
            }
        });
    }

    this.loadTime = (shop = "", xuong = "") => {
        $.ajax({
            type: "post",
            url: "./be/loadInfo.php",
            data: {
                shop: shop,
                xuong: xuong
            },
            cache: false,
            dataType: "json",
            success: function(result) {

                if (result.code == 200) {

                    let chuyen_ = result.xuong;
                    let to_ = result.to;


                    if (shop != "" && xuong == "") {
                        if (loadEdit == "") {
                            $('#errorChuyen option').remove();
                            $('#errorTo option').remove();
                        }

                        $('#errorChuyen').append('<option detected value=""> </option>');
                        for (let i = 0; i < chuyen_.length; i++) {
                            $('#errorChuyen').append('<option value=' + chuyen_[i]['IDSection'] + '>' + chuyen_[i]['Section_name'] + '</option>');
                        }

                    }
                    if (shop != "" && xuong != "") {

                        $('#errorTo').append('<option detected value=""> </option>')
                        for (let i = 0; i < to_.length; i++) {
                            $('#errorTo').append('<option value=' + to_[i]['IDStation'] + '>' + to_[i]['Station_name'] + '</option>')
                        }

                    }
                }

            },
            error: function(error) {
                console.log(error.responseText);
            },

        });
    }
    this.login = (userName, passWord) => {
        $.ajax({
            url: 'login/login.php',
            type: 'post',
            cache: false,
            data: {
                userName: userName,
                passWord: passWord,
            },
            dataType: 'json',
            success: function(result) {

                if (result.code == 200) {
                    window.location.href = 'thongkeloi.php';
                }
                if (result.code == 201) {
                    alert("Nhập sai thông tin đăng nhập");
                }
            },
            error: function(error) {
                console.log(error.responseText);
            }
        })
    }

    this.saveimg = () => {
        let file1 = $('#imgInp')[0].files[0];
        let file2 = $('#imgInp1')[0].files[0];
        let form1 = new FormData();
        let form2 = new FormData();
        form1.append('file1', file1);
        form1.append('file2', file2);
        $.ajax({
            url: 'be/upImg.php',
            dataType: 'json',
            cache: false,
            type: 'post',
            data: form1,

            contentType: false,
            processData: false,
            success: function(result) {


                if (result.code == 200) sefl.rename(result.pic1, result.pic2);
                if (result.code == 201) alert("Lưu ảnh thất bại");
            },
            error: function(error) {
                console.log(error.responseText);
            }
        })
    }
    this.rename = (path1, path2) => {
        $.ajax({
            url: 'be/renameImg.php',
            dataType: 'json',
            cache: false,
            data: {
                pic1: path1,
                pic2: path2,

                typeError: idErrorGlobal,
            },
            type: 'post',
            success: function(result) {
                console.log(result.id);
                if (result.code == 200) {
                    pathPic1 = result.pic1;
                    pathPic2 = result.pic2;
                    sefl.savedata(idErrorGlobal, idShop, result.id);

                }

            },
            error: function(error) {
                console.log(error.responseText);
            }
        })
    }
    this.loadError = (idShop) => {
        $.ajax({
            url: 'be/loadError.php',
            data: { idShop: idShop },
            type: 'post',
            dataType: 'json',
            cache: false,
            success: function(result) {
                console.log(result);
                if (result.code == 200) {
                    let typeError = result.typeError;
                    $('#typeError option').remove();
                    $('#typeError').append('<option value=""></option>');
                    for (let i = 0; i < typeError.length; i++) {

                        $('#typeError').append("<option value='" + typeError[i]['IDError'] + "'>" + typeError[i]['Error_name'] + "</option>");
                    }
                }
            },
            error: function(error) {
                console.log(error.responseText);
            }

        })
    }
    this.savedata = (idErrorGlobal, idShop, dataId) => {

        let vincode = $('#vincode').val();
        let lot = $('#lot').val();
        let contractNo = $('#contractNo').val();
        let bodyType = $('#bodyType').val();
        let time = $("#datetimepicker1").val();
        let timeError = $('#timeError').val();
        let timeProduct = $('#timeProduct').val();
        //var errorShop = $('#errorShop').val();
        let errorChuyen = $('#errorChuyen').val();
        let errorTo = $('#errorTo').val();
        let human = $('#human').val();
        let positionDetect = $('#positionDetect').val();
        let typeError = idErrorGlobal;
        let inf4M = $('#inf4M').val();
        let tinhhuong = $('#tinhhuong').val();
        let description = $('#description').val();
        let reason = $('#reason').val();
        let note = $('#note').val();
        let idShopData = $('#errorShop').val();
        let amountError = $('#amountError').val();
        let solution = $('#solution').val();
        let id_ = dataId;
        let level = $('#levelError').val();
        let objData = {
            vincode: vincode,
            lot: lot,
            contractNo: contractNo,
            bodyType: bodyType,
            time: time,
            timeError: timeError,
            timeProduct: timeProduct,
            errorShop: idShopData,
            errorChuyen: errorChuyen,
            errorTo: errorTo,
            human: human,
            positionDetect: positionDetect,
            typeError: typeError,
            inf4M: inf4M,
            tinhhuong: tinhhuong,
            description: description,
            reason: reason,
            note: note,
            amountError: amountError,
            img1: pathPic1,
            img2: pathPic2,
            solution: solution,
            level: level


        };

        $.ajax({
            url: 'be/saveData.php',
            type: 'post',
            dataType: 'json',
            cache: false,
            data: {
                allData: objData,
                id: id_,
            },
            success: function(result) {
                console.log(result.code);
                if (result.code == 200) {
                    //alert('aaa');
                    // $('#contentResult').empty();
                    // $('#contentResult').append('Lưu thành công dữ liệu!', 'success');
                    // $('#messResult').modal('toggle');
                    sefl.showMesss("Lưu thành công dữ liệu!", 'success')
                } else if (result.code == 201) {
                    // $('#contentResult').empty();
                    // $('#contentResult').append('LƯU THẤT BẠI!' + result.error, 'error');
                    // $('#messResult').modal('toggle');
                    sefl.showMesss("Lỗi lưu dữ liệu!" + result.error + "", 'error')
                }
            },
            error: function(error) {
                console.log(error.responseText)
            }
        })

    }
    this.showMesss = (content, status) => {
        // $('#save').attr('data-toggle', 'modal');
        // $('#save').attr('data-target', '#messResult');
        // $('#contentResult').append(content);
        //alert(content);


        Swal.fire({
            // position: 'top-end',
            icon: status,
            title: content,
            showConfirmButton: false,
            timer: 1500
        }).then((result) => {
            if (status == 'success')
                location.reload();
        })

    }
    this.changeDes = () => {
        $.ajax({
            url: 'be/loadDes.php',
            type: 'post',
            dataType: 'json',
            cache: false,
            success: function(result) {
                //console.log(result);
                var data = {};


                // for (let i = 0; i < result.desc.length; i++) {
                //     data = result.des[i];
                // }
                //console.log(data);
                if (result.code == 200) {
                    data = result.typeError;
                    $("#description").autocomplete({
                        source: data
                    });
                }
            },
            error: function(error) {
                console.log(error.responseText);
            }
        })
    }
    this.loadListError = (userSubmit, page) => {
        $.ajax({
            url: 'be/loadListError.php',
            type: 'get',
            data: {
                userSubmit: userSubmit,
                currentPage: page,
                limit: 20,
            },
            dataType: 'json',
            cache: false,
            success: function(result) {
                console.log(result);
                let html = '';
                let pagination = '';
                let list = result.list
                let totalPage = result.totalPage;
                let currentPage = result.currentPage;
                let limit = result.limit;
                if (result.code == 200) {
                    for (let i = 0; i < list.length; i++) {
                        html += `
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="` + list[i]['ID'] + `" name="options[]" value="1">
                                    <label for="checkbox1"></label>
                                </span>
                            </td>
                            <td>` + list[i]['ID'] + `</td>
                            <td>` + list[i]['VIN_CODE'] + `</td>
                            <td>` + list[i]['MODEL'] + `</td>
                            <td>` + list[i]['TYPE_ERROR'] + `</td>
                            <td>` + list[i]['DATETIME'] + `</td>
                            <td>
                                <a href="#editEmployeeModal" value='` + list[i]['ID'] + `' class="edit" data-toggle="modal"><i class="material-icons"  id="` + list[i]['ID'] + `" data-toggle="tooltip"  title="Edit">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal" value='` + list[i]['ID'] + `' class="delete" data-toggle="modal"><i class="material-icons"  id="` + list[i]['ID'] + `" title="Delete">&#xE872;</i></a>
                            </td>
                    </tr>`;
                    }
                    $('#listData').append(html);

                    $('.clearfix').append('<div class="hint-text">Showing <b>' + limit + '</b> out of <b>25</b> entries</div> <ul class="pagination"  style="width: 100%;overflow:auto;">')

                    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                    if (currentPage > 1 && totalPage > 1) {
                        $('.pagination').append('<li class="page-item"><a class="page-link" id="prevPage" href="loadlist.php?page=' + (currentPage - 1) + '">Prev</a></li>')

                    }
                    for (let j = 1; j <= totalPage; j++) {
                        // Nếu là trang hiện tại thì hiển thị thẻ span
                        // ngược lại hiển thị thẻ a
                        if (j == currentPage) {
                            $('.pagination').append('<li class="page-item active"><a class="page-link" href="loadlist.php?page=' + j + '">' + j + '</a></li>');
                        } else {

                            $('.pagination').append('<li class="page-item"><a href="loadlist.php?page=' + j + '">' + j + '</a></li>');
                        }
                    }
                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                    if (currentPage < totalPage && totalPage > 1) {
                        currentPage = parseInt(currentPage) + 1;
                        console.log(currentPage);

                        $('.pagination').append('<li class="page-item"><a class="page-link" id="nextPage" href="loadlist.php?page=' + currentPage + '">Next</a></li>');
                    }
                    $('.clearfix').append('</ul>')

                }
            },
            error: function(error) {
                console.log(error);
            }
        })
    }
    this.deleteData = (id) => {
        $('#deleteEmployeeModal').modal('toggle')
        $.ajax({
            url: 'be/deleteData.php',
            data: { id: id },
            type: 'post',
            dataType: 'json',
            cache: false,
            success: function(result) {
                if (result.code == 200) {
                    sefl.showMesss("Đã xoá thành công", "success");
                } else {
                    sefl.showMesss("Không xoá được dữ liệu", "error");
                }
            },
            error: function(error) {
                sefl.showMesss("Lỗi trong quá trình xoá dữ liệu" + error, "error");
            },
            complete: function(params) {
                window.reload();
            }
        })
    }

}
var _doit = new doit();