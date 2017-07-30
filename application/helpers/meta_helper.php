<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function getMetaHelper($id, $nameModel){

        $id = (int) $id;

        if($id <= 0 || empty($nameModel)){
            return [];
        }

        //get main CodeIgniter object
       $ci =& get_instance();

       $model = $ci->load->model($nameModel);

        $arrConditions = [
            'deleted' => 0,
            'status' => 1,
            'id' => $id
        ];

       $meta = $model->getDetail($arrConditions);

       return [
           'metaTitle' => $meta['meta_title'],
           'metaKeyword' => $meta['meta_keyword'],
            'metaDescription' => $meta['meta_description']
       ];
    }

