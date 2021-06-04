<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ep_university extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('user_ep_model');
		$this->load->model('courses_model');

	}

	public function index()
	{
		
		$data['title'] = 'iJEES | University';
		$data['university_data'] = $this->user_ep_model->get_uni_from_ep($this->session->userdata('user_id')); 

		// $data['include_js'] = '';
		// $data['include_css'] = '';
		$this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav');
        $this->load->view('internal/templates/topbar');
        $this->load->view('internal/level_2/educational_partner/ep_university_view');
        $this->load->view('internal/templates/footer');  
	}


}