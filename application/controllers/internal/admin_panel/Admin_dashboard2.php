<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dashboard2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'user_student_model', 'user_ep_model', 'user_ac_model', 'user_ea_model', 'user_e_model',
            'company_model', 'universities_model'
        ]);

        // Checks if session is set and if user is signed in as Admin (authorised access). If not, deny his/her access.
        if (!$this->session->userdata('user_id') || $this->session->userdata('user_role') != "Admin") {
            redirect('user/login/Auth/login');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['include_js'] = 'admin_dashboard';

        $this->load->view('internal/templates/header', $data);
        $this->load->view('internal/templates/sidenav');
        $this->load->view('internal/templates/topbar');
        $this->load->view('internal/admin_panel/admin_dashboard_view');
        $this->load->view('internal/templates/footer');
    }
}
