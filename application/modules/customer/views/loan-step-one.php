<?php $this->load->view("partial/header"); ?>

<?php
$baseUrl = $this->config->base_url();
?>

<div style="position:relative;" class="banmuonvay"><h3 style="position:absolute; top:-91%; left: 6%; color:#6d0100;"><img width="53px;" src="<?php echo $baseUrl . 'static/customer/img/arrow.png'; ?>"> BẠN ĐANG MONG MUỐN VAY</h3><br><br></div>
<div class="body2">
    <div class="container">
        <div class="row text-center">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-push-1">

                <div class="row">
                    <div class="box_step1 text-center">
                        <img class="img-loan" data-value="vay-mua-nha" src="<?php echo $baseUrl . 'static/customer/img/step1-vaymuanha.png'; ?>" alt="T-Finance - Dịch vụ tư vấn tài chính trực tuyến">
                        <h4>VAY MUA NHÀ</h4>
                    </div>
                    <div class="box_step1 text-center">
                        <img class="img-loan" data-value="vay-mua-oto" src="<?php echo $baseUrl . 'static/customer/img/step1-vaymuaoto.png'; ?>" alt="T-Finance - Dịch vụ tư vấn tài chính trực tuyến">
                        <h4>VAY MUA Ô TÔ</h4>
                    </div>
                    <div class="box_step1 text-center">
                        <img class="img-loan" data-value="vay-mua-xe-may" src="<?php echo $baseUrl . 'static/customer/img/step1-vaymuaxemay.png'; ?>" alt="T-Finance - Dịch vụ tư vấn tài chính trực tuyến">
                        <h4>VAY MUA XE MÁY</h4>
                    </div>
                    <div class="box_step1 text-center">
                        <img class="img-loan" data-value="vay-tieu-dung" src="<?php echo $baseUrl . 'static/customer/img/step1-vaytieudung.png'; ?>" alt="T-Finance - Dịch vụ tư vấn tài chính trực tuyến">
                        <h4>VAY TIÊU DÙNG</h4>
                    </div>
                    <div class="box_step1 text-center">
                        <img class="img-loan" data-value="muc-dich-khac" src="<?php echo $baseUrl . 'static/customer/img/step1-mucdichkhac.png'; ?>" alt="T-Finance - Dịch vụ tư vấn tài chính trực tuyến">
                        <h4>MỤC ĐÍCH KHÁC</h4>
                    </div>
                </div> <!-- end row block1-->
                <div class="row box-notes">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-push-1 text-center">
                        <span class="notes">(Vui lòng chọn mục đích vay.)</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <div class="khung-boder">
                            <div class="title-khung">KHOẢN VAY</div>
                            <div class="tuy-than-form">
                                <label>Số tiền vay: <span class="color-red" id="money-loan-value"></span></label>
                                <div class="margin-top-negative-30">
                                    <input type="text" id="money-loan" name="money-loan" value="" />
                                </div>

                                <label>Vay trong: <span class="color-red" id="month-loan-value"></span></label>
                                <div class="margin-top-negative-30">
                                    <input type="text" id="month-loan" name="month-loan" value="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="khung-boder">
                            <div class="title-khung tuy-than-title">TÙY THÂN</div>
                            <form class="tuy-than-form">
                                <label class="font-tuy-than">
                                    <input type="checkbox" name="vehicle" class="item-loan" value="cmnd"><i class="fa fa-picture-o" aria-hidden="true"></i> Chứng minh nhân dân
                                </label><br>
                                <label class="font-tuy-than">
                                    <input type="checkbox" name="vehicle" class="item-loan" value="bang-lai-xe"><i class="fa fa-folder-open" aria-hidden="true"></i> Bằng lái xe
                                </label><br>
                                <label class="font-tuy-than">
                                    <input type="checkbox" name="vehicle" class="item-loan" value="ho-chieu"><i class="fa fa-file-powerpoint-o" aria-hidden="true"></i> Hộ chiếu
                                </label><br>
                                <label class="font-tuy-than">
                                    <input type="checkbox" name="vehicle" class="item-loan" value="giay-to-khac"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Giấy tờ khác
                                </label>
                            </form>
                        </div>
                    </div>
                </div> <!-- end row block2-->           
                <button type="button" id="btn-complete-step-1" class="btn btn-step button100" style="display: none">CHỈ CÒN VÀI BƯỚC NỮA MỜI BẠN TIẾP TỤC ĐỂ HOÀN TẤT HỒ SƠ.</button>
            </div>
        </div> <!-- end row-->
    </div> <!-- end container-->
</div> <!-- end body1-->

<?php $this->load->view("partial/footer"); ?>
