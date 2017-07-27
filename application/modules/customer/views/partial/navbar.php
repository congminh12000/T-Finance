<?php
$baseUrl = $this->config->base_url();
?>

<style>
@media (min-width: 1200px){
    .container {
        width: 1250px;
    }
}
</style>

<div class="navigationbar">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo base_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;T-FINANCE</a></li>
                    <li><a href="<?php echo base_url('ve-voi-chung-toi'); ?>"><i class="fa fa-usd" aria-hidden="true"></i>&nbsp;&nbsp;VỀ CHÚNG TÔI</a></li>
                    <li><a href="<?php echo base_url('tin-tuc-tai-chinh'); ?>"><i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;&nbsp;TIN TỨC TÀI CHÍNH</a></li>
                    <li><a href="tel:01684242442"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;(+84) 168 424 2442</a></li>
                    <li><a href="#"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;&nbsp;ĐĂNG NHẬP</a></li>
                    <li><a href="<?php echo base_url('gioi-thieu-khach-hang'); ?>" class="btn btn-intro"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Giới thiệu KH đến <b>T-Finance</b></a></li>
                </ul>
                <!-- <ul class="nav navbar&#45;nav navbar&#45;right"> -->
                    <!-- <li><a href="<?php echo base_url('gioi&#45;thieu&#45;khach&#45;hang'); ?>" class="btn btn&#45;intro"><i class="fa fa&#45;user" aria&#45;hidden="true"></i>&#38;nbsp;&#38;nbsp;Giới thiệu KH đến <b>T&#45;Finance</b></a></li> -->
                <!-- </ul> -->
            </div>
        </div>
    </nav> <!-- end nav-->
</div> <!-- end navigationbar-->
