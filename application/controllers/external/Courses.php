<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

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
        $data['course_data'] = select_all('courses');
		$this->load->view('external/courses_list_view', $data);  // view num 1 - jordan
	}

	public function view_course($id) 
	{
        $data['course_data'] = $this->courses_model->select_condition($id, 'courses');
        $this->load->view('external/courses_detail_view', $data); //view num 2 - jordan

	}

	public function course_form_application($id) 
	{
        $data['course_data'] = $this->courses_model->select_condition($id, 'courses');
        $this->load->view('external/courses_detail_view', $data); //view num 3 - wei cheng
	}
    //  echo $course_data->course_name;

    public function submit_course_form_application($id) 
    {
        $user_id = $this->session->userdata('user_id');
        $data['student_data'] = $this->user_student_model->select_data_with_user_id($user_id, 'user_student');
        $student_id = $student_data->student_id;

        $data = array (
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


	// tested link: localhost/ijees/external/Courses/#

	
}