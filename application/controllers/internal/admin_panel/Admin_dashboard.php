<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller 
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->helper('form');
        $this->load->model(['user_student_model','user_ep_model','user_ac_model','user_ea_model',
        'user_e_model']);
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
            $this->email->message("Congratulations ". $lname." .Your account is activated "."<br><p>This is your email address and password<p>"."Email Address :".$email."<br> Password: ".$password);
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

    public function show_approve_acc()
    { 
        $data['title']= 'Approved';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
       // $this->load->view('templates/topbar',$data);

        $condition=1;
        $data['users']=$this->user_model->approvedata($condition);
        $this->load->view('internal/admin_panel/users_accounts_view',$data);
        $this->load->view('internal/templates/footer'); 
    }

    public function show_pending_acc()
    {
        $data['title']= 'Approved';
        $data['users']=$this->user_model->search_email();
        $this->load->view('internal/templates/header',$data);
        $this->load->view('internal/templates/sidenav',$data);
       // $this->load->view('internal/templates/topbar',$data);
        $condition=0;
        $data['users']=$this->user_model->pendingdata($condition);
        $this->load->view('internal/admin_panel/users_accounts_view',$data);
        $this->load->view('internal/templates/footer'); 
    }
}



    
