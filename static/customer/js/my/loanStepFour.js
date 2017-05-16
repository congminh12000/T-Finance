$(document).ready(function () {


    var _soHoKhauXacNhan = '';
    var _soHoKhauDiaDiem = '';
    var _soTamTruThoiGian = '';

    $('.so-ho-khau-xac-nhan').click(function () {
        var value = $(this).data('value');

        //remove all attr style
        $('.so-ho-khau-xac-nhan').removeAttr('style');

        //add attr style
        $(this).attr('style', 'background: #6d0100; color: #fff;');

        _soHoKhauXacNhan = value;
    });

    $('.so-ho-khau-dia-diem').click(function () {
        var value = $(this).data('value');

        //remove all attr style
        $('.so-ho-khau-dia-diem').removeAttr('style');

        //add attr style
        $(this).attr('style', 'background: #6d0100; color: #fff;');

        _soHoKhauDiaDiem = value;
    });

    $('.so-tam-tru-thoi-gian').click(function () {
        var value = $(this).data('value');

        //remove all attr style
        $('.so-tam-tru-thoi-gian').removeAttr('style');

        //add attr style
        $(this).attr('style', 'background: #6d0100; color: #fff;');

        _soTamTruThoiGian = value;
    });

    $('#btn-complete-step-4').click(function () {

        if (_soHoKhauXacNhan == '') {
            swal('Lỗi !', 'Vui lòng xác nhận có hoặc không có hộ khẩu ( sổ hộ khẩu ) !', 'error');
            return false;
        }

        if (_soHoKhauDiaDiem == '') {
            swal('Lỗi !', 'Vui lòng xác nhận cư trú ( sổ hộ khẩu ) !', 'error');
            return false;
        }

        if (_soTamTruThoiGian == '') {
            swal('Lỗi !', 'Vui lòng xác nhận thời gian ( sổ tạm trú ) !', 'error');
            return false;
        }

        $.ajax({
            url: baseUrl + 'customer/completeStepFour',
            type: 'POST',
            dataType: 'JSON',
            data: {
                soHoKhauXacNhan: _soHoKhauXacNhan,
                soHoKhauDiaDiem: _soHoKhauDiaDiem,
                soTamTruThoiGian: _soTamTruThoiGian
            },
            beforeSend: function () {
                $('#loading-mask').show();
            },
            success: function (result) {
                $('#loading-mask').hide();

                if (!result.isError) {
                    var loanStepFiveUrl = result.data.loanStepFiveUrl;

                    window.location = loanStepFiveUrl;
                } else {
                    swal('Lỗi !', result.message, 'error');
                }
            }
        });
    });

})