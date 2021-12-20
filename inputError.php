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