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
        $data['title']= 'iJEES | Student';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $result=$this->user_student_model->full_students_details();
        $data=array('studentlist'=>$result);
        $this->load->view('internal/admin_panel/student_view',$data);
        $this->load->view('internal/templates/footer');  
    }

    public function detail_student ($id)
    {
         $data['title']="iJEES | Detail of Student";
         $data['student']=$this->user_student_model->student_details($id);        
         $this->load->view('internal/templates/header',$data);
         $this->load->view('internal/templates/sidenav',$data);
        // $this->load->view('templates/topbar',$data);
         $this->load->view('internal/admin_panel/student_form_view',$data);
         $this->load->view('internal/templates/footer');
    }

    public function ep_info()
    {
        $data['title']= 'iJEES | Education Partner';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        // $this->load->view('templates/topbar',$data);
        $result=$this->user_ep_model->full_ep_details();
        $data=array('eplist'=>$result);
        $this->session->set_userdata($data); 
        $this->load->view('internal/admin_panel/ep_view',$data);
        $this->load->view('internal/templates/footer');   
    }

    public function detail_education_partner ($id)//get user id to find ep details
    {
        $data['title']="iJEES | Detail of Education Partner";
        $data['ep']=$this->user_ep_model->ep_details($id); 
        $ep_information=$this->user_ep_model->ep_details($id); 
        $ep_info=
        [
            'ep_id'=> $ep_information['ep_id'],
            'user_id'=> $ep_information['user_id'],
            
        ];

        $this->session->set_userdata($ep_info);
       
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        // $this->load->view('templates/topbar',$data);
        $this->load->view('internal/admin_panel/ep_form_view',$data);
        $this->load->view('internal/templates/footer');
    }

    public function university($uni_id)
    {
        $data['title']="iJEES | Detail of University";
        $data['ep']=$this->user_ep_model->ep_details($uni_id); 
        $university['uni']=$this->universities_model->uni_details($uni_id);
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/admin_panel/university_form_view',$university);
        $this->load->view('internal/templates/footer');
    }

    public function ac_info()
    {
        $data['title']= 'iJEES | Academic Counsellor';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $result=$this->user_ac_model->full_ac_details();
        $data=array('aclist'=>$result);
        $this->load->view('internal/admin_panel/ac_view',$data);
        $this->load->view('internal/templates/footer');   
    }

    public function detail_academic_counsellor ($id)
    {
        $data['title']="iJEES | Detail of Academic Counsellor";
        $data['ac']=$this->user_ac_model->ac_details($id);        
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        // $this->load->view('templates/topbar',$data);
        $this->load->view('internal/admin_panel/ac_form_view',$data);
        $this->load->view('internal/templates/footer');
    }

    public function ea_info()
    {
        $data['title']= 'iJEES | Education Agent';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $result=$this->user_ea_model->full_ea_details();
        $data=array('ealist'=>$result);
        $this->load->view('internal/admin_panel/ea_view',$data);
        $this->load->view('internal/templates/footer');   
    }

    public function detail_education_agents($id)
    {
        $data['title']="iJEES | Detail of Education Agent";
        $data['ea']=$this->user_ea_model->ea_details($id);        
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        // $this->load->view('templates/topbar',$data);
        $this->load->view('internal/admin_panel/ea_form_view',$data);
        $this->load->view('internal/templates/footer');  
    }

    public function employer_info()
    {
        $data['title']= 'iJEES | Employer';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $result=$this->user_e_model->full_e_details();
        $data=array('elist'=>$result);
        $this->load->view('internal/admin_panel/employer_view',$data);
        $this->load->view('internal/templates/footer');   
    }

    public function detail_employer($id)
    {
        $data['title']="iJEES | Detail of Employer";
        $employer['e']=$this->user_e_model->e_details($id);
        $e_information=$this->user_e_model->e_details($id);
        $e_info=
        [
            'e_id'=> $e_information['e_id'],
            'user_id'=> $e_information['user_id'],
        ];

        $this->session->set_userdata($e_info);
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        // $this->load->view('templates/topbar',$data);
        $this->load->view('internal/admin_panel/e_form_view',$employer);
        $this->load->view('internal/templates/footer');
        //$user_id=$this->company($id);
        //redirect('internal/admin_panel/Users_information/company',$employer); 
    }

    public function company($c_id)
    {
        $data['title']="iJEES | Detail of Company";
        $company['c']=$this->company_model->c_details($c_id);
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/admin_panel/company_form_view',$company);
        $this->load->view('internal/templates/footer');
    }
}

?>