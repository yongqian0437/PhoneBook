<?php

class user_ep_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
       return $this->db->get('user_ep');
    }

    function insert($data)
    {
        $this->db->insert('user_ep', $data);
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
        $this->db->where('ep_id', $id);
        if ($this->db->update('user_ep', $data)) 
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
        $this->db->where('ep_id', $id);
        $this->db->delete('user_ep');
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
        return $this->db->get('user_ep')->result();
    }

    function select_condition($condition)
    {
        $this->db->where($condition);
        return $this->db->get('user_ep')->result();
    }

    public function last_user_id()
    {
     $row = $this->db->select("*")->limit(1)->order_by('user_id',"DESC")->get("users")->row();
     return $row->user_id; //it will provide latest or last record id.
    }

    public function ep_details($id)
    {
     return $this->db->get_where('user_ep',['user_id'=>$id])->row_array();
    }

    public function full_ep_details()
    {
        $this->db->select('')
        ->from('user_ep') // ep table
        ->join('users', 'users.user_id = user_ep.user_id');// users table
        return $this->db->get();
    }

    public function get_full_ep_detail()
    {
       $this->db->select('')
       ->from('users') // users table
       ->join('user_ep', 'user_ep.user_id = users.user_id') // ep table
       ->join('universities', 'universities.uni_id = user_ep.uni_id'); // uni table
       return $this->db->get()->row();// return object array
    }  

    public function get_ep_detail($user_id)
    {
        $this->db->where('user_id',$user_id);
        return $this->db->get('user_ep')->row();
    } 


    
}
