<?php
defined('BASEPATH') or exit('No direct script access allowed');

class shipperModel extends CI_Model
{


    public $id_customer;


    public function get_idShipper()
    {
        $query = $this->db->query("SELECT MAX(id_shipper) as id_shipper from tb_shipper");
        $hasil = $query->row();
        return $hasil->id_shipper;
    }

    public function get_all()
    {
        $this->db->from('tb_shipper');
        $this->db->order_by('id_shipper');
        return $this->db->get()->result();
    }

     public function get_by_id($id)
    {
        $this->db->from('tb_shipper');
        $this->db->where('id_shipper', $id);
        return $this->db->get()->row(0);
    }



    public function insert()
    {
        $data = array(
            'id_shipper' => $this->input->post('id_shipper'),
           'nm_shipper' => $this->input->post('nm_shipper'),
           'nm_alias' => $this->input->post('nm_alias'),
           'place' => $this->input->post('place'),
           'address' => $this->input->post('address'),
           'kel' => $this->input->post('kel'),
           'kec' => $this->input->post('kec'),
           'city' => $this->input->post('city'),
           'country' => $this->input->post('country'),
           'post_code' => $this->input->post('post_code'),
           'phone' => $this->input->post('phone'),
           'fax' => $this->input->post('fax'),
           'contact' => $this->input->post('contact'),
           'npwp' => $this->input->post('npwp'),
           'remark' => $this->input->post('remark'),
        );
        $this->db->insert('tb_shipper', $data);    
    }

    public function update($id)
    {
        $data = array(
           'id_shipper' => $this->input->post('id_shipper'),
           'nm_shipper' => $this->input->post('nm_shipper'),
           'nm_alias' => $this->input->post('nm_alias'),
           'place' => $this->input->post('place'),
           'address' => $this->input->post('address'),
           'kel' => $this->input->post('kel'),
           'kec' => $this->input->post('kec'),
           'city' => $this->input->post('city'),
           'country' => $this->input->post('country'),
           'post_code' => $this->input->post('post_code'),
           'phone' => $this->input->post('phone'),
           'fax' => $this->input->post('fax'),
           'contact' => $this->input->post('contact'),
           'npwp' => $this->input->post('npwp'),
           'remark' => $this->input->post('remark'),
        );
        $this->db->set($data);
        $this->db->where('id_shipper', $id);
        $this->db->update('tb_shipper', $data);   
    }

    public function delete($id)
    {
        $this->db->where('id_shipper', $id);
        $this->db->delete('tb_shipper');
    }
    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('tb_shipper', array('id_shipper'=>$id))->row();
        return $query;
    }
}
