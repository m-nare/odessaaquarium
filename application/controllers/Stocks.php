<?php

class Stocks extends CI_Controller{
  public function index(){
    $data['title'] = 'Stock List';

    $stocks = $this->stock_model->get_stock_with_category();

    //Group stocks by category
    $category_stock = array();
    foreach($stocks as $stock){
      if(!isset($category_stock[$stock['stock_category']])){
          $category_stock[$stock['stock_category']] = array();
      }
      $category_stock[$stock['stock_category']][] = $stock;
    }
    $data['category_stock'] = $category_stock;
    $data['category_image'] = $this->category_model->getcategoryimages();

    $this->load->view('templates/header');
    $this->load->view('stocks/index', $data);
    $this->load->view('templates/footer');
  }

  public function download($id){
    /* force_download(base_url('assets/files/stock/stock_list.pdf'), NULL); */


    if($id == 1){
      $upload = $this->upload_model->getpdfdownload();
      $ret = force_download(APPPATH.'../assets/files/'.$upload['upload_name'], NULL);
    } else {
      $upload = $this->upload_model->getdocdownload();
      $ret = force_download(APPPATH.'../assets/files/'.$upload['upload_name'], NULL);
    }

    var_dump($ret);
  }

  public function create(){

    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }

    $data['title'] = 'Create Stock';

    $data['stock_categories'] = $this->category_model->get_categories();

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('quantity_in_stock', 'Quantity in stock', 'required|integer');
    $this->form_validation->set_rules('unit_price', 'Unit price', 'required|decimal');
    $this->form_validation->set_rules('stock_cat_id', 'required');

    if($this->form_validation->run() === FALSE){
      $this->load->view('templates/header');
      $this->load->view('stocks/create', $data);
      $this->load->view('templates/footer');
    } else {
      $this->stock_model->create_stock();
      $this->session->set_flashdata('stock_created', 'Stock created successfully.');
      redirect('stocks');
    }

  }

  public function delete($id){
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }

    $this->stock_model->delete($id);
    $this->session->set_flashdata('stock_deleted', 'Stock deleted successfully.');
    redirect('stocks');
  }

  public function edit($id){
      $data['stock'] = $this->stock_model->get_stock_with_category($id);
      $data['stock_categories'] = $this->category_model->get_categories();

			$stock_id = $data['stock']['stock_id'] ;


			if(empty($data['stock']))
			{
				show_404();
			}

			$data['title'] = $data['stock']['name'];


			$this->load->view('templates/header');
			$this->load->view('stocks/edit', $data);
			$this->load->view('templates/footer');
  }

  public function update(){
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }

    $this->stock_model->update();
    $this->session->set_flashdata('stock_updated', 'Stock updated successfully.');
    redirect('stocks');
  }



}

?>
