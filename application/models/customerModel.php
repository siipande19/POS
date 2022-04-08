<?php
defined('BASEPATH') or exit('No direct script access allowed');

class customerModel extends CI_Model
{


    public $id_customer;


    public function get_idCustomer()
    {
        $query = $this->db->query("SELECT MAX(id_customer) as id_customer from tb_customer");
        $hasil = $query->row();
        return $hasil->id_customer;
    }

    public function get_all()
    {
        $this->db->from('tb_customer');
        $this->db->order_by('id_customer');
        return $this->db->get()->result();
    }

     public function get_by_id($id)
    {
        $this->db->from('tb_customer');
        $this->db->where('id_customer', $id);
        return $this->db->get()->row(0);
    }



    public function insert()
    {
        $data = array(
            'id_customer' => $this->input->post('id_customer'),
           'nm_customer' => $this->input->post('nm_customer'),
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
        $this->db->insert('tb_customer', $data);    
    }

    public function update($id)
    {
        $data = array(
           'id_customer' => $this->input->post('id_customer'),
           'nm_customer' => $this->input->post('nm_customer'),
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
        $this->db->where('id_customer', $id);
        $this->db->update('tb_customer', $data);   
    }

    public function delete($id)
    {
        $this->db->where('id_customer', $id);
        $this->db->delete('tb_customer');
    }

    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('tb_customer', array('id_customer'=>$id))->row();
        return $query;
    }
}
