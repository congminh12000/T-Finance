<?php

class Customer_introduced_model extends CI_Model {

    protected $_table = 'customer_introduced';

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
    }

}

?>
