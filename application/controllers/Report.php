<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('report_model');
		$this->load->model('reading_corner_model');
		$this->load->model('quiz_model');



		// If user is not login bring them back to login page
		if (!$this->session->has_userdata('has_login')) {
			redirect('user/auth/login');
		}
	}

	public function index()
	{
		$data['title'] = 'Dementia App | Report';


		$data['qs_data'] = $this->quiz_model->get_qs_details($this->session->userdata('user_id'));
		$data['qt_data'] = $this->quiz_model->get_qt_details($this->session->userdata('user_id'));
		$data['qd_data'] = $this->quiz_model->get_qd_details($this->session->userdata('user_id'));

		// $data['read_data'] = $this->reading_corner_model->get_reading_details($this->session->userdata('user_id'));

		$data['include_js'] = 'report';

		$this->load->view('templates/header', $data);
		$this->load->view('report_view', $data);
		$this->load->view('templates/footer');
	}

	// // Get the user's ID from the session or any other source
	// $user_id = $this->session->userdata('user_id');
	// $userScore = $this->report_model->get_reportsymtom($user_id); // Replace $user_id with the actual user ID
	// $totalCount = $this->report_model->total_user_count('quiz_symptom'); // Replace 'quiz_symptom' with the appropriate table name

	// $percentage = ($userScore / $totalCount) * 100;
	// $percentage = round($percentage, 2); // Round the percentage to two decimal places

	// $data['percentage'] = $percentage;

	// Load the view

}