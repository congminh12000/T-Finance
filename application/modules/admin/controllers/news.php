<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends MX_Controller {

    protected $_arrMessageError = [];

    public function __construct() {
        parent::__construct();

        $this->load->helper('paginator');
    }

    public function index() {

        //get news
        $newsModel = $this->load->model('news_model');

        $arrConditions = [
            'deleted' => 0
        ];

        $limit = 10;
        $page = $this->uri->segment(2);
        $total = $newsModel->getTotal($arrConditions);
        $paginator = getPaginator($total, $limit, base_url('news'), 2);
        $arrNews = $newsModel->getPaginator($arrConditions, $page, $limit);

        //get category
        $categoryModel = $this->load->model('category_model');

        $arrConditions = [
            'deleted' => 0,
        ];

        $arrCategory = $categoryModel->getListKeyId($arrConditions);

        $arrData = [
            'arrNews' => $arrNews,
            'paginator' => $paginator,
            'arrCategory' => $arrCategory
        ];

        $this->load->view('news/list-news', $arrData);
    }

    public function remove(){
        if($this->input->get()){
            $id = $this->input->get('id');

            $arrData = [
                'updated_at' => date('Y-m-d H:i:s', time()),
                'deleted' => 1
            ];

            $newsModel = $this->load->model('news_model');
            $resultUpdate = $newsModel->update($arrData, $id);

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

            $isValid = $this->_validFormNews();

            if($isValid){

                $arrInsert = [
                    'title' => trim($this->input->post('title')),
                    'description' => trim($this->input->post('description')),
                    'content' => trim($this->input->post('content')),
                    'author' => trim($this->input->post('author')),
                    'status' => (int) $this->input->post('status'),
                    'category_id' => (int) $this->input->post('categoryId'),
                    'meta_title' => trim($this->input->post('metaTitle')),
                    'meta_keyword' => trim($this->input->post('metaKeyword')),
                    'meta_description' => trim($this->input->post('metaDescription'))
                ];

                if($_FILES['avatar']['size']){
                    $arrUpload = $this->uploadAvatar();

                    if($arrUpload['isError'] == false){
                        $arrInsert['avatar'] = $_FILES['avatar']['name'];
                    } else{

                        $arrData = [
                            'arrMessageError' => $arrUpload['message']
                        ];

                        $this->load->view('news/add-news', $arrData);
                        return this;
                    }
                }

                $newsModel = $this->load->model('news_model');

                $resultInsert = $newsModel->insert($arrInsert);

                if($resultInsert){
                    $this->session->set_flashdata('save_news_success', 'Thêm thành công');
                    redirect(base_url('news'));
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


        $this->load->view('news/add-news', $arrData);
    }

    public function edit($id){
        $id = (int) $id;

        if($id <= 0){
            redirect(base_url('news'));
        }

        $newsModel = $this->load->model('news_model');

        $arrConditions = [
            'deleted' => 0,
            'id' => $id
        ];

        $news = $newsModel->getDetail($arrConditions);

        if(empty($news)){
            redirect(base_url('news'));
        }

        $arrData = [
            'news' => $news
        ];

        if($this->input->post()){

            $isValid = $this->_validFormNews($id);

            if($isValid){

                $arrUpdate = [
                    'title' => trim($this->input->post('title')),
                    'description' => trim($this->input->post('description')),
                    'content' => trim($this->input->post('content')),
                    'author' => trim($this->input->post('author')),
                    'status' => (int) $this->input->post('status'),
                    'category_id' => (int) $this->input->post('categoryId'),
                    'meta_title' => trim($this->input->post('metaTitle')),
                    'meta_keyword' => trim($this->input->post('metaKeyword')),
                    'meta_description' => trim($this->input->post('metaDescription'))
                ];

                if($_FILES['avatar']['size']){
                    $resultUpload = $this->uploadAvatar();

                    if($resultUpload['isError'] == false){
                        $arrUpdate['avatar'] = $_FILES['avatar']['name'];
                    } else{

                        $arrData['arrMessageError'] = $resultUpload['message'];

                        $this->load->view('news/edit-news', $arrData);
                        return this;
                    }
                }

                $newsModel = $this->load->model('news_model');

                $resultUpdate = $newsModel->update($arrUpdate, $id);

                if($resultUpdate){
                    $this->session->set_flashdata('save_news_success', 'Cập nhật thành công');
                    redirect(base_url('news'));
                } else {
                    $arrData['arrMessageError'] = 'Cập nhật thất bại, vui lòng thử lại !';
                }

            }else{
                $arrData['arrMessageError'] = $this->_arrMessageError;
            }
        }

        $this->load->view('news/edit-news', $arrData);
    }

    protected function _validFormNews($id){

        $formValidation = $this->form_validation;

        $formValidation->set_rules('title', 'Tiêu đề', 'trim|required')
            ->set_rules('content', 'Nội dung', 'trim')
            ->set_rules('author', 'Tác giả', 'trim')
            ->set_rules('status', 'Trạng thái', '')
            ->set_rules('category_id', 'Danh mục', '')
            ->set_rules('description', 'Mô tả ngắn', 'trim')
            ->set_rules('metaTitle', 'Meta title', 'trim')
            ->set_rules('metaKeyword', 'Meta keyword', 'trim')
            ->set_rules('metaDescription', 'Meta description', 'trim');

        $title = trim($this->input->post('title'));

        $newsModel = $this->load->model('news_model');

        //valid same value db
        if($title){
            $arrConditions = [
                'deleted' => 0,
                'title' => $title
            ];

            if($id > 0){
                $arrConditions['notId'] = $id;
            }

            $news = $newsModel->getDetail($arrConditions);

            if($news){
                $this->_arrMessageError[] = 'Tiêu đề đã tồn tại, vui lòng đặt tiêu đề khác !';
            }
        }

        //valid upload
        if($_FILES['avatar']['size']){
            $arrResp = $this->uploadCheck($_FILES['avatar']);

            if($arrResp['isError']){
                $this->_arrMessageError[] = $arrResp['message'];
            }

        }

        $isFormValid = $formValidation->run();

        if($this->_arrMessageError){
            $isFormValid = false;
        }

        return $isFormValid;

    }

    public function uploadCheck($file){

        $allowed_mime_type_arr = array('image/jpeg','image/jpg','image/png');
        $mime = get_mime_by_extension($file['name']);

        if(isset($file['name']) && $file['name'] != ""){

            if(!in_array($mime, $allowed_mime_type_arr)){
                $arrResp = [
                    'isError' => true,
                    'message' => 'Chỉ được upload ảnh jpg, jpeg, png !'
                ];

                return $arrResp;
            }

            if($file['size'] > 5000000){

                $arrResp = [
                    'isError' => true,
                    'message' => 'Dung lượng ảnh không vượt quá 5MB !'
                ];

                return $arrResp;
            }

        }
    }

    public function uploadAvatar(){

        $config['upload_path'] = 'static/admin/img/news/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size']     = '5000000';
        $config['max_width'] = '600';
        $config['max_height'] = '400';

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('avatar'))
        {
                $error = array('error' => $this->upload->display_errors());

                return [
                    'isError' => true,
                    'message' => $error
                ];
        }

        return [
            'isError' => false,
            'message' => ''
        ];
    }

}
