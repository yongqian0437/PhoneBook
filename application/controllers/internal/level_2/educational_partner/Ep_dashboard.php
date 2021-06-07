<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ep_dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('user_ep_model');
		$this->load->model('courses_model');
		$this->load->model('universities_model');

        // Checks if session is set and if user signed in has a role. If not, deny his/her access.
        if (!$this->session->userdata('user_id') || !$this->session->userdata('user_role')){  
            redirect('user/login/Auth/login');
        }
	}

	public function index()
	{
		
		$data['title'] = 'iJEES | Dashboard';
		$data['university_data'] = $this->user_ep_model->get_uni_from_ep($this->session->userdata('user_id')); 
        // $data['c'] = $this->user_ep_model->get_uni_from_ep($this->session->userdata('user_id')); 

		$this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav');
        $this->load->view('internal/templates/topbar');
        $this->load->view('internal/level_2/educational_partner/ep_dashboard_view');
        $this->load->view('internal/templates/footer');  
	}


}