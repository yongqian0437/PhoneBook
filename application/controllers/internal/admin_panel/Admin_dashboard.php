<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller 
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->helper('form');
        $this->load->model(['user_student_model','user_ep_model','user_ac_model','user_ea_model',
        'user_e_model','user_model']);

        // Checks if session is set and if user is signed in as Admin (authorised access). If not, deny his/her access.
        if (!$this->session->userdata('user_id') || $this->session->userdata('user_role') != "Admin"){  
            redirect('user/login/Auth/login');
        }
    }

    public function index()
    {
        $data['title']= 'All users';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $this->load->view('internal/templates/footer');
    }

    public function users_accounts_nav()
    {
        $data['title']= 'All users';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $result=$this->user_model->index();
        $data=array('userslist'=>$result);
        $this->load->view('internal/admin_panel/users_accounts_view',$data);
        $this->load->view('internal/templates/footer');  
    }
    
    public function update_acc_approval()
    {
        if(isset($_REQUEST['sapproval']))
        {
            $id=$_REQUEST['sid'];
            $sapproval=$_REQUEST['sapproval'];
            $this->load->model('user_model','users');
    
            if($sapproval==1)
            {
                $user_approval=0;
            }
            else 
            {
                $user_approval=1;
            }
            $data=
            array(
                'user_approval'=>$user_approval
            );
            $up_approval=$this->user_model->update_approve($id,$data);
            
            $users=$this->user_model->search_id($id);
              if($users['user_approval']==1)
            { 
                $this->_sendEmail();
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                User account is approved</div>');
            }
            else
            {
               $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
               User account is not approved</div>');
            }
            redirect('internal/admin_panel/Admin_dashboard/users_accounts_nav');
        }
    }

    public function delete_acc()
    {
        $id=$_REQUEST['sid'];
        $this->user_model->deletedata($id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        User account is deleted</div>');
        redirect('internal/admin_panel/Admin_dashboard/users_accounts_nav');
    }

    public function decline_acc()
    {
        $id=$_REQUEST['sid'];
        $this->user_model->deletedata($id);
        $this->_sendEmail();
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        User account is declined</div>');
        redirect('internal/admin_panel/Admin_dashboard/users_accounts_nav');
    }

        private function _sendEmail()
    {
        $lname=$_REQUEST['slname'];
        $fname=$_REQUEST['sfname'];
        $id=$_REQUEST['sid'];
        $email=$_REQUEST['semail'];
        $password=$_REQUEST['spassword'];
        $users=$this->user_model->search_id($id);
        $config=
        [
            'protocol'=>'smtp',
            'smtp_host'=>'ssl://smtp.googlemail.com',
            'smtp_user'=>'g3cap2100@gmail.com',
            'smtp_pass'=>'ijees2021',
            'smtp_port'=>465,
            'mailtype'=>'html',
            'charset'=>'utf-8',
            'newline'=>"\r\n"
        ];
       
        $this->email->initialize($config);
        $this->email->from('g3cap2100@gmail.com','Capstone Project 2021');
        $this->email->to($email);
        $this->email->subject('Account Verification');

        if($users['user_approval']==1)
        {
            $this->email->message("Welcome, "."$fname ". "$lname ". ". Thank you for registering and being part of iJEES, INTI's Interactive Joint Education Employability System."."<br><br>Congratulations! Your account has been approved and is now activated. <br><br>You may now login to the system at any time. Your credentials are the same as the ones you have provided upon registration:<br><br>".
            "Email Address :".$email."<br> Password: ".$password);
            // $this->email->message("Welcome ".$fname . $lname." .Thank you for registering and being part of iJEES, INTI's Interactive Joint Education Employability System.  "."<br><p>This is your email address and password<p>"."Email Address :".$email."<br> Password: ".$password);
        }
        else
        {
            $this->email->message("Sorry ". $lname." .Your account is rejected ");
        }

        if($this->email->send())
        {
            return true;
        }
        else
        {
            echo $this->email->print_debugger();   
        }
    }

    // public function show_approve_acc()
    // { 
    //     $data['title']= 'Approved';
    //     $data['users']=$this->user_model->search_email();
    //     $this->load->view('internal/templates/header',$data);
    //     $this->load->view('internal/templates/sidenav',$data);
    //      $this->load->view('internal/templates/topbar',$data);

    //     $condition=1;
    //     $data['users']=$this->user_model->approvedata($condition);
    //     $this->load->view('internal/admin_panel/users_accounts_view',$data);
    //     $this->load->view('internal/templates/footer'); 
    // }

    public function show_activated_acc()
    { 
        $data['title']= 'Users Activated';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $condition=1;
        $result=$this->user_model->activated_acc($condition);
        $data=array('userslist'=>$result);
        $this->load->view('internal/admin_panel/activated_acc_view',$data);
        $this->load->view('internal/templates/footer'); 
      
    
    }

    public function show_inactivate_acc()
    {
        $data['title']= 'Users Inactivated';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        $condition=0;
        $result=$this->user_model->inactivate_acc($condition);
        $data=array('userslist'=>$result);
        $this->load->view('internal/admin_panel/inactivate_acc_view',$data);
        $this->load->view('internal/templates/footer'); 
    }

    public function inactivate_all_acc()
    {
        $data['title']= 'Updated Successfully';
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        if(isset($_POST['inactivate_all_acc']))
        {
            if(!empty($this->input->post('checkbox_value')))
            {
                $checknum=$this->input->post('checkbox_value');
                $checked_id=[];
                $condition=array(0);

                foreach($checknum as $row)
                {
                   array_push($checked_id,$row);
                   $this->load->model('user_model');
                   $up_approval=$this->user_model->inactivate_user($row);
                  
                }
                
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert" id="alert_message">
                The accounts are updated</div>');
                redirect('internal/admin_panel/Admin_dashboard/show_activated_acc');
            }
            else 
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert" id="alert_message">
                Please select any number</div>');
                redirect('internal/admin_panel/Admin_dashboard/show_activated_acc');
            }
        }
        $this->load->view('internal/templates/footer'); 
    }

    public function activate_all_acc()
    {
        $data['title']= 'Updated Successfully';
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
        $this->load->view('internal/templates/topbar',$data);
        if(isset($_POST['activate_all_acc']))
        {
            if(!empty($this->input->post('checkbox_value')))
            {
                $checknum=$this->input->post('checkbox_value');
                $checked_id=[];
                $condition=array(0);

                foreach($checknum as $row)
                {
                   array_push($checked_id,$row);
                   $this->load->model('user_model');
                   $up_approval=$this->user_model->activate_user($row);
                  
                }
                
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert" id="alert_message">
                The accounts are updated</div>');
                redirect('internal/admin_panel/Admin_dashboard/show_inactivate_acc');
            }
            else 
            {
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert" id="alert_message">
                Please select any number</div>');
                redirect('internal/admin_panel/Admin_dashboard/show_inactivate_acc');
            }
        }
        
        $this->load->view('internal/templates/footer'); 
    }

}



    
