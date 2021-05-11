<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('email');
        // this->load->model("modelname");
        $this->load->model('user_model');
        $this->load->model('user_student_model');
        $this->load->model('user_ep_model');
        
    }

    public function login()
    {
        $this->form_validation->set_rules('user_email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('user_password','Password','trim|required');
        
        if($this->form_validation->run() ==false)
        {
            $data['title']='User Login';

        $this->load->view('internal/templates/header',$data);
        $this->load->view('user/login/login_view');
        $this->load->view('internal/templates/footer');
           }else{
               $this->_login();
           }
           
            
    }
    
    private function _login()
    {
        $user_email= $this->input->post('user_email');
        $user_password=$this->input->post('user_password');
        
        $users=$this->db->get_where('users', ['user_email'=>$user_email])->row_array();// put in model
         
        // if user exists
        if($users){
            // if user is approved
            if($users['user_approval']==1){
                // verify the password
                if($user_password==$users['user_password']){
                    $data=[
                        'user_email'=>$users['user_email'],
                        'user_role'=>$users['user_role']
                    ];
                    $this->session->set_userdata($data);
                    if($users['user_role']=="admin"){
                        redirect('internal/admin_panel/admin_dashboard');
                      }else
                    //    redirect('external/user_dashboard');//-------------change later---------//
                       redirect('internal/level_2/level_2_dashboard');
                }else{
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Wrong password!</div>');
                    redirect('user/login/login_view');
    
                }
    
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Email has not been activated!</div>');
                    redirect('user/login/login_view');
            }
    
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Email has not been activated!</div>');
                    redirect('user/login/login_view');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('user_fname','First Name', 'required|trim');
        $this->form_validation->set_rules('user_lname','Last Name', 'required|trim');
        $this->form_validation->set_rules('user_email','Email', 'required|trim|valid_email|is_unique[users.user_email]',[
            'is_unique'=>'This email has already registered!'
        ]);

        $this->form_validation->set_rules('user_password','Password', 'required|trim|min_length[3]|matches[user_password2]',[
            'matches'=>'password do not match!',
            'min_length'=> 'Password too short'
        ]);
        $this->form_validation->set_rules('user_password2','Password', 'required|trim|matches[user_password]');
        if($this->form_validation->run()== false)
        {
            $data['title']="User Registration";
            //-------------------------------- chaneg later-----------------------------//
            // $this->load->view('templates/user_header',$data);
            // $this->load->view('user/registration');
            // $this->load->view('templates/user_footer');
            $this->load->view('internal/templates/header',$data);
            $this->load->view('user/registration/registration_view');
            $this->load->view('internal/templates/footer');

        }
        else
        {
            $data=
            [
                'user_fname'=>htmlspecialchars($this->input->post('user_fname',true)),
                'user_lname'=>htmlspecialchars($this->input->post('user_lname',true)),
                'user_email'=>htmlspecialchars($this->input->post('user_email',true)),
                'user_password'=>htmlspecialchars($this->input->post('user_password',true)),
                'user_role'=>htmlspecialchars($this->input->post('user_role',true)),
                'user_approval'=>0,
            ];
        
            // insert data into database
            $this->db->insert('users',$data);//------------------ move to model-------------------//
            $user_role=$this->user_model->get_role();
        
            if($user_role=="student")
            {
                //------------------ change later-------------------(wait for wc)//
                // $this->load->view('user/reg_student');
            }
            else
            {
                 //------------------ change later-------------------(wait for wc)//
                // $this->load->view('user/reg_education_partner');
            }
            
        }
    }

    public function student_reg()// -----------------change function name in view-------------------//
    {
        $user_id=$this->user_student_model->getuserid();
        $data=
        [
            'user_id'=>$user_id,
            'student_phonenumber'=>htmlspecialchars($this->input->post('student_phonenumber',true)),
            'student_nationality'=>htmlspecialchars($this->input->post('student_nationality',true)),
            'student_gender'=>htmlspecialchars($this->input->post('student_gender',true)),
            'student_dob'=>htmlspecialchars($this->input->post('student_dob',true)),
            'student_interest'=>htmlspecialchars($this->input->post('student_interest',true)),
            'student_currentlevel'=>htmlspecialchars($this->input->post('student_currentlevel',true)),
        ];

        $this->db->insert('user_student',$data);//------------------ move to model-------------------//
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Check your email to get the approval from the admin</div>');
         redirect('user/login/login_view');  
    
    }

    public function ep_reg()// -----------------change function name in view-------------------//
    {
        $user_id=$this->user_ep_model->getuserid();
        $data=
        [
            'user_id'=>$user_id,
            'ep_phonenumber'=>htmlspecialchars($this->input->post('ep_phonenumber',true)),
            'ep_businessemail'=>htmlspecialchars($this->input->post('ep_businessemail',true)),
            'ep_nationality'=>htmlspecialchars($this->input->post('ep_nationality',true)),
            'ep_gender'=>htmlspecialchars($this->input->post('ep_gender',true)),
            'ep_dob'=>htmlspecialchars($this->input->post('ep_dob',true)),
            'ep_jobtitle'=>htmlspecialchars($this->input->post('ep_jobtitle',true)),  
        ];

        $this->db->insert('user_ep',$data);//------------------ move to model-------------------//
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Check your email to get the approval from the admin</div>'); 
        redirect('user/login/login_view');  
    }

    public function logout()
    {
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_role');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        You have been logout</div>');
        redirect('user/login/login_view');
     
    }


}




