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
        $this->db->where('user_id', $user_id);
        return $this->db->get('quiz_symptom')->row();
    }

    public function get_qt_details($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('quiz_tips')->row();
    }

    public function get_qd_details($user_id)
    {
        $this->db->where('user_id', $user_id);
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

    public function update_max_streak($user_id, $streak, $database)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('max_streak' . '<=', $streak);

        // Set the update data
        $data = array(
            'max_streak' => $streak
        );

        // Perform the update
        $this->db->set($data);
        $this->db->update($database);
    }

    public function get_selected_quiz_details($user_id, $database)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get($database)->row();
    }

    public function first_attempt($user_id, $score, $database)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('first_attempt_score', 0);

        // Set the update data
        $data = array(
            'first_attempt_score' => $score
        );

        // Perform the update
        $this->db->set($data);
        $this->db->update($database);
    }
}
