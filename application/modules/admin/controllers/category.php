<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends MX_Controller {

    protected $_arrMessageError = [];

    public function __construct() {
        parent::__construct();

        $this->load->helper('category');
    }

    public function index() {
        $arrCategory = getMainCategoryHelper();

        $arrData = [
            'arrCategory' => $arrCategory
        ];

        $this->load->view('category/list-category', $arrData);
    }

    public function remove(){
        if($this->input->get()){
            $id = $this->input->get('id');

            $categoryModel = $this->load->model('category_model');

            //check exist
            $arrConditions = [
                'deleted' => 0,
                'parent_id' => $id
            ];

            $category = $categoryModel->getDetail($arrConditions);

            if($category){
                echo json_encode(['isError' => true, 'message' => 'Danh mục này đang chứa các mục con nên không thể xóa được !']);
                return $this;
            }

            $arrData = [
                'updated_at' => date('Y-m-d H:i:s', time()),
                'deleted' => 1
            ];

            $resultUpdate = $categoryModel->update($arrData, $id);

            if($resultUpdate){
                echo json_encode(['isError' => false]);
            }else {
                echo json_encode(['isError' => true, 'message' => 'Xóa thất bại !']);
            }
        }
    }

    public function add(){

        $arrData = [];

        if($this->input->post()){

            $isValid = $this->_validFormCategory();

            if($isValid){

                $arrInsert = [
                    'name' => trim($this->input->post('name')),
                    'status' => (int) $this->input->post('status'),
                    'parent_id' => (int) $this->input->post('parentId'),
                    'meta_title' => trim($this->input->post('metaTitle')),
                    'meta_keyword' => trim($this->input->post('metaKeyword')),
                    'meta_description' => trim($this->input->post('metaDescription'))
                ];

                $categoryModel = $this->load->model('category_model');

                $resultInsert = $categoryModel->insert($arrInsert);

                if($resultInsert){
                    $this->session->set_flashdata('save_category_success', 'Thêm thành công');
                    redirect(base_url('category'));
                } else {
                    $arrData = [
                        'arrMessageError' => 'Thêm thất bại, vui lòng thử lại !'
                    ];
                }

            }else{
                $arrData = [
                    'arrMessageError' => $this->_arrMessageError
                ];
            }
        }


        $this->load->view('category/add-category', $arrData);
    }

    public function edit($id){
        $id = (int) $id;

        if($id <= 0){
            redirect(base_url('category'));
        }

        $categoryModel = $this->load->model('category_model');

        $arrConditions = [
            'deleted' => 0,
            'id' => $id
        ];

        $category = $categoryModel->getDetail($arrConditions);

        if(empty($category)){
            redirect(base_url('category'));
        }

        $arrData = [
            'category' => $category
        ];

        if($this->input->post()){

            $isValid = $this->_validFormCategory($id);

            if($isValid){

                $arrUpdate = [
                    'name' => trim($this->input->post('name')),
                    'status' => (int) $this->input->post('status'),
                    'parent_id' => (int) $this->input->post('parentId'),
                    'meta_title' => trim($this->input->post('metaTitle')),
                    'meta_keyword' => trim($this->input->post('metaKeyword')),
                    'meta_description' => trim($this->input->post('metaDescription'))
                ];

                $categoryModel = $this->load->model('category_model');

                $resultUpdate = $categoryModel->update($arrUpdate, $id);

                if($resultUpdate){
                    $this->session->set_flashdata('save_category_success', 'Cập nhật thành công');
                    redirect(base_url('category'));
                } else {
                    $arrData['arrMessageError'] = 'Cập nhật thất bại, vui lòng thử lại !';
                }

            }else{
                $arrData['arrMessageError'] = $this->_arrMessageError;
            }
        }

        $this->load->view('category/edit-category', $arrData);
    }

    protected function _validFormCategory($id){

        $formValidation = $this->form_validation;

        $formValidation->set_rules('name', 'Tên danh mục', 'trim|required')
            ->set_rules('status', '', '')
            ->set_rules('parentId', '', '')
            ->set_rules('metaTitle', '', 'trim')
            ->set_rules('metaKeyword', '', 'trim')
             ->set_rules('metaDescription', '', 'trim');

        $name = trim($this->input->post('name'));

        $categoryModel = $this->load->model('category_model');

        //valid same value db
        if($name){
            $arrConditions = [
                'deleted' => 0,
                'name' => $name
            ];

            if($id > 0){
                $arrConditions['notId'] = $id;
            }

            $category = $categoryModel->getDetail($arrConditions);

            if($category){
                $this->_arrMessageError[] = 'Tên danh mục đã tồn tại, vui lòng đặt tên khác !';
            }
        }

        $isFormValid = $formValidation->run();

        if($this->_arrMessageError){
            $isFormValid = false;
        }

        return $isFormValid;

    }

}
