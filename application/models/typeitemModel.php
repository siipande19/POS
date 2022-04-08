<?php
defined('BASEPATH') or exit('No direct script access allowed');

class typeitemModel extends CI_Model{
	public function get_typeitem()
    {
        $this->db->from('tb_typeitem');
        $this->db->order_by('id_typeitem');
        return $this->db->get()->result();
    }
}