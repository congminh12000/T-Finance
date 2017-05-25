<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('welcome');
    }

    public function loanStepOne() {
        $this->load->view('loan-step-one');
    }

    public function loanStepTwo() {
        $stepOneComplete = (boolean) $this->session->userdata('loanStepOne')['stepOneComplete'];

        if (!$stepOneComplete) {
            redirect(base_url('step-1'));
        }

        $this->load->view('loan-step-two');
    }

    public function loanStepThree() {
//        var_dump($this->session->all_userdata());die;
        $stepTwoComplete = (boolean) $this->session->userdata('loanStepTwo')['stepTwoComplete'];
        $stepOneComplete = (boolean) $this->session->userdata('loanStepOne')['stepOneComplete'];

        if (!$stepOneComplete) {
            redirect(base_url());
        }

        if (!$stepTwoComplete) {
            redirect(base_url('step-1'));
        }

        $loanStepTwo = $this->session->userdata('loanStepTwo');
        $arrHinhThuc = $loanStepTwo['arrHinhThuc'];

        $isRedirect = true;
        $arrTitle = '';
        foreach ($arrHinhThuc as $hinhThuc) {
            if ($hinhThuc == 'hop-dong-lao-dong') {

                $isRedirect = false;
                $arrTitle[] = 'HỢP ĐỒNG LAO ĐỘNG';
            } elseif ($hinhThuc == 'the-tin-dung') {

                $isRedirect = false;
                $arrTitle[] = 'THẺ TÍN DỤNG';
            } elseif ($hinhThuc == 'bao-hiem-nhan-tho') {

                $isRedirect = false;
                $arrTitle[] = 'BẢO HIỂM NHÂN THỌ';
            }
        }

        if ($isRedirect) {
            redirect(base_url('step-4'));
        }

        $arrData = [
            'title' => implode(' - ', $arrTitle)
        ];

        $this->load->view('loan-step-three', $arrData);
    }

    public function loanStepFour() {
        $stepTwoComplete = (boolean) $this->session->userdata('loanStepTwo')['stepTwoComplete'];
        $stepOneComplete = (boolean) $this->session->userdata('loanStepOne')['stepOneComplete'];

        if (!$stepOneComplete) {
            redirect(base_url());
        }

        if (!$stepTwoComplete) {
            redirect(base_url('step-1'));
        }

        $this->load->view('loan-step-four');
    }

    public function loanStepFive() {
        $stepOneComplete = (boolean) $this->session->userdata('loanStepOne')['stepOneComplete'];
        $stepTwoComplete = (boolean) $this->session->userdata('loanStepTwo')['stepTwoComplete'];
        $stepFourComplete = (boolean) $this->session->userdata('loanStepFour')['stepFourComplete'];

        if (!$stepOneComplete) {
            redirect(base_url());
        }

        if (!$stepTwoComplete) {
            redirect(base_url('step-1'));
        }

        if (!$stepFourComplete) {
            $stepThreeComplete = (boolean) $this->session->userdata('loanStepThree')['stepThreeComplete'];

            if ($stepThreeComplete) {
                redirect(base_url('step-3'));
            } else {
                redirect(base_url('step-2'));
            }
        }

        $this->load->view('loan-step-five');
    }

    public function camOn() {
//        p($this->session->all_userdata());
        $arrDataStepOne = $this->session->userdata('loanStepOne');
        $arrDataStepTwo = $this->session->userdata('loanStepTwo');
        $arrDataStepThree = $this->session->userdata('loanStepThree');
        $arrDataStepFour = $this->session->userdata('loanStepFour');
        $arrDataStepFive = $this->session->userdata('loanStepFive');

        $stepOneComplete = (boolean) $arrDataStepOne['stepOneComplete'];
        $stepTwoComplete = (boolean) $arrDataStepTwo['stepTwoComplete'];
        $stepFourComplete = (boolean) $arrDataStepFour['stepFourComplete'];
        $stepFiveComplete = (boolean) $arrDataStepFive['stepFiveComplete'];

        if (!$stepOneComplete || !$stepTwoComplete || !$stepFourComplete || !$stepFiveComplete) {
            redirect(base_url());
        }

        //save session in db
        $arrDataInsert = [
            'step_one_buy' => $arrDataStepOne['loanImg'],
            'step_one_identification' => implode(',', $arrDataStepOne['arrLoanItem']),
            'step_one_money' => $arrDataStepOne['loanMoney'],
            'step_one_month' => $arrDataStepOne['loanMonth'],
            'step_two_loan' => implode(',', $arrDataStepTwo['arrHinhThuc']),
            'step_three_hdld_company' => $arrDataStepThree['hdld']['tenCongTy'],
            'step_three_hdld_tax_code' => $arrDataStepThree['hdld']['maSoThue'],
            'step_three_hdld_insurrance' => implode(',', $arrDataStepThree['hdld']['arrBaoHiem']),
            'step_three_hdld_time' => $arrDataStepThree['hdld']['thoiGian'],
            'step_three_hdld_money' => $arrDataStepThree['hdld']['mucLuong'],
            'step_three_hdld_address' => $arrDataStepThree['hdld']['diaChi'],
            'step_three_ttd_bank' => $arrDataStepThree['ttd']['listNganHangPhatHanh'],
            'step_three_ttd_level' => $arrDataStepThree['ttd']['listHanMuc'],
            'step_three_ttd_time_to_card' => $arrDataStepThree['ttd']['thoiDiemPhatHanhThe'],
            'step_three_bphn_money' => $arrDataStepThree['bhnt']['baoHiemTien'],
            'step_three_bphn_company' => $arrDataStepThree['bhnt']['listCongTyThamGiaBaoHiem'],
            'step_three_bphn_time' => $arrDataStepThree['bhnt']['baoHiemThoiGian'],
            'step_four_shk_confirm' => $arrDataStepFour['soHoKhauXacNhan'],
            'step_four_shk_address' => $arrDataStepFour['soHoKhauDiaDiem'],
            'step_four_stt_time' => $arrDataStepFour['soTamTruThoiGian'],
            'step_five_day' => $arrDataStepFive['day'],
            'step_five_time' => $arrDataStepFive['time'],
            'step_five_phone' => $arrDataStepFive['soDienThoai'],
            'step_five_fb' => $arrDataStepFive['fb'],
            'step_five_email' => $arrDataStepFive['email'],
            'step_five_zalo' => $arrDataStepFive['zalo'],
            'step_five_promotion_code' => $arrDataStepFive['mkm']
        ];
        $loanModel = $this->load->model('loan');

        $loanModel->insert($arrDataInsert);

        //unset all session loan
        $arrayItems = array('loanStepOne' => '', 'loanStepTwo' => '', 'loanStepThree' => '', 'loanStepFour' => '');

        $this->session->unset_userdata($arrayItems);

        $this->load->view('cam-on');
    }

    public function gioiThieuKhachHang() {

        if ($this->input->post()) {
            $arrData = [];

            $lhhoten = trim($this->input->post('lien-he-ho-va-ten'));
            $lhdiachi = trim($this->input->post('lien-he-dia-chi'));
            $lhsdt = trim($this->input->post('lien-he-so-dien-thoai'));
            $lhcmnd = trim($this->input->post('lien-he-cmnd'));
            $lhkmcn = trim($this->input->post('lien-he-ma-khuyen-mai-ca-nhan'));
            $gthoten = trim($this->input->post('gioi-thieu-ho-va-ten'));
            $gtdiachi = trim($this->input->post('gioi-thieu-dia-chi'));
            $gtsdt = trim($this->input->post('gioi-thieu-so-dien-thoai'));
            $gtcmnd = trim($this->input->post('gioi-thieu-cmnd'));

            //truyen tham so input khi vua nhap
            $arrData['arrData'] = [
                'lhhoten' => $lhhoten,
                'lhdiachi' => $lhdiachi,
                'lhsdt' => $lhsdt,
                'lhcmnd' => $lhcmnd,
                'lhkmcn' => $lhkmcn,
                'gthoten' => $gthoten,
                'gtdiachi' => $gtdiachi,
                'gtsdt'=> $gtsdt,
                'gtcmnd' => $gtcmnd
            ];
            
            //valid
            if ($lhhoten == "") {
                $arrData['error'] = 'Bạn chưa nhập họ tên';
                $this->load->view('gioi-thieu-khach-hang', $arrData);
                return true;
//                redirect('gioi-thieu-khach-hang');
            }
            
            if ($lhdiachi == "") {
                $arrData['error'] = 'Bạn chưa nhập địa chỉ';
                $this->load->view('gioi-thieu-khach-hang', $arrData);
                return true;
//                redirect('gioi-thieu-khach-hang');
            }
            
            if ($lhsdt == "") {
                $arrData['error'] = 'Bạn chưa nhập số điện thoại';
                $this->load->view('gioi-thieu-khach-hang', $arrData);
                return true;
            }
            
            if ($gthoten == "") {
                $arrData['error'] = 'Bạn chưa nhập họ tên';
                $this->load->view('gioi-thieu-khach-hang', $arrData);
                return true;
            }
            
            if ($gtdiachi == "") {
                $arrData['error'] = 'Bạn chưa nhập địa chỉ';
                $this->load->view('gioi-thieu-khach-hang', $arrData);
                return true;
            }
            
            if ($gtsdt == "") {
                $arrData['error'] = 'Bạn chưa nhập số điện thoại';
                $this->load->view('gioi-thieu-khach-hang', $arrData);
                return true;
            }
            $data = array(
                'customer_one_name' => $lhhoten,
                'customer_one_address' => $lhdiachi,
                'customer_one_phone' => $lhsdt,
                'customer_one_cmnd' => $lhcmnd,
                'customer_one_promotion_code' => $lhkmcn,
                'customer_two_name' => $gthoten,
                'customer_two_address' => $gtdiachi,
                'customer_two_phone' => $gtsdt,
                'customer_two_cmnd' => $gtcmnd
            );
            $this->load->model('customer_introduced');
            $result = $this->customer_introduced->form_insert($data);
            redirect(base_url());
            //$this->load->view('welcome');
            //if ($result) {
                //redirect('welcome');
                //$this->load->view('welcome');
            //} //else {
                //$this->session->set_flashdata('notice', 'Vui lòng điền đầy đủ thông tin!');
            //}
            //valid
            /*$arrError = [];
            if ($arrError) {

                $this->session->set_flashdata('arrData', $arrError);
                redirect('gioi-thieu-khach-hang');
            }*/
        }
        $this->load->view('gioi-thieu-khach-hang');
    }

    public function veVoiChungToi() {
        $this->load->view('ve-voi-chung-toi');
    }

    public function completeStepOne() {
        $arrResp = [
            'isError' => true,
            'message' => 'Lỗi !',
            'data' => []
        ];

        $params = $this->input->post();

        if (empty($params)) {
            $arrResp['message'] = 'Dữ liệu không hợp lệ !';
            echo json_encode($arrResp);
            return false;
        }

        $loanImg = trim($params['loanImg']);
        $loanMoney = (int) $params['loanMoney'];
        $loanMonth = (int) $params['loanMonth'];
        $arrLoanItem = $params['arrLoanItem'];

        //valid
        if (empty($loanImg)) {
            $arrResp['message'] = 'Vui lòng chọn mục đích vay tiền !';
            echo json_encode($arrResp);
            return false;
        }

        if (empty($loanMoney)) {
            $arrResp['message'] = 'Vui lòng chọn số tiền cần vay !';
            echo json_encode($arrResp);
            return false;
        }

        if (empty($loanMonth)) {
            $arrResp['message'] = 'Vui lòng chọn thời gian vay !';
            echo json_encode($arrResp);
            return false;
        }

        if (empty($arrLoanItem)) {
            $arrResp['message'] = 'Vui lòng chọn giấy tờ tùy thân !';
            echo json_encode($arrResp);
            return false;
        }

        //save session
        $stepOne = [
            'loanStepOne' => [
                'loanImg' => $loanImg,
                'loanMoney' => $loanMoney,
                'loanMonth' => $loanMonth,
                'arrLoanItem' => $arrLoanItem,
                'stepOneComplete' => true
            ]
        ];

        $this->session->set_userdata($stepOne);

        $loanStepTwoUrl = $this->config->base_url() . 'step-2';

        $arrResp = [
            'isError' => false,
            'message' => 'Thành công',
            'data' => [
                'loanStepTwoUrl' => $loanStepTwoUrl
            ]
        ];

        echo json_encode($arrResp);
        return true;
    }

    public function completeStepThree() {
        $arrResp = [
            'isError' => true,
            'message' => 'Lỗi !',
            'data' => []
        ];

        $params = $this->input->post();

        if (empty($params)) {
            $arrResp['message'] = 'Dữ liệu không hợp lệ !';
            echo json_encode($arrResp);
            return false;
        }

        $isTheTinDung = (int) $params['isTheTinDung'];
        $isBaoHiemNhanTho = (int) $params['isBaoHiemNhanTho'];
        $isHopDongLaoDong = (int) $params['isHopDongLaoDong'];

        $arrTtd = (array) $params['ttd'];
        $arrBhnt = (array) $params['bhnt'];
        $arrHdld = (array) $params['hdld'];

        $stepThree = [
            'loanStepThree' => [
                'stepThreeComplete' => true
            ]
        ];

        //valid
        if ($isTheTinDung) {
            if ($arrTtd['listNganHangPhatHanh'] == 0) {

                $arrResp['message'] = 'Vui lòng chọn ngân hàng phát hành ( thẻ tín dụng ) !';
                echo json_encode($arrResp);
                return false;
            }

            if ($arrTtd['listHanMuc'] == 0) {

                $arrResp['message'] = 'Vui lòng chọn hạn mức ( thẻ tín dụng ) !';
                echo json_encode($arrResp);
                return false;
            }

            $stepThree['loanStepThree']['ttd'] = $arrTtd;
        }

        if ($isBaoHiemNhanTho) {
            if ($arrBhnt['listCongTyThamGiaBaoHiem'] == 0) {

                $arrResp['message'] = 'Vui lòng chọn công ty bạn tham gia ( bảo hiểm ) !';
                echo json_encode($arrResp);
                return false;
            }

            if ($arrBhnt['baoHiemThoiGian'] == '') {

                $arrResp['message'] = 'Vui lòng chọn thời gian ( bảo hiểm ) !';
                echo json_encode($arrResp);
                return false;
            }

            if ($arrBhnt['baoHiemTien'] == '') {

                $arrResp['message'] = 'Vui lòng chọn tiền ( bảo hiểm ) !';
                echo json_encode($arrResp);
                return false;
            }

            $stepThree['loanStepThree']['bhnt'] = $arrBhnt;
        }

        if ($isHopDongLaoDong) {
            if ($arrHdld['tenCongTy'] == '') {

                $arrResp['message'] = 'Vui lòng điền tên công ty ( hợp đồng lao động ) !';
                echo json_encode($arrResp);
                return false;
            }

            if ($arrHdld['diaChi'] == '') {

                $arrResp['message'] = 'Vui lòng điền địa chỉ ( hợp đồng lao động ) !';
                echo json_encode($arrResp);
                return false;
            }

            if (empty($arrHdld['arrBaoHiem'])) {

                $arrResp['message'] = 'Vui lòng chọn bảo hiểm ( hợp đồng lao động ) !';
                echo json_encode($arrResp);
                return false;
            }

            if ($arrHdld['thoiGian'] == '') {

                $arrResp['message'] = 'Vui lòng chọn thời gian ( hợp đồng lao động ) !';
                echo json_encode($arrResp);
                return false;
            }

            if ($arrHdld['mucLuong'] == '') {

                $arrResp['message'] = 'Vui lòng chọn mức lương ( hợp đồng lao động ) !';
                echo json_encode($arrResp);
                return false;
            }

            $stepThree['loanStepThree']['hdld'] = $arrHdld;
        }

        //save session
        $this->session->set_userdata($stepThree);

        $loanStepFourUrl = base_url('step-4');

        $arrResp = [
            'isError' => false,
            'message' => 'Thành công',
            'data' => [
                'loanStepFourUrl' => $loanStepFourUrl
            ]
        ];

        echo json_encode($arrResp);
        return true;
    }

    public function completeStepTwo() {
        $arrResp = [
            'isError' => true,
            'message' => 'Lỗi !',
            'data' => []
        ];

        $params = $this->input->post();

        if (empty($params)) {
            $arrResp['message'] = 'Dữ liệu không hợp lệ !';
            echo json_encode($arrResp);
            return false;
        }

        $arrHinhThuc = $params['arrHinhThuc'];

        //valid
        if (empty($arrHinhThuc)) {
            $arrResp['message'] = 'Vui lòng chọn hình thức thế chấp tài sản hoặc hình thức chứng minh thu nhập !';
            echo json_encode($arrResp);
            return false;
        }

        //save session
        $stepTwo = [
            'loanStepTwo' => [
                'arrHinhThuc' => $arrHinhThuc,
                'stepTwoComplete' => true
            ]
        ];

        $this->session->set_userdata($stepTwo);

        $loanStepThreeUrl = base_url('step-3');

        $arrResp = [
            'isError' => false,
            'message' => 'Thành công',
            'data' => [
                'loanStepThreeUrl' => $loanStepThreeUrl
            ]
        ];

        echo json_encode($arrResp);
        return true;
    }

    public function completeStepFour() {
        $arrResp = [
            'isError' => true,
            'message' => 'Lỗi !',
            'data' => []
        ];

        $params = $this->input->post();

        if (empty($params)) {
            $arrResp['message'] = 'Dữ liệu không hợp lệ !';
            echo json_encode($arrResp);
            return false;
        }

        $soHoKhauXacNhan = $params['soHoKhauXacNhan'];
        $soHoKhauDiaDiem = $params['soHoKhauDiaDiem'];
        $soTamTruThoiGian = $params['soTamTruThoiGian'];

        if ($soHoKhauXacNhan == '') {

            $arrResp['message'] = 'Vui lòng xác nhận có hoặc không có hộ khẩu ( sổ hộ khẩu ) !';
            echo json_encode($arrResp);
            return false;
        }

        if ($soHoKhauDiaDiem == '') {

            $arrResp['message'] = 'Vui lòng xác nhận cư trú ( sổ hộ khẩu ) !';
            echo json_encode($arrResp);
            return false;
        }

        if ($soTamTruThoiGian == '') {

            $arrResp['message'] = 'Vui lòng xác nhận thời gian ( sổ tạm trú ) !';
            echo json_encode($arrResp);
            return false;
        }

        //save session
        $stepFour = [
            'loanStepFour' => [
                'soHoKhauXacNhan' => $soHoKhauXacNhan,
                'soHoKhauDiaDiem' => $soHoKhauDiaDiem,
                'soTamTruThoiGian' => $soTamTruThoiGian,
                'stepFourComplete' => true
            ]
        ];

        $this->session->set_userdata($stepFour);

        $loanStepFiveUrl = base_url('step-5');

        $arrResp = [
            'isError' => false,
            'message' => 'Thành công',
            'data' => [
                'loanStepFiveUrl' => $loanStepFiveUrl
            ]
        ];

        echo json_encode($arrResp);
        return true;
    }

    public function completeStepFive() {
        $arrResp = [
            'isError' => true,
            'message' => 'Lỗi !',
            'data' => []
        ];

        $params = $this->input->post();

        if (empty($params)) {
            $arrResp['message'] = 'Dữ liệu không hợp lệ !';
            echo json_encode($arrResp);
            return false;
        }

        $day = $params['day'];
        $date = $params['date'];
        $time = $params['time'];
        $soDienThoai = $params['soDienThoai'];
        $email = $params['email'];
        $mkm = $params['mkm'];
        $zalo = $params['zalo'];
        $fb = $params['fb'];

        if ($day == '' || $date == '') {
            $arrResp['message'] = 'Vui lòng chọn ngày hẹn !';
            echo json_encode($arrResp);
            return false;
        }

        if ($time == '') {
            $arrResp['message'] = 'Vui lòng chọn giờ hẹn !';
            echo json_encode($arrResp);
            return false;
        }

        if ($soDienThoai == '') {
            $arrResp['message'] = 'Vui lòng điền số điện thoại !';
            echo json_encode($arrResp);
            return false;
        }

        if ($email == '') {
            $arrResp['message'] = 'Vui lòng điền email !';
            echo json_encode($arrResp);
            return false;
        }

        //save session
        $stepFive = [
            'loanStepFive' => [
                'email' => $email,
                'soDienThoai' => $soDienThoai,
                'time' => $time,
                'day' => $day,
                'date' => $date,
                'stepFiveComplete' => true
            ]
        ];

        $this->session->set_userdata($stepFive);

        $camOnUrl = base_url('cam-on');

        $arrResp = [
            'isError' => false,
            'message' => 'Thành công',
            'data' => [
                'camOnUrl' => $camOnUrl
            ]
        ];

        echo json_encode($arrResp);
        return true;
    }

    public function completeGioiThieuKhachHang() {
        //$this->load->helper('url');
    }

}

?>