<?php
defined('BASEPATH') or exit('No direct script access allowed');

class productModel extends CI_Model
{
    public function get_all()
    {
        $this->db->from('tb_item');
        $this->db->order_by('id_item');
        return $this->db->get()->result();
    }

     public function get_by_id($id)
    {
        $this->db->from('tb_item');
        $this->db->where('id', $id);
        return $this->db->get()->row(0);
    }
    

    public function insert()
    {
        $data = array(
           'nm_item' => $this->input->post('nm_item'),
           'type_item' => $this->input->post('type_item'),
        );
        $this->db->insert('tb_item', $data);    
    }

    public function update($id)
    {
        $data = array(
           'nm_item' => $this->input->post('nm_item'),
           'type_item' => $this->input->post('type_item'),
        );
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('tb_item', $data);   
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_item');
    }

    public function detail_data($id = NULL)
    {
        $query = $this->db->get_where('tb_item', array('id'=>$id))->row();
        return $query;
    }
}
