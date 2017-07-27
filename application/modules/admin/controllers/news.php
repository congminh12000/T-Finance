<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends MX_Controller {

    protected $_messageError = '';

    public function __construct() {
        parent::__construct();

        $this->load->helper('paginator');
    }

    public function index() {

        $newsModel = $this->load->model('news_model');

        $arrConditions = [
            'deleted' => 0
        ];

        $limit = 2;
        $total = $newsModel->getTotal($arrConditions);

        $paginator = getPaginator($total, $limit, base_url('news'));

        $offset  =  ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(2);

        $arrNews = $newsModel->getPaginator($arrConditions, $limit, $offset);

        $arrData = [
            'arrNews' => $arrNews,
            'paginator' => $paginator
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
                ];

                if($_FILES['avatar']['size']){
                    $arrUpload = $this->uploadAvatar();

                    if($arrUpload['isError'] == false){
                        $arrInsert['avatar'] = $_FILES['avatar']['name'];
                    } else{

                        $arrData = [
                            'messageError' => $arrUpload['message']['error']
                        ];

                        $this->load->view('news/add-news', $arrData);
                        return this;
                    }
                }

                $newsModel = $this->load->model('news_model');

                $resultInsert = $newsModel->insert($arrInsert);

                if($resultInsert){
                    redirect(base_url('news'));
                } else {
                    $arrData = [
                        'messageError' => 'Thêm thất bại, vui lòng thử lại !'
                    ];
                }

            }else{
                $arrData = [
                    'messageError' => $this->_messageError
                ];
            }
        }


        $this->load->view('news/add-news', $arrData);
    }

    public function edit(){

    }

    protected function _validFormNews(){

        $formValidation = $this->form_validation;

        $formValidation->set_rules('title', 'Tiêu đề', 'trim|required')
            ->set_rules('content', 'Nội dung', 'trim')
            ->set_rules('author', 'Tác giả', 'trim')
            ->set_rules('status', 'Trạng thái', '')
            ->set_rules('description', 'Mô tả ngắn', 'trim');

        //valid upload
        if($_FILES['avatar']['size']){
            $arrResp = $this->uploadCheck($_FILES['avatar']);

            if($arrResp['isError']){
                $this->_messageError = $arrResp['message'];

                return false;
            }

        }

        if ($formValidation->run() == FALSE)
        {
                return false;
        }

        return true;
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
