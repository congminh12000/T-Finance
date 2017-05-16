<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MX_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('login');
    }

    public function handleLogin() {
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

        $username = trim($params['username']);
        $password = trim($params['password']);

        if (empty($username)) {
            $arrResp['message'] = 'Vui lòng điền tên đăng nhập !';
            echo json_encode($arrResp);
            return false;
        }

        if (empty($password)) {
            $arrResp['message'] = 'Vui lòng điền mật khẩu !';
            echo json_encode($arrResp);
            return false;
        }

        $userModel = $this->load->model('user');

        $arrConditions = [
            'status' => 1,
            'deleted' => 0,
            'username' => $username,
            'password' => $password
        ];

        $user = $userModel->getDetail($arrConditions);

        if (empty($user)) {
            $arrResp['message'] = 'Tài khoản này không tồn tại !';
            echo json_encode($arrResp);
            return false;
        }

        //save session
        $arrSession = [
            'userLogin' => [
                'username' => $username,
                'password' => $password,
                'isLogin' => true
            ]
        ];

        $this->session->set_userdata($arrSession);
        
        $arrResp = [
            'isError' => false,
            'message' => 'Thành công !',
            'data' => [
                'homeUrl' => base_url('admin')
            ]
        ];
        
        echo json_encode($arrResp);
        return true;
    }

}
