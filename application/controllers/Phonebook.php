<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phonebook extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('phonebook_model');
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');

        // If user is not logged in, redirect to login page
        if (!$this->session->has_userdata('has_login')) {
            redirect('user/login');
        }
    }

    // Display form for adding new record
    public function index() {
        $data['title'] = 'Add Phonebook Entry';
        $data['form_action'] = base_url('phonebook/add');
        $this->load->view('templates/header', $data);
        $this->load->view('phonebook_view', $data);
        $this->load->view('templates/footer');
    }

   

    public function add() {
        log_message('debug', 'Form submitted to add method');
        
        // Set form validation rules
        $this->form_validation->set_rules('phonebook_name', 'Name', 'required|trim');
        $this->form_validation->set_rules('phone_number', 'Phone', 'required|trim|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
    
        // Run form validation
        if ($this->form_validation->run() == FALSE) {
            log_message('debug', 'Form validation failed: ' . validation_errors());
            $this->index();
            return;
        }
    
        // Prepare data for insertion
        $entry_data = array(
            'phonebook_name' => $this->input->post('phonebook_name'),
            'phone_number' => $this->input->post('phone_number'),
            'email' => $this->input->post('email'),
            'user_id' => $this->session->userdata('user_id')
        );
    
        // Handle image upload
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = './assets/img/phonebook/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 24000000; // Maximum file size in KB
            $config['encrypt_name'] = TRUE; // Encrypt file name to avoid conflicts
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $entry_data['image'] = 'assets/img/phonebook/' . $uploadData['file_name'];
                log_message('debug', 'Image uploaded successfully: ' . $entry_data['image']);
            } else {
                $upload_error = $this->upload->display_errors();
                log_message('error', 'Image upload failed: ' . $upload_error);
                $this->session->set_flashdata('error', 'Image upload failed: ' . $upload_error);
            }
        }
    
        // Insert the phonebook entry
        log_message('debug', 'Data to be inserted: ' . print_r($entry_data, true));
        if ($this->phonebook_model->insert_entry($entry_data)) {
            log_message('debug', 'New record added successfully.');
            $this->session->set_flashdata('message', 'New record added successfully.');
        } else {
            log_message('error', 'Failed to add record.');
            $this->session->set_flashdata('error', 'Failed to add record.');
        }
        
        // Redirect to the phonebook page
        redirect('phonebook');
    }
    
    
}

