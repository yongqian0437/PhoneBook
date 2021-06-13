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

    function ac_university_country($university_name) {
        $this->db->select('uni_country')
                 ->from('universities')
                 ->join('user_ac', 'user_ac.ac_university = universities.uni_name')
                 ->where('user_ac.ac_university', $university_name)
                 ->limit(1);
        $query = $this->db->get();
        $res = $query->row_array();
        return $res['uni_country'];
    }
}
