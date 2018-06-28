<?php

class User_model extends CI_Model{
  public function register($enc_password){
    // user data array
    $data = array(
      'name' => $this->input->post('name'),
      'email' => $this->input->post('email'),
      'username' => $this->input->post('username'),
      'password' => $enc_password
    );

    // insert user
    return $this->db->insert('users', $data);
  }

  public function login($username, $password){
    // validate
    $this->db->where('username', $username);
    $this->db->where('password', $password);

    $result = $this->db->get('users');

    if($result->num_rows() == 1){
      return $result->row(0)->id;
    } else {
      return false;
    }

  }

  public function get_users(){
    $query = $this->db->get('users');
    return $query->result_array();
  }

  public function get_user($id){
    $query = $this->db->get_where('users', array('id' => $id));
    return $query->row_array();
  }

  public function update(){
    $data = array(
      'name' => $this->input->post('name'),
      'email' => $this->input->post('email'),
      'username' => $this->input->post('username')
    );

    $this->db->where('id', $this->input->post('id'));
    return $this->db->update('users', $data);

  }

  public function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('users');

    return true;
  }

}


?>
