<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_model', 'user_student_model', 'emp_applicants_model']);
        //example  $this->user_model->select_all('users');
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
        /* var_dump($data['student_emp_data']);
        die; */
        //$data['student_data'] = $this->user_student_model->student_details_2($user_id, 'user_id');
        //echo $user_id;
        $this->load->view('external/templates/header', $data);
        $this->load->view('user/profile_view');
        $this->load->view('external/templates/footer');
    }
    // -------------------------- WC TO INCLUDE COURSES_APPLICANT FUNCTIONS HERE ----------------------------------------------
    //  ------------------------- **COURSES_APPLICANT.PHP CONTROLLER IS TO BE DELETE** ----------------------------------------------
}
