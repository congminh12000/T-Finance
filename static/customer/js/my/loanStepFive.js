$(document).ready(function () {

    var _day = '';
    var _date = '';
//    var _stc = '';
    var _time = '';

    //show list ngay
    myGetDate();

    $('.day-and-date').click(function () {
        var date = $(this).data('date');
        var day = $(this).data('day');

        //remove all attr style
        $('.day-and-date').removeAttr('style');

        //add attr style
        $(this).attr('style', 'background: #6d0100; color: #fff;');

        _day = day;
        _date = date;
    });

//    $('.stc').click(function () {
//        var value = $(this).data('value');
//
//        //remove all attr style
//        $('.stc').removeAttr('style');
//
//        //add attr style
//        $(this).attr('style', 'background: #6d0100; color: #fff;');
//
//        _stc = value;
//    });

    $('.box-time').click(function () {
        var value = $(this).data('value');

        //remove all attr style
        $('.box-time').removeAttr('style');

        //add attr style
        $(this).attr('style', 'background: #6d0100; color: #fff;');

        _time = value;
    });

    $('#btn-complete-step-5').click(function () {
        var soDienThoai = $('#so-dien-thoai').val().trim();
        var email = $('#email').val().trim();
        var fb = $('#facebook').val().trim();
        var zalo = $('#zalo').val().trim();
        var mkm = $('#ma-khuyen-mai').val().trim();

        if (_day == '' || _date == '') {
            swal('Lỗi !', 'Vui lòng chọn ngày hẹn !', 'error');
            return false;
        }

//        if (_stc == '') {
//            swal('Lỗi !', 'Vui lòng chọn buổi hẹn !', 'error');
//            return false;
//        }

        if (_time == '') {
            swal('Lỗi !', 'Vui lòng chọn giờ hẹn !', 'error');
            return false;
        }

        if (soDienThoai == '') {
            swal('Lỗi !', 'Vui lòng điền số điện thoại !', 'error');
            return false;
        }

        if (email == '') {
            swal('Lỗi !', 'Vui lòng điền email !', 'error');
            return false;
        }

        $.ajax({
            url: baseUrl + 'customer/completeStepFive',
            type: 'POST',
            dataType: 'JSON',
            data: {
//                stc: _stc,
                day: _day,
                date: _date,
                time: _time,
                soDienThoai: soDienThoai,
                email: email,
                fb: fb,
                zalo: zalo,
                mkm: mkm
            },
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

    function myGetDate() {
        var xHtml = '';
        var arrDay = ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy'];

        var toDate = new Date();
        var day = toDate.getDay();
        var strDate = toDate.getDate();

        for (var i = 0; i < 7; i++) {
            var strDay = arrDay[day];
            var html = '';
            var classDisabled = '';
            var disabled = '';

            //disabled current date
            if (i == 0) {
                var classDisabled = 'form-button-ngay-disabled';
                var disabled = 'disabled="disabled"';

            } else {  //set date tomorrow
                var tomorrow = new Date();
                tomorrow.setDate(strDate + 1);

                strDate = tomorrow.getDate();
            }

            html += '<button class="form-button-ngay day-and-date ' + classDisabled + '" data-day="' + strDay + '" data-date="' + strDate + '" ' + disabled + '>';
            html += '<p>' + strDay + '</p>';
            html += '<p class="ngay">' + strDate + '</p>';
            html += '</button>';

            xHtml += html;

            //increment day
            if (day == 6) {
                day = 0;
            } else {
                day++;
            }
        }

        $('#list-ngay').html(xHtml);
    }
})