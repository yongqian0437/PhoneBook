<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'libraries/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Quiz extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('quiz_model');

		// If user is not login bring them back to login page
		if (!$this->session->has_userdata('has_login')) {
			redirect('user/auth/login');
		}
	}

	public function index()
	{
		$data['title'] = 'Dementia App | Quiz';

		$data['qs_data'] = $this->quiz_model->get_qs_details($this->session->userdata('user_id'));
		$data['qt_data'] = $this->quiz_model->get_qt_details($this->session->userdata('user_id'));
		$data['qd_data'] = $this->quiz_model->get_qd_details($this->session->userdata('user_id'));
		$data['include_js'] = 'quiz';

		$this->load->view('templates/header', $data);
		$this->load->view('quiz_view.php');
		$this->load->view('templates/footer');
	}

	public function take_quiz($quiz_num = 0)
	{
		if ($quiz_num == 1) {
			$data['quiz_data'] = $this->quiz_model->get_qs_details($this->session->userdata('user_id'));
			$data['database'] = "quiz_symptom";
		} elseif ($quiz_num == 2) {
			$data['quiz_data'] = $this->quiz_model->get_qt_details($this->session->userdata('user_id'));
			$data['database'] = "quiz_tips";
		} elseif ($quiz_num == 3) {
			$data['quiz_data'] = $this->quiz_model->get_qd_details($this->session->userdata('user_id'));
			$data['database'] = "quiz_dealing";
		} else {
			redirect('quiz');
		}

		if ($data['quiz_data']->status == 3) {
			redirect('quiz');
		}


		$data['title'] = 'Dementia App | Quiz';
		$data['include_js'] = 'quiz_in_progress';

		$this->load->view('templates/header', $data);
		$this->load->view('quiz_in_progress_view.php');
		$this->load->view('templates/footer');
	}

	//function with ajax
	public function update_quiz_answer()
	{
		$this->quiz_model->update_max_streak($this->session->userdata('user_id'), $this->input->post('current_streak'), $this->input->post('database'));
		$data =
			[
				$this->input->post('col_question_number') => $this->input->post('answer'),
				'current_streak' => $this->input->post('current_streak'),
				'status' => 2,
				'progress' => $this->input->post('progress'),
				'score' => $this->input->post('score'),
				'last_update' => date('Y-m-d H:i:s')
			];

		if ($this->quiz_model->update_draft($data, $this->session->userdata('user_id'), $this->input->post('database'))) {
			$response = array('success' => true, 'message' => 'Data updated successfully');
		} else {
			$response = array('success' => false, 'message' => 'Data updated successfully');
		}

		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function completed_quiz()
	{
		$data['status'] = 3;
		//update first attempt score
		$this->quiz_model->first_attempt($this->session->userdata('user_id'), $this->input->post('score'), $this->input->post('database'));
		if ($this->quiz_model->update_draft($data, $this->session->userdata('user_id'), $this->input->post('database'))) {
			$response = array('success' => true, 'message' => 'Data updated successfully');
		} else {
			$response = array('success' => false, 'message' => 'Data updated successfully');
		}

		header('Content-Type: application/json');
		echo json_encode($response);
	}

	public function retake_quiz($database = 0)
	{
		if ($database == 1) {
			$database_name = "quiz_symptom";
		} elseif ($database == 2) {
			$database_name = "quiz_tips";
		} elseif ($database == 3) {
			$database_name = "quiz_dealing";
		} else {
			redirect('quiz');
		}

		//reset quiz records
		$data =
			[
				'q1' => 0,
				'q2' => 0,
				'q3' => 0,
				'q4' => 0,
				'q5' => 0,
				'q6' => 0,
				'q7' => 0,
				'q8' => 0,
				'q9' => 0,
				'q10' => 0,
				'status' => 1,
				'progress' => 0,
				'score' => 0,
				'max_streak' => 0,
			];

		$this->quiz_model->update_draft($data, $this->session->userdata('user_id'), $database_name);
		redirect('quiz/take_quiz/' . $database);
	}

	public function view_result()
	{
		$data = $this->quiz_model->get_selected_quiz_details($this->session->userdata('user_id'), $this->input->post('database'));

		// Convert the data to JSON format
		$json_data = json_encode($data);

		// Set the response content type as JSON
		$this->output->set_content_type('application/json');

		// Return the JSON response
		echo $json_data;
	}

	public function generate_certificate_pdf()
	{
		// Fetch necessary data from the database
		$user_id = $this->session->userdata('user_id');
		$user = $this->user_model->get_user_details($user_id);
		$name = $user->user_fname . ' ' . $user->user_lname;
		$time = date('d F Y');

		// Load the PDF template file
		$pdfTemplate = file_get_contents(APPPATH . 'views/pdf_view.php');

		// Replace placeholders in the template with dynamic data
		$pdfTemplate = str_replace('{{name}}', $name, $pdfTemplate);
		$pdfTemplate = str_replace('{{time}}', $time, $pdfTemplate);

		// Create a new DOMPDF instance
		$dompdf = new Dompdf();
		$dompdf->loadHtml($pdfTemplate);

		// (Optional) Adjust PDF settings
		$dompdf->setPaper('A4', 'portrait');

		// Render the PDF
		$dompdf->render();

		// Get the PDF content as a string
		$pdfContent = $dompdf->output();

		// Set the response content type as PDF
		header('Content-Type: application/pdf');

		// Open the PDF in a new browser tab
		echo $pdfContent;
	}
}
