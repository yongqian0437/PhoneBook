<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Employer_projects extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['company_model', 'user_e_model', 'employer_projects_model', 'emp_applicants_model']);
        date_default_timezone_set('Asia/Kuala_Lumpur');
    }

    public function index()
    {
        $data['title'] = "Employer Projects";

        // Get EPs that are approved and their details
        $eps= $this->employer_projects_model->approved_eps();
        $data['eps'] = $eps;

        $this->load->view('external/templates/header', $data);
        $this->load->view('external/employer_projects_view', $data); 
        $this->load->view('external/templates/footer');
    }

    public function send_emp_application() {
        // check if session is established. replace with session's student_id
        $student_id = '123';

        $data = 
        [
            'emp_id'            => $this->input->post('ep_id'),
            'student_id'        => $student_id,
            'submitted_time'    => date('Y-m-d h:i:s A'),
        ];
        
        $this->emp_applicants_model->insert($data);
    }

    // public function check_past_application(){
    //     $student_id = '123'; // get from session later
    //     $emp_id = $this->input->post('ep_id');
    //     $response = '';
    //     $query = $this->emp_applicants_model->past_application($emp_id, $student_id);
    //     if ($query == true) {
    //         $response = '1';
    //     } else {
    //         $response = '2';
    //     }
    //     echo json_encode($response); // remove later
    // }
}