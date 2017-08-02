<?php

class News_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public $arrTableJoin = [];

    public function insert($arrData) {
        if (empty($arrData)) {
            return false;
        }

        if(isset($arrData['title'])){
            $this->load->helper('general');

            $arrData['slug'] = getSlugHelper($arrData['title']);
        }

        $isInsert = $this->db->insert('new', $arrData);

        return $isInsert;
    }

    public function update($arrData, $id) {
        if (empty($arrData)) {
            return false;
        }

        if(isset($arrData['title'])){
            $this->load->helper('general');

            $arrData['slug'] = getSlugHelper($arrData['title']);
        }

            $this->db->where('id', $id);
            $this->db->update('new', $arrData);
            return true;
    }

    public function getList($arrConditions = []) {
        $this->_addWhere($arrConditions);

        $query = $this->db->select('new.*, category.slug as category_slug')
            ->from('new')
            ->join('category', 'category.id = new.category_id', 'left')
            ->order_by('new.id', 'DESC')
            ->get();

        return $query->result_array();
    }

    public function getTotal($arrConditions)
    {
        $this->_addWhere($arrConditions);
        $query = $this->db->select('count(*) as count')->get('new');

    	return current($query->result_array())['count'];
    }

    public function getPaginator($arrConditions, $page = 1, $limit = 20){
        $this->_addWhere($arrConditions);

        $offset = ( $page - 1 ) * $limit;

        $new = $this->db->select('new.*, category.slug as category_slug')
            ->from('new')
            ->join('category', 'category.id = new.category_id', 'left')
            ->limit($limit, $offset)
            ->order_by('new.id', 'DESC')
            ->get()
            ->result();

        return $new;
    }

    public function getDetail($arrConditions = []) {
        $this->db->from('new');

        $this->_addWhere($arrConditions);

        $query = $this->db->get();

        return $query->row_array();
    }

    protected function _addWhere($arrConditions) {
        if (isset($arrConditions['status'])) {
            $this->db->where('new.status', $arrConditions['status']);
        }

        if (isset($arrConditions['deleted'])) {
            $this->db->where('new.deleted', $arrConditions['deleted']);
        }

        if ($arrConditions['id']) {
            $this->db->where('new.id', $arrConditions['id']);
        }

        if ($arrConditions['slug']) {
            $this->db->where('new.slug', $arrConditions['slug']);
        }

        if ($arrConditions['title']) {
            $this->db->where('new.title', $arrConditions['title']);
        }

        if ($arrConditions['inCategoryId']) {
            $this->db->where_in('new.category_id', $arrConditions['inCategoryId']);
        }

        if ($arrConditions['categoryId']) {
            $this->db->where('new.category_id', $arrConditions['categoryId']);
        }

        if ($arrConditions['notId']) {
            $this->db->where('new.id !=', $arrConditions['notId']);
        }
    }

}

?>
