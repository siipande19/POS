<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	function __construct(){ 
		parent::__construct();	
		$this->load->model('customerModel' );	
	}


	public function index()
	{
		$data['customer'] = $this->customerModel->get_all();
		
		$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('MasterDataCustomer/customer', $data);
		$this->load->view('template/footer');
	}


	public function insert()
	{
		$this->form_validation->set_rules('id_customer', 'ID Customer', 'trim|required');
		$this->form_validation->set_rules('nm_customer', 'Nama Customer', 'trim|required');
		$this->form_validation->set_rules('nm_alias', 'Nama Alias', 'trim|required');
		$this->form_validation->set_rules('place', 'Lokasi', 'trim|required');
		$this->form_validation->set_rules('address', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('kel', 'Kelurahan', 'trim|required');
		$this->form_validation->set_rules('kec', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('city', 'Kota', 'trim|required');
		$this->form_validation->set_rules('country', 'Negara', 'trim|required');
		$this->form_validation->set_rules('post_code', 'Kode Pos', 'trim|required');
		$this->form_validation->set_rules('phone', 'Nomor Telepon', 'trim|required');
		$this->form_validation->set_rules('fax', 'Fax', 'trim|required');
		$this->form_validation->set_rules('contact', 'Kontak', 'trim|required');
		$this->form_validation->set_rules('npwp', 'NPWP', 'trim|required');
		$this->form_validation->set_rules('remark', 'Remark', 'trim|required');

		// $customerID = $this->customerModel->get_idCustomer();
  //       $nourut = substr($customerID, 1, 4);

  //       $kodeCustomerSekarang = $nourut+3;
  //       $data = array('id_customer' => $kodeCustomerSekarang);

		if ($this->form_validation->run() == FALSE) {
			$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('template/header');
			$this->load->view('template/sidebar', $data);
			$this->load->view('MasterDataCustomer/insert', $data);
			$this->load->view('template/footer');
		} else {
			$this->customerModel->insert();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses data berhasil <b>ditambahkan</b>!</div>');
			redirect('Customer');
		}
	}

	

	

	public function detail($id)
	{
		$this->load->model('customerModel');
		$detail = $this->customerModel->detail_data($id);
		$data['detail'] = $detail;
		
		$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('MasterDataCustomer/detail', $data);
		$this->load->view('template/footer');
	}
}