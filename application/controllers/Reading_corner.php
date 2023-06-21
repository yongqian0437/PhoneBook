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

		$this->load->view('templates/header', $data);
		$this->load->view('reading_corner_view.php');
		$this->load->view('templates/footer');
	}

	public function read($read_num = 0)
	{
		if ($read_num == 1) {
			$data['read_data'] = $this->reading_corner_model->get_reading_details($this->session->userdata('user_id'));
			$data['database'] = "read_symptom";
		} else {
			redirect('read');
		}

		if ($data['read_data']->status == 2) {
			redirect('read');
		}


		$data['title'] = 'Dementia App | Reading Model';

		$this->load->view('templates/header', $data);
		$this->load->view('read_in_progress_view.php');
		$this->load->view('templates/footer');
	}

	public function completed_quiz()
	{
		$data['status'] = 3;
		if ($this->reading_corner_model->update_draft($data, $this->session->userdata('user_id'), $this->input->post('database'))) {
			$response = array('success' => true, 'message' => 'Data updated successfully');
		} else {
			$response = array('success' => false, 'message' => 'Data updated successfully');
		}

		header('Content-Type: application/json');
		echo json_encode($response);
	}
}
