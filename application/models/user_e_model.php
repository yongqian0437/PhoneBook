<?php

class user_e_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        // select from  users table
        return $this->db->get('user_e');
    }

    function insert($data)
    {
        $this->db->insert('user_e', $data);
        if ($this->db->affected_rows() > 0) 
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    function update($data, $id)
    {
        $this->db->where('e_id', $id);
        if ($this->db->update('user_e', $data)) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    function delete($id)
    {
        $this->db->where('e_id', $id);
        $this->db->delete('user_e');
        if ($this->db->affected_rows() > 0) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    function select_all()
    {
        return $this->db->get('user_e')->result();
    }

    function select_condition($condition)
    {
        $this->db->where($condition);
        return $this->db->get('user_e')->result();
    }

    public function e_details($id)
    {
     return $this->db->get_where('user_e',['user_id'=>$id])->row_array();
    }

//     public function getcompanyid($c_id)
//     {
//      return $this->db->get_where('user_e',['c_id'=>$c_id])->row_array();
//     }
}
