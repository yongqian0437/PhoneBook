<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_information extends CI_Controller 
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model(['user_student_model','user_ep_model']);
    }

    public function students_info()//----------- change the function name in view------------------//
    {
        
      $data['title']= 'Student';
      //------------------put in model-----------------//
     // $data['users']=$this->db->get_where('users',['user_email'=>$this->session->userdata('user_email')])->row_array();
     // $data['user_student']=$this->db->get_where('user_student');

     //-------------------change the templates name----------------------//
        // $this->load->view('templates/header',$data);
        // $this->load->view('templates/sidebar',$data);
        // $this->load->view('templates/topbar',$data);
       
        $this->load->model('user_student_model');
        $result=$this->user_student_model->index();
        $data=array('studentlist'=>$result);
        // $this->load->view('external/student',$data);
        // $this->load->view('templates/footer');
        
    }
    public function detailstudent ($id)
    {
        $data['users']=$this->db->get_where('users',['user_email'=>$this->session->userdata('user_email')])->row_array();
        $data['title']="Detail of Student";
        $data['student']=$this->user_student_model->getdetail($id);  
         
        //-------------------change the templates name----------------------//
        //  $this->load->view('templates/header',$data);
        //  $this->load->view('templates/sidebar',$data);
        //  $this->load->view('templates/topbar',$data);
         $this->load->view('external/stu_detail',$data);//-------change into user_information------------//
        //  $this->load->view('templates/footer'); 
        
    }

}


?>