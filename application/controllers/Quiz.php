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
            redirect('user/auth/login');
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

	public function take_quiz($quiz_num = 0)
	{
		if($quiz_num == 1){
			$data['quiz_data'] = $this->quiz_model->get_qs_details($this->session->userdata('user_id'));
			$data['database'] = "quiz_symptom";
		} elseif($quiz_num == 2){
			$data['quiz_data'] = $this->quiz_model->get_qt_details($this->session->userdata('user_id'));
			$data['database'] = "quiz_tips";
		} elseif($quiz_num == 3){
			$data['quiz_data'] = $this->quiz_model->get_qd_details($this->session->userdata('user_id'));
			$data['database'] = "quiz_dealing";
		} else {
			redirect('quiz');
		}
		

		$data['title'] = 'Dementia App | Quiz';
		$data['include_js'] = 'quiz_in_progress';

		$this->load->view('templates/header', $data);
		$this->load->view('quiz_in_progress_view.php');
        $this->load->view('templates/footer');
	}

	public function view_result()
	{
		# code...
	}
	

}