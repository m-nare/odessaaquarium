<?php

class Users extends CI_Controller{

  public function register(){
				$data['title'] = 'Add user';

				$this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
				$this->form_validation->set_rules('password', 'Password', 'required');
				$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

				if($this->form_validation->run() === FALSE){
					$this->load->view('templates/header');
					$this->load->view('users/register', $data);
					$this->load->view('templates/footer');
				} else {
					// encrypt password
          $enc_password = md5($this->input->post('password'));

          $this->user_model->register($enc_password);

          // set message
          $this->session->set_flashdata('user_registered', 'User created');
          redirect('users');
		}

	}

  public function login(){
    $data['title'] = 'Log In';

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if($this->form_validation->run() === FALSE ){
      $this->load->view('templates/header');
      $this->load->view('users/login', $data);
      $this->load->view('templates/footer');
    } else {
      // get Username
      $username = $this->input->post('username');

      $password = md5($this->input->post('password'));

      // login user
      $user_id = $this->user_model->login($username, $password);

      if($user_id){
        // create session
        $user_data = array(
          'user_id' => $user_id,
          'username' => $username,
          'logged_in' => true
        );

        $this->session->set_userdata($user_data);

        // set message
        $this->session->set_flashdata('login_success', 'You are now logged in.');
        redirect('dashboard/index');
      }
      else {
        // set message
        $this->session->set_flashdata('login_failed', 'Invalid login');
        redirect('users/login');
      }
  }
  }

  public function logout(){
    // unset user data
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('logged_in');

    // set message
    $this->session->set_flashdata('logged_out', 'You are now logged out.');

    redirect('users/login');

  }

  public function index(){
      $data['title'] = 'Manage Users';

      $data['users'] = $this->user_model->get_users();

      $this->load->view('templates/header');
      $this->load->view('users/index', $data);
      $this->load->view('templates/footer');

  }

  public function edit($id){
    $data['title'] = 'Update User';

    $data['user'] = $this->user_model->get_user($id);

    $this->load->view('templates/header');
    $this->load->view('users/edit', $data);
    $this->load->view('templates/footer');

  }

  public function update(){
    if(!$this->session->userdata('logged_in'))
    {
      redirect('users/login');
    }

    $this->user_model->update();
    $this->session->set_flashdata('user_updated', 'User information updated successfully');
    redirect('users');
  }

  public function delete($id){
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }

    $this->user_model->delete($id);
    $this->session->set_flashdata('user_deleted', 'User deleted successfully.');
    redirect('users');

  }

}

?>
