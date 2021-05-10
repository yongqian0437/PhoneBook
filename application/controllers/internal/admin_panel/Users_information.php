<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_information extends CI_Controller 
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model(['user_student_model','user_ep_model']);
    }
<<<<<<< Updated upstream
    
=======
>>>>>>> Stashed changes
    public function index()
    {
        
      $data['title']= 'Student';
      $data['users']=$this->db->get_where('users',['user_email'=>$this->session->userdata('user_email')])->row_array();
      $data['user_student']=$this->db->get_where('user_student');
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
       
        $this->load->model('student_model');
        $result=$this->student_model->index();
        $data=array('studentlist'=>$result);
        $this->load->view('external/student',$data);
        $this->load->view('templates/footer');
        
    }
    public function detailstudent ($id)
    {
        $data['users']=$this->db->get_where('users',['user_email'=>$this->session->userdata('user_email')])->row_array();
        $data['title']="Detail of Student";
         $data['student']=$this->student_model->getdetail($id);        
         $this->load->view('templates/header',$data);
         $this->load->view('templates/sidebar',$data);
         $this->load->view('templates/topbar',$data);
         $this->load->view('external/stu_detail',$data);
         $this->load->view('templates/footer'); 
        
    }

}


?>