<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Frontend extends MX_Controller {

    public function index() {
        echo 'user';
        die;
        $this->load->view('users_view');
    }

}

/* End of file users.php */
/* Location: ./application/modules/users/controllers/users.php */