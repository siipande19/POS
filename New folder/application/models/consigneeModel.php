<?php
defined('BASEPATH') or exit('No direct script access allowed');

class consigneeModel extends CI_Model
{


    public $id_consignee;


    public function get_idConsignee()
    {
        $query = $this->db->query("SELECT MAX(id_consignee) as id_consignee from tb_consignee");
        $hasil = $query->row();
        return $hasil->id_consignee;
    }

    public function get_all()
    {
        $this->db->from('tb_consignee');
        $this->db->order_by('id_consignee');
        return $this->db->get()->result();
    }

     public function get_by_id($id)
    {
        $this->db->from('tb_consignee');
        $this->db->where('id_consignee', $id);
        return $this->db->get()->row(0);
    }



    public function insert()
    {
        $data = array(
            'id_consignee' => $this->input->post('id_consignee'),
           'nm_consignee' => $this->input->post('nm_consignee'),
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
        $this->db->insert('tb_consignee', $data);    
    }

    public function update($id)
    {
        $data = array(
           'id_consignee' => $this->input->post('id_consignee'),
           'nm_consignee' => $this->input->post('nm_consignee'),
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
        $this->db->where('id_consignee', $id);
        $this->db->update('tb_consignee', $data);   
    }

    public function delete($id)
    {
        $this->db->where('id_consignee', $id);
        $this->db->delete('tb_consignee');
    }

    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('tb_consignee', array('id_consignee'=>$id))->row();
        return $query;
    }
}
