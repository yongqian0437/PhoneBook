<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Employer_projects extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['company_model', 'user_e_model', 'employer_projects_model']);
    }

    public function index()
    {
        $data['title'] = "Employer Projects";
        
        // WIP
        // Get EPs that are approved and their details
        $eps= $this->employer_projects_model->full_details();
        $data['eps'] = $eps;

        // var_dump($eps);
        // die;
            
        $this->load->view('external/templates/header', $data);
        $this->load->view('external/employer_projects_view', $eps); 
        $this->load->view('external/templates/footer');
    }
}