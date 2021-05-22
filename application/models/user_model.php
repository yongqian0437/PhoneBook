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
        if ($this->db->affected_rows() > 0) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    function deletedata($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('users');
        if ($this->db->affected_rows() > 0) 
        {
            return true;
        } 
        else
        {
            return false;
        }
    }

    public function update_approve($id,$data)
    {
        $this->db->where('user_id',$id);
        return $this->db->update('users',$data);
    }

       public function  approvedata($condition)
    {
        $this->db->where('user_approval', $condition);
        return $this->db->get('users')->result_array();

    }

    public function  pendingdata($condition)
    {
        $this->db->where('user_approval', $condition);
        return $this->db->get('users')->result_array();
 
    }

     public function getuserid()
    {
        return $this->db->get('users')->result_array();
    }

    //----------------delete later (18/May/2021)----------//
//    public function get_role()
//     {
//         $row = $this->db->select("*")->limit(1)->order_by('user_id',"DESC")->get("users")->row();
//         return $row->user_role; //it will provide latest record.
//     }

   public function search_email()
    {
        return $this->db->get_where('users',['user_email'=>$this->session->userdata('user_email')])->row_array();
    }

   public function search_id($id)
    {
        return $this->db->get_where('users', ['user_id'=>$id])->row_array();
    }

    public function valid_email($user_email)
    {
        return $this->db->get_where('users', ['user_email'=>$user_email])->row_array();
    }

       public function reg_id()
    {
        return $this->db->get('users')->row;
      
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
