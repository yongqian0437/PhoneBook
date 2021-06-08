<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_model', 'user_student_model', 'emp_applicants_model', 'user_model', 'user_student_model']);
    }

    public function index()
    {
        $data['title'] = 'iJEES | Profile';
        $user_id = $this->session->userdata('user_id');


        $user_data = $this->user_model->get_user_data();
        $data['user_data'] = $user_data;

        $student_data = $this->user_student_model->student_details($user_id, 'user_id');
        $data['student_data'] = $student_data;

        $student_emp_data = $this->emp_applicants_model->get_user_emp($user_id, 'user_id');
        $data['student_emp_data'] = $student_emp_data;

        $this->load->view('external/templates/header', $data);
        $this->load->view('user/profile_view');
        $this->load->view('external/templates/footer');
    }

    public function edit_profile()
    {
        $user_id = $this->session->userdata('user_id');
        $student_details = $this->user_student_model->student_details($user_id);
        echo $student_details['student_id'];
        echo $user_id;

        $user_email = $this->input->post('student_emailid');
        $student_data =
            [
                'student_phonenumber' => htmlspecialchars($this->input->post('student_contactNoid')),
                'student_nationality' => htmlspecialchars($this->input->post('student_countryid')),
                'student_currentlevel' => htmlspecialchars($this->input->post('student_levelid')),
                'student_interest' => htmlspecialchars($this->input->post('student_interestid')),
            ];

        $data['user_data'] = $this->user_model->edit_user($user_id, $user_email);
        $data['student_data'] = $this->user_student_model->update($student_data, $student_details['student_id']);

        $this->load->view('external/templates/header', $data);
        $this->load->view('user/profile_view');
        $this->load->view('external/templates/footer');

        /* $data = array();
        $data['user'] = $user_data;
        $this->form_validation->set_rules('user_email', 'Name', 'required');
        $this->form_validation->set_rules('student_phonenumber', 'Contact Number No', 'required');
        $this->form_validation->set_rules('student_nationality', 'Country', 'required');
        $this->form_validation->set_rules('student_currentlevel', 'Current Level', 'required');
        $this->form_validation->set_rules('num', 'Interest', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('edit', $data);
        } else {
            $formArray = array();
            $formArray['user_email'] = $this->input->post('user_email');
            $formArray['student_phonenumber'] = $this->input->post('student_phonenumber');
            $formArray['student_nationality'] = $this->input->post('student_nationality');
            $formArray['student_currentlevel'] = $this->input->post('student_currentlevel');
            $formArray['num'] = $this->input->post('num');
            $this->user_model->edit_user($user_id, $formArray);
            //$this->session->set_flashdata('success', 'Record updated successfully');
            redirect(base_url() . '/user/profile');
        } */
    }
}
