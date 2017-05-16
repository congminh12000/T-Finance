<?php $this->load->view("partial/header"); ?>

<?php
$loanStepTwo = $this->session->userdata('loanStepTwo');
$arrHinhThuc = $loanStepTwo['arrHinhThuc'];
?>

<div style="position:relative;" class="banmuonvay"><h3 style="position:absolute; top:-91%; left: 6%; color:#6d0100;"><img width="53px;" src="<?php echo base_url('static/customer/img/arrow.png'); ?>"><?php echo $title; ?></h3><br><br></div>

<?php
foreach ($arrHinhThuc as $hinhThuc) {
    if (!in_array($hinhThuc, ['hop-dong-lao-dong', 'the-tin-dung', 'bao-hiem-nhan-tho'])) {
        continue;
    }

    include($hinhThuc . '.php');
}
?>

<div class="ahihi" style="padding-bottom: 60px;">
    <div class="row text-center">
        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-6 col-lg-push-3 col-md-6 col-md-push-3">
            <button class="button-comfirm" id="btn-complete-step-3">XÁC NHẬN</button>
        </div>
    </div>
</div>

<?php $this->load->view("partial/footer"); ?>
