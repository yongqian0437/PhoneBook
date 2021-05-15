<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homepage extends CI_Controller 
{
    public function profile_level_1()
    {
        $data['title']= 'My Profile';
        $data['users']=$this->user_model->search_email();
        $this->load->view('external/templates/header',$data);
        $this->load->view('external/templates/topnav',$data);
        $this->load->view('external/homepage_view',$data);
        $this->load->view('external/templates/footer');
    } 
}