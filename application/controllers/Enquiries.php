<?php

  class Enquiries  extends CI_Controller{
    public function index(){

      $data['title'] = 'Enquiries';

      $data['enquiries'] = $this->enquiry_model->get_enquiries();

      $this->load->view('templates/header');
      $this->load->view('enquiries/index', $data);
      $this->load->view('templates/footer');
    }

    public function create(){
      $data['title'] = 'Contact Us';

      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
      $this->form_validation->set_rules('message', 'Message', 'required');

      if($this->form_validation->run() === FALSE){
        $this->load->view('templates/header');
        $this->load->view('enquiries/create', $data);
        $this->load->view('templates/footer');
      } else{
        $this->enquiry_model->create_enquiry();


        /*Email enquiry
        //get form data
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone_number');
        $message = $this->input->post('message');
        $email_body = 'Name - '.$name.'<br>Email - '.$email.'<br>Phone number - '.$phone.'<br>Message - '.$message;

        $subject = 'Enquiry from: '.$name;

        $email_to = 'rickwaltz7@gmail.com';

        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com4';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'rickwaltz7@gmail.com';
        $config['smtp_pass'] = 'udnivog@123narevass';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = 'TRUE';



        $this->email->initialize($config);

        //send mail
        $this->email->from($email, $name);
        $this->email->to($email_to);
        $this->email->subject($subject);
        $this->email->message($email_body);

        $this->email->send();

        /*
        $email_subject = 'Enquiry by: '. $_POST['name'];
        $email_body = 'Name - '.$_POST['name'].'<br>Email - '.$_POST['email'].'<br>Phone number - '.$_POST['phone_number'].'<br>Message - '.$_[POST];
        $email_from = 'From: '.$_POST['email'];

        mail($email_to, $email_subject, $email_body, $email_from);
        */
        $this->session->set_flashdata('enquiry_sent', 'Your enquiry has been sent.');
        redirect('enquiries/create');
      }
    }

    public function delete($id){
      if(!$this->session->userdata('logged_in')){
        redirect('users/login');
      }

      $this->enquiry_model->delete($id);

      $this->session->set_flashdata('enquiry_deleted', 'Enquiry deleted succussfully.');
      redirect('enquiries');
    }

  }
?>
