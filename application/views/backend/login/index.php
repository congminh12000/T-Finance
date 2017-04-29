<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Đăng nhập</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/backend/css/bootstrap.min.css'); ?>">
        <!-- Font Awesome -->gg
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/backend/css/font-awesome.min.css'); ?>">
        <!-- NProgress -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/backend/css/nprogress.css'); ?>">
        <!-- Animate.css -->
        <!--<link rel="stylesheet" type="text/css" href="<?php // echo base_url('static/backend/css/animate.min.css');  ?>">-->

        <!-- Custom Theme Style -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/backend/css/custom.min.css'); ?>">
    </head>

    <body class="login">
        <div>
            <a class="hiddenanchor" id="signup"></a>

            <div class="login_wrapper">
                <div class="form login_form">
                    <section class="login_content">
                        <form>
                            <h1>Đăng nhập</h1>
                            <div>
                                <input type="text" class="form-control" placeholder="Tài khoản" required="" />
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Mật khẩu" required="" />
                            </div>
                            <div>
                                <a class="btn btn-default submit" href="index.html">Hoàn tất</a>
                            </div>

                            <div class="clearfix"></div>

                            <div class="separator">
                                <div class="clearfix"></div>
                                <br />

                                <div>
                                    <h1><i class="fa fa-paw"></i> T-Finance</h1>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </body>
</html>
