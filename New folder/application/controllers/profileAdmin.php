<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profileAdmin extends CI_Controller {

	public function index()
	{
		
		$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templateAdmin/header');
		$this->load->view('templateAdmin/sidebar', $data);
		$this->load->view('templateAdmin/profile');
		$this->load->view('templateAdmin/footer');
	}
}
