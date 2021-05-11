<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'chat_model');
        $this->load->helper('string');
        date_default_timezone_set('Asia/Kuala_Lumpur');
    }

    public function index()
    {
        $data['title'] = '';
        $data['sub_title'] = '';
        $data['chat_title'] = 'Select Contact to Chat With';
        $data['profile_pic'] = base_url('assets/img/chat_user/profile_pic.png');

        $list = [];

        // Show ACs and Employers as contacts if Student is accessing the chat
        if ($this->session->userdata['user_role'] == 'Student') 
        {
            $list = $this->user_model->counsellors_list2();
            $list2 = $this->user_model->employers_list2();
            $data['title'] = 'All Academic Counsellors and Employers';
            $data['sub_title'] = 'Academic Counsellors';
            $data['sub_title2'] = 'Employers';
            $userslist2 = [];
            $userslist = [];

            // Academic Counsellors List
            foreach ($list as $user) 
            {
                $userslist[] = 
                [
                    'user_id'    => $user['user_id'],
                    'user_email' => $user['user_email'],
                    'user_fname' => $user['user_fname'],
                    'user_lname' => $user['user_lname'],
                    'user_role'  => $user['user_role'],
                    'ac_businessemail' => $user['ac_businessemail']
                ];
            }

            // Employers List
            foreach ($list2 as $user2) 
            {
                $userslist2[] = 
                [
                    'user_id'    => $user2['user_id'],
                    'user_email' => $user2['user_email'],
                    'user_fname' => $user2['user_fname'],
                    'user_lname' => $user2['user_lname'],
                    'user_role'  => $user2['user_role'],
                    'e_businessemail'  => $user2['e_businessemail']
                ];
            }

            $data['userslist2'] = $userslist2;
        }

        // Show Students if AC or Employer is accessing the chat
        else if ($this->session->userdata['user_role'] == 'Employer' || $this->session->userdata['user_role'] == 'Academic Counsellor') 
        {
            $list = $this->user_model->students_list();
            $data['title'] = 'All Students';
            $data['sub_title'] = 'Students';

            // Students List
            $userslist = [];
            foreach ($list as $user) 
            {
                $userslist[] = 
                [
                    'user_id'    => $user['user_id'],
                    'user_email' => $user['user_email'],
                    'user_fname' => $user['user_fname'],
                    'user_lname' => $user['user_lname'],
                    'user_role'  => $user['user_role'],
                ];
            }
        }

        // var_dump($userslist);
        // die;

        $data['userslist'] = $userslist;
        $this->load->view(''); // header
        $this->load->view('user/chat/chat_view', $data);
        $this->load->view(''); // footer
    }

    public function send_text_message ()
    {
        $post = $this->input->post();
        $message = 'NULL';
        $attachment_name = '';
        $file_ext = '';
        $mime_type = '';

        // If sender sends an attachment
        if (isset($post['type']) == 'Attachment') 
        {
            $attachment_data = $this->chat_attachment_upload();
            $attachment_name = $attachment_data['file_name'];
            $file_ext = $attachment_data['file_ext'];
            $mime_type = $attachment_data['file_type'];
        } 
        else 
        {
            $message = reduce_multiples($post['message'], ' ');
        } 

        $data = 
        [
            'sender_id'         => $this->session->userdata['user_id'],
            'receiver_id'       => $post['receiver_id'],
            'message'           =>   $message,
            'attachment_name'   => $attachment_name,
            'file_extension'    => $file_ext,
            'mime_type'         => $mime_type,
            'message_date_time' => date('Y-m-d h:i:s A'), //23 Jan 2:05 pm 'H' 24 hours, 'h' 12
            'ip_address'        => $this->input->ip_address(),
        ];

        $query = $this->chat_model->SendTxtMessage($data);

        $response = '';
        if ($query == true) {
            $response = ['status' => 1, 'message' => ''];
        } else {
            $response = ['status' => 0, 'message' => 'Sorry, there seems to be a technical error that occured. Please try again.'];
        }

        echo json_encode($response);

    }

    public function chat_attachment_upload() 
    {

    }
}
