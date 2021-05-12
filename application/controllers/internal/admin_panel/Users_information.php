<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_information extends CI_Controller 
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model(['user_student_model','user_ep_model','user_ac_model']);
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
        $result=$this->user_student_model->index();
        $data=array('studentlist'=>$result);
        $data['users']=$this->user_model->searchdata();
        $this->load->view('internal/admin_panel/student_view',$data);
        $this->load->view('internal/templates/footer');  
    }

    public function detail_student ($id)
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

    public function ep_info()
    {
        $data['title']= 'Education Partner';
        $data['users']=$this->user_model->search_email();
        $data['user_ep']=$this->db->get_where('user_ep');
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        // $this->load->view('templates/topbar',$data);
        $result=$this->user_ep_model->index();
        $data=array('eplist'=>$result);
        $this->load->view('internal/admin_panel/ep_view',$data);
        $this->load->view('internal/templates/footer');   
    }

    public function detail_education_partner ($id)
    {
        $data['users']=$this->db->get_where('users',['user_email'=>$this->session->userdata('user_email')])->row_array();
        $data['title']="Detail of Education Partner";
        $data['ep']=$this->user_ep_model->getdetail($id);        
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('templates/topbar',$data);
         $this->load->view('external/ep_detail',$data);
         $this->load->view('templates/footer'); 
    }

    public function ac_info()
    {
        // $data['title']= 'Academic Couselor';
        // $data['users']=$this->user_model->search_email();
        // $data['user_ac']=$this->db->get_where('user_ac');
        // $this->load->view('internal/templates/header',$data);
        // $this->load->view('internal/templates/sidenav',$data);
        // // $this->load->view('templates/topbar',$data);
        // $result=$this->user_ac_model->index();
        // $data=array('aclist'=>$result);
        // $this->load->view('internal/admin_panel/ac_view',$data);
        // $this->load->view('internal/templates/footer');   
    }

    public function detail_academic_couselor ($id)
    {

    }

    public function ea_info()
    {

    }

    public function detail_education_agents()
    {
        
    }

    public function employer_info()
    {

    }

    public function detail_employer()
    {
        
    }
}


?>