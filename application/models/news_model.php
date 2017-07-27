<?php

class News_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert($arrData) {
        if (empty($arrData)) {
            return false;
        }

        $isInsert = $this->db->insert('new', $arrData);

        return $isInsert;
    }

    public function update($arrData, $id) {
        if (empty($arrData)) {
            return false;
        }

            $this->db->where('id', $id);
            $this->db->update('new', $arrData);
            return true;
    }

    public function getList($arrConditions = []) {
        $query = $this->db->get('new');

        return $query->result_array();
    }

    public function getTotal($arrConditions)
    {
        $this->_addWhere($arrConditions);

    	return $this->db->select()->get('new')->num_rows();
    }

    public function getPaginator($arrConditions, $limit = 20, $offset = 1){
        $this->_addWhere($arrConditions);

        $new = $this->db->select()
            ->limit($limit, $offset)
    					->order_by('id', 'DESC')
                        ->get('new')
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
            $this->db->where('status', $arrConditions['status']);
        }

        if (isset($arrConditions['deleted'])) {
            $this->db->where('deleted', $arrConditions['deleted']);
        }

        if ($arrConditions['id']) {
            $this->db->where('id', $arrConditions['id']);
        }
    }

}

?>
