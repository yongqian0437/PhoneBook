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
            $list = $this->user_model->counsellors_list(); // check in model
            $list2 = $this->user_model->employers_list(); // check in model
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
            $list = $this->user_model->students_list(); // check in model
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
        $this->load->view('internal/templates/sidenav'); // sidenav
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
            'message'           => $message,
            'attachment_name'   => $attachment_name,
            'file_extension'    => $file_ext,
            'mime_type'         => $mime_type,
            'message_date_time' => date('Y-m-d h:i:s A'), //23 Jan 2:05 pm 'H' 24 hours, 'h' 12
            'ip_address'        => $this->input->ip_address(),
        ];

        $query = $this->chat_model->send_message($data); // check in model

        $response = '';
        if ($query == true) {
            $response = ['status' => 1, 'message' => ''];
        } else {
            $response = ['status' => 0, 'message' => 'Sorry, there seems to be a technical error that occured. Please try again.'];
        }

        echo json_encode($response); // remove later
    }

    public function chat_attachment_upload() 
    {
        $file_data = '';
    
        // If user decides to send an attachment
        if (isset($_FILES['attachmentfile']['name']) && !empty($_FILES['attachmentfile']['name'])) 
        {
            $config['upload_path']          = './assets/uploads/chat_attachments'; // Store attachments in this folder
            $config['allowed_types']        = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';
            //$config['max_size']             = 500;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('attachmentfile')) 
            {
                echo json_encode([
                    'status' => 0,
                    'message' => '<span style="color:#900;">' . $this->upload->display_errors() . '<span>'
                ]);
                die; // remove later

            } 
            else 
            {
                $file_data = $this->upload->data();
                //$filePath = $file_data['file_name'];
                return $file_data;
            }
        }
    }

    public function get_chat_history()
    {
        $receiver_id = $this->input->get('receiver_id');
        $Logged_sender_id = $this->session->userdata['user_id'];
        
        $history = $this->chat_room_model->receiver_chat_history($receiver_id); // check in model
        //print_r($history);
        foreach ($history as $chat):
            $message_id = $chat['chat_id'];
            $sender_id = $chat['sender_id'];
            $userName = $this->user_model->get_name($chat['sender_id']); // check in model
            $userPic = base_url('uploads/user_profiles/profile_pic.png'); // Set default user picture
            $message = $chat['message'];
            $messagedatetime = date('d M h:i A', strtotime($chat['message_date_time']));
?>
        <?php
            $messageBody = '';
            if ($message == 'NULL') //fetch media objects like images,pdf,documents etc
            { 
                $classBtn = 'right';
                if ($Logged_sender_id == $sender_id) 
                {
                    $classBtn = 'left';
                }

                $attachment_name = $chat['attachment_name'];
                $file_ext = $chat['file_extension'];
                $mime_type = explode('/', $chat['mime_type']);

                $document_url = base_url('assets/uploads/chat_attachments/' . $attachment_name);

                if ($mime_type[0] == 'image') 
                {
                    $messageBody .= '<img src="' . $document_url . '" onClick="ViewAttachmentImage(' . "'" . $document_url . "'" . ',' . "'" . $attachment_name . "'" . ');" class="attachmentImgCls">';
                } 
                else 
                {
                    $messageBody = '';
                    // Appends text on the right to $messageBody
                    $messageBody .= '<div class="attachment">';
                    $messageBody .= '<h4>Attachments:</h4>';
                    $messageBody .= '<p class="filename">';
                    $messageBody .= $attachment_name;
                    $messageBody .= '</p>';

                    $messageBody .= '<div class="pull-' . $classBtn . '">';
                    $messageBody .= '<a download href="' . $document_url . '"><button type="button" id="' . $message_id . '" class="btn btn-primary btn-sm btn-flat btnFileOpen">Open</button></a>';
                    $messageBody .= '</div>';
                    $messageBody .= '</div>';
                }
            } 
            else 
            {
                $messageBody = $message;
            }
        ?>

        <?php 
            // If the current user is NOT the sender of the message
            if ($Logged_sender_id != $sender_id) 
            { 
        ?>
                <!-- Message is displayed to the left by default -indicating that it is from another user- -->
                <div class="direct-chat-msg">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?= $userName; ?></span>
                        <span class="direct-chat-timestamp pull-right"><?= $messagedatetime; ?></span>
                    </div>
                    <!-- /.direct-chat-info -->
                   <img class="direct-chat-img" src="<?= $userPic; ?>" alt="<?= $userName; ?>">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        <?= $messageBody; ?>
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
        <?php 
            } 
            // If the current user is the sender of the message
            else 
            { 
        ?>
                <!-- Message is displayed to the right -->
                <div class="direct-chat-msg right">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right"><?= $userName; ?></span>
                        <span class="direct-chat-timestamp pull-left"><?= $messagedatetime; ?></span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="<?= $userPic; ?>" alt="<?= $userName; ?>"> 
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        <?= $messageBody; ?>
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
        <?php 
            } 
        ?>

        <?php endforeach;
    }

    public function clear_chat()
    {
        $receiver_id = $this->input->get('receiver_id');

        // Get messages that were sent to the specific receiver
        $messagelist = $this->chat_room_model->receiver_message_list($receiver_id) ; // check in model

        foreach ($messagelist as $row) 
        {
            if ($row['message'] == 'NULL') 
            {
                $attachment_name = unlink('assets/uploads/chat_attachments/' . $row['attachment_name']);
            }
        }

        // Delete the messages sent
        $this->chat_room_model->clear_chat_by_id($receiver_id) ; // check in model
    }

}
