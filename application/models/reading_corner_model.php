<?php

class reading_corner_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function insert_reading($data)
    {
        $this->db->insert('reading_progress', $data);
        if ($this->db->affected_rows() > 0) {
            $reading_id = $this->db->insert_id();

            // Update the symptoms and symptoms_last fields based on the reading_id
            $this->db->set('symptoms', $reading_id);
            $this->db->set('symptoms_last', $reading_id);
            $this->db->where('id', $reading_id);
            $this->db->update('reading_progress');

            return true;
        } else {
            return false;
        }
    }

    public function get_reading_symptoms_details($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('reading_progress')->row();
    }

    public function get_progress($user_id)
    {
        $this->db->select('symptoms');
        $this->db->where('user_id', $user_id);
        return $this->db->get('reading_progress')->row('symptoms');
    }

    public function get_progress_row($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('reading_progress')->row();
    }

    public function update_progress($user_id, $progress, $stat)
    {
        $this->db->set('symptoms', $progress);
        $this->db->set('status', $stat);
        $this->db->where('user_id', $user_id);
        $this->db->update('reading_progress');
    }

    public function get_symptoms_last($user_id)
    {
        $this->db->select('symptoms_last');
        $this->db->where('user_id', $user_id);
        return $this->db->get('reading_progress')->row('symptoms_last');
    }

    public function update_symptoms_last($user_id, $progress)
    {
        $this->db->set('symptoms_last', $progress);
        $this->db->where('user_id', $user_id);
        $this->db->update('reading_progress');
    }

    //tips model
    public function get_reading_tips_details($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('reading_progress')->row();
    }

    public function get_progress_tips($user_id)
    {
        $this->db->select('tips');
        $this->db->where('user_id', $user_id);
        return $this->db->get('reading_progress')->row('tips');
    }

    public function get_progress_row_tips($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('reading_progress')->row();
    }

    public function update_progress_tips($user_id, $progress, $stat)
    {
        $this->db->set('tips', $progress);
        $this->db->set('tips_status', $stat);
        $this->db->where('user_id', $user_id);
        $this->db->update('reading_progress');
    }

    public function get_tips_last($user_id)
    {
        $this->db->select('tips_last');
        $this->db->where('user_id', $user_id);
        return $this->db->get('reading_progress')->row('tips_last');
    }

    public function update_tips_last($user_id, $progress)
    {
        $this->db->set('tips_last', $progress);
        $this->db->where('user_id', $user_id);
        $this->db->update('reading_progress');
    }

    //dealing model
    public function get_reading_dealing_details($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('reading_progress')->row();
    }

    public function get_progress_dealing($user_id)
    {
        $this->db->select('dealing');
        $this->db->where('user_id', $user_id);
        return $this->db->get('reading_progress')->row('dealing');
    }

    public function get_progress_row_dealing($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->get('reading_progress')->row();
    }

    public function update_progress_dealing($user_id, $progress, $stat)
    {
        $this->db->set('dealing', $progress);
        $this->db->set('dealing_status', $stat);
        $this->db->where('user_id', $user_id);
        $this->db->update('reading_progress');
    }

    public function get_dealing_last($user_id)
    {
        $this->db->select('dealing_last');
        $this->db->where('user_id', $user_id);
        return $this->db->get('reading_progress')->row('dealing_last');
    }

    public function update_dealing_last($user_id, $progress)
    {
        $this->db->set('dealing_last', $progress);
        $this->db->where('user_id', $user_id);
        $this->db->update('reading_progress');
    }
}
