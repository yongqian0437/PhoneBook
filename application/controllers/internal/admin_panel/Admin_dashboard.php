<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->helper('form');
        $this->load->model('users_model');
    }
    public function index()
    {
        $data['title']= 'All users';
        $data['users']=$this->db->get_where('users',['user_email'=>$this->session->userdata('user_email')])->row_array();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        // if($this->input->post('keyword')){
        //   //  $data['users']=$this->users_model->searchdata();
           
        // }
       
        // $this->load->model('users_model');
        // $result=$this->users_model->index();
        // $data=array('userlist'=>$result);
        $data['users']=$this->users_model->searchdata();
        $this->load->view('external/users',$data);
        $this->load->view('templates/footer');
    }
    
    public function update_acc_approval()//----------------change the function in the view------------------//
    {
        if(isset($_REQUEST['sapproval']))
        {
            $id=$_REQUEST['sid'];
            $this->load->model('users_model','users');
            $up_approval=$this->users_model->update_approve();
            
            $users=$this->db->get_where('users', ['user_id'=>$id])->row_array();//-----------put in the model--------//
            
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
            
            return redirect('external/users'); //------- change to admin_dashboard controller---------//
        }
    
    }

    public function delete_acc()//----------------change the function in the view------------------//
    {
        $id=$_REQUEST['sid'];
        $this->users_model->deletedata($id);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        User account is deleted</div>');
        redirect('external/users'); //------- change to admin_dashboard controller---------//
    }

    public function decline_acc()//----------------change the function in the view------------------//
    {
        $id=$_REQUEST['sid'];
        $this->users_model->declinedata($id);
        $this->_sendEmail();
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
        User account is declined</div>');
        redirect('external/users'); 
    }

        private function _sendEmail()
    {
        $lname=$_REQUEST['slname'];
        $id=$_REQUEST['sid'];
        $email=$_REQUEST['semail'];
        $password=$_REQUEST['spassword'];
        $users=$this->db->get_where('users', ['user_id'=>$id])->row_array();//-----------put in the model--------//
       
        $config=
        [
            'protocol'=>'smtp',
            'smtp_host'=>'ssl://smtp.googlemail.com',
            'smtp_user'=>'yeepengtheong@gmail.com',
            'smtp_pass'=>'01139962936',
            'smtp_port'=>465,
            'mailtype'=>'html',
            'charset'=>'utf-8',
            'newline'=>"\r\n"
        ];
       
        $this->email->initialize($config);
        $this->email->from('yeepengtheong@gmail.com','Capstone Project 2021');//------------change the email account later------//
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

    public function show_approve_acc()//----------------change the function in the view------------------//
    { 
        $data['title']= 'Approved';
        //-----------line 127 put in the model--------//
        $data['users']=$this->db->get_where('users',['user_email'=>$this->session->userdata('user_email')])->row_array();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);

        $data['users']=$this->users_model->approvedata();
        $this->load->view('external/users',$data);
        $this->load->view('templates/footer');
    }

    public function show_pending_acc()//----------------change the function in the view------------------//
    {
        $data['title']= 'Approved';
        //-----------line 127 put in the model--------//
        $data['users']=$this->db->get_where('users',['user_email'=>$this->session->userdata('user_email')])->row_array();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('templates/topbar',$data);
        
        $data['users']=$this->users_model->pendingdata();
        $this->load->view('external/users',$data);
        $this->load->view('templates/footer'); 
    }
   
}



    
