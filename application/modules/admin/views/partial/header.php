<?php
$module = $this->uri->segment(1);
$controller = $this->uri->segment(2);
$arrUser = $this->session->userData('userLogin');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('static/admin/img/apple-icon.png'); ?>" />
        <link rel="icon" type="image/png" href="<?php echo base_url('static/admin/img/favicon.png'); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Admin</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="<?php echo base_url('static/admin/css/bootstrap.min.css'); ?>" rel="stylesheet" />

        <!--  Material Dashboard CSS    -->
        <link href="<?php echo base_url('static/admin/css/material-dashboard.css'); ?>" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="<?php echo base_url('static/admin/css/demo.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('static/admin/css/animate.css'); ?>" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

        <link href="<?php echo base_url('static/admin/css/sweet-alert-2.min.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('static/admin/css/my/general.css'); ?>" rel="stylesheet" />

        <!--   Core JS Files   -->
        <script src="<?php echo base_url('static/admin/js/jquery-3.1.0.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('static/admin/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('static/admin/js/material.min.js'); ?>" type="text/javascript"></script>

        <!--  Charts Plugin -->
        <script src="<?php // echo base_url('static/admin/js/chartist.min.js');        ?>"></script>

        <!--  Notifications Plugin    -->
        <script src="<?php echo base_url('static/admin/js/bootstrap-notify.js'); ?>"></script>

        <!-- Material Dashboard javascript methods -->
        <script src="<?php echo base_url('static/admin/js/material-dashboard.js'); ?>"></script>

        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="<?php // echo base_url('static/admin/js/demo.js');        ?>"></script>

        <script src="<?php echo base_url('static/admin/js/sweet-alert-2.min.js'); ?>"></script>
        <script src="<?php echo base_url('static/admin/js/my/general.js'); ?>"></script>

        <!-- js my -->
        <?php
        switch ($controller):
            case '':    //danh-sach-ho-so-vay
            case 'index':
                ?>
                <script src="<?php echo base_url('static/admin/js/my/danh-sach-ho-so-vay.js'); ?>" type="text/javascript"></script>
                <?php
                break;
        endswitch;
        ?>

        <script type="text/javascript">
            var baseUrl = '<?php echo base_url('admin'); ?>';
        </script>
    </head>

    <body>

        <div id="loading-mask" style="left: -2px; top: 0px; width: 100%; height: 100%; display: none;">
            <p id="loading_mask_loader" class="loader">
                <img alt="Loading..." src="<?php echo base_url('static/admin/img/loading.gif'); ?>">
                <br>Vui lòng chờ...</p>
        </div>

        <div class="wrapper">

            <div class="sidebar" data-color="purple" data-image="<?php echo base_url('static/admin/img/sidebar-1.jpg'); ?>">
                <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

                Tip 2: you can also add an image using data-image tag
                -->

                <div class="logo">
                    <a href="<?php echo base_url('admin'); ?>" class="simple-text">
                        Quản trị T-Finance
                    </a>
                </div>

                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li class="active">
                            <a href="<?php echo base_url('admin'); ?>">
                                <i class="material-icons">dashboard</i>
                                <p>Danh sách hồ sơ vay</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-transparent navbar-absolute">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons">person</i>
                                        <p class="hidden-lg hidden-md">Profile</p>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Chào <span style="color: green;"><?php echo ucfirst($arrUser['username']); ?> !</span></a></li>
                                        <li><a id="btn-logout-admin" href="javascript:void(0);">Đăng xuất</a></li>
                                    </ul>
                                </li>
                            </ul>


                        </div>
                    </div>
                </nav>
