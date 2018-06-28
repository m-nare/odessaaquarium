<?php
  class upload_model extends CI_Model{

    public function __construct(){
      $this->load->database();
    }

    public function get_uploads(){
      $query = $this->db->get('uploads');
      return $query->result_array();
    }

    public function get_upload($id){
      $query = $this->db->get_where('uploads', array('id' => $id));
      return $query->row_array();
    }

    public function create($upload_name){
      $data = array(
        'upload_name' => $upload_name
      );

      return $this->db->insert('uploads', $data);
    }

    public function delete($id){
      $this->db->where('id', $id);
      $this->db->delete('uploads');
    }

    public function selectupload($id, $extension){
      if($extension == '.pdf'){

        $this->db->query("UPDATE uploads SET active_upload = 'FALSE' WHERE upload_name LIKE '%.pdf'");
        $this->db->where('id', $id);
        $this->db->update('uploads', array('active_upload' => "TRUE"));

        return true;
      } else {
        $this->db->query("UPDATE uploads SET active_upload = 'FALSE' WHERE upload_name LIKE '%.doc%'");
        $this->db->where('id', $id);
        $this->db->update('uploads', array('active_upload' => "TRUE"));

        return true;
      }
    }

    public function getpdfdownload(){
      $query = $this->db->query("SELECT * FROM uploads WHERE upload_name LIKE '%.pdf' AND active_upload = 'TRUE' ");
      return $query->row_array();
    }

    public function getdocdownload(){
      $query = $this->db->query("SELECT * FROM uploads WHERE upload_name LIKE '%.doc%' AND active_upload = 'TRUE' ");
      return $query->row_array();
    }

  }

?>
