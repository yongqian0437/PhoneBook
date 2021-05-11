<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homepage extends CI_Controller {


    public function index()
    {

    }
    public function profile_level_1()
    {
        $data['title']= 'My Profile';
        $data['users']=$this->user_model->search_email();

    //---------------------Need to wait Ariane for the templates--------------------//
    // $this->load->view('templates/header',$data);
    // $this->load->view('templates/sidebar',$data);
    // $this->load->view('templates/topbar',$data);
    $this->load->view('external/homepage_view',$data);
    // $this->load->view('templates/footer');
    
       
    }

    
}