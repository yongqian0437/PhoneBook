<?php

class user_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        // select from  users table
        return $this->db->get('users');
    }

    function insert($data)
    {
        $data['invite_code'] = $this->generate_unique_code();
        $this->db->insert('users', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    function generate_unique_code()
    {
        $this->load->helper('string');

        do {
            $random_code = random_string('numeric', 8);
            $code_exists = $this->check_code($random_code);
        } while ($code_exists);

        return $random_code;
    }

    public function check_code($code)
    {
        $this->db->where('invite_code', $code);
        $query = $this->db->get('users');
        return $query->num_rows() > 0;
    }

    public function check_invite_code_exists($invite_code)
    {
        // Perform the database query to check if the value exists
        $this->db->from('users');
        $this->db->where('invite_code', $invite_code);
        $query = $this->db->get();

        // Return true if the value exists, false otherwise
        return ($query->num_rows() > 0);
    }

    public function increase_invite_number($submitted_invite_code)
    {

        $this->db->where('invite_code', $submitted_invite_code);
        $this->db->set('invited_times', 'invited_times+1', false);
        $this->db->update('users');
    }

    function deletedata($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('users');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function update($data, $id)
    {
        $this->db->where('user_id', $id);
        if ($this->db->update('users', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_all_user()
    {
        return $this->db->get('users')->result();
    }

    public function get_user_details($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('users')->row();
    }

    public function search_email()
    {
        return $this->db->get_where('users', ['user_email' => $this->session->userdata('user_email')])->row_array();
    }

    public function valid_email($user_email)
    {
        return $this->db->get_where('users', ['user_email' => $user_email])->row_array();
    }

    public function checkemail($user_email)
    {
        return $this->db->get_where('users', ['user_email' => $user_email])->row_array();
    }

    public function updatepassword($tokan, $user_email)
    {
        return $this->db->query("update users set user_password='" . $tokan . "'where user_email='" . $user_email . "'");
    }

    public function changepassword($data)
    {
        $this->db->query("update users set user_password='" . $data['user_password'] . "'where user_password='" . $_SESSION['tokan'] . "'");
    }

    public function changepassword_with_id($data)
    {
        $this->db->where('user_id', $data['user_id']);
        $this->db->set('user_password', $data['user_password']);
        $this->db->update('users');
    }
}
