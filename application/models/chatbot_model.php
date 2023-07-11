<?php

class chat_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function insert_chat($data)
    {
        $this->db->insert('chat_history', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    function insert_history($data)
    {
        $this->db->insert('conversation_history', $data);
        if ($this->db->affected_rows() > 0) {
            //======================= Need to change ========================
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    function select_conversation_history($user_id)
    {
        $this->db->select('*');
        $this->db->from('conversation_history');
        $this->db->where('con_id', $user_id);
        $query = $this->db->get()->result();
        return $query;
    }

    function select_chat_history($con_id)
    {
        $this->db->select('*');
        $this->db->from('chat_history');
        $this->db->where('con_id', $con_id);
        $query = $this->db->get()->result();
        return $query;
    }

    function get_latest_con_id($user_id)
    {

    }

    function check_if_user_has_conversation($user_id)
    {
        //======================= Need to change ========================
    }

    

}
