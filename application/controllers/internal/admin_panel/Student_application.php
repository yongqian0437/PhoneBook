<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_application extends CI_Controller 
{

    public function __construct()
    {
        parent:: __construct();
        $this->load->model(['course_applicants_model']);
        
        // Checks if session is set and if user is signed in as Admin (authorised access). If not, deny his/her access.
        if (!$this->session->userdata('user_id') || $this->session->userdata('user_role') != "Admin"){  
            redirect('user/login/Auth/login');
        }
    }

    public function index()
    {
        $data['title']= 'IJEES | Student Application';
        //$data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $result=$this->course_applicants_model->index();
        $data=array('calist'=>$result);
        $this->load->view('internal/admin_panel/student_application_view',$data);
        $this->load->view('internal/templates/footer');
    }
}