<?php
$baseUrl = $this->config->base_url();
$route = $this->uri->segment(1);
//$action = $this->uri->segment(2);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>T-Finance - Dịch vụ tư vấn tài chính online</title>
        <meta name="title" content="T-Finance - Dịch vụ tư vấn tài chính trực tuyến">
        <meta name="description" content="T-Finance - Dịch vụ tư vấn tài chính trực tuyến">
        <meta name="keywords" content="dich vu tu van tai chinh, quang nam, da nang, quảng nam, đà nẵng, dịch vụ tư vấn, tài chính">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- css core -->
        <link rel="stylesheet" href="<?php echo $baseUrl . 'static/customer/css/bootstrap.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $baseUrl . 'static/customer/css/font-awesome.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $baseUrl . 'static/customer/css/sweet-alert-2.min.css'; ?>">
        <link rel="stylesheet" href="<?php echo $baseUrl . 'static/customer/css/my/style-primary.css'; ?>">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="icon" href="<?php echo $baseUrl . 'static/customer/img/favicon.ico'; ?>" type="image/ico" sizes="32x32">

        <!-- css my -->
        <?php
        switch ($route):
            case 'step-1':
                ?>
                <link rel="stylesheet" href="<?php echo $baseUrl . 'static/customer/css/normalize.css'; ?>">
                <link rel="stylesheet" href="<?php echo $baseUrl . 'static/customer/css/ion.rangeSlider.css'; ?>">
                <link rel="stylesheet" href="<?php echo $baseUrl . 'static/customer/css/ion.rangeSlider.skinModern.css'; ?>">
                <?php
                break;
            case 'step-2':
                break;
            case 'step-3':
                break;
            default:
                break;
        endswitch;
        ?>

        <!-- js core -->
        <script src="<?php echo $baseUrl . 'static/customer/js/jquery.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo $baseUrl . 'static/customer/js/bootstrap.min.js'; ?>" type="text/javascript"></script>
        <script src="<?php echo $baseUrl . 'static/customer/js/sweet-alert-2.min.js'; ?>" type="text/javascript"></script>

        <!-- js my -->
        <?php
        switch ($route):
            case 'step-1':
                ?>
                <script src="<?php echo $baseUrl . 'static/customer/js/ion.rangeSlider.min.js'; ?>" type="text/javascript"></script>
                <script src="<?php echo $baseUrl . 'static/customer/js/jquery.inputmask.bundle.min.js'; ?>" type="text/javascript"></script>
                <script src="<?php echo $baseUrl . 'static/customer/js/my/loanStepOne.js'; ?>" type="text/javascript"></script>
                <?php
                break;
            case 'step-2':
                ?>
                <script src="<?php echo $baseUrl . 'static/customer/js/my/loanStepTwo.js'; ?>" type="text/javascript"></script>
                <?php
                break;
            case 'step-3':
                ?>
                <script src="<?php echo $baseUrl . 'static/customer/js/my/loanStepThree.js'; ?>" type="text/javascript"></script>
                <?php
                break;
            case 'step-4':
                ?>
                <script src="<?php echo $baseUrl . 'static/customer/js/my/loanStepFour.js'; ?>" type="text/javascript"></script>
                <?php
                break;
            case 'step-5':
                ?>
                <script src="<?php echo $baseUrl . 'static/customer/js/my/loanStepFive.js'; ?>" type="text/javascript"></script>
                <?php
                break;
            case 'gioi-thieu-khach-hang':
                ?>
                <script src="<?php echo $baseUrl . 'static/customer/js/my/gioi-thieu-khach-hang.js'; ?>" type="text/javascript"></script>
                <?php
                break;
            default:
                break;
        endswitch;
        ?>

        <script type="text/javascript">
            var baseUrl = '<?php echo $baseUrl; ?>';
        </script>
    </head>

    <body>
        <div id="loading-mask" style="left: -2px; top: 0px; width: 100%; height: 100%; display: none;">
            <p id="loading_mask_loader" class="loader">
                <img alt="Loading..." src="<?php echo $baseUrl . 'static/customer/img/loading.gif'; ?>">
                <br>Vui lòng chờ...</p>
        </div>

        <?php $this->load->view("navbar"); ?>
        <?php $this->load->view("slideshow"); ?>
        