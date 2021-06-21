<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_information extends CI_Controller 
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model(['user_student_model','user_ep_model','user_ac_model','user_ea_model','user_e_model',
        'company_model','universities_model']);
        
        // Checks if session is set and if user is signed in as Admin (authorised access). If not, deny his/her access.
        if (!$this->session->userdata('user_id') || $this->session->userdata('user_role') != "Admin"){  
            redirect('user/login/Auth/login');
        }
    }

    public function students_info()
    {  
        $data['title']= 'Admin | Students';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $result=$this->user_student_model->full_students_details();
        $data=array('studentlist'=>$result);
        $this->load->view('internal/admin_panel/student_view',$data);
        $this->load->view('internal/templates/footer');  
    }

    public function ep_info()
    {
        $data['title']= 'Admin | Education Partners';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $result=$this->user_ep_model->full_ep_details();
        $data=array('eplist'=>$result);
        $this->session->set_userdata($data); 
        $this->load->view('internal/admin_panel/ep_view',$data);
        $this->load->view('internal/templates/footer');   
    }

    public function ac_info()
    {
        $data['title']= 'Admin | Academic Counsellors';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $result=$this->user_ac_model->full_ac_details();
        $data=array('aclist'=>$result);
        $this->load->view('internal/admin_panel/ac_view',$data);
        $this->load->view('internal/templates/footer');   
    }

    public function ea_info()
    {
        $data['title']= 'Admin | Education Agents';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $result=$this->user_ea_model->full_ea_details();
        $data=array('ealist'=>$result);
        $this->load->view('internal/admin_panel/ea_view',$data);
        $this->load->view('internal/templates/footer');   
    }

    public function employer_info()
    {
        $data['title']= 'Admin | Employers';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $result=$this->user_e_model->full_e_details();
        $data=array('elist'=>$result);
        $this->load->view('internal/admin_panel/employer_view',$data);
        $this->load->view('internal/templates/footer');   
    }

}

?>