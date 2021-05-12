<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_information extends CI_Controller 
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model(['user_student_model','user_ep_model']);
    }

    
    //---------------------------wait ariane for the sidebar--------------------//
    public function students_info()
    {  
        $data['title']= 'Student';
        $data['users']=$this->user_model->search_email();
        $data['user_student']=$this->db->get_where('user_student');
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        // $this->load->view('templates/topbar',$data);
        $this->load->model('user_student_model');
        $result=$this->user_student_model->index();
        $data=array('studentlist'=>$result);
        $this->load->view('internal/admin_panel/student_view',$data);
        $this->load->view('internal/templates/footer');  
    }

    public function detailstudent ($id)
    {
      //  $data['users']=$this->db->get_where('users',['user_email'=>$this->session->userdata('user_email')])->row_array();
         $data['title']="Detail of Student";
         $data['student']=$this->user_student_model->student_details($id);        
         $this->load->view('internal/templates/header',$data);
         $this->load->view('internal/templates/sidenav',$data);
        // $this->load->view('templates/topbar',$data);
         $this->load->view('internal/admin_panel/student_form_view',$data);
         $this->load->view('internal/templates/footer');
        
    }

}


?>