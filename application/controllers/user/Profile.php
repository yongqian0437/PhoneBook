<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_model']);
        
        // If user is not login bring them back to login page
        if (!$this->session->has_userdata('has_login')){  
            redirect('user/Auth/login');
		}	
    }

    public function index()
    {
        $data['title'] = 'iJEES | Profile';
        $user_id = $this->session->userdata('user_id');

        $user_data = $this->user_model->get_user_data();
        $data['user_data'] = $user_data;

        $student_data = $this->user_student_model->student_details($user_id, 'user_id');
        $data['student_data'] = $student_data;

        $student_emp_data = $this->emp_applicants_model->get_user_emp($user_id, 'user_id');
        $data['student_emp_data'] = $student_emp_data;

        $student_course_data = $this->course_applicants_model->get_student_courses($user_id);
        $data['student_course_data'] = $student_course_data;

        $this->load->view('templates/header', $data);
        $this->load->view('user/profile_view');
        $this->load->view('templates/footer');
    }

    public function edit_profile()
    {

    }
}
