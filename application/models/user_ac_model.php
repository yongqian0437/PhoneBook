<?php

class user_ac_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
       return $this->db->get('user_ac');
    }

    function insert($data)
    {
        $this->db->insert('user_ac', $data);
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
        $this->db->where('ac_id', $id);
        if ($this->db->update('user_ac', $data)) 
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
        $this->db->where('ac_id', $id);
        $this->db->delete('user_ac');
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
        return $this->db->get('user_ac')->result();
    }

    function select_condition($condition)
    {
        $this->db->where($condition);
        return $this->db->get('user_ac')->result();
    }

    public function ac_details($id)
    {
     return $this->db->get_where('user_ac',['user_id'=>$id])->row_array();
    }
}
