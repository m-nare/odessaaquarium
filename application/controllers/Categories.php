<?php

class Categories extends CI_Controller{
  public function index(){
    $data['title'] = 'Categories';

    $data['categories'] = $this->category_model->get_categories();

    $this->load->view('templates/header');
    $this->load->view('categories/index', $data);
    $this->load->view('templates/footer');
  }

  public function create(){
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }

    $data['title'] = 'Create category';

    $this->form_validation->set_rules('stock_category', 'Stock category', 'required');

    if($this->form_validation->run() === FALSE){
      $this->load->view('templates/header');
      $this->load->view('categories/create', $data);
      $this->load->view('templates/footer');
    } else {
        //upload image
  		  $config['upload_path'] = './assets/images/categories';
  		  $config['allowed_types'] = 'gif|jpg|png';
  		  $config['max_size'] = '2048';
  		  $config['max_width'] = '500';
  		  $config['max_height'] = '500';

		    $this->load->library('upload', $config);

    		if(!$this->upload->do_upload()){
    			$errors = array('error' => $this->upload->display_errors());
    			$category_image = 'noimage.png';
    		} else {
    			$data = array('upload_data' => $this->upload->data() );
    			$category_image = $_FILES['userfile']['name'];
    		}



      $this->category_model->create($category_image);
      $this->session->set_flashdata('category_created', 'Cateogry created successfully.');
      redirect('categories');
    }

  }

  public function delete($id){
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }
    $category = $this->category_model->get_category($id);

    if($category['category_image'] != 'noimage.png')
    {
      unlink("./assets/images/categories/".$category['category_image']);
    }
    $this->category_model->delete($id);
    $this->session->set_flashdata('category_deleted', 'Category deleted successfully.');
    redirect('categories');
  }

  public function edit($id){

    $data['stock_category'] = $this->category_model->get_category($id);

    if(empty($data['stock_category']))
    {
      show_404();
    }

    $data['title'] = $data['stock_category']['stock_category'];


    $this->load->view('templates/header');
    $this->load->view('categories/edit', $data);
    $this->load->view('templates/footer');
  }

  public function update(){
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }

    //upload image
    $config['upload_path'] = './assets/images/categories';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '2048';
    $config['max_width'] = '500';
    $config['max_height'] = '500';

    $this->load->library('upload', $config);

    if(!$this->upload->do_upload()){
      $errors = array('error' => $this->upload->display_errors());
      $category_image = $this->input->post('old_cat_image');
    } else {
      $data = array('upload_data' => $this->upload->data() );
      $category_image = $_FILES['userfile']['name'];
    }

    $this->category_model->update($category_image);
    $this->session->set_flashdata('category_updated', 'Category updated successfully.');
    redirect('categories');
  }



}

?>
