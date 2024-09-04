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
        $this->db->insert('users', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
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
