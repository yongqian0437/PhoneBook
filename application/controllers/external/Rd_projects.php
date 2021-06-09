<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rd_projects extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['user_ep_model', 'rd_projects_model', 'rd_applicants_model', 'universities_model']);
        date_default_timezone_set('Asia/Kuala_Lumpur');
    }

    public function index()
    {
        $data['title'] = "iJEES | R&D Projects";
        $data['include_js'] = 'rd_projects_list';
        $data['include_css'] = 'projects';
        // Get RDs that are approved and their details
        $data['rds'] = $this->rd_projects_model->approved_rdps();

        // Check if session is established. Get User ID from session.
        $user_id = $this->session->userdata('user_id');
        $data['user_role'] = $this->session->userdata('user_role');
        if ($data['user_role'] == 'Education Partner') {
            // From the User ID, get Education Partner ID  
            $ep_details = $this->user_ep_model->ep_details($user_id);
            $data['ep_id'] = $ep_details['ep_id'];

            $this->load->view('internal/templates/header', $data);
            $this->load->view('internal/templates/sidenav');
            $this->load->view('internal/templates/topbar');
            $this->load->view('external/rd_projects_view');
            $this->load->view('internal/templates/footer');
        } else {
            $data['ep_id'] = '';
            // var_dump($eps);
            // die;
            $this->load->view('external/templates/header', $data);
            $this->load->view('external/rd_projects_view', $data);
            $this->load->view('external/templates/footer', $data);
        }
    }

    public function send_rdp_application()
    {
        $data =
            [
                'rd_id'            => $this->input->post('rd_id'),
                'ep_owner_id'        => $this->input->post('ep_owner_id'),
                'ep_collab_id'        => $this->input->post('ep_collab_id'),
            ];

        $this->rd_applicants_model->insert($data);
    }

    public function fetch_rd_information()
    {

        $rd_info = $this->rd_projects_model->get_rd_details($this->input->post('rd_id'));
        $output = '
        <table class="table table-striped" style = "border:0;">
            <tbody>
                <tr>
                    <th scope="row">R&D title</th>
                    <td>' . $rd_info->rd_title . '</td>
                </tr>
                <tr>
                    <th scope="row">R&D organisation</th>
                    <td>' . $rd_info->rd_organisation . '</td>
                </tr>
                <tr>
                    <th scope="row">R&D person in charge</th>
                    <td>' . $rd_info->rd_pic . '</td>
                </tr>
                <tr>
                    <th scope="row">R&D person in charge position</th>
                    <td>' . $rd_info->rd_pic_post . '</td>
                </tr>
                <tr>
                    <th scope="row">R&D person in charge department</th>
                    <td>' . $rd_info->rd_pic_dept . '</td>
                </tr>
                <tr>
                    <th scope="row">R&D person in charge email</th>
                    <td>' . $rd_info->rd_pic_email . '</td>
                </tr>
                <tr>
                    <th scope="row">R&D scope</th>
                    <td style = "white-space: pre-wrap; word-break: break-word; text-align: justify;">' . $rd_info->rd_scope . '</td>
                </tr>
                <tr>
                    <th scope="row">R&D objective</th>
                    <td style = "white-space: pre-wrap; word-break: break-word; text-align: justify;">' . $rd_info->rd_objective . '</td>
                </tr>
            </tbody>
        </table>  
        ';
        echo $output;
    }
}
