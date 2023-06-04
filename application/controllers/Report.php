<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');

		// If user is not login bring them back to login page
        if (!$this->session->has_userdata('has_login')){  
            redirect('user/Auth/login');
		}	
	}

	public function index()
	{
		$data['title'] = 'Dementia App | Report';

		$this->load->view('templates/header', $data);
		$this->load->view('report_view.php');
        $this->load->view('templates/footer');
	}

}