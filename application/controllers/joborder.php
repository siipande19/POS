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
		// $data['sum'] = $this->JoborderModel->sum_job();
		$data['joborder_user'] = $this->JoborderModel->data_user();
		// $data['detail_barang'] = $this->JoborderModel->detail_databarang($id, $id_kodejob);
		

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

	public function update($id, $id_kodejob)
	{
		$this->form_validation->set_rules('consignee', 'Consignee', 'trim|required');
        $this->form_validation->set_rules('id_customer', 'Customer', 'trim|required');        
        $this->form_validation->set_rules('colli', 'Colli', 'trim|required');
        $this->form_validation->set_rules('colliSat', 'colliSat', 'trim|required');
        $this->form_validation->set_rules('no_job', 'Nomor Joborder', 'trim|required');
        $this->form_validation->set_rules('kd_job', 'Kode Joborder', 'trim|required');
        $this->form_validation->set_rules('gweight', 'Gweight', 'trim|required');
        $this->form_validation->set_rules('gsat', 'Gsat', 'trim|required');
        $this->form_validation->set_rules('shipper', 'Shipper', 'trim|required');
        $this->form_validation->set_rules('mawb', 'MAWB', 'trim|required');
        $this->form_validation->set_rules('hawb', 'HAWB', 'trim|required');
        $this->form_validation->set_rules('lcl', 'LCL', 'trim|required');
        $this->form_validation->set_rules('lclSat', 'lclSat', 'trim|required');
        $this->form_validation->set_rules('sales', 'Sales', 'trim|required');
        $this->form_validation->set_rules('kd_job', 'Kode Job', 'trim|required');        
        $this->form_validation->set_rules('id_dtljoborder', 'ID Detail Joborder');
        $this->form_validation->set_rules('no_invoice', 'Nomor Invoice');
        $this->form_validation->set_rules('nm_item[]', 'Nama Barang');
        $this->form_validation->set_rules('harga[]', 'Harga', 'trim|required');
        $this->form_validation->set_rules('jumlah[]', 'Jumlah', 'trim|required');
        $this->form_validation->set_rules('qty[]', 'Qty', 'trim|required');
        $this->form_validation->set_rules('ppn[]', 'PPN', 'trim|required');
        $this->form_validation->set_rules('Hppn[]', 'HPPN', 'trim|required');
        $this->form_validation->set_rules('grand_total', 'Grand Total', 'trim|required');
        $this->form_validation->set_rules('vat', 'VAT', 'trim|required');
        $this->form_validation->set_rules('cost', 'Cost', 'trim|required');
        $this->form_validation->set_rules('tcost', 'Total Cost', 'trim|required');
        $this->form_validation->set_rules('gross_profit', 'Gross Profit', 'trim|required');
        $this->form_validation->set_rules('pph23', 'PPH 23', 'trim|required');
        $this->form_validation->set_rules('net_profit', 'Net Profit', 'trim|required');

		if ($this->form_validation->run() == FALSE) {

			$data['data'] = $this->JoborderModel->get_by_id($id, $id_kodejob);
			echo validation_errors();
			// var_dump($data);
			// die();
			$data['detail_barang'] = $this->JoborderModel->detail_databarang($id, $id_kodejob);
			$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('template/header');
			$this->load->view('template/sidebar', $data);
			$this->load->view('joborder/update', $data);
			$this->load->view('template/footer');
		} else {
			// var_dump('expression');
			// die();
			$id_dtljoborder = $this->input->post();
			$this->JoborderModel->update($id, $id_kodejob, $id_dtljoborder);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses data berhasil <b>ditambahkan</b>!</div>');
			redirect('joborder');
		}
	}

	public function insertbarang($id)
	{
        $this->form_validation->set_rules('nm_item[]', 'Nama Barang', 'trim|required|xss_clean');
        $this->form_validation->set_rules('kd_job', 'Kode Job', 'trim|required');
        $this->form_validation->set_rules('no_job', 'No. Joborder', 'trim|required');
        $this->form_validation->set_rules('id_dtljoborder', 'ID Detail Joborder', 'trim|required');
        $this->form_validation->set_rules('no_invoice', 'No. Invoice');
        $this->form_validation->set_rules('harga[]', 'Harga', 'trim|required');
        $this->form_validation->set_rules('jumlah[]', 'Jumlah', 'trim|required');
        $this->form_validation->set_rules('qty[]', 'Qty', 'trim|required');
        $this->form_validation->set_rules('ppn[]', 'PPN', 'trim|required');
        $this->form_validation->set_rules('hppn[]', 'HPPN', 'trim|required');
        $this->form_validation->set_rules('grand_total', 'Grand Total', 'trim|required');
        $this->form_validation->set_rules('vat', 'VAT', 'trim|required');
        // $this->form_validation->set_rules('tinvoice1', 'Total Invoice', 'trim|required');
        $this->form_validation->set_rules('cost', 'Cost', 'trim|required');
        $this->form_validation->set_rules('tcost', 'Total Cost', 'trim|required');
        $this->form_validation->set_rules('gross_profit', 'Gross Profit', 'trim|required');
        $this->form_validation->set_rules('pph23', 'PPH 23', 'trim|required');
        $this->form_validation->set_rules('net_profit', 'Net Profit', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
			$data['data'] = $this->JoborderModel->get_byid($id);
			// $data['data'] = $this->JoborderModel->get_all();
			$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('template/header');
			$this->load->view('template/sidebar', $data);
			$this->load->view('joborder/insertbarang', $data);
			$this->load->view('template/footer');
		} else {
			$nm_item = $this->input->post('nm_item');
			$this->db->trans_start();
			$result1[] = array(	
		      	'kd_job'		 => $this->input->post('kd_job'),
		      );
		       $this->db->insert_batch('tb_kodejob', $result1);
			$last_id1 = $this->db->insert_id();
			
		    foreach($nm_item AS $key => $val){
		      $result[] =  array(
		      	"nm_item"		 => $_POST['nm_item'][$key],
		      	"qty"			 => $_POST['qty'][$key],
		      	"ppn"			 => $_POST['ppn'][$key],
		      	"hppn"			 => $_POST['hppn'][$key],
		      	"harga"			 => $_POST['harga'][$key],
		      	"jumlah"		 => $_POST['jumlah'][$key],
		      	'id_kodejob'	 => $last_id1,
		      	'grand_total'	 => $this->input->post('grand_total'),
		      	'vat' 			 => $this->input->post('vat'),
		      	'tinvoice1'		 => $this->input->post('tinvoice1'),
		      	'cost'		 	 => $this->input->post('cost'),
		      	'tcost'		 	 => $this->input->post('tcost'),
		      	'gross_profit'	 => $this->input->post('gross_profit'),
		      	'pph23'		 	 => $this->input->post('pph23'),
		      	'net_profit'	 => $this->input->post('net_profit')
		      	
		      );
		      // var_dump($result);
		      // die();
		      $count = count($result);
		      $last_id = $this->db->insert_id();
		   	  $oke_id = $last_id + ($count-1);
		    }
		    $this->db->insert_batch('tb_barang', $result);
		    
		    foreach($nm_item AS $key => $val){
		     $result2[] = array(	
		      	
		      	'id_barang'		 => $oke_id,
		      	'id_dtljoborder' => $this->input->post('id_dtljoborder'),
		      	'no_invoice'	 => $this->input->post('no_invoice')
		      );
		 }
		       $this->db->insert_batch('tb_dtljoborder', $result2);		    
		    $this->db->trans_complete();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sukses data berhasil <b>ditambahkan</b>!</div>');
			redirect('joborder');
		}
	}

	public function delete($id, $id_kodejob)
	{
		$this->JoborderModel->delete($id, $id_kodejob);
		// $this->JoborderModel->delete_nojob($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sukses, data berhasil <b>dihapus</b>!</div>');
		redirect('joborder', 'refresh');
	}

	public function detail($id, $id_kodejob)
	{
		$this->load->model('JoborderModel');
		$data['detail'] = $this->JoborderModel->detail_data($id);;
		$data['detail_barang'] = $this->JoborderModel->detail_databarang($id, $id_kodejob);
		$data['detail_invoice'] = $this->JoborderModel->detail_datainvoice($id, $id_kodejob);
		// var_dump($data['detail_invoice']);
  //       die();
		
		
		$data['user'] = $this->db->get_where('user', 
			['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar', $data);
		$this->load->view('joborder/detail', $data);
		$this->load->view('template/footer');
	}

}