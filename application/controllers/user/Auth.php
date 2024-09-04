<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->helper('form');
        $this->load->model(['user_model']);
        $this->load->model('phonebook_model');
    }

    public function login()
    {
        //Dont allow user to access login page
        if ($this->session->userdata('has_login')) {

            redirect('phonebook');
        }

        $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required');


        if ($this->form_validation->run() == false) {
            $data['include_css'] = 'forms';
            $data['title'] = 'PhoneBook | Login';
            $this->load->view('templates/header', $data);
            $this->load->view('user/login/login_view');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $user_email = $this->input->post('user_email');
        $user_password = $this->input->post('user_password');
        $users = $this->user_model->valid_email($user_email);

        // if user exists
        if ($users && password_verify($user_password, $users['user_password'])) {

            $data =
                [
                    'user_fname' => $users['user_fname'],
                    'user_lname' => $users['user_lname'],
                    'user_email' => $users['user_email'],
                    'user_id' => $users['user_id'],
                    'has_login' => 1,
                ];

            $this->session->set_userdata($data);

            redirect('phonebook');
        }

        // if user account does not exist
        else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="alert_message">
            Incorrect Credentials!</div>');
            redirect('user/auth/login');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('user_fname', 'First Name', 'required|trim');
        $this->form_validation->set_rules('user_lname', 'Last Name', 'required|trim');
        $this->form_validation->set_rules('user_email', 'Email', 'required|trim|valid_email|is_unique[users.user_email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('user_password', 'Password', 'required|trim|min_length[3]|matches[user_password2]', [
            'matches' => 'Passwords do not match!',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('user_password2', 'Password', 'required|trim|matches[user_password]');
    
        if ($this->form_validation->run() == false) {
            $data['title'] = "Phone Book | Registration";
            $data['include_css'] = 'forms';
            $this->load->view('templates/header', $data);
            $this->load->view('user/registration/registration_view');
            $this->load->view('templates/footer');
        } else {
            // Sanitize and prepare user data for insertion
            $data = [
                'user_fname' => htmlspecialchars($this->input->post('user_fname', true)),
                'user_lname' => htmlspecialchars($this->input->post('user_lname', true)),
                'user_email' => htmlspecialchars($this->input->post('user_email', true)),
                'user_password' => password_hash($this->input->post('user_password'), PASSWORD_DEFAULT),
            ];
    
            // Insert user data into database and get the new user ID
            $user_id = $this->user_model->insert($data);

            //Created new column for new user
            // $new_data['user_id'] = $user_id;
            // $this->phonebook_model->insert_info($new_data);
    
            // Set success message and redirect to login page
            $this->session->set_flashdata('register_success', true);
            redirect('user/auth/login');
        }
    }

    


    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_fname');
        $this->session->unset_userdata('user_lname');
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('has_login');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="alert_message">
        You have been log out!</div>');
        redirect('user/auth/login');
    }

    public function forgotPassword()
    {
        $data['title'] = 'PhoneBook | Forgot Password';
        $data['include_css'] = 'forms';
        $this->load->view('templates/header', $data);
        $this->load->view('user/login/forgot_password_view');
        $this->load->view('templates/footer');
    }

    public function resetlink()
    {
        $user_email = $this->input->post('user_email');
        $result = $this->db->query("select* from users where user_email='" . $user_email . "'")->result_array();

        if (count($result) > 0) {
            $tokan = rand(1000, 9999);
            $this->user_model->updatepassword($tokan, $user_email);
            $message = "Please click on password reset link <br> <a href='" . base_url('user/auth/reset?tokan=') . $tokan . "'>Reset Password</a><br><br><b>iJEES<br>G3 CAP2100"
                . "<br>INTI. YOUR FUTURE BUILT TODAY.</b>";
            $this->Email($user_email, 'Reset Password Link', $message);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="alert_message">
            Email is not registred</div>');
            redirect('user/auth/forgotPassword');
        }
    }

    public function reset()
    {
        $data['tokan'] = $this->input->get('tokan');
        $data['title'] = 'Phone Book | Reset Password';
        $_SESSION['tokan'] = $data['tokan'];
        $this->load->view('templates/header', $data);
        $this->load->view('user/login/reset_password_view');
        $this->load->view('templates/footer');
    }

    public function updatepassword()
    {
        $_SESSION['tokan'];
        $data = $this->input->post();
        if ($data['user_password'] == $data['user_password2']) {
            $data['user_password'] = password_hash($data['user_password'], PASSWORD_DEFAULT);
            $this->user_model->changepassword($data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" id="alert_message">
        Your password has changed successfully</div>');
        redirect('user/auth/login');
    }
}