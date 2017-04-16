<?php

class MY_Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->_addHeader();
    }

    protected function _addHeader() {
        //get module name
        $module = $this->uri->segment(1);
        $arrStatic = [];
        
        switch ($module) {
            case 'backend':
                $arrCss = [
                    'bootstrap.min.css',
                    'font-awesome.min.css',
                    'nprogress.css',
                    'custom.min.css'
                ];

                $arrJs = [
                    'jquery.min.js',
                    'bootstrap.min.js',
                    'fastclick.js',
                    'nprogress.js',
                    'custom.min.js'
                ];

                $view = 'admin/header';
                $arrStatic['static']['backend'] = [
                    'css' => $arrCss,
                    'js' => $arrJs
                ];
                break;
            case 'frontend':
                break;
            default:

                die('Error');
                break;
        }

        $this->load->vars($arrStatic);
    }

}
