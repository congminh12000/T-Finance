<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MX_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $loanModel = $this->load->model('loan');
        
        $arrList = $loanModel->getList();
        
        $arrData = [
            'arrList' => $arrList
        ];
        
        $this->load->view('danh-sach-ho-so-vay', $arrData);
    }

}
