<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_information extends CI_Controller 
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model(['user_student_model','user_ep_model','user_ac_model','user_ea_model','user_e_model',
        'company_model','universities_model']);
    }

    public function students_info()
    {  
        $data['title']= 'Student';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $result=$this->user_student_model->index();
        $data=array('studentlist'=>$result);
        $this->load->view('internal/admin_panel/student_view',$data);
        $this->load->view('internal/templates/footer');  
    }

    public function detail_student ($id)
    {
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
        $data['title']="Detail of Education Partner";
        $data['ep']=$this->user_ep_model->ep_details($id);        
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        // $this->load->view('templates/topbar',$data);
        $this->load->view('internal/admin_panel/ep_form_view',$data);
        $this->load->view('internal/templates/footer');
    }

    public function university($uni_id)
    {
        $data['title']="Detail of University";
        //$company['c']=$this->company_model->c_details($c_id);
        $university['uni']=$this->universities_model->uni_details($uni_id);
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/admin_panel/university_form_view',$university);
        $this->load->view('internal/templates/footer');
    }

    public function ac_info()
    {
        $data['title']= 'Academic Counsellor';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $result=$this->user_ac_model->index();
        $data=array('aclist'=>$result);
        $this->load->view('internal/admin_panel/ac_view',$data);
        $this->load->view('internal/templates/footer');   
    }

    public function detail_academic_counsellor ($id)
    {
        $data['title']="Detail of Academic Counsellor";
        $data['ac']=$this->user_ac_model->ac_details($id);        
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        // $this->load->view('templates/topbar',$data);
        $this->load->view('internal/admin_panel/ac_form_view',$data);
        $this->load->view('internal/templates/footer');
    }

    public function ea_info()
    {
        $data['title']= 'Education Agent';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $result=$this->user_ea_model->index();
        $data=array('ealist'=>$result);
        $this->load->view('internal/admin_panel/ea_view',$data);
        $this->load->view('internal/templates/footer');   
    }

    public function detail_education_agents($id)
    {
        $data['title']="Detail of Education Agent";
        $data['ea']=$this->user_ea_model->ea_details($id);        
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        // $this->load->view('templates/topbar',$data);
        $this->load->view('internal/admin_panel/ea_form_view',$data);
        $this->load->view('internal/templates/footer');  
    }

    public function employer_info()
    {
        $data['title']= 'Employer';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $result=$this->user_e_model->index();
        $data=array('elist'=>$result);
        $this->load->view('internal/admin_panel/employer_view',$data);
        $this->load->view('internal/templates/footer');   
    }

    public function detail_employer($id)
    {
        $data['title']="Detail of Employer";
        $employer['e']=$this->user_e_model->e_details($id);
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
        $data['title']="Detail of Company";
        $company['c']=$this->company_model->c_details($c_id);
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/admin_panel/company_form_view',$company);
        $this->load->view('internal/templates/footer');
    }
}

?>