<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function getParentCategoryHelper(){

        //get main CodeIgniter object
       $ci =& get_instance();

       $categoryModel = $ci->load->model('category_model');

        $arrConditions = [
            'deleted' => 0,
            'status' => 1,
            'parent_id' => 0
        ];

        $arrCategory = $categoryModel->getList($arrConditions);

        return $arrCategory;
    }

    function getSubCategoryHelper($parentId)
    {
        $ci =& get_instance();

        $categoryModel = $ci->load->model('category_model');

        $arrConditions = [
            'deleted' => 0,
            'parent_id' => $parentId
        ];

        $arrCategory = $categoryModel->getList($arrConditions);

        return $arrCategory;
    }

    function getMainCategoryHelper()
    {
        $ci =& get_instance();
        $ci->load->helper('category');

        $categoryModel = $ci->load->model('category_model');

        $arrConditions = [
            'deleted' => 0,
            'parent_id' => 0
        ];

        $arrCategory = $categoryModel->getList($arrConditions);

        $return = array();

        foreach ($arrCategory as $category)
        {
            $return[$category['id']] = $category;
            $return[$category['id']]['children'] = getSubCategoryHelper($category['id']); // Get the categories sub categories
        }

        return $return;
    }





