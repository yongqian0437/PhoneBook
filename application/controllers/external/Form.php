<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('universities_model');
		$this->load->model('courses_model');

	}

	public function index()
	{
		
		$this->load->view('external/form_view');
        $this->load->view('external/templates/header');
        $this->load->view('external/templates/footer');
	}


	
}