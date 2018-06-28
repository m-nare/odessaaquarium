<?php

class Dashboard extends CI_Controller{
  public function index(){
    $data['title'] = 'Dashboard';

    $data['enquiries'] = $this->enquiry_model->get_enquiries();
    $data['stocks'] = $this->stock_model->get_stock_with_category();
    $data['categories'] = $this->category_model->get_categories();
    $data['users'] = $this->user_model->get_users();

    $this->load->view('templates/header');
    $this->load->view('dashboard/index', $data);
    $this->load->view('templates/footer');
  }

  public function uploadpdf(){
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }

    $data['title'] = 'Upload PDF Stock List';

    $this->load->view('templates/header');
    $this->load->view('dashboard/uploadpdf', $data);
    $this->load->view('templates/footer');
  }

  public function uploadpdffile(){
    //upload image
    $config['upload_path'] = './assets/files/';
    $config['allowed_types'] = 'pdf';
    $config['max_size'] = '2048';
    $config['file_name'] = now().$_FILES['userfile']['name'];

    $this->load->library('upload', $config);

    if(!$this->upload->do_upload()){
      $errors = array('error' => $this->upload->display_errors());
      //
    } else {
      $data = array('upload_data' => $this->upload->data() );
      $upload_name = now().$_FILES['userfile']['name'];
    }

  $this->upload_model->create($upload_name);
  $this->session->set_flashdata('file_uploaded', 'File uploaded successfully.');
  redirect('dashboard/index');
  }

  public function uploaddocx(){
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }

    $data['title'] = 'Upload DOCX Stock List';

    $this->load->view('templates/header');
    $this->load->view('dashboard/uploaddocx', $data);
    $this->load->view('templates/footer');
  }

  public function uploaddocxfile(){
    //upload image
    $config['upload_path'] = './assets/files/';
    $config['allowed_types'] = 'doc|docx';
    $config['max_size'] = '2048';
    $config['file_name'] = now().$_FILES['userfile']['name'];

    $this->load->library('upload', $config);

    if(!$this->upload->do_upload()){
      $errors = array('error' => $this->upload->display_errors());
      //
    } else {
      $data = array('upload_data' => $this->upload->data() );
      $upload_name = now().$_FILES['userfile']['name'];
    }

    $this->upload_model->create($upload_name);
    $this->session->set_flashdata('file_uploaded', 'File uploaded successfully.');
    redirect('dashboard/index');

  }

  public function manageuploads(){
    $data['title'] = 'Manage uploaded files';

    $data['uploads'] = $this->upload_model->get_uploads();

    $this->load->view('templates/header');
    $this->load->view('dashboard/manageuploads', $data);
    $this->load->view('templates/footer');
  }

  public function deleteupload($id){
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }

    $upload_name = $this->input->post('upload_name');
    unlink("./assets/files/".$upload_name);

    $this->upload_model->delete($id);
    $this->session->set_flashdata('upload_deleted', 'Upload deleted successfully.');
    redirect('dashboard/manageuploads');
  }

  public function selectupload($id, $upload_name){
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }

    $extension = substr($upload_name, -4);


    $this->upload_model->selectupload($id, $extension);

    $this->session->set_flashdata('download_file_set', 'Stock list file to be downloaded in stock list page set.');
    redirect('dashboard/manageuploads');
  }

  public function help(){
    $data['title'] = 'Help';

    $this->load->view('templates/header');
    $this->load->view('dashboard/help', $data);
    $this->load->view('templates/footer');
  }

}

?>
