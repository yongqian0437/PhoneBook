<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_2_dashboard extends CI_Controller 
{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
        
        // Checks if session is set and if user is signed in as Level 2 user (authorised access). If not, deny his/her access.
        if (!$this->session->userdata('user_id') || !$this->session->userdata('user_role')){  
            redirect('user/login/Auth/login');
        }
	}

    public function index()
    {
        
    }

    public function profile_level_2()
    {
        $data['title']= 'My Profile';
        $data['users']=$this->user_model->search_email();
        //---------------------Need to wait Ariane for the templates--------------------//
         $this->load->view('internal/templates/header',$data);
         $this->load->view('internal/templates/sidenav',$data);
        // $this->load->view('internal/templates/topbar',$data)
        $this->load->view('internal/level_2/level_2_dashboard_view',$data);
        $this->load->view('internal/templates/footer');  
    } 
}
?>