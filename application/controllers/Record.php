<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Record extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Phonebook_model');
        $this->load->model('user_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        // Pagination configuration

        $user_id = $this->session->userdata('user_id');
        $config['base_url'] = site_url('record/index');
        $config['total_rows'] = $this->Phonebook_model->get_total_entries(); // Call without condition if no filtering is needed
        $config['per_page'] = 10; // Number of records per page
        $config['uri_segment'] = 3; // The segment that contains the page number

        $this->pagination->initialize($config);

        $page = $this->uri->segment(3);
        $data['entries'] = $this->Phonebook_model->get_records($config['per_page'], $page, $user_id);
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Phonebook Records';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/footer');
        $this->load->view('record_view');
    }

    public function edit($id)
    {
        // Get the record by ID
        $data['entry'] = $this->Phonebook_model->get_record_by_id($id);

        // Return the record data as JSON
        echo json_encode($data['entry']);
    }

    // public function update()
    // {
    //     // Get data from POST
    //     $id = $this->input->post('id');
    //     $name = $this->input->post('name');
    //     $phone = $this->input->post('phone');
    //     $email = $this->input->post('email');
        
    //     // Prepare data for update
    //     $data = array(
    //         'phonebook_name' => $name,
    //         'phone_number' => $phone,
    //         'email' => $email  
    //     );

    //     // Check if a new image is uploaded
    //     if (!empty($_FILES['image']['name'])) {
    //         $config['upload_path'] = './assets/img/phonebook/';
    //         $config['allowed_types'] = 'jpg|jpeg|png|gif';
    //         $config['file_name'] = $_FILES['image']['name'];
    //         $config['overwrite'] = TRUE; // Overwrite file if exists

    //         $this->upload->initialize($config);

    //         if ($this->upload->do_upload('image')) {
    //             $uploadData = $this->upload->data();
    //             $data['image'] = $uploadData['file_name'];
    //         } else {
    //             // Return upload error
    //             echo json_encode(array('success' => false, 'error' => $this->upload->display_errors()));
    //             return;
    //         }
    //     }
    //     // Update the record
    //     $result = $this->Phonebook_model->update_record($id, $data);

    //     // Return response
    //     echo json_encode(array('success' => $result));
    // }

    public function update()
{
    // Get data from POST
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $phone = $this->input->post('phone');
    $email = $this->input->post('email');
    
    // Prepare data for update
    $data = array(
        'phonebook_name' => $name,
        'phone_number' => $phone,
        'email' => $email  
    );

    // Check if a new image is uploaded
    if (!empty($_FILES['image']['name'])) {
        $config['upload_path'] = './assets/img/phonebook/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = time() . '_' . $_FILES['image']['name']; // Add a unique timestamp to the file name
        $config['overwrite'] = TRUE; // Overwrite file if exists

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $uploadData = $this->upload->data();
            $data['image'] = 'assets/img/phonebook/' . $uploadData['file_name'];
        } else {
            // Return upload error
            echo json_encode(array('success' => false, 'error' => $this->upload->display_errors()));
            return;
        }
    }

    // Update record in the database
    $update = $this->Phonebook_model->update_record($id, $data);

    if ($update) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false));
    }
}


    public function delete($id)
    {
        // Delete the record
        $result = $this->Phonebook_model->delete_record($id);

        // Return response
        echo json_encode(array('success' => $result));
    }
}
