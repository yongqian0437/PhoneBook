<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Courses extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('courses_model');

		//example  $this->user_model->select_all('users');
	}
	//  echo base_url().'external/Courses/view_course'.$course_id;
	//  echo base_url().'external/Courses/course_form_application'.$course_id;

	public function index()
	{

		$data['course_data'] = $this->courses_model->select_all();
		$this->load->view('external/courses_view', $data);  // view num 1 - jordan
		$this->load->view('external/templates/header');
		//$this->load->view('external/templates/header'); for nav
		$this->load->view('external/templates/footer');
	}

	public function view_course($id)
	{
		$data['course_data'] = $this->courses_model->select_condition($id, 'courses');
		$this->load->view('external/courses_detail_view', $data); //view num 2 - jordan

	}

	public function course_form_application($id)
	{
		$data['course_data'] = $this->courses_model->select_condition($id, 'courses');
		$this->load->view('external/courses_applicants_view', $data); //view num 3 - wei cheng
	}
	//  echo $course_data->course_name;

	public function submit_course_form_application($id)
	{
		$user_id = $this->session->userdata('user_id');
		$data['student_data'] = $this->user_student_model->select_data_with_user_id($user_id, 'user_student');
		$student_id = $data['student_data']->student_id;

		$data = array(
			'u_applicant_id' => $this->input->post('u_applicant_id'),
			'student_id' => $student_id,
			'user_fname' => $this->input->post('user_fname'),
			'user_email' => $this->input->post('user_email'),
			'user_password' => $this->input->post('user_password'),
			'user_role' => $this->input->post('user_role'),
			'user_approval' => $this->input->post('user_approval')
		);

		$data['course_data'] = $this->uni_applicant_model->insert($id, 'courses');
		redirect('external/Courses');
	}

	public function course_filter()
	{

		$course_area = $this->input->post('course_areaid');
		$course_level = $this->input->post('course_levelid');
		/* $course_fee = $this->input->post('course_fee'); */
		$course_intake = $this->input->post('course_intakeid');
		echo $course_area;

		$data['course_data'] = $this->courses_model->filter_course($course_area, $course_level, $course_intake);
		$this->load->view('external/courses_view', $data);
	}


	// tested link: localhost/ijees/external/Courses/#


}
