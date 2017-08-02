<?php

class Category_model extends CI_Model {

    protected $_table = 'category';

    function __construct() {
        parent::__construct();
    }

    public function insert($arrData) {
        if (empty($arrData)) {
            return false;
        }

        if(isset($arrData['name'])){
            $this->load->helper('general');

            $arrData['slug'] = getSlugHelper($arrData['name']);
        }

        $isInsert = $this->db->insert($this->_table, $arrData);

        return $isInsert;
    }

    public function update($arrData, $id) {
        if (empty($arrData)) {
            return false;
        }

        if(isset($arrData['name'])){
            $this->load->helper('general');

            $arrData['slug'] = getSlugHelper($arrData['name']);
        }

            $this->db->where('id', $id);
            $this->db->update($this->_table, $arrData);
            return true;
    }

    public function getList($arrConditions = [], $orderBy = 'DESC') {
        $this->_addWhere($arrConditions);

        $query = $this->db->from($this->_table)
            ->order_by('id', $orderBy)
            ->get();

        return $query->result_array();
    }

    public function getListKeyId($arrConditions){
        $arrCate = $this->getList($arrConditions);

        if(empty($arrCate)){
            return [];
        }

        $arrData = [];

        foreach($arrCate as $cate){
            $arrData[$cate['id']] = $cate;
        }

        return $arrData;
    }

    public function getDetail($arrConditions = []) {
        $this->db->from($this->_table);

        $this->_addWhere($arrConditions);

        $query = $this->db->get();

        return $query->row_array();
    }

    public function getSubCategory($parentId)
    {

        $arrConditions = [
            'deleted' => 0,
            'status' => 1,
            'parent_id' => $parentId
        ];

        $arrCategory = $this->getList($arrConditions);

        return $arrCategory;
    }

    public function getMainCategory()
    {
        $arrConditions = [
            'deleted' => 0,
            'status' => 1,
            'parent_id' => 0
        ];

        $arrCategory = $this->getList($arrConditions);

        $return = array();

        foreach ($arrCategory as $category)
        {
            $return[$category['id']] = $category;
            $return[$category['id']]['children'] = $this->getSubCategory($category['id']); // Get the categories sub categories
        }

        return $return;
    }

    public function getListParentAndChild($arrConditions){

        //get parent
        $category = $this->getDetail($arrConditions);

        if(empty($category)){
            return [];
        }

        $parentId = (int) $category['id'];

        //get children category
        $arrConditions = [
            'deleted' => 0,
            'status' => 1,
            'parent_id' => $parentId
        ];

        $arrCategoryChild = $this->getList($arrConditions);
        $arrCategory = $arrCategoryChild;
        $arrCategory[] = $category;

        return $arrCategory;
    }

    protected function _addWhere($arrConditions) {
        if (isset($arrConditions['status'])) {
            $this->db->where('status', $arrConditions['status']);
        }

        if (isset($arrConditions['deleted'])) {
            $this->db->where('deleted', $arrConditions['deleted']);
        }

        if (isset($arrConditions['parent_id'])) {
            $this->db->where('parent_id', $arrConditions['parent_id']);
        }

        if ($arrConditions['id']) {
            $this->db->where('id', $arrConditions['id']);
        }

        if ($arrConditions['name']) {
            $this->db->where('name', $arrConditions['name']);
        }

        if ($arrConditions['slug']) {
            $this->db->where('slug', $arrConditions['slug']);
        }

        if ($arrConditions['notId']) {
            $this->db->where('id !=', $arrConditions['notId']);
        }

        if ($arrConditions['inSlug']) {
            $this->db->where_in('slug', $arrConditions['inSlug']);
        }
    }

}

?>
