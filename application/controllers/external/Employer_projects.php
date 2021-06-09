<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Employer_projects extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_student_model', 'company_model', 'user_e_model', 'employer_projects_model', 'emp_applicants_model']);
        date_default_timezone_set('Asia/Kuala_Lumpur');
    }

    public function index()
    {
        // Check if session is established. Get User ID from session.
        $user_id = $this->session->userdata('user_id');
        $data['user_role'] = $this->session->userdata('user_role');
        if ($data['user_role'] == 'Student') {
            // From the User ID, get Student ID  
            $student_details = $this->user_student_model->student_details($user_id);
            $data['student_id'] = $student_details['student_id'];
        }
        $data['title'] = "iJEES | Employer Projects";

        // Get EPs that are approved and their details
        $eps= $this->employer_projects_model->approved_eps();
        $data['eps'] = $eps;
        $data['include_css'] = 'projects';
        $this->load->view('external/templates/header', $data);
        $this->load->view('external/employer_projects_view', $data); 
        $this->load->view('external/templates/footer', $data);
    }

    public function send_emp_application() {
        // Check if session is established. Get User ID from session.
        $user_id = $this->session->userdata('user_id');

         // From the User ID, get Student ID 
         $student_details = $this->user_student_model->student_details($user_id);
         $student_id = $student_details['student_id'];

        $data = 
        [
            'emp_id'            => $this->input->post('ep_id'),
            'student_id'        => $student_id,
            'emp_app_submitdate'    => date('Y-m-d h:i:s A'),
        ];
        
        $this->emp_applicants_model->insert($data);
    }
}