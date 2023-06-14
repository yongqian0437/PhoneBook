<?php

class reading_corner_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function insert_reading_s($data)
    {
        $this->db->insert('reading_progress', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function insert_reading_t($data)
    {
        $this->db->insert('reading_progress', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function insert_reading_d($data)
    {
        $this->db->insert('reading_progress', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_rs_details($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('reading_progress')->row();
    }

    public function get_rt_details($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('reading_progress')->row();
    }

    public function get_rd_details($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('reading_progress')->row();
    }
}
