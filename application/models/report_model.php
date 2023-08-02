<?php

class report_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function score_less_than($user_score, $database)
    {
        $this->db->select('COUNT()');
        $this->db->where('score' . '<=', $user_score);
        $this->db->where('first_attempt_score' . '!=', 0);

        return $this->db->get($database)->row();
    }

    // ================================ Calculate first attempt score functions ========================================
    function total_user_count($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('first_attempt_score >', 0);
        $query = $this->db->get();

        return $query->num_rows();
    }

    function get_user_score_data($table)
    {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        return $this->db->get($table)->row();
    }

    function score_percentage($table)
    {
        //get THIS user score first
        $quiz_data = $this->get_user_score_data($table);
        $first_quiz_score = $quiz_data->first_attempt_score;

        //get total user
        $total_user = $this->total_user_count($table);
        

        //get total user who score less than this user
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('first_attempt_score >', 0);
        $this->db->where('first_attempt_score <', $first_quiz_score);
        $query = $this->db->get();
        $count = $query->num_rows();

        $percentage = ($count/$total_user)*100;
        return $percentage;
    }

    // ================================ Calculate streaks functions ========================================

    function total_user_count_for_streak($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('first_attempt_score >', 0);
        $query = $this->db->get();

        return $query->num_rows();
    }

    function get_user_streak_data($table)
    {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        return $this->db->get($table)->row();
    }

    function streak_percentage($table)
    {
        //get THIS user score first
        $quiz_data = $this->get_user_streak_data($table);
        $quiz_max_streak = $quiz_data->max_streak;

        //get total user
        $total_user = $this->total_user_count_for_streak($table);
        

        //get total user who score less than this user
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('max_streak >', 0);
        $this->db->where('max_streak <', $quiz_max_streak);
        $query = $this->db->get();
        $count = $query->num_rows();

        $percentage = ($count/$total_user)*100;
        return $percentage;
    }
}
