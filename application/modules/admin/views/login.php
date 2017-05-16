<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đăng nhập</title>
        <!-- core css -->
        <link href="<?php echo base_url('static/admin/css/normalize.min.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('static/admin/css/sweet-alert-2.min.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('static/admin/css/my/login.css'); ?>" rel="stylesheet" />

        <!-- core js -->
        <script src="<?php echo base_url('static/admin/js/jquery.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('static/admin/js/prefixfree.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('static/admin/js/sweet-alert-2.min.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('static/admin/js/my/login.js'); ?>" type="text/javascript"></script>

        <script type="text/javascript">
            var baseUrl = '<?php echo base_url(); ?>';
        </script>
    </head>

    <body>
        <div id="loading-mask" style="left: -2px; top: 0px; width: 100%; height: 100%; display: none;">
            <p id="loading_mask_loader" class="loader">
                <img alt="Loading..." src="<?php echo base_url('static/admin/img/loading.gif'); ?>">
                <br>Vui lòng chờ...</p>
        </div>
        
        <div class="login">
            <h1>Đăng nhập</h1>
            <form id="frm-login">
                <input type="text" class="input-login" id="username" name="username" placeholder="Tên đăng nhập" autofocus="" />
                <input type="password" class="input-login" id="password" name="password" placeholder="Mật khẩu" />
                <button type="button" id="btn-login" class="btn btn-primary btn-block btn-large">Hoàn tất</button>
            </form>
        </div>

    </body>
</html>
