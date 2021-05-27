<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Courses_applicant extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('course_applicants_model');

        //example  $this->user_model->select_all('users');
    }

    public function index()
    {

        $user = array(
            'user_id' => '1',
            'user_fname' => 'Wei Cheng',
            'user_lname' => 'Yeo',
            'user_email' => 'lol',
            'user_role' => 'student',
            'user_approval' => '1'
        );
        $this->session->set_userdata($user);

        $data['student_data'] = $this->course_applicants_model->find_data_with_id($this->session->userdata('user_id'));

        // if($this->session->has_userdata('user_id')){

        // $data['title'] = 'iJEES | Homepage';
        $this->load->view('external/templates/header' , $data);
        $this->load->view('user/registration/courses_applicant_registration_view');
        $this->load->view('external/templates/footer');
    }

    public function course_appplicant($course_id)
    {

        if($this->session->has_userdata('user_id')){

        $data['student_data'] = $this->course_applicants_model->find_data_with_id($this->session->userdata('user_id'));
        $data['course_id'] = $course_id;

        // $data['title'] = 'iJEES | Homepage';
        $this->load->view('external/templates/header' , $data);
        $this->load->view('user/registration/courses_applicant_registration_view');
        $this->load->view('external/templates/footer');

        }

        else {

            // redirect to login controller 
        }
    }

    public function submit_courses_applicant_form() {

        
    }
}
