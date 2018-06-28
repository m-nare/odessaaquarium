<?php

class stock_model extends CI_Model{
  public function __construct(){
    $this->load->database();
  }

  public function get_stock($id = FALSE){
    if($id == FALSE){
      $query = $this->db->get('stocks');
      return $query->result_array();
    } else {
      $query = $this->db->get_where('stocks', array('stock_id' => $id));
      return $query->row_array();
    }
  }

  public function get_stock_by_category($category_id){
    $this->db->order_by('name', 'ASC');
    $this->db->join('stock_category', 'stocks.stock_cat_id = stock_category.stock_category_id');
    $query = $this->db->get_where('stocks', array('stock_cat_id' => $category_id));
    return $query->result_array();
  }

  public function get_stock_with_category($id = FALSE){
    if($id == FALSE){
      $this->db->select('stock_id, name, quantity_in_stock, unit_price, stock_cat_id, stock_category, category_image');
      $this->db->from('stocks');
      $this->db->join('stock_category', 'stocks.stock_cat_id = stock_category.stock_category_id');
      $query = $this->db->get();
      return $query->result_array();
    } else {
      $this->db->select('stock_id, name, quantity_in_stock, unit_price, stock_cat_id, stock_category');
      $this->db->from('stocks');
      $this->db->where('stock_id', $id);
      $this->db->join('stock_category', 'stocks.stock_cat_id = stock_category.stock_category_id');
      $query = $this->db->get();
      return $query->row_array();
    }

  }

  public function create_stock(){
    $data = array(
      'name' => $this->input->post('name'),
      'quantity_in_stock' => $this->input->post('quantity_in_stock'),
      'unit_price' => $this->input->post('unit_price'),
      'stock_cat_id' => $this->input->post('stock_cat_id')
    );

    return $this->db->insert('stocks', $data);
  }

  public function delete($id){
    $this->db->where('stock_id', $id);
    $this->db->delete('stocks');
    return true;
  }

  public function update(){
    $data = array(
      'name' => $this->input->post('name'),
      'quantity_in_stock' => $this->input->post('quantity_in_stock'),
      'unit_price' => $this->input->post('unit_price'),
      'stock_cat_id' => $this->input->post('stock_cat_id')
    );

    $this->db->where('stock_id', $this->input->post('stock_id'));
    return $this->db->update('stocks', $data);
  }

}

?>
