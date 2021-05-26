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

    public function checkemail($user_email)
    {
        return $this->db->get_where('users', ['user_email'=>$user_email,'user_approval'=>1])->row_array();
    }

    public function updatepassword ($tokan,$user_email)
    {
       return $this->db->query("update users set user_password='".$tokan."'where user_email='".$user_email."'");
    }

    public function changepassword($data)
    {
        $this->db->query("update users set user_password='".$data['user_password']."'where user_password='".$_SESSION['tokan']."'");
    }
}
