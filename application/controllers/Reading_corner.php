<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reading_corner extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');

		// If user is not login bring them back to login page
        if (!$this->session->has_userdata('has_login')){  
            redirect('user/auth/login');
		}	
	}

	public function index()
	{
		$data['title'] = 'Dementia App | Reading Corner';

		$this->load->view('templates/header', $data);
		$this->load->view('reading_corner_view.php');
        $this->load->view('templates/footer');
	}

}