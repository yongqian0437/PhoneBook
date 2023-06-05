<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('quiz_model');
		
		// If user is not login bring them back to login page
        if (!$this->session->has_userdata('has_login')){  
            redirect('user/Auth/login');
		}	

		
	}

	public function index()
	{
		$data['title'] = 'Dementia App | Quiz';

		$data['qs_data'] = $this->quiz_model->get_qs_details($this->session->userdata('user_id'));
		$data['qt_data'] = $this->quiz_model->get_qt_details($this->session->userdata('user_id'));
		$data['qd_data'] = $this->quiz_model->get_qd_details($this->session->userdata('user_id'));

		$this->load->view('templates/header', $data);
		$this->load->view('quiz_view.php');
        $this->load->view('templates/footer');
	}

}