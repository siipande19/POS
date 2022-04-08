<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Joborder extends CI_Controller {

	function __construct(){ 
		parent::__construct();	

		$this->load->model('JoborderModel');	
	}


	public function index()
	{
		
		$data['joborder'] = $this->JoborderModel->get_all();
		$data['joborder_user'] = $this->JoborderModel->data_user();

		$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('joborder/index', $data);
		$this->load->view('template/footer');
	}

	public function insert()
	{
		
        $this->form_validation->set_rules('consignee', 'Consignee', 'trim|required');
        $this->form_validation->set_rules('id_customer', 'Customer', 'trim|required');
        $this->form_validation->set_rules('colli', 'Colli', 'trim|required');
        $this->form_validation->set_rules('colliSat', 'colliSat', 'trim|required');
        $this->form_validation->set_rules('no_job', 'Nomor Joborder', 'trim|required');
        // $this->form_validation->set_rules('nm_item[]', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('gweight', 'Gweight', 'trim|required');
        $this->form_validation->set_rules('gsat', 'Gsat', 'trim|required');
        $this->form_validation->set_rules('shipper', 'Shipper', 'trim|required');
        $this->form_validation->set_rules('mawb', 'MAWB', 'trim|required');
        $this->form_validation->set_rules('hawb', 'HAWB', 'trim|required');
        $this->form_validation->set_rules('lcl', 'LCL', 'trim|required');
        $this->form_validation->set_rules('lclSat', 'lclSat', 'trim|required');
        // $this->form_validation->set_rules('harga[]', 'Harga', 'trim|required');
        // $this->form_validation->set_rules('jumlah[]', 'Jumlah', 'trim|required');
        // $this->form_validation->set_rules('qty[]', 'Qty', 'trim|required');
        // $this->form_validation->set_rules('ppn[]', 'PPN', 'trim|required');
        // $this->form_validation->set_rules('grand_total', 'Grand Total', 'trim|required');
        $this->form_validation->set_rules('sales', 'Sales', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			// echo validation_errors();
			$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('template/header');
			$this->load->view('template/sidebar', $data);
			$this->load->view('joborder/insert', $data);
			$this->load->view('template/footer');
		} else {
			date_default_timezone_set('Asia/Jakarta');
			$nm_item = $this->input->post('nm_item');
		    // $result = array();
		      $result[] = array(
		     	'consignee' => $this->input->post('consignee'),
            	'id_customer' => $this->input->post('id_customer'),
            	'colli' => $this->input->post('colli'),
            	'colliSat' => $this->input->post('colliSat'),
            	'no_job' => $this->input->post('no_job'),
            	'gweight' => $this->input->post('gweight'),
            	'gsat' => $this->input->post('gsat'),
            	'shipper' => $this->input->post('shipper'),
            	'mawb' => $this->input->post('mawb'),
            	'hawb' => $this->input->post('hawb'),
            	'lcl' => $this->input->post('lcl'),
            	'lclSat' => $this->input->post('lclSat'),
            	'sales' => $this->input->post('sales'),
            	// 'grand_total' => $this->input->post('grand_total'),
            	'control_user'=>$this->session->userdata('email'),
            	'date_create'=>date('Y-m-d H:i:s'),
		      	
		      );

		    //   $id_joborder = $this->JoborderModel->create('tbl_joborder',$result);
		    //   foreach($nm_item AS $key => $val){
		    //   $result1[] = array(
		    //   	"id_dtljoborder" => $id_joborder,
		    //   	"nm_item"  => $_POST['nm_item'][$key],
		    //   	"qty"  => $_POST['qty'][$key],
		    //   	"ppn"  => $_POST['ppn'][$key],
		    //   	"harga"  => $_POST['harga'][$key],
		    //   	"jumlah"  => $_POST['jumlah'][$key]
		    //   );
		    // }
    		// $insert1 = $this->JoborderModel->create('tb_dtljoborder',$result1);
			$this->db->insert_batch('tbl_joborder', $result);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses data berhasil <b>ditambahkan</b>!</div>');
			redirect('joborder');
		}
	}

	public function update($id)
	{
		$this->form_validation->set_rules('consignee', 'Consignee', 'trim|required');
        $this->form_validation->set_rules('id_customer', 'Customer', 'trim|required');
        $this->form_validation->set_rules('nm_item', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('colli', 'Colli', 'trim|required');
        $this->form_validation->set_rules('colliSat', 'colliSat', 'trim|required');
        $this->form_validation->set_rules('no_job', 'Nomor Joborder', 'trim|required');
        $this->form_validation->set_rules('gweight', 'Gweight', 'trim|required');
        $this->form_validation->set_rules('gsat', 'Gsat', 'trim|required');
        $this->form_validation->set_rules('shipper', 'Shipper', 'trim|required');
        $this->form_validation->set_rules('mawb', 'MAWB', 'trim|required');
        $this->form_validation->set_rules('hawb', 'HAWB', 'trim|required');
        $this->form_validation->set_rules('lcl', 'LCL', 'trim|required');
        $this->form_validation->set_rules('lclSat', 'lclSat', 'trim|required');
        $this->form_validation->set_rules('sales', 'Sales', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['data'] = $this->JoborderModel->get_by_id($id);
			$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();

			// $data['user'] = $this->db->get_where('user', 
			// ['name' => $this->session->userdata('name')])->row_array();

			$this->load->view('template/header');
			$this->load->view('template/sidebar', $data);
			$this->load->view('joborder/update', $data);
			$this->load->view('template/footer');
		} else {
			$this->JoborderModel->update($id);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses data berhasil <b>ditambahkan</b>!</div>');
			redirect('joborder');
		}
	}

	public function insertbarang($id)
	{
        $this->form_validation->set_rules('nm_item[]', 'Nama Barang', 'trim|required');
        $this->form_validation->set_rules('kd_job', 'Kode Job', 'trim|required');
        $this->form_validation->set_rules('no_job', 'No. Joborder', 'trim|required');
        $this->form_validation->set_rules('id_dtljoborder', 'ID Detail Joborder', 'trim|required');
        $this->form_validation->set_rules('no_invoice', 'No. Invoice', 'trim|required');
        $this->form_validation->set_rules('harga[]', 'Harga', 'trim|required');
        $this->form_validation->set_rules('jumlah[]', 'Jumlah', 'trim|required');
        $this->form_validation->set_rules('qty[]', 'Qty', 'trim|required');
        $this->form_validation->set_rules('ppn[]', 'PPN', 'trim|required');
        $this->form_validation->set_rules('hppn[]', 'HPPN', 'trim|required');
        $this->form_validation->set_rules('grand_total', 'Grand Total', 'trim|required');
        $this->form_validation->set_rules('vat', 'VAT', 'trim|required');
        $this->form_validation->set_rules('tinvoice1', 'Total Invoice', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
			$data['data'] = $this->JoborderModel->get_by_id($id);
			$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('template/header');
			$this->load->view('template/sidebar', $data);
			$this->load->view('joborder/insertbarang', $data);
			$this->load->view('template/footer');
		} else {
			
			$nm_item = $this->input->post('nm_item');
			// $id_joborder = $this->JoborderModel->get_by_id($id);
			$result1 = array();
		    foreach($nm_item AS $key => $val){
		      $result[] =  array(
		      	'id_dtljoborder' => $this->input->post('id_dtljoborder'),
		      	'no_invoice'	 => $this->input->post('no_invoice'),
		      	'no_job'		 => $this->input->post('no_job'),
		      	'grand_total'	 => $this->input->post('grand_total'),
		      	'vat' 			 => $this->input->post('vat'),
		      	'tinvoice1'		 => $this->input->post('tinvoice1'),
		      	'kd_job'		 => $this->input->post('kd_job'),
		      	"nm_item"		 => $_POST['nm_item'][$key],
		      	"qty"			 => $_POST['qty'][$key],
		      	"ppn"			 => $_POST['ppn'][$key],
		      	"hppn"			 => $_POST['hppn'][$key],
		      	"harga"			 => $_POST['harga'][$key],
		      	"jumlah"		 => $_POST['jumlah'][$key]
		      );
		    }
		    // $this->JoborderModel->create($data, $result);
		    $this->db->insert_batch('tb_dtljoborder', $result);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses data berhasil <b>ditambahkan</b>!</div>');
			redirect('joborder');
		}
	}

	public function delete($id)
	{
		$this->JoborderModel->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sukses, data berhasil <b>dihapus</b>!</div>');
		redirect('joborder', 'refresh');
	}

	public function detail($id)
	{
		$this->load->model('JoborderModel');
		$data['detail'] = $this->JoborderModel->detail_data($id);;
		$data['detail_barang'] = $this->JoborderModel->detail_databarang($id);
		
		$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('joborder/detail', $data);
		$this->load->view('template/footer');
	}

}