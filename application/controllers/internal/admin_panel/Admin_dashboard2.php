<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dashboard2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'user_student_model', 'user_ep_model', 'user_ac_model', 'user_ea_model', 'user_e_model',
            'course_applicants_model', 'user_model', 'universities_model', 'employer_projects_model',
            'rd_projects_model'
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

        //total user based on role
        $data['total_student'] = count($this->user_student_model->select_all());
        $data['total_e'] = count($this->user_e_model->approved_employers());
        $data['total_ea'] = count($this->user_ea_model->approved_ea());
        $data['total_ac'] = count($this->user_ac_model->approved_ac());
        $data['total_ep'] = count($this->user_ep_model->approved_ep());

        //6 latest uni list
        $data['latest_uni'] = $this->universities_model->uni_max_6();
        $data['total_uni'] = count($this->universities_model->select_all_approved_only());

        //enrollment method
        $data['total_by_ea'] = count($this->course_applicants_model->enrollment_method('Education Agent'));
        $data['total_by_student'] = count($this->course_applicants_model->enrollment_method('Student'));

        //active & pending uni
        $data['active_uni'] = count($this->universities_model->uni_by_approval(1));
        $data['pending_uni'] = count($this->universities_model->uni_by_approval(0));

        //active & pending emp
        $data['active_emp'] = count($this->employer_projects_model->emp_by_approval(1));
        $data['pending_emp'] = count($this->employer_projects_model->emp_by_approval(0));

        //active & pending rd
        $data['active_rd'] = count($this->rd_projects_model->rd_by_approval(1));
        $data['pending_rd'] = count($this->rd_projects_model->rd_by_approval(0));

        $this->load->view('internal/admin_panel/admin_dashboard_view', $data);
        $this->load->view('internal/templates/footer');
    }

    public function total_users()
    {
        $data['total_users'] = count($this->user_model->approvedata(1));
    }

    public function uni_applicants()
    {
        $data['total_applicants'] = $this->course_applicants_model->applicants_per_uni();
        echo count($this->course_applicants_model->applicants_per_uni());
    }
}
