$(document).ready(function () {
//    $(".img-loan").on({
//        mouseenter: function () {
//            $(this).animate({width: '125px', height: '124px', top: '-=15px', left: '-=15px'}, 500);
//        },
//        mouseleave: function () {
//            $(this).animate({width: '119px', height: '118px', top: '+=15px', left: '+=15px'}, 500);
//        }
//    });
//    $('.test').inputmask("numeric", {
//        groupSeparator: ",",
//        digits: 2,
//        autoGroup: true,
//        rightAlign: false,
//    });

    var _loanImg = '';
    var _loanMoney = 0;
    var _loanMonth = 0;
    var _arrLoanItem = [];

//    $('.img-loan').mouseover(function () {
//        $(this).addClass('img-border');
//    });

//    $('.img-loan').mouseleave(function () {
//        $(this).removeClass('img-border');
//    });

    $(".img-loan").click(function () {
        var value = $(this).data('value');

        //remove css all img
        $('.img-loan').removeClass('img-border');

        //add css this img
        $(this).addClass('img-border');

        _loanImg = value;

        //check complete step
        checkCompleteStep();
    });

    $('.item-loan').click(function () {
        var value = $(this).val();

        if ($(this).is(':checked')) {
            _arrLoanItem.push(value);
        } else {
            var index = _arrLoanItem.indexOf(value);

            if (index > -1) {
                _arrLoanItem.splice(index, 1);
            }
        }

        //check complete step
        checkCompleteStep();
    });

    $('#btn-complete-step-1').click(function () {
        if (_loanImg == '') {
            swal('Lỗi !', 'Vui lòng chọn mục đích vay tiền !', 'error');
            return false;
        }

        if (_loanMoney == 0) {
            swal('Lỗi !', 'Vui lòng chọn số tiền cần vay !', 'error');
            return false;
        }

        if (_loanMonth == 0) {
            swal('Lỗi !', 'Vui lòng chọn thời gian vay !', 'error');
            return false;
        }

        if (_arrLoanItem.length == 0) {
            swal('Lỗi !', 'Vui lòng chọn giấy tờ tùy thân !', 'error');
            return false;
        }

        $.ajax({
            url: baseUrl + 'customer/completeStepOne',
            type: 'POST',
            dataType: 'JSON',
            data: {
                loanImg: _loanImg,
                loanMoney: _loanMoney,
                loanMonth: _loanMonth,
                arrLoanItem: _arrLoanItem
            },
            beforeSend: function () {
                $('#loading-mask').show();
            },
            success: function (result) {
                $('#loading-mask').hide();

                if (!result.isError) {
                    var stepTwoUrl = result.data.loanStepTwoUrl;

                    window.location = stepTwoUrl;
                } else {
                    swal('Lỗi !', result.message, 'error');
                }
            }
        });
    });

    $("#money-loan").ionRangeSlider({
        type: "single",
        min: 2000000,
        max: 2000000000,
        postfix: ' đ',
        grid: true,
        step: 1000000,
        prettify_separator: ",",
        hide_min_max: true,
        hide_from_to: true,
        keyboard: true,
        grid_num: 1,
        onStart: function (data) {
            formatMoney(data.from);
        },
        onChange: function (data) {
            formatMoney(data.from);
        }
    });

    $("#month-loan").ionRangeSlider({
        type: "single",
        min: 1,
        max: 240,
        postfix: ' tháng',
        grid: true,
        step: 1,
        hide_min_max: true,
        hide_from_to: true,
        keyboard: true,
        grid_num: 1,
        onStart: function (data) {
            formatMonth(data.from);
        },
        onChange: function (data) {
            formatMonth(data.from);
        }
    });

    function checkCompleteStep() {
        if (_loanImg && _arrLoanItem.length && _loanMoney && _loanMonth) {

            $('#btn-complete-step-1').show();

            return true;
        }

        $('#btn-complete-step-1').hide();

        return false;
    }

    function formatMonth(month) {
        var text = month + ' tháng';

        $('#month-loan-value').text(text);

        _loanMonth = month;
    }

    function formatMoney(money) {
        $('#money-loan-value').text(money);

        $('#money-loan-value').inputmask("numeric", {
            groupSeparator: ",",
            digits: 2,
            autoGroup: true,
            rightAlign: false,
            suffix: ' đ'
        });

        _loanMoney = money;
    }
})