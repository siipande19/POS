<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consignee extends CI_Controller {

	function __construct(){ 
		parent::__construct();	
		$this->load->model('consigneeModel' );	
	}


	public function index()
	{
		$data['consignee'] = $this->consigneeModel->get_all();
		
		$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templateAdmin/header');
		$this->load->view('templateAdmin/sidebar', $data);
		$this->load->view('Consignee/consignee', $data);
		$this->load->view('templateAdmin/footer');
	}


	public function insert()
	{
		$this->form_validation->set_rules('id_consignee', 'ID Consignee', 'trim|required');
		$this->form_validation->set_rules('nm_consignee', 'Nama Consignee', 'trim|required');
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
			$this->load->view('templateAdmin/header');
			$this->load->view('templateAdmin/sidebar', $data);
			$this->load->view('Consignee/insert', $data);
			$this->load->view('templateAdmin/footer');
		} else {
			$this->consigneeModel->insert();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses data berhasil <b>ditambahkan</b>!</div>');
			redirect('Consignee');
		}
	}

	public function update($id)
	{
		$this->form_validation->set_rules('id_consignee', 'ID Consignee', 'trim|required');
		$this->form_validation->set_rules('nm_consignee', 'Nama Consignee', 'trim|required');
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

		if ($this->form_validation->run() == FALSE) {
			$data['data'] = $this->consigneeModel->get_by_id($id);
			$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('templateAdmin/header');
			$this->load->view('templateAdmin/sidebar', $data);
			$this->load->view('Consignee/update', $data);
			$this->load->view('templateAdmin/footer');
		} else {
			$this->consigneeModel->update($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses data berhasil <b>ditambahkan</b>!</div>');
			redirect('Consignee');
		}
	}

	public function delete($id)
	{
		$this->consigneeModel->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sukses, data berhasil <b>dihapus</b>!</div>');
		redirect('Consignee', 'refresh');
	}

	public function detail($id)
	{
		$this->load->model('consigneeModel');
		$detail = $this->consigneeModel->detail_data($id);
		$data['detail'] = $detail;
		
		$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templateAdmin/header');
		$this->load->view('templateAdmin/sidebar', $data);
		$this->load->view('Consignee/detail', $data);
		$this->load->view('templateAdmin/footer');
	}
}