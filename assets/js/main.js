function doit() {
    var sefl = this;
    this.loadVincode = (vincode) => {
        let vinCode = vincode;
        let returnResult = true;
        $.ajax({
            type: "post",
            url: "./be/getInfoVin.php",
            data: {
                vincode: vinCode,

            },
            dataType: "json",
            success: function(result) {

                if (result.code == 200) {


                    let time = result.time;
                    let shop_ = result.shop;
                    let inf4M = result.if4M;
                    let tinhhuong = result.tinhhuong;
                    let typeError = result.typeError;
                    let idError = result.idError;
                    $('#contractNo').val(result.contractNo);
                    $('#lot').val(result.lot);
                    $('#bodyType').val(result.bodyType);
                    $('#vincode').val(result.vincode);

                    $('#timeError option').remove();
                    $('#timeError').append('<option></option>');
                    for (let i = 0; i < time.length; i++) {
                        $('#timeError').append('<option>' + time[i] + '</option>');
                        $('#timeProduct').append('<option>' + time[i] + '</option>');

                    }
                    $('#errorShop option').remove();
                    $('#errorShop').append('<option value="" selected></option>');
                    $('#positionDetect option').remove();
                    $('#positionDetect').append('<option selected></option>');
                    for (let i = 0; i < shop_.length; i++) {

                        $('#errorShop').append("<option value=" + shop_[i]['IDShop'] + ">" + shop_[i]['Shop_name'] + "</option>");
                        $('#positionDetect').append("<option>" + shop_[i]['Shop_name'] + "</option>");
                    }

                    $('#inf4M option').remove();
                    $('#inf4M').append('<option></option>');
                    for (let i = 0; i < inf4M.length; i++) {

                        $('#inf4M').append("<option>" + inf4M[i] + "</option>");
                    }
                    $('#tinhhuong option').remove();
                    $('#tinhhuong').append('<option value=""></option>');
                    for (let i = 0; i < tinhhuong.length; i++) {

                        $('#tinhhuong').append("<option value=" + tinhhuong[i]['ID'] + ">" + tinhhuong[i]['NAME'] + "</option>");
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
                        $('#errorChuyen option').remove();
                        $('#errorChuyen').append('<option> </option>');
                        for (let i = 0; i < chuyen_.length; i++) {
                            $('#errorChuyen').append('<option>' + chuyen_[i] + '</option>');
                        }

                    }
                    if (shop != "" && xuong != "") {
                        $('#errorTo option').remove();
                        $('#errorTo').append('<option> </option>')
                        for (let i = 0; i < to_.length; i++) {
                            $('#errorTo').append('<option>' + to_[i] + '</option>')
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
                id: '1234',
                vincode: 'aaa',
            },
            type: 'post',
            success: function(result) {

                if (result.code == 200) {
                    console.log("rename thành công");
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
    this.savedata = (idErrorGlobal, idShop) => {

        let vincode = $('#vincode').val();
        let lot = $('#lot').val();
        let contractNo = $('#contractNo').val();
        let bodyType = $('#bodyType').val();
        let time = $('#timePicker').val();
        let timeError = $('#timeError').val();
        let timeProduct = $('#timeProduct').val();
        var errorShop = $('#errorShop').val();
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
        let idShopData = idShop;

        let objData = {
            vincode: vincode,
            lot: lot,
            contractNo: contractNo,
            bodyType: bodyType,
            time: time,
            timeError: timeError,
            timeProduct: timeProduct,
            errorShop: errorShop,
            errorChuyen: errorChuyen,
            errorTo: errorTo,
            human: human,
            positionDetect: positionDetect,
            typeError: typeError,
            inf4M: inf4M,
            tinhhuong: tinhhuong,
            description: description,
            reason: reason,
            note: note

        };
        console.log(objData);
        $.ajax({
            url: 'be/saveData.php',
            type: 'post',
            dataType: 'json',
            cache: false,
            data: {
                allData: objData
            },
            success: function(result) {
                console.log(result);
            },
            error: function(error) {
                console.log(error.responseText)
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
                console.log(result);
                var data = {};
                data = result.typeError;

                // for (let i = 0; i < result.desc.length; i++) {
                //     data = result.des[i];
                // }
                console.log(data);
                if (result.code == 200) {
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
}
var _doit = new doit();