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

		//count relations
		$data['themselves_count'] = $this->report_model->count_relation(1);
		$data['family_count'] = $this->report_model->count_relation(3);

		//reading corner data
		$data['reading_data'] = $this->reading_corner_model->get_reading_symptoms_details($this->session->userdata('user_id'));

		//quiz score percentage
		$data['qs_percent'] = $this->report_model->score_percentage('quiz_symptom');
		$data['qt_percent'] = $this->report_model->score_percentage('quiz_tips');
		$data['qd_percent'] = $this->report_model->score_percentage('quiz_dealing');

		//quiz streak percentage
		$data['qs_streak_percent'] = $this->report_model->streak_percentage('quiz_symptom');
		$data['qt_streak_percent'] = $this->report_model->streak_percentage('quiz_tips');
		$data['qd_streak_percent'] = $this->report_model->streak_percentage('quiz_dealing');

		//quiz data
		$data['qs_data'] = $this->quiz_model->get_qs_details($this->session->userdata('user_id'));
		$data['qt_data'] = $this->quiz_model->get_qt_details($this->session->userdata('user_id'));
		$data['qd_data'] = $this->quiz_model->get_qd_details($this->session->userdata('user_id'));

		// $data['read_data'] = $this->reading_corner_model->get_reading_details($this->session->userdata('user_id'));

		$data['include_js'] = 'report';

		$this->load->view('templates/header', $data);
		$this->load->view('report_view', $data);
		$this->load->view('templates/footer');
	}

}