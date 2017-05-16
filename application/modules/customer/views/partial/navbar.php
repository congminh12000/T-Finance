<?php 
$baseUrl = $this->config->base_url();
?>

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
                    <li><a href="tel:01684242442"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;(+84) 168 424 2442</a></li>
                    <li><a href="#"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;&nbsp;ĐĂNG NHẬP</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url('gioi-thieu-khach-hang'); ?>" class="btn btn-intro"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Giới thiệu KH đến <b>T-Finance</b></a></li>
                </ul>
            </div>
        </div>
    </nav> <!-- end nav-->
</div> <!-- end navigationbar-->