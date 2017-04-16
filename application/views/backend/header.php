<?php
$arrStatic = $this->load->get_var('static');
$arrCss = $arrStatic['backend']['css'];
$arrJs = $arrStatic['backend']['js'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Quản trị - Admin</title>

        <!-- add Css -->
        <?php if ($arrCss): ?>
            <?php foreach ($arrCss as $css): ?>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/backend/css/' . $css); ?>">
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- add Js -->
        <?php if ($arrJs): ?>
            <?php foreach ($arrJs as $js): ?>
                <script src="<?php echo base_url('static/backend/js/' . $js); ?>"></script>
            <?php endforeach; ?>
        <?php endif; ?>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <!-- add sidebar -->
                <?php $this->load->view('backend/sidebar'); ?>

                <!-- add navigation -->
                <?php $this->load->view('backend/navigation'); ?>

                <!-- add main content -->
                <div class="right_col" role="main" style="min-height: 739px;">
                    <div class="">