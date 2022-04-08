<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_role');
    }

    public function index()
    {
        $data['user_role'] = $this->Model_role->_role()->result();
        // $this->load->view('users/index', $data);
    }
}
// $data['tb_maintenance'] = $this->m_maintenances->get_maintenance()->result();