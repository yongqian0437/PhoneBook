<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_model']);
        
        // If user is not login bring them back to login page
        if (!$this->session->has_userdata('has_login')){  
            redirect('user/Auth/login');
		}	
    }

    public function index()
    {
        $data['title'] = 'Dementia | Profile';
        $user_id = $this->session->userdata('user_id');

        $data['user_data'] = $this->user_model->get_user_details($this->session->userdata('user_id'));;

        $this->load->view('templates/header', $data);
        $this->load->view('user/profile_view');
        $this->load->view('templates/footer');
        
    }

    public function edit_profile()
    {

    }
}
