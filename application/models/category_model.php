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

        $isInsert = $this->db->insert($this->_table, $arrData);

        return $isInsert;
    }

    public function update($arrData, $id) {
        if (empty($arrData)) {
            return false;
        }

            $this->db->where('id', $id);
            $this->db->update($this->_table, $arrData);
            return true;
    }

    public function getList($arrConditions = []) {
        $this->_addWhere($arrConditions);

        $query = $this->db->from($this->_table)
            ->order_by('id', 'DESC')
            ->get();

        return $query->result_array();
    }

    public function getDetail($arrConditions = []) {
        $this->db->from($this->_table);

        $this->_addWhere($arrConditions);

        $query = $this->db->get();

        return $query->row_array();
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

        if ($arrConditions['notId']) {
            $this->db->where('id !=', $arrConditions['notId']);
        }
    }

}

?>
