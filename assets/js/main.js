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
                    console.log(result);
                    let time = result.time;
                    let shop_ = result.shop;
                    let inf4M = result.if4M;
                    let tinhhuong = result.tinhhuong;
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
                    $('#errorShop').append('<option></option>');
                    for (let i = 0; i < shop_.length; i++) {

                        $('#errorShop').append('<option>' + shop_[i] + '</option>');
                    }

                    $('#inf4M option').remove();
                    $('#inf4M').append('<option></option>');
                    for (let i = 0; i < inf4M.length; i++) {

                        $('#inf4M').append('<option>' + inf4M[i] + '</option>');
                    }
                    $('#tinhhuong option').remove();
                    $('#tinhhuong').append('<option></option>');
                    for (let i = 0; i < tinhhuong.length; i++) {

                        $('#tinhhuong').append('<option>' + tinhhuong[i] + '</option>');
                    }
                } else if (result.code == 201)
                    alert("Lỗi lấy thông tin số VIN");
                else if (result.code == 202) alert("Số VIN không đủ. Vui lòng nhập 8 kí tự cuối");
            },
            error: function(error) {
                console.log(error);
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
                console.log(result);
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
                console.log(result);
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
                console.log(result);

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
                console.log(result);
                if (result.code == 200) {
                    console.log("rename thành công");
                }
            },
            error: function(error) {
                console.log(error.responseText);
            }
        })
    }
    this.savedata = () => {
        let vincode = $('#vincode').val();
        let lot = $('#lot').val();
        let contractNo = $('#contractNo').val();
        let bodyType = $('#bodyType').val();
        let time = $('#datetimepicker1')
        let timeError = $('#timeError').val();
        let timeProduct = $('#timeProduct').val();
        let errorShop = $('errorShop').val();
        let errorChuyen = $('errorChuyen').val();
        let errorTo = $('#errorTo').val();
        let human = $('#human').val();
        let positionDetect = $('#positionDetect').val();
        let typeError = $('#typeError').val();
        let inf4M = $('#inf4M').val();
        let tinhhuong = $('#tinhhuong').val();
        let description = $('#description').val();
        let reason = $('#reason').val();
        let note = $('#note').val();

    }
}
var _doit = new doit();