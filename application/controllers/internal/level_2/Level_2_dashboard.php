<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_2_dashboard extends CI_Controller {


    public function index()
    {

    }
    public function profile_level_2()
    {
        $data['title']= 'My Profile';
        $data['users']=$this->user_model->search_email();

    //---------------------Need to wait Ariane for the templates--------------------//
    // $this->load->view('templates/header',$data);
    // $this->load->view('templates/sidebar',$data);
    // $this->load->view('templates/topbar',$data)
  $this->load->view('internal/level_2/level_2_dashboard_view',$data);
    // $this->load->view('templates/footer');
    
       
    }

    
}
?>