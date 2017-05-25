<?php $this->load->view("partial/header"); ?>
<?php
//$arrData = $this->session->flashdata('arrData');
//p(23);
//$arrError = $arrData['arrError'];
//$arrDatas = $arrData['arrData'];
?>
<div style="position:relative;"><h3 style="position:absolute; top:-105%; left: 6%; color:#6d0100;"><img width="53px;" src="<?php echo base_url('static/customer/img/arrow.png'); ?>">GIỚI THIỆU KHÁCH HÀNG</h3><br><br></div>
<div class="body2" id="body-hop-dong-lao-dong">
    <div class="container">

        <!-- khu error -->
        <?php
        if ($error):
            ?>
            <div class="alert alert-danger" role="alert">
                <?php
                    echo '- ' . $error;
                ?>
            </div>
            <?php
        endif;
        ?>

        <form id="frm-gtkh" method="POST" action="">
            <div class="row text-center">
                <?php //if($arrMess){ echo $arrMess; } ?>
                <?php //echo validation_errors(); ?>
                <?php //echo form_open('customer/completeGioiThieuKhachHang'); ?>
                <div class="hidden-xs hidden-sm col-md-3 col-lg-3">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6"> 
                    <div class="form-lao-dong">    
                        <h3 style="color: #6d0100; letter-spacing: 4px; font-weight: bold;">CÁCH LIÊN HỆ VỚI BẠN</h3><br>
                        <input type="text" name="lien-he-ho-va-ten" id="lien-he-ho-va-ten" placeholder="HỌ VÀ TÊN ..." value="<?php echo $arrData['lhhoten'];  ?>"</span><br>
                        <input type="text" name="lien-he-dia-chi" id="lien-he-dia-chi" placeholder="ĐỊA CHỈ ..." value="<?php echo $arrData['lhdiachi'];  ?>"><br>
                        <input type="text" name="lien-he-so-dien-thoai" id="lien-he-so-dien-thoai" placeholder="SỐ ĐIỆN THOẠI ..." value="<?php echo $arrData['lhsdt'];  ?>"><br>
                        <input type="text" name="lien-he-cmnd" id="lien-he-cmnd" placeholder="CMND ..." value=""><br>
                        <input type="text" name="lien-he-ma-khuyen-mai-ca-nhan" id="lien-he-ma-khuyen-mai-ca-nhan" placeholder="MÃ KHUYẾN MÃI CÁ NHÂN ..." value=""><br>
                    </div>
                    <div class="form-lao-dong">
                        <h3 style="color: #6d0100; letter-spacing: 4px; font-weight: bold;">KHÁCH HÀNG BẠN MUỐN GIỚI THIỆU</h3><br>
                        <input type="text" name="gioi-thieu-ho-va-ten" id="gioi-thieu-ho-va-ten" placeholder="HỌ VÀ TÊN ..." value="<?php echo $arrData['gthoten'];  ?>"><br>
                        <input type="text" name="gioi-thieu-dia-chi" id="gioi-thieu-dia-chi" placeholder="ĐỊA CHỈ ..." value="<?php echo $arrData['gtdiachi'];  ?>"><br>
                        <input type="text" name="gioi-thieu-so-dien-thoai" id="gioi-thieu-so-dien-thoai" placeholder="SỐ ĐIỆN THOẠI ..." value="<?php echo $arrData['gtdiachi'];  ?>"><br>
                        <input type="text" name="gioi-thieu-cmnd" id="gioi-thieu-cmnd" placeholder="CMND ..." value=""><br>
                    </div><br><br>
                    <div id="showerror"></div>
                    <button type="submit" class="button-comfirm button100" id="btn-complete-gtkh" name="btn-complete-gtkh">HOÀN TẤT HỒ SƠ VÀ HẸN LỊCH CHO KHÁCH HÀNG</button>
                </div>

                <div class="hidden-xs hidden-sm col-md-3 col-lg-3">
                </div>
            </div> <!-- end row-->
        </form><br>

    </div> <!-- end container-->
</div> <!-- end body1-->

<?php $this->load->view("partial/footer"); ?>