<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chatbot extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('chatbot_model');

        // If user is not login bring them back to login page
        if (!$this->session->has_userdata('has_login')) {
            redirect('user/auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dementia App | Chatbot';
        $data['include_js'] = 'chatbot';

        //First check if there is any conversation
        $has_conversation = $this->chatbot_model->check_if_user_has_conversation($this->session->userdata('user_id'));

        //if there is convseration         
        if($has_conversation) {
            //1. Get the last inserted con_id
            $data['latest_con_id'] = $this->chatbot_model->select_conversation_history($this->session->userdata('user_id'));

            //2. Get all existing conversation
            $data['conversation_history_data'] = $this->chatbot_model->select_conversation_history($this->session->userdata('user_id'));

            $data['new_chat'] = 0;
        }
        //if there is no convseration    
        else {
            $data['latest_con_id'] = 0;
        }


        $this->load->view('templates/header', $data);
        $this->load->view('chatbot_view.php');
        $this->load->view('templates/footer');
    }

    public function generate_response()
    {

        // Retrieve the data from the POST request
        $prompt = $this->input->post('prompt');
        //con_id can be 0 which means its new
        $con_id = $this->input->post('con_id');

        $conversation = array(
            array('role' => 'system', 'content' => 'You are an assistant that put a <br> tag whenever there is a line break.')
        );

        // Get chat history if exist
        if (!$this->input->post('new_chat')) {
            $chat_data = $this->chatbot_model->select_chat_history($con_id);

            foreach ($chat_data as $chat_data_row) {

                if ($chat_data_row->role == "ai") {
                    $conversation[] = array(
                        'role' => 'assistant',
                        'content' => $chat_data_row->message
                    );
                } else {
                    $conversation[] = array(
                        'role' => 'user',
                        'content' => $chat_data_row->message
                    );
                }
            }
        }

        //======================= Need to change ========================
        // $gpt_response = generate_text($conversation);
        $gpt_response = "GPT response test";

        // Create new table in conversation history and chat history if its new chat
        if (!$this->input->post('new_chat')) {

            $con_data =
                [
                    'user_id' => $this->session->userdata('user_id'),
                    'con_name' => "New chat",
                ];
            $con_id = $this->chatbot_model->insert_history($con_data);
        }

        //Create new chat regardless of whether its new chat or not
        //One for user prompt
        $chat_data =
            [
                'con_id' => $con_id,
                'message' => $prompt,
                'role' => 1,
            ];

        $this->chatbot_model->insert_chat($con_id);
        //one for gpt response
        $chat_data =
            [
                'con_id' => $con_id,
                'message' => $prompt,
                'role' => 2,
            ];

        $this->chatbot_model->insert_chat($con_id);


        // Send the response as JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($gpt_response));
    }

    public function load_conversation_history()
    {
        $con_id = $this->input->post('con_id');
        $chat_data = $this->chatbot_model->select_chat_history($con_id);

        // Send the response as JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($chat_data));
    }

    public function get_latest_con_id()
    {
        $user_id = $this->input->post('user_id');
    }
}
