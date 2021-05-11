<?php

class user_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
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

    function update($data, $id)
    {
        $this->db->where('user_id', $id);
        if ($this->db->update('users', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('users');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function select_all()
    {
        return $this->db->get('users')->result();
    }

    function select_condition($condition)
    {
        $this->db->where($condition);
        return $this->db->get('users')->result();
    }

    // Wait for Yee Peng to finalise her codes //
    // *-----------------------------------* //

    // ---- WORK IN PROGRESS ---- //
    
    function employers_list() // join 'users' table + 'user_e' table to get info from both tables
    {
        $this->db->select('users.user_id, user_email, user_fname, user_lname, user_role, e_businessemail');
        $this->db->from('users');
        $this->db->join('user_e', 'user_e.user_id = users.user_id');
        $this->db->where('users.user_role', 'Employer');
        return $this->db->get()->result_array();
    }

    function students_list()
    {
        $this->db->select('user_id, user_email, user_fname, user_lname, user_role');
        $this->db->where('user_role', 'Student');
        return $this->db->get('users')->result_array();
    }

    function counsellors_list() // join users table + user_ac table to get info from both tables
    {
        $this->db->select('users.user_id, user_email, user_fname, user_lname, user_role, ac_businessemail');
        $this->db->from('users');
        $this->db->join('user_ac', 'user_ac.user_id = users.user_id');
        $this->db->where('user_role', 'Academic Counsellor');
        return $this->db->get()->result_array();
    }

    function get_user_data()
    {
        // $id = $this->session->userdata['user_id'];
        $this->db->select('user_id, user_email, user_fname, user_lname, user_role');
        $this->db->where('user_id', $this->session->userdata['user_id']);
        $this->db->limit(1);
        return $this->db->get('users')->row_array(); // row() || result () won't work.. why? array of objects. row_array returns a single result row. an object!! check with var_dump
    }

    function get_name($id)
    {
        $this->db->select('user_id,user_fname');

        $this->db->from('users');

        $this->db->where("user_id", $id);

        $this->db->limit(1);

        $query = $this->db->get();

        $res = $query->row_array();

        return $res['user_fname'];
    }
}
