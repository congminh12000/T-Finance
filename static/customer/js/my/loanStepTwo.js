$(document).ready(function () {

    var _arrLoanImg = [];

    $(".img-loan").click(function () {
        var value = $(this).data('value');

        if ($(this).hasClass('img-border')) {
            //remove css this img
            $(this).removeClass('img-border');

            var index = _arrLoanImg.indexOf(value);

            if (index > -1) {
                _arrLoanImg.splice(index, 1);
            }
        } else {
            //add css this img
            $(this).addClass('img-border');

            _arrLoanImg.push(value);
        }
    });

    $('#ele-tin-chap').click(function () {
        //remove css all img
        $('.img-loan').removeClass('img-border');

        _arrLoanImg = [];
    });

    $('#ele-the-chap').click(function () {
        //remove css all img
        $('.img-loan').removeClass('img-border');

        _arrLoanImg = [];
    });

    $('#btn-complete-step-2').click(function () {

        if (_arrLoanImg.length == 0) {
            swal('Lỗi !', 'Vui lòng chọn hình thức thế chấp tài sản hoặc hình thức chứng minh thu nhập !', 'error');
            return false;
        }

        $.ajax({
            url: baseUrl + 'customer/completeStepTwo',
            type: 'POST',
            dataType: 'JSON',
            data: {
                arrHinhThuc: _arrLoanImg
            },
            beforeSend: function () {
                $('#loading-mask').show();
            },
            success: function (result) {
                $('#loading-mask').hide();

                if (!result.isError) {
                    var stepThreeUrl = result.data.loanStepThreeUrl;

                    window.location = stepThreeUrl;
                } else {
                    swal('Lỗi !', result.message, 'error');
                }
            }
        });
    });
})