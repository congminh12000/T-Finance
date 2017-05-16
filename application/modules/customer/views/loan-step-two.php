<?php $this->load->view("partial/header"); ?>

<?php
$baseUrl = $this->config->base_url();
?>

<div style="position:relative;" class="banmuonvay"><h3 style="position:absolute; top:-91%; left: 6%; color:#6d0100;"><img width="53px;" src="<?php echo base_url('static/customer/img/arrow.png'); ?>"> BẠN ĐANG MONG MUỐN VAY</h3><br><br></div>
<div class="body2">
    <div class="container">
        <div class="row text-center">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-push-1">
                <div class="row">
                    <ul class="nav nav-tabs text-center form-mong-muon"><br><br>
                        <li class="active" id="ele-the-chap">
                            <a class="vay-the-chap-button" data-toggle="tab" href="#thechap">
                                <div class="title-form">VAY THẾ CHẤP</div><br>
                                <div style="text-align:left;">Bạn cần <strong>chứng minh nguồn thu nhập</strong> để trả nợ và <strong>tài sản để thế chấp</strong>.<br>
                                    Ví dụ:Quyền sử dụng đất(sổ đỏ), xe ô tô,...,tài sản có giá trị khác.<br>
                                </div>
                            </a></li>
                        <li id="ele-tin-chap">
                            <a class="vay-the-chap-button" data-toggle="tab" href="#tinchap">
                                <div class="title-form">VAY TÍN CHẤP</div><br>
                                <div style="text-align:left;">Bạn <strong>không cần thế chấp</strong> bất cứ tài sản gì chỉ cần <strong>chứng minh thu nhập</strong>, <span style="text-decoration:underline;">hồ sơ đơn giản, giải ngân nhanh, khoản vay lớn</span><br>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="thechap" class="tab-pane fade in active">
                            <br><h3 style="color: #6d0100; letter-spacing: 4px; font-weight: bold;">TÀI SẢN THẾ CHẤP</h3><br>
                            <img src="<?php echo base_url('static/customer/img/break-line.png'); ?>"/><br><br>
                            <p style="color: #6d0100;">Bạn có thể chọn nhiều hình thức thế chấp tài sản mà bạn muốn</p><br>

                            <div class="row">
                                <div class="col-md-6 col-md-push-3">
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
                                        <div class="box_step2_tstc text-center">
                                            <img class="img-loan" data-value="oto" src="<?php echo $baseUrl . 'static/customer/img/step-2-tstc-6.png'; ?>" alt="T-Finance - Dịch vụ tư vấn tài chính trực tuyến">
                                            <h4>Ô TÔ</h4>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
                                    <div class="box_step2_tstc text-center">
                                        <img class="img-loan" data-value="quyen-su-dung-dat" src="<?php echo $baseUrl . 'static/customer/img/step-2-tstc-1.png'; ?>" alt="T-Finance - Dịch vụ tư vấn tài chính trực tuyến">
                                        <h4>QUYỀN SỬ DỤNG ĐẤT</h4>
                                    </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
                                    <div class="box_step2_tstc text-center">
                                        <img class="img-loan" data-value="khac" src="<?php echo $baseUrl . 'static/customer/img/step-2-tstc-7.png'; ?>" alt="T-Finance - Dịch vụ tư vấn tài chính trực tuyến">
                                        <h4>KHÁC</h4>
                                    </div>
                                    </div>
                                </div>
                            </div> <!-- end row block1-->
                        </div>
                        <div id="tinchap" class="tab-pane fade">
                            <br><h3 style="color: #6d0100; letter-spacing: 4px; font-weight: bold;">CHỨNG MINH THU NHẬP</h3><br>
                            <img src="<?php echo base_url('static/customer/img/break-line.png'); ?>"/><br><br>
                            <p style="color: #6d0100;">Bạn có thể chọn nhiều hình thức chứng minh thu nhập mà bạn đang sở hữu.</p><br>

                            <div class="row">
                                <div class="box_step1 text-center">
                                    <img class="img-loan" data-value="hop-dong-lao-dong" src="<?php echo $baseUrl . 'static/customer/img/step-2-tstc-1.png'; ?>" alt="T-Finance - Dịch vụ tư vấn tài chính trực tuyến">
                                    <h4>HỢP ĐỒNG LAO ĐỘNG</h4>
                                </div>
                                <div class="box_step1 text-center">
                                    <img class="img-loan" data-value="the-tin-dung" src="<?php echo $baseUrl . 'static/customer/img/step-2-tstc-2.png'; ?>" alt="T-Finance - Dịch vụ tư vấn tài chính trực tuyến">
                                    <h4>THẺ TÍN DỤNG</h4>
                                </div>
                                <div class="box_step1 text-center">
                                    <img class="img-loan" data-value="bao-hiem-nhan-tho" src="<?php echo $baseUrl . 'static/customer/img/step-2-tstc-3.png'; ?>" alt="T-Finance - Dịch vụ tư vấn tài chính trực tuyến">
                                    <h4>BẢO HIỂM NHÂN THỌ</h4>
                                </div>
                                <div class="box_step1 text-center">
                                    <img class="img-loan" data-value="lam-viec-tu-do" src="<?php echo $baseUrl . 'static/customer/img/step-2-tstc-4.png'; ?>" alt="T-Finance - Dịch vụ tư vấn tài chính trực tuyến">
                                    <h4>LÀM VIỆC TỰ DO</h4>
                                </div>
                                <div class="box_step1 text-center">
                                    <img class="img-loan" data-value="giay-phep-kinh-doanh" src="<?php echo $baseUrl . 'static/customer/img/step-2-tstc-5.png'; ?>" alt="T-Finance - Dịch vụ tư vấn tài chính trực tuyến">
                                    <h4>GIẤY PHÉP KINH DOANH</h4>
                                </div>
                            </div> <!-- end row block1-->
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-md-push-3">
                                <button class="button-comfirm" id="btn-complete-step-2">XÁC NHẬN</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row block1-->
            </div>
        </div> <!-- end row-->
    </div> <!-- end container-->
</div> <!-- end body1-->

<?php $this->load->view("partial/footer"); ?>
