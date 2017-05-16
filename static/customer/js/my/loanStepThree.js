$(document).ready(function () {

    var _arrBaoHiem = [];
    var _thoiGian = '';
    var _mucLuong = '';

    var _baoHiemTien = '';
    var _baoHiemThoiGian = '';

    $('.bao-hiem-tien').click(function () {
        var value = $(this).data('value');

        //remove all attr style
        $('.bao-hiem-tien').removeAttr('style');

        //add attr style
        $(this).attr('style', 'background: #6d0100; color: #fff;');

        _baoHiemTien = value;
    });

    $('.bao-hiem-thoi-gian').click(function () {
        var value = $(this).data('value');

        //remove all attr style
        $('.bao-hiem-thoi-gian').removeAttr('style');

        //add attr style
        $(this).attr('style', 'background: #6d0100; color: #fff;');

        _baoHiemThoiGian = value;
    });

    $('.bao-hiem').click(function () {
        var value = $(this).data('value');

        if ($(this).attr('style')) {
            $(this).removeAttr('style');
            
            var index = _arrBaoHiem.indexOf(value);
            
            if(index > -1){
                _arrBaoHiem.splice(index, 1);
            }
            
        } else {
            //add attr style
            $(this).attr('style', 'background: #6d0100; color: #fff;');
            
            _arrBaoHiem.push(value);
        }
    });

    $('.thoi-gian').click(function () {
        var value = $(this).data('value');

        //remove all attr style
        $('.thoi-gian').removeAttr('style');

        //add attr style
        $(this).attr('style', 'background: #6d0100; color: #fff;');


        _thoiGian = value;
    });

    $('.muc-luong').click(function () {
        var value = $(this).data('value');

        //remove all attr style
        $('.muc-luong').removeAttr('style');

        //add attr style
        $(this).attr('style', 'background: #6d0100; color: #fff;');


        _mucLuong = value;
    });

    $('#btn-complete-step-3').click(function () {
        var objData = {};

        if ($('#body-hop-dong-lao-dong').length > 0) {
            var tenCongTy = $('#ten-cong-ty').val().trim();
            var maSoThue = $('#ma-so-thue').val().trim();
            var diaChi = $('#dia-chi').val().trim();

            if (tenCongTy == '') {
                swal('Lỗi !', 'Vui lòng điền tên công ty ( hợp đồng lao động ) !', 'error');
                return false;
            }

            if (diaChi == '') {
                swal('Lỗi !', 'Vui lòng điền địa chỉ ( hợp đồng lao động ) !', 'error');
                return false;
            }

            if (_arrBaoHiem.length == 0) {
                swal('Lỗi !', 'Vui lòng chọn bảo hiểm ( hợp đồng lao động ) !', 'error');
                return false;
            }

            if (_thoiGian == '') {
                swal('Lỗi !', 'Vui lòng chọn thời gian ( hợp đồng lao động ) !', 'error');
                return false;
            }

            if (_mucLuong == '') {
                swal('Lỗi !', 'Vui lòng chọn mức lương ( hợp đồng lao động ) !', 'error');
                return false;
            }

            var objHdld = {};
            objHdld.tenCongTy = tenCongTy;
            objHdld.maSoThue = maSoThue;
            objHdld.diaChi = diaChi;
            objHdld.arrBaoHiem = _arrBaoHiem;
            objHdld.thoiGian = _thoiGian;
            objHdld.mucLuong = _mucLuong;
            
            objData.hdld = objHdld;
            objData.isHopDongLaoDong = 1;
        }

        if ($('#body-the-tin-dung').length > 0) {
            var listNganHangPhatHanh = $('#list-ngan-hang-phat-hanh').val();
            var listHanMuc = $('#list-han-muc').val();
            var thoiDiemPhatHanhThe = $('#thoi-diem-phat-hanh-the').val();
            
            if (listNganHangPhatHanh == 0) {
                swal('Lỗi !', 'Vui lòng chọn ngân hàng phát hành ( thẻ tín dụng ) !', 'error');
                return false;
            }

            if (listHanMuc == 0) {
                swal('Lỗi !', 'Vui lòng chọn hạn mức ( thẻ tín dụng ) !', 'error');
                return false;
            }

            var objTtd = {};
            objTtd.listNganHangPhatHanh = listNganHangPhatHanh;
            objTtd.listHanMuc = listHanMuc;
            objTtd.thoiDiemPhatHanhThe = thoiDiemPhatHanhThe;
            
            objData.ttd = objTtd;
            objData.isTheTinDung = 1;
        }

        if ($('#body-bao-hiem-nhan-tho').length > 0) {
            var listCongTyThamGiaBaoHiem = $('#list-cong-ty-tham-gia-bao-hiem').val();

            if (listCongTyThamGiaBaoHiem == 0) {
                swal('Lỗi !', 'Vui lòng chọn công ty bạn tham gia ( bảo hiểm ) !', 'error');
                return false;
            }

            if (_baoHiemThoiGian == '') {
                swal('Lỗi !', 'Vui lòng chọn thời gian ( bảo hiểm ) !', 'error');
                return false;
            }

            if (_baoHiemTien == '') {
                swal('Lỗi !', 'Vui lòng chọn tiền ( bảo hiểm ) !', 'error');
                return false;
            }
            
            var objBhnt = {};
            objBhnt.listCongTyThamGiaBaoHiem = listCongTyThamGiaBaoHiem;
            objBhnt.baoHiemThoiGian = _baoHiemThoiGian;
            objBhnt.baoHiemTien = _baoHiemTien;
            
            objData.bhnt = objBhnt;
            objData.isBaoHiemNhanTho = 1;
        }

        if (objData.length == 0) {
            swal('Lỗi !', 'Không có dữ liệu !', 'error');
            return false;
        }

        $.ajax({
            url: baseUrl + 'customer/completeStepThree',
            type: 'POST',
            dataType: 'JSON',
            data: objData,
            beforeSend: function () {
                $('#loading-mask').show();
            },
            success: function (result) {
                $('#loading-mask').hide();

                if (!result.isError) {
                    var stepFourUrl = result.data.loanStepFourUrl;

                    window.location = stepFourUrl;
                } else {
                    swal('Lỗi !', result.message, 'error');
                }
            }
        });
    });
})