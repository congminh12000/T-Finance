<?php $this->load->view("partial/header"); ?>

<?php
$arrTimeS = ['08:00', '08:15', '08:30', '08:45', '09:00', '09:15', '09:30', '09:45', '10:00', '10:15', '10:30', '10:45', '11:00', '11:15', '11:30', '11:45'];
$arrTimeT = ['12:00', '12:15', '12:30', '12:45', '13:00', '13:15', '13:30', '13:45', '14:00', '14:15', '14:30', '14:45'];
$arrTimeC = ['15:00', '15:15', '15:30', '15:45', '16:00', '16:15', '16:30', '16:45', '17:00', '17:15', '17:30', '17:45', '18:00', '18:15', '18:30', '18:45', '19:00', '19:15', '19:30', '19:45', '20:00'];
?>

<div style="position: relative;" class="banmuonvay"><h3 style="position:absolute;top:-91%;left: 6%;color:#6d0100;width: 500px;"><img width="53px;" src="<?php echo base_url('static/customer/img/arrow.png'); ?>"> HẸN LỊCH TƯ VẤN TRỰC TIẾP</h3><br><br></div>
<div class="body2" id="body-hop-dong-lao-dong">
    <div class="container">
        <div class="row text-center">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-lao-dong" id="list-ngay">
                    <!-- get list at JS -->
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-xs-12 col-sm-12 col-md-6 col-md-push-3 col-lg-6 col-lg-push-3 nav nav-tabs" style="border-bottom:0px">
                <a class="btn btn-main form-button-stc stc active" data-value="sang" data-toggle="tab" href="#sang">SÁNG</a>
                <a class="btn btn-main form-button-stc stc" data-value="trua" data-toggle="tab" href="#trua">TRƯA</a>
                <a class="btn btn-main form-button-stc stc" data-value="chieu" data-toggle="tab" href="#chieu">CHIỀU</a>
                <br><br>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-push-2 tab-content">
                <span id="sang" class="text-center tab-pane fade in active">
                    <?php foreach ($arrTimeS as $time): ?>
                        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
                            <span class="time">
                                <button class="form-button-4 box-time" data-value="<?php echo $time; ?>"><?php echo $time; ?></button>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </span>
                <span id="trua" class="text-center tab-pane fade">
                    <?php foreach ($arrTimeT as $time): ?>
                        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
                            <span class="time">
                                <button class="form-button-4 box-time" data-value="<?php echo $time; ?>"><?php echo $time; ?></button>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </span>
                <span id="chieu" class="text-center tab-pane fade">
                    <?php foreach ($arrTimeC as $time): ?>
                        <div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
                            <span class="time">
                                <button class="form-button-4 box-time" data-value="<?php echo $time; ?>"><?php echo $time; ?></button>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </span>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-xs-12 col-sm-12 col-md-6 col-md-push-3 col-lg-6 col-lg-push-3">
                <div class="form-lao-dong"><br><br>
                    <h3 style="color: #6d0100; letter-spacing: 4px; font-weight: bold;">CÁCH LIÊN HỆ VỚI BẠN</h3>
                    <input type="text" id="so-dien-thoai" placeholder="SỐ ĐIỆN THOẠI ..." value=""><br>
                    <input type="text" id="facebook" placeholder="FACEBOOK ..." value=""><br>
                    <input type="text" id="email" placeholder="EMAIL ..." value=""><br>
                    <input type="text" id="zalo" placeholder="ZALO ..." value=""><br>
                    <input type="text" id="ma-khuyen-mai" placeholder="MÃ KHUYẾN MÃI ..." value=""><br>
                    <button id="btn-complete-step-5" style="padding: 5px 20px; background: #6d0100; color: #fff;border: 2px solid #6d0100;border-radius: 8px;">HOÀN TẤT HỒ SƠ</button>
                </div>
            </div>
        </div> <!-- end row-->
    </div> <!-- end container-->
</div> <!-- end body1-->

<?php $this->load->view("partial/footer"); ?>