<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ea_dashboard extends CI_Controller 
{

    public function __construct()
	{
		parent::__construct();
	
        $this->load->model(['user_model','course_applicants_model']);
        $this->load->library('form_validation');
        $this->load->helper('form');
        // Checks if session is set and if user is signed in as Level 2 user (authorised access). If not, deny his/her access.
        if (!$this->session->userdata('user_id') || !$this->session->userdata('user_role'))
        {  
            redirect('user/login/Auth/login');
        }
	}

    public function index()
    {
        
    }

    public function course_application()
    {
        
        $data['title']= 'Course Application';
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $search_id=$this->session->userdata('user_id');
         $result=$this->course_applicants_model->search_id($search_id);
        //$result=$this->course_applicants_model->index();
         $data=array('calist'=>$result);
        //$data['calist']=$this->course_applicants_model->search_id($search_id);
        $this->load->view('internal/level_2/ea_dashboard_view',$data);
        $this->load->view('internal/templates/footer');  
    }

    public function add_course_application()
    {
        $data['title']= 'Add Student Application';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $this->load->view('user/registration/ea_course_application_view',$data);
        $this->load->view('internal/templates/footer');  
    }

    public function upload_doc($path, $file_input_name) 
    {
        if ($_FILES){
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($file_input_name)) 
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                The file format is not correct</div>');
                redirect('internal/level_2/ea_dashboard/course_applicant_reg');
            } else {
                $doc_data = ($this->upload->data());
                return $doc_data;
            }   
        }
    }

    public function course_applicant_reg()
    {
        $data['title']="iJEES | Course Applicant Registration";
       
        $this->form_validation->set_rules('c_applicant_phonenumber','Phone Number', 'required|trim|min_length[5]',[
            'min_length'=> 'Phone number too short'
        ]);
        $this->form_validation->set_rules('c_applicant_email','Email', 'required|trim|valid_email|is_unique[course_applicants.c_applicant_email]',[
            'is_unique'=>'This email has already registered!'
        ]);

        $this->form_validation->set_rules('c_applicant_identification','Identification', 'required|trim|is_unique[course_applicants.c_applicant_identification]',[
            'is_unique'=>'This identification has already registered!'
        ]);

        if($this->form_validation->run()== false)
        {
            $data['title']="iJEES | Course Applicant Registration";
            $data['include_css']="forms";
            $this->load->view('internal/templates/header',$data);
            $this->load->view('internal/templates/sidenav',$data);
            $this->load->view('internal/templates/topbar',$data);
            $this->load->view('user/registration/ea_course_application_view',$data);
            $this->load->view('internal/templates/footer'); 
        }
        else
        {
            $c_applicant_document= $this->upload_doc('./assets/uploads/course_applicant_form', 'c_applicant_document');
            $user_id=$this->session->userdata('user_id');
            $data=
            [
                'c_applicant_method'=>$user_id,
                'c_applicant_fname'=>htmlspecialchars($this->input->post('c_applicant_fname',true)),
                'c_applicant_lname'=>htmlspecialchars($this->input->post('c_applicant_lname',true)),
                'c_applicant_phonenumber'=>htmlspecialchars($this->input->post('c_applicant_phonenumber',true)),
                'c_applicant_email'=>htmlspecialchars($this->input->post('c_applicant_email',true)),
                'c_applicant_nationality'=>htmlspecialchars($this->input->post('c_applicant_nationality',true)),
                'c_applicant_gender'=>htmlspecialchars($this->input->post('c_applicant_gender',true)),
                'c_applicant_dob'=>htmlspecialchars($this->input->post('c_applicant_dob',true)),
                'c_applicant_currentlevel'=>htmlspecialchars($this->input->post('c_applicant_currentlevel',true)),
                'c_applicant_address'=>htmlspecialchars($this->input->post('c_applicant_address',true)),
                'c_applicant_identification'=>htmlspecialchars($this->input->post('c_applicant_identification',true)),
                'c_applicant_document'=>$c_applicant_document['file_name'],
                
            ];

             // insert data into database
            $this->course_applicants_model->insert($data);

            $c_applicant_method= $this->input->post('c_applicant_method');
            $ea=$this->course_applicants_model->valid_ea($c_applicant_method);
            $course_applicant=
            [
                'c_applicant_method'=>$ea['c_applicant_method'],
            ];
            $this->session->set_userdata($course_applicant);
       
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        You have registered successfully</div>');
        
        redirect('internal/level_2/ea_dashboard/add_course_application');
        }
        
    }

}


?>