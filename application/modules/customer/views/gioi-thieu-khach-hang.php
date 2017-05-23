<?php $this->load->view("partial/header"); ?>

<div style="position:relative;"><h3 style="position:absolute; top:-105%; left: 6%; color:#6d0100;"><img width="53px;" src="<?php echo base_url('static/customer/img/arrow.png'); ?>">GIỚI THIỆU KHÁCH HÀNG</h3><br><br></div>
<div class="body2" id="body-hop-dong-lao-dong">
    <div class="container">
        <form id="frm-gtkh" method="POST" action="<?php echo base_url('customer/completeGioiThieuKhachHang'); ?>">
            <div class="row text-center">
                <?php //echo validation_errors(); ?>
                <?php// echo form_open('customer/completeGioiThieuKhachHang'); ?>
                <div class="hidden-xs hidden-sm col-md-3 col-lg-3">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> 
                    <div class="form-lao-dong">    
                        <h3 style="color: #6d0100; letter-spacing: 4px; font-weight: bold;">CÁCH LIÊN HỆ VỚI BẠN</h3><br>
                        <div class="error" id="lhht_error" style="color:#dd4b39"><?php echo form_error('lien-he-ho-va-ten')?></div>
                        <input type="text" name="lien-he-ho-va-ten" id="lien-he-ho-va-ten" placeholder="HỌ VÀ TÊN ..." value="<?php echo set_value('lien-he-ho-va-ten')?>"></span><br>
                        <div class="error" id="lhdc_error" style="color:#dd4b39"><?php echo form_error('lien-he-dia-chi')?></div>
                        <input type="text" name="lien-he-dia-chi" id="lien-he-dia-chi" placeholder="ĐỊA CHỈ ..." value="<?php echo set_value('lien-he-dia-chi')?>"><br>
                        <div class="error" id="lhsdt_error" style="color:#dd4b39"><?php echo form_error('lien-he-so-dien-thoai')?></div>
                        <input type="text" name="lien-he-so-dien-thoai" id="lien-he-so-dien-thoai" placeholder="SỐ ĐIỆN THOẠI ..." value="<?php echo set_value('lien-he-so-dien-thoai')?>"><br>
                        <input type="text" name="lien-he-cmnd" id="lien-he-cmnd" placeholder="CMND ..." value=""><br>
                        <input type="text" name="lien-he-ma-khuyen-mai-ca-nhan" id="lien-he-ma-khuyen-mai-ca-nhan" placeholder="MÃ KHUYẾN MÃI CÁ NHÂN ..." value=""><br>
                    </div>
                    <div class="form-lao-dong">
                        <h3 style="color: #6d0100; letter-spacing: 4px; font-weight: bold;">KHÁCH HÀNG BẠN MUỐN GIỚI THIỆU</h3><br>
                        <div class="error" id="gtht_error" style="color:#dd4b39"><?php echo form_error('gioi-thieu-ho-va-ten')?></div>
                        <input type="text" name="gioi-thieu-ho-va-ten" id="gioi-thieu-ho-va-ten" placeholder="HỌ VÀ TÊN ..." value="<?php echo set_value('gioi-thieu-ho-va-ten')?>"><br>
                        <div class="error" id="gtdc_error" style="color:#dd4b39"><?php echo form_error('gioi-thieu-dia-chi')?></div>
                        <input type="text" name="gioi-thieu-dia-chi" id="gioi-thieu-dia-chi" placeholder="ĐỊA CHỈ ..." value="<?php echo set_value('gioi-thieu-dia-chi')?>"><br>
                        <div class="error" id="gtsdt_error" style="color:#dd4b39"><?php echo form_error('gioi-thieu-so-dien-thoai')?></div>
                        <input type="text" name="gioi-thieu-so-dien-thoai" id="gioi-thieu-so-dien-thoai" placeholder="SỐ ĐIỆN THOẠI ..." value="<?php echo set_value('gioi-thieu-so-dien-thoai')?>"><br>
                        <input type="text" name="gioi-thieu-cmnd" id="gioi-thieu-cmnd" placeholder="CMND ..." value=""><br>
                    </div><br><br>
                    <div id="showerror"></div>
                    <button type="submit" class="button-comfirm button100" id="btn-complete-gtkh" name="btn-complete-gtkh">HOÀN TẤT HỒ SƠ VÀ HẸN LỊCH CHO KHÁCH HÀNG</button>
                </div>
                <div class="hidden-xs hidden-sm col-md-3 col-lg-3">
                </div>
            </div> <!-- end row-->
        </form>
    </div> <!-- end container-->
</div> <!-- end body1-->

<?php $this->load->view("partial/footer"); ?>