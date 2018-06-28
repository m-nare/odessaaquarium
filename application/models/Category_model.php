<?php

class Category_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }

  public function get_categories(){
    $this->db->order_by('stock_category');
    $query = $this->db->get('stock_category');
    return $query->result_array();
  }

  public function get_category($category_id){
    $query = $this->db->get_where('stock_category', array('stock_category_id' => $category_id));
    return $query->row_array();
  }

  public function getcategoryimages(){
    $this->db->select('stock_category, category_image');
    $this->db->from('stock_category');
    $query = $this->db->get();

    return $query->result_array();
  }

  public function create($category_image){
    $data = array(
      'stock_category' => $this->input->post('stock_category'),
      'user_id' => $this->session->userdata('user_id'),
      'category_image' => $category_image
    );

    return $this->db->insert('stock_category', $data);
  }

  public function delete($id){
    $this->db->where('stock_category_id', $id);
    $this->db->delete('stock_category');
  }

  public function update($category_image){
    $data = array(
      'stock_category' => $this->input->post('stock_category'),
      'category_image' => $category_image
    );

    $this->db->where('stock_category_id', $this->input->post('stock_category_id'));
    return $this->db->update('stock_category', $data);
  }



}



?>
