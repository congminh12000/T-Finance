$(document).ready(function () {
    
    $('.btn-view-detail').click(function () {
        var data = $(this).data('json');

        if (typeof listStepOneLabel == 'undefined' || typeof listStepTwoLabel == 'undefined' ||
                typeof listStepThreeLabel == 'undefined' || typeof listStepFourLabel == 'undefined' || typeof listStepFiveLabel == 'undefined') {
            swal('Lỗi !', 'Không thể lấy đc dữ liệu !', 'error');
            return false;
        }
        
        var _listStepOneLabel = JSON.parse(listStepOneLabel);
        var _listStepTwoLabel = JSON.parse(listStepTwoLabel);
        var _listStepThreeLabel = JSON.parse(listStepThreeLabel);
        var _listStepFourLabel = JSON.parse(listStepFourLabel);
        var _listStepFiveLabel = JSON.parse(listStepFiveLabel);

        var html = '<label style="color: orange">Bước 1</label>';
        html += '<p>Vay mua: ' + _listStepOneLabel[data.step_one_buy] + '</p>';
        html += '<p>Tùy thân: ' + _listStepOneLabel[data.step_one_identification] + '</p>';
        html += '<p>Tiền vay: ' + data.step_one_money + ' đ </p>';
        html += '<p>Thời gian vay: ' + data.step_one_month + ' tháng </p>';
        html += '<label style="color: orange">Bước 2</label>';
        html += '<p>Vay: ' + data.step_two_loan + ' </p>';
        html += '<label style="color: orange">Bước 3</label><br>';
        html += '<label>Bảo hiểm hằng năm</label>';
        html += '<p>Công ty tham gia: ' + data.step_three_bphn_company + '</p>';
        html += '<p>Tiền: ' + data.step_three_bphn_money + '</p>';
        html += '<p>Thời gian: ' + data.step_three_bphn_time + '</p>';
        html += '<label>Hợp đồng lao động</label>';
        html += '<p>Địa chỉ: ' + data.step_three_hdld_address + '</p>';
        html += '<p>Công ty: ' + data.step_three_hdld_company + '</p>';
        html += '<p>Bảo hiểm: ' + data.step_three_hdld_insurrance + '</p>';
        html += '<p>Tiền: ' + data.step_three_hdld_money + '</p>';
        html += '<p>Mã số thuế: ' + data.step_three_hdld_tax_code + '</p>';
        html += '<p>Thời gian: ' + data.step_three_hdld_time + '</p>';
        html += '<label>Thẻ tín dụng</label>';
        html += '<p>Ngân hàng: ' + data.step_three_ttd_bank + '</p>';
        html += '<p>Hạn mức: ' + data.step_three_ttd_level + '</p>';
        html += '<p>Thời điểm phát hành thẻ: ' + data.step_three_ttd_time_to_card + '</p>';
        html += '<label style="color: orange">Bước 4</label>';
        html += '<p>Sổ hộ khẩu: ' + data.step_four_shk_confirm + ' - ' + data.step_four_shk_address + '</p>';
        html += '<p>Sổ tạm trú: ' + data.step_four_stt_time + '</p>';
        html += '<label style="color: orange">Bước 5</label>';
        html += '<p>Ngày hẹn: ' + data.step_five_day + '</p>';
        html += '<p>Thời gian hẹn: ' + data.step_five_time + '</p>';
        html += '<p>Email: ' + data.step_five_email + '</p>';
        html += '<p>Facebook: ' + data.step_five_fb + '</p>';
        html += '<p>Sđt: ' + data.step_five_phone + '</p>';
        html += '<p>Mã khuyến mãi: ' + data.step_five_promotion_code + '</p>';
        html += '<p>Zalo: ' + data.step_five_zalo + '</p>';

        swal({
            title: '<span style="color: #ab47bc">Thông tin chi tiết</span>',
            html: html,
            animation: false,
            customClass: 'animated tada'
        })
    });

})