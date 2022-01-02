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
                id: id,
                user: user
            },
            dataType: "json",
            cache: false,
            success: function(result) {
                console.log(result);

                if (result.code == 200) {
                    let loadList = result.listLoad;
                    console.log(loadList);
                    // console.log(loadList);
                    let time = result.time;
                    let shop_ = result.shop;
                    let inf4M = result.if4M;
                    let postionID = result.position;


                    let tinhhuong = result.tinhhuong;
                    let level = result.level;

                    if (loadEdit == "") {
                        $('#contractNo').val(result.contractNo);
                        $('#lot').val(result.lot);
                        $('#bodyType').val(result.bodyType);
                        $('#vincode').val(result.vincode);
                    } else {
                        $('#idError').empty();
                        $('#idError').append(loadList['ID']);
                        $('#vincode').val(loadList['VIN_CODE']);
                        $('#contractNo').val(loadList['CONTRACT_NO']);
                        $('#lot').val(loadList['LOT']);
                        $('#bodyType').val(loadList['MODEL']);

                    }

                    if (loadEdit == "") {
                        $('#timeError option').remove();
                        $('#timeProduct option').remove();
                        $('#errorShop option').remove();
                        $('#inf4M option').remove();
                        $('#tinhhuong option').remove();
                        $('#levelError option').remove();
                        $('#positionDetect option').remove();

                    } else {

                        $('#timeError').append('<option selected>' + loadList['DETECT_TIME'] + '</option>');
                        $('#timeProduct').append('<option selected>' + loadList['PRODUCT_TIME'] + '</option>');
                        $('#errorShop').append("<option value='" + loadList['SHOP'] + "' selected>" + loadList[0]['Shop_name'] + "</option>");
                        $('#positionDetect').append('<option value="' + loadList['POSITION'] + '" selected> ' + loadList[6]['Position_name'] + '</option>');
                        $('#errorChuyen').append('<option value="' + loadList['SECTION'] + '" selected> ' + loadList[1]['Section_name'] + '</option>');
                        $('#errorTo').append('<option value="' + loadList['STATION'] + '" selected> ' + loadList[2]['Station_name'] + '</option>');
                        $('#inf4M').append('<option selected value="' + loadList['M4M'] + '">' + loadList[3]['NAME'] + '</option>');
                        $('#human').val(loadList['RESPON']);
                        $('#amountError').val(loadList['AMOUNT_ERROR']);
                        $('#typeError').append('<option selected value="' + loadList['TYPE_ERROR'] + '">' + loadList[7]['Error_name'] + '</option>');
                        $('#levelError').append('<option selected value="' + loadList['LEVEL'] + '">' + loadList[5]['NAME'] + '</option>');
                        $('#tinhhuong').append('<option selected value="' + loadList['KINDMAN'] + '">' + loadList[4]['NAME'] + '</option>');
                        $('#description').val(loadList['DESC_ERROR']);
                        $('#reason').val(loadList['CAUSE']);
                        $('#solution').val(loadList['SOLUTED']);
                        $('#note').val(loadList['NOTE']);
                        seq = loadList['SEQ'];
                        if (loadList['IMG'] != '') {

                            var imgSource = loadList['IMG'];
                            pathPic1 = imgSource;
                            var arrIMG = imgSource.split('/');
                            var srcIMG = '';
                            if (arrIMG[0] == '..') {
                                for (let i = 1; i < arrIMG.length; i++) {
                                    if (i == 1) srcIMG = arrIMG[i];
                                    else
                                        srcIMG = srcIMG + '/' + arrIMG[i];
                                }
                            }

                            $('#pic1').append('<img id="blah" class="rounded" src="' + srcIMG + '?version=' + Math.floor((Math.random() * 10000000) + 1) + '" alt="your image" style="width: 100%;"/>');
                        }
                        if (loadList['IMG2'] != '') {
                            var imgSource1 = loadList['IMG2'];
                            pathPic2 = imgSource1;
                            var arrIMG1 = imgSource1.split('/');
                            var srcIMG1 = '';
                            if (arrIMG1[0] == '..') {
                                for (let i = 1; i < arrIMG1.length; i++) {
                                    if (i == 1) srcIMG1 = arrIMG1[i];
                                    else
                                        srcIMG1 = srcIMG1 + '/' + arrIMG1[i];
                                }
                            }
                            $('#pic2').append('<img id="blah1" class="rounded" src="' + srcIMG1 + '?version=' + Math.floor((Math.random() * 10000000) + 1) + '" alt="your image" style="width: 100%;"/>');
                        }


                        sefl.loadTime($('#errorShop').val(), $('#errorTo').val());
                        sefl.loadError($('#errorShop').val());

                    }

                    $('#timeError').append('<option></option>');
                    $('#timeProduct').append('<option></option>');
                    for (let i = 0; i < time.length; i++) {
                        $('#timeError').append('<option>' + time[i] + '</option>');
                        $('#timeProduct').append('<option>' + time[i] + '</option>');

                    }

                    $('#errorShop').append('<option value=""></option>');


                    for (let i = 0; i < shop_.length; i++) {

                        $('#errorShop').append("<option value=" + shop_[i]['IDShop'] + ">" + shop_[i]['Shop_name'] + "</option>");

                    }

                    $('#positionDetect').append('<option ></option>');
                    for (let i = 0; i < postionID.length; i++) {


                        $('#positionDetect').append("<option value=" + postionID[i]['IDPosition'] + ">" + postionID[i]['Position_name'] + "</option>");
                    }


                    $('#inf4M').append('<option value=""></option>');
                    for (let i = 0; i < inf4M.length; i++) {

                        $('#inf4M').append("<option value=" + inf4M[i]['ID'] + ">" + inf4M[i]['NAME'] + "</option>");
                    }

                    $('#tinhhuong').append('<option value=""></option>');
                    for (let i = 0; i < tinhhuong.length; i++) {

                        $('#tinhhuong').append("<option value=" + tinhhuong[i]['ID'] + ">" + tinhhuong[i]['NAME'] + "</option>");
                    }


                    $('#levelError').append('<option selected value="0">0</option>');
                    for (let i = 0; i < level.length; i++) {

                        $('#levelError').append("<option value=" + level[i]['ID'] + ">" + level[i]['LEVEL'] + "</option>");
                    }

                    // $('#typeError option').remove();
                    // $('#typeError').append('<option value=""></option>');
                    // for (let i = 0; i < typeError.length; i++) {

                    //     $('#typeError').append("<option value='" + idError[i] + "'>" + typeError[i] + "</option>");
                    // }
                } else if (result.code == 201) {

                    alert("Lỗi lấy thông tin số VIN");

                    $('#vincode').focus();
                } else if (result.code == 202) {
                    alert("Số VIN không đủ. Vui lòng nhập 8 kí tự cuối");

                    $('#vincode').focus();

                }
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


                    if (loadEdit != "") {
                        $('#errorChuyen').append('<option value=""> </option>');

                        for (let i = 0; i < chuyen_.length; i++) {
                            $('#errorChuyen').append('<option value=' + chuyen_[i]['IDSection'] + '>' + chuyen_[i]['Section_name'] + '</option>');
                        }
                        $('#errorTo').append('<option value=""> </option>');
                        for (let i = 0; i < to_.length; i++) {
                            $('#errorTo').append('<option value=' + to_[i]['IDStation'] + '>' + to_[i]['Station_name'] + '</option>')
                        }
                    } else {
                        if (shop != "" && xuong == "") {


                            $('#errorChuyen option').remove();
                            $('#errorTo option').remove();
                            $('#errorChuyen').append('<option value=""> </option>');
                            for (let i = 0; i < chuyen_.length; i++) {
                                $('#errorChuyen').append('<option value=' + chuyen_[i]['IDSection'] + '>' + chuyen_[i]['Section_name'] + '</option>');
                            }



                        }
                        if (shop != "" && xuong != "") {
                            $('#errorTo option').remove();
                            $('#errorChuyen').append('<option value=""> </option>');
                            $('#errorTo').append('<option value=""> </option>')
                            for (let i = 0; i < to_.length; i++) {
                                $('#errorTo').append('<option value=' + to_[i]['IDStation'] + '>' + to_[i]['Station_name'] + '</option>')
                            }
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
        let typeError = $('#typeError').val();
        let idLoad = $('#idError').text();
        $.ajax({
            url: 'be/renameImg.php',
            dataType: 'json',
            cache: false,
            data: {
                pic1: path1,
                pic2: path2,
                idLoad: idLoad,
                typeError: typeError,
            },
            type: 'post',
            success: function(result) {
                console.log(result.id);
                if (result.code == 200) {
                    if (pathPic1 == '')
                        pathPic1 = result.pic1;
                    if (pathPic2 == '')
                        pathPic2 = result.pic2;
                    sefl.savedata(typeError, idShop, result.id);

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

                if (result.code == 200) {
                    let typeError = result.typeError;

                    if (loadEdit == "") $('#typeError option').remove();
                    $('#typeError').append('<option value=""></option>');
                    for (let i = 0; i < typeError.length; i++) {

                        $('#typeError').append("<option value='" + typeError[i]['IDError'] + "'>" + typeError[i]['Error_name'] + "</option>");
                    }
                }
            },
            error: function(error) {
                console.log(error.responseText);
            },
            complete: function(params) {
                loadEdit = '';
                window.localStorage.setItem('id', '');
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
        let typeError = $('#typeError').val();
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
        let idError = $('#idError').text();
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
            level: level,
            seq: seq,

        };

        $.ajax({
            url: 'be/saveData.php',
            type: 'post',
            dataType: 'json',
            cache: false,
            data: {
                allData: objData,
                id: id_,
                idErrorLoad: idError,
            },
            success: function(result) {
                console.log(result);
                if (result.code == 200) {
                    //alert('aaa');
                    // $('#contentResult').empty();
                    // $('#contentResult').append('Lưu thành công dữ liệu!', 'success');
                    // $('#messResult').modal('toggle');

                    setTimeout(() => {
                        $('#save').addClass('success');
                    }, 1000);



                    setTimeout(function() {

                        sefl.showMesss("Lưu thành công dữ liệu!", 'success')
                    }, 2000)

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
            if (status == 'success') {
                pathPic2 = '';
                pathPic1 = '';
                seq = '';
                location.reload();
            }

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
                console.log(error.responseText);
                sefl.showMesss("Lỗi trong quá trình xoá dữ liệu" + error, "error");
            },
            complete: function(params) {

            }
        })
    }

}
var _doit = new doit();