$(document).ready(function () {

    $('#btn-complete-gtkh').click(function () {
        var frmData = $('#frm-gtkh').serialize();
        
        $.ajax({
            url: baseUrl + 'customer/completeGioiThieuKhachHang',
            type: 'POST',
            dataType: 'JSON',
            data: frmData,
            beforeSend: function () {
                $('#loading-mask').show();
            },
            success: function (result) {
                $('#loading-mask').hide();

                if (!result.isError) {
                    var camOnUrl = result.data.camOnUrl;

                    window.location = camOnUrl;
                } else {
                    swal('Lỗi !', result.message, 'error');
                }
            }
        });
    });

})