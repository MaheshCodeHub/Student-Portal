<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ctr extends CI_Controller {
    
     public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->view('login');        
    }

    public function index() {
         $admin = $this->session->userdata('admin');

        if (!empty($admin)) {
            redirect(base_url() . 'index.php/master_ctr/index');
        }        
    }
    
    public function registration() {
        $this->load->view('registration_form');
    }
    

    public function authenticate() {
       // echo "HELLO"; die;
        $this->load->library('form_validation');
        $this->load->model('Login_model');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == true) {
            // Success
            $username = $this->input->post('username');
            $admin = $this->Login_model->getByUsername($username);
            // echo json_encode($admin); die;
            if (!empty($admin)) {
                $password = $this->input->post('password');
                if ($password== $admin['password']) {
                   $adminArray['admin_id'] = $admin['id'];
                    $adminArray['username'] = $admin['username'];
                     $adminArray['admin_name'] = $admin['admin_name'];
                    $this->session->set_userdata('admin', $adminArray);
                      redirect(base_url() . 'index.php/master_ctr/index');
                } else {
                    $this->session->set_flashdata('msg', 'Either username or password is Incorrect');
                    redirect(base_url());
                }
            } else {
                $this->session->set_flashdata('msg', 'Either username or password is incorrect');
                redirect(base_url());
            }
        } else {
            $this->load->view('login');
            // Form Error
        }
    }
    
   
    function logout() {
        $this->session->unset_userdata('admin');
        $this->session->sess_destroy();
        redirect(base_url());
    }

}

