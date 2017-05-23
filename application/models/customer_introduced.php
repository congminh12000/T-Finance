<?php

class Customer_introduced extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function form_insert($data) {
        $this->db->insert('customer_introduced', $data);
    }

}

?>
