<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JoborderModel extends CI_Model
{
    public function get_all()
    {
        // $this->db->select('tbl_joborder.*, tb_dtljoborder.*, tb_kodejob.*');
        $this->db->select('bjo.id_kodejob, bjo.ppn, bjo.cost, bjo.pph23, bjo.net_profit, bjo.gross_profit, bjo.grand_total, djo.no_invoice,
            sum(bjo.grand_total) as total_job, count(djo.id_dtljoborder) as oke, jo.id, jo.no_job, jo.id_customer, jo.mawb, jo.hawb, jo.sales, jo.control_user, jo.date_create, jo.user_edit, jo.date_edit, kjo.kd_job');
        $this->db->from('tbl_joborder jo');
        $this->db->join('tb_dtljoborder djo', 'djo.id_dtljoborder = jo.id', 'left');
         $this->db->join('tb_barang bjo', 'bjo.id = djo.id_barang', 'left');
        $this->db->join('tb_kodejob kjo', 'kjo.id = bjo.id_kodejob', 'left');
       
        $this->db->where("jo.control_user", $this->session->userdata('email'));
        $this->db->distinct();
        $this->db->group_by('kd_job, no_job');
        $this->db->order_by('jo.id');
        return $this->db->get()->result();

        // $this->db->select('djo.kd_job, djo.grand_total, djo.id_dtljoborder, djo.jumlah, jo.id, jo.no_job, jo.id_customer, jo.mawb, jo.hawb, jo.sales, jo.control_user, jo.date_create, jo.user_edit, jo.date_edit');
        // $this->db->from('tbl_joborder jo');
        // $this->db->join('tb_dtljoborder djo', 'jo.id = djo.id_dtljoborder');
        // $this->db->where("jo.control_user", $this->session->userdata('email'));
        // // $this->db->distinct();
        // // $this->db->group_by('no_job');
        // $this->db->order_by('id');
        // return $this->db->get()->result();
    }
    
    public function sum_job()
    {
        // $this->db->distinct('id_dtljoborder');
        $sql = "select count(if(id_dtljoborder, grand_total, NULL)) as oke,
                        sum(if(id, grand_total, NULL)) as total_job
                from tb_dtljoborder
                ";
        // $this->db->select('count(if(id_dtljoborder, grand_total, NULL)), sum(if(id_dtljoborder, grand_total, NULL)) as total_job');
        // $this->db->from('tb_dtljoborder');
        // $this->db->get_where('tb_dtljoborder', array('id_dtljoborder'))->row();
        
        $result = $this->db->query($sql);
        return $result->row();
    }
    
    public function get_byid($id)
    {
        $this->db->from('tbl_joborder');
        $this->db->where('id', $id);
        return $this->db->get()->row(0);
    }

     public function get_by_id($id, $id_kodejob)
    {
        $this->db->select('*');
        $this->db->from('tb_dtljoborder djo');
       $this->db->join('tbl_joborder jo', 'djo.id_dtljoborder = jo.id', 'left');
       $this->db->join('tb_barang bjo', 'bjo.id = djo.id_barang', 'left');
        $this->db->join('tb_kodejob kjo', 'kjo.id = bjo.id_kodejob', 'left');
        // $this->db->where('djo.id');
        $this->db->where('djo.id_dtljoborder', $id);
        $this->db->where('bjo.id_kodejob', $id_kodejob);
        $query = $this->db->get_where('tbl_joborder', array('jo.id'=>$id))->row();
        return $query;
    }

    public function data_user()
    {
        $this->db->where('tbl_joborder.sales' , $this->session->userdata('sales'));
        return $this->db->get('tbl_joborder')->result();
    }

    public function update($id, $id_kodejob, $id_dtljoborder)
    {
        // $this->db->trans_start(); $id = NULL, $id_kodejob = NULL, $id_dtljoborder = NULL
        date_default_timezone_set('Asia/Jakarta');

        $oke = $this->input->post();
        $result = array();
        for ($i=0; $i <= count($oke["id_kodejob"]); $i++) 
        { 
            $result[] =  
            array(
                // 'id'             => $oke['id'][$i],
                'id_dtljoborder' => $oke['id_dtljoborder'][$i],
                'id_kodejob'     => $oke['id_kodejob'][$i],
                'nm_item'        => $oke['nm_item'][$i],
                'qty'            => $oke['qty'][$i],
                'ppn'            => $oke['ppn'][$i],
                'Hppn'           => $oke['Hppn'][$i],
                'harga'          => $oke['harga'][$i],
                'jumlah'         => $oke['jumlah'][$i]
            
                // 'id_dtljoborder' => $this->input->post('id_dtljoborder'),
                        
              );
            array(
                'no_invoice'     => $this->input->post('no_invoice'),
                'grand_total'    => $this->input->post('grand_total'),
                'vat'            => $this->input->post('vat'),
                'tinvoice1'      => $this->input->post('tinvoice1'),
                'cost'           => $this->input->post('cost'),
                'tcost'          => $this->input->post('tcost'),
                'gross_profit'   => $this->input->post('gross_profit'),
                'pph23'          => $this->input->post('pph23'),
                'net_profit'     => $this->input->post('net_profit')        
                );
        }
        // var_dump($result);
        // die();
        $this->db->update_batch('tb_dtljoborder', $result, 'id_kodejob');


        $data = array(
            'no_job' => $this->input->post('no_job'),
            'id_customer' => $this->input->post('id_customer'),
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
            'user_edit'=>$this->session->userdata('email'),
            'date_edit'=>date('Y-m-d H:i:s')
        );
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('tbl_joborder', $data);

        $result1 = array( 
                'kd_job'         => $this->input->post('kd_job')
              );
        $this->db->set($result1);
        $this->db->where('id', $id_kodejob);
        $this->db->update('tb_kodejob', $result1);

           
    }

    // public function update_batch($id)
    // {
    //     $i = 0;
    //     foreach ($id as $a){
    //     $result[$i] = array(
    //         'id' => $id[$i],
    //         'name' => $name[$i],
    //         'sku' => $sku[$i]
    //     );
    //     $i++;
    //     }

    //     $this->db->update_batch('tb_dtljoborder', $data, 'id');
    //     return true;
    // }
    
    public function delete_nojob($id)
    {
        $this->db->select('jo.id');
        $this->db->from('tbl_joborder jo');
        $this->db->where('id', $id);
        $this->db->delete('tbl_joborder');
    }
    public function delete($id, $id_kodejob)
    {
        $this->db->select('kjo.id, jo.id, djo.id_dtljoborder');
        $this->db->from('tb_dtljoborder djo');
        $this->db->join('tbl_joborder jo', 'djo.id_dtljoborder = jo.id');
        $this->db->join('tb_kodejob kjo', 'kjo.id = djo.id_kodejob', 'left');
        $this->db->where('id_dtljoborder', $id);
        $this->db->where('id_kodejob', $id_kodejob);
        // $this->db->where('id', $id);
        // $this->db->delete('tb_kodejob');
        $this->db->delete('tb_dtljoborder');
        // $this->db->delete('tbl_joborder');
    }

    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('tbl_joborder', array('id'=>$id))->row();
        return $query;
    }

    public function detail_databarang($id = NULL, $id_kodejob = NULL)
    {

        $this->db->select('kjo.id, kjo.kd_job, jo.id, djo.id_dtljoborder, djo.no_invoice, bjo.nm_item, bjo.harga, bjo.qty, bjo.ppn, bjo.Hppn, bjo.jumlah, bjo.grand_total, bjo.cost, bjo.vat, bjo.tcost, bjo.gross_profit, bjo.pph23, bjo.net_profit');
        // $this->db->select('*');

        $this->db->from('tb_dtljoborder djo');
        $this->db->join('tbl_joborder jo', 'djo.id_dtljoborder = jo.id');
        $this->db->join('tb_barang bjo', 'bjo.id = djo.id_barang', 'left');
        $this->db->join('tb_kodejob kjo', 'kjo.id = bjo.id_kodejob', 'left');
        $this->db->where('id_dtljoborder', $id);
        $this->db->where('id_kodejob', $id_kodejob);
        // $this->db->sum();
        // $this->db->where('djo.id_kodejob', 'kjo.id');
        // $this->db->group_by('djo.id_kodejob');
        $this->db->order_by('kjo.id');
        $query = $this->db->get();
        // var_dump($query->result_array(2));
        // die();
        return $query->result_array();

    }
    public function detail_datainvoice($id = NULL, $id_kodejob = NULL)
    {
        $this->db->select('sum(bjo.jumlah) as tot, sum(bjo.harga) as tharga, sum(bjo.grand_total) as tinvoice');
        $this->db->from('tb_dtljoborder djo');
        $this->db->join('tbl_joborder jo', 'djo.id_dtljoborder = jo.id');
        $this->db->join('tb_barang bjo', 'bjo.id = djo.id_barang', 'left');
        $this->db->join('tb_kodejob kjo', 'kjo.id = bjo.id_kodejob', 'left');
        $this->db->where('id_dtljoborder', $id);
        $this->db->where('id_kodejob', $id_kodejob);
        $this->db->order_by('kjo.id');
        $query = $this->db->get();
        return $query->row_array();
    }

}
// djo.kd_job,
//  $this->db->select('jo.id, djo.id_dtljoborder, djo.no_job,  djo.no_invoice, djo.nm_item, djo.harga, djo.qty, djo.ppn, djo.hppn, djo.jumlah, djo.tinvoice1, kjo.id_kodejob, kjo.kd_job');