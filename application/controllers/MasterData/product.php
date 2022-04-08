<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct(){ 
		parent::__construct();	

		$this->load->model('productModel' );
		$this->load->model('typeitemModel' );	
	}


	public function index()
	{
		$data['product'] = $this->productModel->get_all();
		$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('MasterDataProduct/product', $data);
		$this->load->view('template/footer');
	}

	public function insert()
	{
		$this->form_validation->set_rules('nm_item', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('type_item', 'Jenis Barang', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('template/header');
			$this->load->view('template/sidebar', $data);
			$this->load->view('MasterDataProduct/insert', $data);
			$this->load->view('template/footer');
		} else {
			$this->productModel->insert();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses data berhasil <b>ditambahkan</b>!</div>');
			redirect('MasterData/Product');
		}
	}

	public function update($id)
	{
		$this->form_validation->set_rules('nm_item', 'Nama Barang', 'trim|required');
		$this->form_validation->set_rules('type_item', 'Jenis Barang', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['data'] = $this->productModel->get_by_id($id);
			$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('template/header');
			$this->load->view('template/sidebar', $data);
			$this->load->view('MasterDataProduct/update', $data);
			$this->load->view('template/footer');
		} else {
			$this->productModel->update($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses data berhasil <b>ditambahkan</b>!</div>');
			redirect('Product');
		}
	}

	public function delete($id)
	{
		$this->productModel->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sukses, data berhasil <b>dihapus</b>!</div>');
		redirect('Product', 'refresh');
	}

	public function detail($id)
	{
		$this->load->model('productModel');
		$detail = $this->productModel->detail_data($id);
		$data['detail'] = $detail;
		
		$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('MasterDataProduct/detail', $data);
		$this->load->view('template/footer');
	}
}