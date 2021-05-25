<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->helper('form');
        $this->load->model(['user_student_model','user_ep_model','user_ac_model','user_ea_model',
        'user_e_model','universities_model','company_model','courses_model']);
    }
    
    public function login()
    {
        $this->form_validation->set_rules('user_email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('user_password','Password','trim|required');
        
        if($this->form_validation->run() ==false)
        {
            $data['title']='User Login';
            $this->load->view('external/templates/header',$data);
            $this->load->view('user/login/login_view');
           // $this->load->view('external/templates/footer');
        }
        else
        {
            $this->_login();
        }     
    }
    
    private function _login()
    {
        $user_email= $this->input->post('user_email');
        $user_password=$this->input->post('user_password');
        $users=$this->user_model->valid_email($user_email);

        // if user exists
        if($users)
        {
            // if user is approved
            if($users['user_approval']==1)
            {
                // verify the password
                if($user_password==$users['user_password'])
                {
                    $data=
                    [
                        'user_fname'=>$users['user_fname'],
                        'user_lname'=>$users['user_lname'],
                        'user_email'=>$users['user_email'],
                        'user_role'=>$users['user_role'],
                        'user_id'=>$users['user_id'],
                    ];

                    $this->session->set_userdata($data);
                    // check user role is admin
                    if($users['user_role']=="Admin")
                    {
                        redirect('internal/admin_panel/Admin_dashboard');
                    }
                    // check user role is  AC,EA,E,EP
                    else if ($users['user_role']!="Student")
                    {
                       redirect('internal/level_2/Level_2_dashboard/profile_level_2');
                    }
                     // check user role is  student
                    else
                        redirect('external/homepage/profile_level_1');
                }
                // if password is incorrect
                else
                {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                    Wrong password!</div>');
                    redirect('user/login/Auth/login');
                }
            }
            // if account is not approved by admin
            else
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                Email has not been activated!</div>');
                redirect('user/login/Auth/login');
            }
        }
        
        // if user account does not exist
        else
        {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Account does not exist!</div>');
            redirect('user/login/Auth/login');
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
            $this->load->view('external/templates/header',$data);
            $this->load->view('user/registration/registration_view');
            //$this->load->view('external/templates/footer');
        }
        else
        {

            if($this->input->post('user_role')=="Student")
            {
                $data=
                [
                    'user_fname'=>htmlspecialchars($this->input->post('user_fname',true)),
                    'user_lname'=>htmlspecialchars($this->input->post('user_lname',true)),
                    'user_email'=>htmlspecialchars($this->input->post('user_email',true)),
                    'user_password'=>htmlspecialchars($this->input->post('user_password',true)),
                    'user_role'=>htmlspecialchars($this->input->post('user_role',true)),
                    'user_approval'=>1,
                ];
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
            }
        
            // insert data into database
            $this->user_model->insert($data);
           
            $user_email= $this->input->post('user_email');
            $users=$this->user_model->valid_email($user_email);

            $user=
            [
                'user_fname'=>$users['user_fname'],
                'user_lname'=>$users['user_lname'],
                'user_email'=>$users['user_email'],
                'user_role'=>$users['user_role'],
                'user_id'=>$users['user_id'],
            ];

            $this->session->set_userdata($user);
            $user_role= $this->input->post('user_role');
            if($user_role=="Student")
            {
                redirect("user/login/Auth/student_reg"); 
               
            }
            else if($user_role=="Education Partner")
            {
                redirect("user/login/Auth/university");
            }
            else if($user_role=="Academic Counsellor")
            {
                redirect("user/login/Auth/ac_reg");
            }
            else if($user_role=="Education Agent")
            {
                redirect("user/login/Auth/ea_reg");
            }
            else
            {
                redirect("user/login/Auth/company");
            }
        }
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
                redirect('user/login/Auth/ep_reg');
            } else {
                $doc_data = ($this->upload->data());
                return $doc_data;
            }   
        }
    }

    public function upload_img($path, $file_input_name) 
    {
        if ($_FILES){
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpeg|jpg|png';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($file_input_name)) 
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                The file format must be in "png, jpg or jpeg"</div>');
                redirect('user/login/Auth/university');
            } else {
                $doc_data = $this->upload->data();
                return $doc_data;
            }   
        }
    }


    public function student_reg()
    {
       // $user_id=$this->user_student_model->last_user_id();// get the id from student model
        $user_id=$this->session->userdata('user_id');
        $data['title']="Student Registration";
       
        $this->form_validation->set_rules('student_phonenumber','Phone Number', 'required|trim|min_length[5]',[
            'min_length'=> 'Phone number too short'
        ]);

        if($this->form_validation->run()== false)
        {
            $data['title']="Student Registration";
            $this->load->view('external/templates/header',$data);
            $this->load->view('user/registration/student_registration_view');
            //$this->load->view('external/templates/footer');
        }
        else
        {
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

        // insert data into database
        $this->user_student_model->insert($data);
       
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Check your email to get the approval from the admin</div>');
        
        redirect('user/login/Auth/login');
        }
        
    }
    
    public function university()
    {
        $this->form_validation->set_rules('uni_name','University Name', 'required|trim');
        // $this->form_validation->set_rules('uni_shortprofile','Short Profile', 'required|trim|max_length[255]',[
        //     'min_length'=> 'Short Profile too long'
        // ]);
       
        if($this->form_validation->run()== false)
        {
        $data['title']="University";
        $this->load->view('external/templates/header',$data);
        $this->load->view('user/registration/university_view');
        }
        else
        {
                $uni_background= $this->upload_img('./assets/img/reg_uni', 'uni_background');  
                $uni_logo= $this->upload_img('./assets/img/reg_uni', 'uni_logo');
               
            $data=
                [
                    'uni_logo'=>$uni_logo['file_name'],
                    'uni_background'=>$uni_background['file_name'],
                    'uni_name'=>htmlspecialchars($this->input->post('uni_name',true)),
                    'uni_shortprofile'=>htmlspecialchars($this->input->post('uni_shortprofile',true)),
                    'uni_country'=>htmlspecialchars($this->input->post('uni_country',true)),
                    'uni_hotline'=>htmlspecialchars($this->input->post('uni_hotline',true)),
                    'uni_email'=>htmlspecialchars($this->input->post('uni_email',true)),
                    'uni_address'=>htmlspecialchars($this->input->post('uni_address',true)),
                    'uni_qsrank'=>htmlspecialchars($this->input->post('uni_qsrank',true)),
                    'uni_employabilityrank'=>htmlspecialchars($this->input->post('uni_employabilityrank',true)),
                ];

          // insert data into database
          $this->universities_model->insert($data);

          $uni_email= $this->input->post('uni_email');
          $uni=$this->universities_model->valid_email($uni_email);
          $university=
          [
              'uni_id'=>$uni['uni_id'],
              'uni_name'=>$uni['uni_name'],
              'uni_email'=>$uni['uni_email'],
          ];

          $this->session->set_userdata($university);

          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
          Check your email to get the approval from the admin</div>'); 
          redirect('user/login/Auth/ep_reg'); 
        }
          
    }

    // public function course()
    // {
    //     $this->form_validation->set_rules('course_name','Course Name', 'required|trim');
    //     $uni_id= $this->session->userdata('uni_id');
    //     //$uni_id=$this->universities_model->last_uni_id();
    //     if($this->form_validation->run()== false)
    //     {
    //     $data['title']="Course";
    //     $this->load->view('external/templates/header',$data);
    //     $this->load->view('user/registration/course_view');
    //     }
    //     else
    //     {
    //         $data=
    //             [
    //             //  'uni_logo'=>htmlspecialchars($this->input->post('uni_logo',true)),  
    //                 'uni_id'=>$uni_id,
    //                 'course_area'=>htmlspecialchars($this->input->post('course_area',true)),
    //                 'course_level'=>htmlspecialchars($this->input->post('course_level',true)),
    //                 'course_name'=>htmlspecialchars($this->input->post('course_name',true)),
    //                 'course_duration'=>htmlspecialchars($this->input->post('course_duration',true)),
    //                 'course_fee'=>htmlspecialchars($this->input->post('course_fee',true)),
    //                 'course_shortprofile'=>htmlspecialchars($this->input->post('course_shortprofile',true)),
    //                 'course_structure'=>htmlspecialchars($this->input->post('course_structure',true)),
    //                 'course_requirements'=>htmlspecialchars($this->input->post('course_requirements',true)),
    //                 'course_intake'=>htmlspecialchars($this->input->post('course_intake',true)),
    //                 'course_careeropportunities'=>htmlspecialchars($this->input->post('course_careeropportunities',true)),
    //             ];

    //       // insert data into database
    //       $this->courses_model->insert($data);

    //       $course_name= $this->input->post('course_name');
    //       $co=$this->courses_model->valid_course_name($course_name);
    //       $course=
    //       [
    //           'course_id'=>$co['course_id'],
    //           'uni_id'=>$co['uni_id'],
    //           'course_name'=>$co['course_name'],
    //       ];

    //       $this->session->set_userdata($course);

    //       redirect('user/login/Auth/ep_reg'); 
    //     }
          
    // }

    public function ep_reg()
    { 
        $user_id= $this->session->userdata('user_id');
        $uni_id= $this->session->userdata('uni_id');
        //$course_id= $this->session->userdata('course_id');
        // $user_id=$this->user_ep_model->last_user_id();
        // $uni_id=$this->universities_model->last_uni_id();
       // $course_id=$this->courses_model->last_course_id();
        $this->form_validation->set_rules('ep_phonenumber','Phone Number', 'required|trim|min_length[5]',[
            'min_length'=> 'Phone number too short'
        ]);
        $this->form_validation->set_rules('ep_businessemail','Email', 'required|trim|valid_email|is_unique[user_ep.ep_businessemail]',[
            'is_unique'=>'This email has already registered!'
        ]);

        if($this->form_validation->run()== false)
        {
            $data['title']="Education Partner Registration";
            $this->load->view('external/templates/header',$data);
            $this->load->view('user/registration/ep_registration_view');
           // $this->load->view('external/templates/footer');
        }
        else
        {
            $ep_document = $this->upload_doc('./assets/uploads/education_partner', 'ep_document');
            
            $data=
            [
                'user_id'=>$user_id,
                'uni_id'=>$uni_id,
                //'course_id'=>$course_id,
                'ep_phonenumber'=>htmlspecialchars($this->input->post('ep_phonenumber',true)),
                'ep_businessemail'=>htmlspecialchars($this->input->post('ep_businessemail',true)),
                'ep_nationality'=>htmlspecialchars($this->input->post('ep_nationality',true)),
                'ep_gender'=>htmlspecialchars($this->input->post('ep_gender',true)),
                'ep_dob'=>htmlspecialchars($this->input->post('ep_dob',true)),
                'ep_document'=>$ep_document['file_name'], 
                'ep_jobtitle'=>htmlspecialchars($this->input->post('ep_jobtitle',true)),  
            ];
        
         // insert data into database
            $this->user_ep_model->insert($data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Check your email to get the approval from the admin</div>'); 
            redirect('user/login/Auth/login'); 
        }
    }


    public function ea_reg()
    { 
        //$user_id=$this->user_ep_model->last_user_id();
        $user_id=$this->session->userdata('user_id');
        $this->form_validation->set_rules('ea_phonenumber','Phone Number', 'required|trim|min_length[5]',[
            'min_length'=> 'Phone number too short'
        ]);
        $this->form_validation->set_rules('ea_businessemail','Email', 'required|trim|valid_email|is_unique[user_ep.ep_businessemail]',[
            'is_unique'=>'This email has already registered!'
        ]);

        if($this->form_validation->run()== false)
        {
            $data['title']="Education Agent Registration";
            $this->load->view('external/templates/header',$data);
            $this->load->view('user/registration/ea_registration_view');
            $this->load->view('external/templates/footer');
        }
        else
        {
            $ea_document = $this->upload_doc('./assets/uploads/education_agents', 'ea_document');

            $data=
            [
                'user_id'=>$user_id,
                'ea_phonenumber'=>htmlspecialchars($this->input->post('ea_phonenumber',true)),
                'ea_businessemail'=>htmlspecialchars($this->input->post('ea_businessemail',true)),
                'ea_nationality'=>htmlspecialchars($this->input->post('ea_nationality',true)),
                'ea_gender'=>htmlspecialchars($this->input->post('ea_gender',true)),
                'ea_dob'=>htmlspecialchars($this->input->post('ea_dob',true)),
                'ea_document'=>$ea_document['file_name'],
            ];

            // insert data into database
            $this->user_ea_model->insert($data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Check your email to get the approval from the admin</div>'); 
            redirect('user/login/Auth/login'); 
        }
    }

    public function ac_reg()
    { 
        $data['university_data'] = $this->universities_model->select_all_approved_only(); // get from eddie's branch
        //$user_id=$this->user_ep_model->last_user_id();
        $user_id=$this->session->userdata('user_id');
        $this->form_validation->set_rules('ac_phonenumber','Phone Number', 'required|trim|min_length[5]',[
            'min_length'=> 'Phone number too short'
        ]);
        $this->form_validation->set_rules('ac_businessemail','Email', 'required|trim|valid_email|is_unique[user_ep.ep_businessemail]',[
            'is_unique'=>'This email has already registered!'
        ]);

        if($this->form_validation->run()== false)
        {
            $data['title']="Academic Couselor Registration";
            $this->load->view('external/templates/header',$data);
            $this->load->view('user/registration/ac_registration_view',$data);// get data from model
           // $this->load->view('external/templates/footer');
        }
        else
        {
            $ac_document = $this->upload_doc('./assets/uploads/academic_counsellor', 'ac_document');

            $data=
            [
                'user_id'=>$user_id,
                'ac_phonenumber'=>htmlspecialchars($this->input->post('ac_phonenumber',true)),
                'ac_businessemail'=>htmlspecialchars($this->input->post('ac_businessemail',true)),
                'ac_university'=>htmlspecialchars($this->input->post('ac_university',true)),
                'ac_nationality'=>htmlspecialchars($this->input->post('ac_nationality',true)),
                'ac_gender'=>htmlspecialchars($this->input->post('ac_gender',true)),
                'ac_dob'=>htmlspecialchars($this->input->post('ac_dob',true)),
                'ac_document'=>$ac_document['file_name'],
            ];
         // insert data into database
        $this->user_ac_model->insert($data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Check your email to get the approval from the admin</div>'); 
        redirect('user/login/Auth/login'); 
        }
    }

    public function company()
    {
        $this->form_validation->set_rules('c_name','Compnay Name', 'required|trim');
        $this->form_validation->set_rules('c_phonenumber','Phone Number', 'required|trim|min_length[5]',[
            'min_length'=> 'Phone number too short'
        ]);

        if($this->form_validation->run()== false)
        {
        $data['title']="Company";
        $this->load->view('external/templates/header',$data);
        $this->load->view('user/registration/company_view');
        }
        else
        {
            $c_logo= $this->upload_img('./assets/img/reg_c_logo', 'c_logo');
            $data=
                [
                //  'uni_logo'=>htmlspecialchars($this->input->post('uni_logo',true)),  
                    'c_logo'=>$c_logo['file_name'],
                    'c_name'=>htmlspecialchars($this->input->post('c_name',true)),
                    'c_registrationnum'=>htmlspecialchars($this->input->post('c_registrationnum',true)),
                    'c_address'=>htmlspecialchars($this->input->post('c_address',true)),
                    'c_phonenumber'=>htmlspecialchars($this->input->post('c_phonenumber',true)),
                    'c_website'=>htmlspecialchars($this->input->post('c_website',true)),
                    'c_email'=>htmlspecialchars($this->input->post('c_email',true)),
                    //'c_logo'=>htmlspecialchars($this->input->post('c_logo',true)),
                ];

                  // insert data into database
                $this->company_model->insert($data);

                $c_email= $this->input->post('c_email');
                $com=$this->company_model->valid_email($c_email);
                $company=
                [
                    'c_id'=>$com['c_id'],
                    'c_name'=>$com['c_name'],
                    'c_registrationnum'=>$com['c_registrationnum'],
                    'c_email'=>$com['c_email'],
                ];
    
                $this->session->set_userdata($company);
         
          redirect('user/login/Auth/employer_reg'); 
        }
          
    }

    public function employer_reg()
    { 
        $user_id= $this->session->userdata('user_id');
        $c_id=$this->session->userdata('c_id');
        // $user_id=$this->user_ep_model->last_user_id();
        // $c_id=$this->company_model->last_c_id();
        $this->form_validation->set_rules('e_phonenumber','Phone Number', 'required|trim|min_length[5]',[
            'min_length'=> 'Phone number too short'
        ]);
        $this->form_validation->set_rules('e_businessemail','Email', 'required|trim|valid_email|is_unique[user_ep.ep_businessemail]',[
            'is_unique'=>'This email has already registered!'
        ]);

        if($this->form_validation->run()== false)
        {
            $data['title']="Employer Registration";
            $this->load->view('external/templates/header',$data);
            $this->load->view('user/registration/employers_registration_view');
           // $this->load->view('external/templates/footer');
           
        }
        else
        {
            $e_document = $this->upload_doc('./assets/uploads/employer', 'e_document');

            $data=
            [
                'user_id'=>$user_id,
                'c_id'=>$c_id,
                'e_phonenumber'=>htmlspecialchars($this->input->post('e_phonenumber',true)),
                'e_businessemail'=>htmlspecialchars($this->input->post('e_businessemail',true)),
                'e_nationality'=>htmlspecialchars($this->input->post('e_nationality',true)),
                'e_gender'=>htmlspecialchars($this->input->post('e_gender',true)),
                'e_dob'=>htmlspecialchars($this->input->post('e_dob',true)),
                'e_jobtitle'=>htmlspecialchars($this->input->post('e_jobtitle',true)),
                'e_document'=>$e_document['file_name'], 
            ];
         // insert data into database
        $this->user_e_model->insert($data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        Check your email to get the approval from the admin</div>');
        redirect('user/login/Auth/login'); 
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_role');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        You have been logout</div>');
        redirect('user/login/Auth/login'); 
    }
}