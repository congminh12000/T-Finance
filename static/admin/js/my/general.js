$(document).ready(function () {

    $('#btn-logout-admin').click(function () {

        swal({
            title: 'Đăng xuất',
            text: "Bạn có chắc không ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy bỏ',
            showLoaderOnConfirm: true,
            allowOutsideClick: false,
            preConfirm: function () {
                return new Promise(function (resolve, reject) {
                    
                    $.ajax({
                        url: baseUrl + '/admin/logout',
                        type: 'GET',
                        dataType: 'JSON',
                        success: function (result) {

                            if (!result.isError) {
                                var loginUrl = result.data.loginUrl;

                                window.location = loginUrl;
                            } else {
                                swal('Lỗi !', result.message, 'error');
                            }
                        }
                    });
                })
            }
        })
    });

})