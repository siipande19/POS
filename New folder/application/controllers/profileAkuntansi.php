<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profileAkuntansi extends CI_Controller {

	public function index()
	{
		
		$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templateAkuntansi/header');
		$this->load->view('templateAkuntansi/sidebar', $data);
		$this->load->view('templateAkuntansi/profile');
		$this->load->view('templateAkuntansi/footer');
	}
}
