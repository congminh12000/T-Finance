$(document).ready(function () {

    $('#btn-login').click(function () {
        var username = $('#username').val().trim();
        var password = $('#password').val().trim();

        //valid
        if (username == '') {
            swal('Lỗi', 'Vui lòng điền tên đăng nhập !', 'error');
            return false;
        }

        if (password == '') {
            swal('Lỗi', 'Vui lòng điền mật khẩu !', 'error');
            return false;
        }

        $.ajax({
            url: baseUrl + 'admin/login/handleLogin',
            type: 'POST',
            dataType: 'JSON',
            data: {
                username: username,
                password: password
            },
            beforeSend: function () {
                $('#loading-mask').show();
            },
            success: function (result) {
                $('#loading-mask').hide();

                if (!result.isError) {
                    var homeUrl = result.data.homeUrl;
                    
                    window.location = homeUrl;
                } else {
                    swal('Lỗi !', result.message, 'error');
                }
            }
        });
    });

    $('.input-login').keydown(function (e) {
        if (e.which == 13) {
            $('#btn-login').trigger('click');
            return false;
        }
    });
})