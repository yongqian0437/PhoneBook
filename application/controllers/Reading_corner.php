<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reading_corner extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('reading_corner_model');

		// If user is not login bring them back to login page
		if (!$this->session->has_userdata('has_login')) {
			redirect('user/auth/login');
		}
	}

	public function index()
	{
		$data['title'] = 'Dementia App | Reading Corner';

		$data['read_data'] = $this->reading_corner_model->get_reading_details($this->session->userdata('user_id'));

		$data['include_js'] = 'read_in_progress';
		$this->load->view('templates/header', $data);
		$this->load->view('reading_corner_view.php');
		$this->load->view('templates/footer');
	}

	public function read($read_num = 0)
	{
		if ($read_num == 1) {
			$data['read_data'] = $this->reading_corner_model->get_reading_details($this->session->userdata('user_id'));
			$data['database'] = "reading_progress";
		} elseif ($read_num == 2) {
			$data['read_data'] = $this->reading_corner_model->get_reading_details($this->session->userdata('user_id'));
			$data['database'] = "reading_progress";
		} elseif ($read_num == 3) {
			$data['read_data'] = $this->reading_corner_model->get_reading_details($this->session->userdata('user_id'));
			$data['database'] = "reading_progress";
		} else {
			redirect('reading_corner');
		}

		$data['title'] = 'Dementia App | Reading Corner';
		$data['include_js'] = 'read_in_progress';

		$this->load->view('templates/header', $data);
		$this->load->view('read_in_progress_view.php');
		$this->load->view('templates/footer');
	}
}
