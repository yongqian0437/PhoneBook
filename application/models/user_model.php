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

  // --------------------Reference for datatable---------------------//
    // public function searchdata()
    // {
    //     $keyword=$this->input->post('keyword',true);
    //     $this->db->like('user_fname', $keyword);
    //     $this->db->or_like('user_lname', $keyword);
    //     $this->db->or_like('user_email', $keyword);
    //     $this->db->or_like('user_role', $keyword);
    //     return $this->db->get('users')->result_array();
    // }

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

   public function get_role()
    {
        $row = $this->db->select("*")->limit(1)->order_by('user_id',"DESC")->get("users")->row();
        return $row->user_role; //it will provide latest record.
    }

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

}
