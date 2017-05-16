<?php

class Loan extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert($arrData) {
        if (empty($arrData)) {
            return false;
        }

        $isInsert = $this->db->insert('loan', $arrData);

        return $isInsert;
    }

    public function getList($arrConditions = []) {
        $query = $this->db->get('loan');
        return $query->result_array();
    }

}

?>