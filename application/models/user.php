<?php

class User extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert($arrData) {
//        if (empty($arrData)) {
//            return false;
//        }
//
//        $isInsert = $this->db->insert('loan', $arrData);
//
//        return $isInsert;
    }

    public function getList($arrConditions = []) {
//        $query = $this->db->get('loan');
//        return $query->result_array();
    }

    public function getDetail($arrConditions = []) {
        $this->db->from('user');

        $this->_addWhere($arrConditions);
        
        $query = $this->db->get();
        
        return $query->row_array();
    }

    protected function _addWhere($arrConditions) {
        if ($arrConditions['status']) {
            $this->db->where('status', $arrConditions['status']);
        }

        if ($arrConditions['deleted']) {
            $this->db->where('deleted', $arrConditions['deleted']);
        }

        if ($arrConditions['password']) {
            $this->db->where('password', $arrConditions['password']);
        }
        
        if ($arrConditions['user_name']) {
            $this->db->where('user_name', $arrConditions['userame']);
        }
    }

}

?>