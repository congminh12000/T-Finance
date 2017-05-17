<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Loan_lib {

    public function __construct() {
        return $this;
    }

    public function listStepOneLabel() {
        $arrList = [
            'vay-mua-nha' => 'Nhà',
            'vay-mua-oto' => 'Ô tô',
            'vay-mua-xe-may' => 'Xe máy',
            'vay-tieu-dung' => 'Tiêu dùng',
            'muc-dich-khac' => 'Khác',
            'cmnd' => 'Chứng minh nhân dân',
            'bang-lai-xe' => 'Bằng lái xe',
            'ho-chieu' => 'Hộ chiếu',
            'giay-to-khac' => 'Giấy tờ khác'
        ];

        return $arrList;
    }

    public function listStepTwoLabel() {
        $arrList = [
            'tstc-oto' => 'Ô tô ( vay thế chấp )',
            'tstc-quyen-su-dung-dat' => 'Quyền sử dụng đất ( vay thế chấp )',
            'tstc-khac' => 'Khác ( vay thế chấp )',
            'cmtn-hop-dong-lao-dong' => 'Hợp đồng lao động ( vay tín chấp )',
            'cmtn-the-tin-dung' => 'Thẻ tín dụng ( vay tín chấp )',
            'cmtn-bao-hiem-nhan-tho' => 'Bảo hiểm nhân thọ ( vay tín chấp )',
            'cmtn-lam-viec-tu-do' => 'Làm việc tự do ( vay tín chấp )',
            'cmtn-giay-phep-kinh-doanh' => 'Giấy phép kinh doanh ( vay tín chấp )'
        ];

        return $arrList;
    }

    public function listStepThreeLabel() {
        $arrList = [
            'duoi-4-trieu' => 'Dưới 4 triệu',
            '4-den-12-trieu' => '4 - 12 triệu',
            'tren-12-trieu' => 'Trên 12 triệu',
            'duoi-1-nam' => 'Dưới 1 năm',
            'tren-1-nam' => 'Trên 1 năm',
            'bao-hiem-y-te' => 'Bảo hiểm y tế',
            'bao-hiem-xa-hoi' => 'Bảo hiểm xã hội',
            'duoi-3-thang' => 'Dưới 3 tháng',
            '3-thang-1-nam' => '3 tháng - 1 năm'
        ];

        return $arrList;
    }

    public function listStepFourLabel() {
        $arrList = [
            'co' => 'Có đăng ký sổ hộ khẩu',
            'khong' => 'Không đăng ký sổ hộ khẩu',
            'da-nang' => 'Đà nẵng',
            'quang-nam' => 'Quảng nam',
            'khac' => 'Khác',
            'duoi-6-thang' => 'Sổ tạm trú dưới 6 tháng',
            'tren-6-thang' => 'Sổ tạm trú trên 6 tháng',
            'chua-co' => 'Không có sổ tạm trú'
        ];

        return $arrList;
    }

    public function listStepFiveLabel() {
        $arrList = [
            'thu-hai' => 'Thứ hai',
            'thu-ba' => 'Thứ ba',
            'thu-tu' => 'Thứ tư',
            'thu-nam' => 'Thứ năm',
            'thu-sau' => 'Thứ sáu',
            'thu-bay' => 'Thứ bảy',
            'chu-nhat' => 'Chủ nhật',
            'chua-co' => 'Không có sổ tạm trú'
        ];

        return $arrList;
    }

}

?>
