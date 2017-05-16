<?php $this->load->view("partial/header"); ?>

<div style="position: relative;"><h3 style="position:absolute;top:-91%;left: 6%;color:#6d0100;width: 500px;"><img width="53px;" src="<?php echo base_url('static/customer/img/arrow.png'); ?>"> TRANG CƯ TRÚ</h3><br><br></div>
<div class="row text-center">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-3 col-md-3">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-6 col-md-6">
        <div class="form-bao-hiem"><br><br><br>
            <h3 class="title-bao-hiem">SỔ HỘ KHẨU</h3><br>
            <i><p style="color:#6f0100; font-size: 18px;">Bạn hiện đang cư trú tại địa chỉ đăng ký trong hộ khẩu</p></i><br>
            <button class="form-button-2 so-ho-khau-xac-nhan" data-value="co">CÓ</button> <button class="form-button-2 so-ho-khau-xac-nhan" data-value="khong">KHÔNG</button><br>
            <button class="form-button-3 so-ho-khau-dia-diem" data-value="da-nang">ĐÀ NẴNG</button> <button class="form-button-3 so-ho-khau-dia-diem" data-value="quang-nam">QUẢNG NAM</button> <button class="form-button-3 so-ho-khau-dia-diem" data-value="khac">KHÁC</button><br>
            <br>
            <h3 class="title-bao-hiem">SỔ TẠM TRÚ</h3><br>
            <i><p style="color:#6f0100; font-size: 18px;">Nếu bạn không có hộ khẩu tại Đà Nẵng</p></i> <br>
            <button class="form-button-3 so-tam-tru-thoi-gian" data-value="duoi-6-thang">DƯỚI 6 THÁNG</button> <button class="form-button-3 so-tam-tru-thoi-gian" data-value="tren-6-thang">TRÊN 6 THÁNG</button> <button class="form-button-3 so-tam-tru-thoi-gian" data-value="chua-co">CHƯA CÓ</button><br><br>
            
            <button id="btn-complete-step-4" style="padding: 5px 20px; background: #6d0100; color: #fff;border: 2px solid #6d0100;border-radius: 8px;">BƯỚC CUỐI CÙNG</button><br><br>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-3 col-md-3">
        </div>

    </div>
</div>

<?php $this->load->view("partial/footer"); ?>