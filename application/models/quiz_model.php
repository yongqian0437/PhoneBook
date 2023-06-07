<?php

class quiz_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function insert_quiz_s($data)
    {
        $this->db->insert('quiz_symptom', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function insert_quiz_t($data)
    {
        $this->db->insert('quiz_tips', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function insert_quiz_d($data)
    {
        $this->db->insert('quiz_dealing', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_qs_details($user_id)
    {
       $this->db->where('user_id',$user_id);
       return $this->db->get('quiz_symptom')->row();
    }
    
    public function get_qt_details($user_id)
    {
       $this->db->where('user_id',$user_id);
       return $this->db->get('quiz_tips')->row();
    } 

    public function get_qd_details($user_id)
    {
       $this->db->where('user_id',$user_id);
       return $this->db->get('quiz_dealing')->row();
    } 

    public function update_draft($data, $user_id, $database)
    {
        $this->db->where('user_id', $user_id);
        if ($this->db->update($database, $data)) {
            return true;
        } else {
            return false;
        }
    }

}
