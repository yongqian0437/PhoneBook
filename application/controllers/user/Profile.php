<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_model']);

        // If user is not login bring them back to login page
        if (!$this->session->has_userdata('has_login')) {
            redirect('user/Auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dementia | Profile';
        $user_id = $this->session->userdata('user_id');

        $data['user_data'] = $this->user_model->get_user_details($this->session->userdata('user_id'));;

        $data['include_js'] = 'profile';
        $this->load->view('templates/header', $data);
        $this->load->view('user/profile_view');
        $this->load->view('templates/footer');
    }

    //Function for ajax
    public function edit_profile()
    {
        $data =
                [
                    'user_fname' => $this->input->post('user_fname'),
                    'user_lname' => $this->input->post('user_lname'),
                    'user_email' => $this->input->post('user_email'),
                ];

        if($this->user_model->update($data, $this->session->userdata('user_id'))){
            $response = array('success' => true, 'message' => 'Data updated successfully');
            $this->session->set_userdata('edit_profile_success', 1);
        }
        else{
            $response = array('success' => false, 'message' => 'Data updated successfully');
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
