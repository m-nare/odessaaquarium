<?php

  class enquiry_model extends CI_Model{
    public function __construct(){
      //add database libary
      $this->load->database();
    }

    public function get_enquiries(){
      $this->db->order_by('date_of_enquiry', 'DESC');
      $query = $this->db->get('enquiries');
      return $query->result_array();
    }

    public function create_enquiry(){
      $data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'phone_number' => $this->input->post('phone_number'),
        'message' => $this->input->post('message')
      );

      return $this->db->insert('enquiries', $data);

    }

    public function delete($id){
      $this->db->where('enquiry_id', $id);
      $this->db->delete('enquiries');

      return true;
    }

  }

?>
