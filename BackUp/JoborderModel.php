<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JoborderModel extends CI_Model
{
    public function get_all()
    {
        $this->db->from('tbl_joborder');
        $this->db->where("tbl_joborder.control_user", $this->session->userdata('email'));
        // $this->db->distinct();
        // $this->db->group_by('no_job');
        $this->db->order_by('id');
        return $this->db->get()->result();
    }

     public function get_by_id($id)
    {
        $this->db->from('tbl_joborder');
        $this->db->where('id', $id);
        return $this->db->get()->row(0);
    }

    public function data_user()
    {
        $this->db->where('tbl_joborder.sales' , $this->session->userdata('sales'));
        return $this->db->get('tbl_joborder')->result();
    }

    public function get_customer()
    {
        $this->db->from('tb_customer');
        $this->db->order_by('id_customer');
        return $this->db->get()->result();
    }

    public function create($data)
    {
        return $this->db->insert_batch('tb_dtljoborder', $data);
    }

    public function get_id_joborder($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_joborder');
        $this->db->where('id', $id);
        return $this->db->get()->row(0);
    }

//     public function insert()
//     {
//         date_default_timezone_set('Asia/Jakarta');
//         $data = array(
//             'consignee' => $this->input->post('consignee'),
//             'id_customer' => $this->input->post('id_customer'),
//             // 'nm_item' => $this->input->post('nm_item'),
//             'colli' => $this->input->post('colli'),
//             'colliSat' => $this->input->post('colliSat'),
//             'no_job' => $this->input->post('no_job'),
//             'gweight' => $this->input->post('gweight'),
//             'gsat' => $this->input->post('gsat'),
//             'shipper' => $this->input->post('shipper'),
//             'mawb' => $this->input->post('mawb'),
//             'hawb' => $this->input->post('hawb'),
//             'lcl' => $this->input->post('lcl'),
//             'lclSat' => $this->input->post('lclSat'),
//             'sales' => $this->input->post('sales'),
//             // 'harga' => $this->input->post('harga'),
//             // 'jumlah' => $this->input->post('jumlah'),
//             // 'grand_total' => $this->input->post('grand_total'),
//             'control_user'=>$this->session->userdata('email'),
//             'date_create'=>date('Y-m-d H:i:s'),
//         );
// //        die(var_dump($data));
//         $this->db->insert('tbl_joborder', $data);
//         return $this->db->insert_id();

//         $id_joborder = $this->db->insert('tbl_joborder', $data);
  
//         $joborder = array(
//             'id_dtljoborder'    =>$id_joborder,
//             'no_job'            =>$this->input->post('no_job'),
//             'nm_item'           =>$this->input->post('nm_item'),
//             'qty'               =>$this->input->post('qty'),
//             'harga'             =>$this->input->post('harga'),
//         );

//         $this->db->insert('tb_dtljoborder',$joborder);
//     }

    public function update($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'no_job' => $this->input->post('no_job'),
            'id_customer' => $this->input->post('id_customer'),
            'nm_item' => $this->input->post('nm_item'),
            'consignee' => $this->input->post('consignee'),
            'shipper' => $this->input->post('shipper'),
            'mawb' => $this->input->post('mawb'),
            'hawb' => $this->input->post('hawb'),
            'colli' => $this->input->post('colli'),
            'colliSat' => $this->input->post('colliSat'),
            'gweight' => $this->input->post('gweight'),
            'gsat' => $this->input->post('gsat'),
            'lcl' => $this->input->post('lcl'),
            'lclSat' => $this->input->post('lclSat'),
            'sales' => $this->input->post('sales'),
            'harga' => $this->input->post('harga'),
            'jumlah' => $this->input->post('jumlah'),
            'grand_total' => $this->input->post('grand_total'),
            'user_edit'=>$this->session->userdata('email'),
            'date_edit'=>date('Y-m-d H:i:s'),
        );
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('tbl_joborder', $data);   
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_joborder');
    }

    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('tbl_joborder', array('id'=>$id))->row();
        return $query;
    }

    public function detail_databarang($id = NULL)
    {
        // $this->db->select('no_job, nm_item, harga, qty, ppn, jumlah');
        // // $this->db->where('id', $id);
        // // $this->db->distinct();
        // // $this->db->group_by('no_job');
        // $this->db->having(array('no_job =' => '5555' ));
        // $this->db->from('tbl_joborder');
        // $query = $this->db->get();
        // return $query->result_array();

        // $this->db->select('no_job, nm_item, harga, ppn, qty, jumlah, grand_total');
        // $this->db->order_by('tbl_joborder.no_job');
        // $this->db->from('tbl_joborder');
        // $this->db->where_in('no_job');
        // $query = $this->db->get();
        // return $query->result_array();

        // $query = $this->db->query('select no_job, count(*) no_job from tbl_joborder group by no_job having count(no_job) > 1');
        
        // return $query->result();

        $this->db->select('jo.id, djo.id_dtljoborder, djo.no_job, djo.kd_job, djo.no_invoice, djo.nm_item, djo.harga, djo.qty, djo.ppn, djo.hppn, djo.jumlah, djo.tinvoice1');
        $this->db->from('tb_dtljoborder djo');
        $this->db->join('tbl_joborder jo', 'djo.id_dtljoborder = jo.id');
        $this->db->where('id_dtljoborder', $id);
        // $this->db->having('COUNT("no_job")>1');
        // $this->db->group_by('no_job');
        $query = $this->db->get();
        return $query->result_array();
    }
}