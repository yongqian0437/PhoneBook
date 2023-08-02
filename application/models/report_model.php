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

    function total_user_count($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('first_attempt_score >', 0);
        $query = $this->db->get();

        return $query->num_rows();
    }

    function count_percentage($user_score, $database)
    {
        $users_less_than_score = $this->score_less_than($user_score, $database);
        $count1 = $users_less_than_score->COUNT;

        $total_users = $this->total_user_count($database);
        $count2 = $total_users->COUNT;

        $percentage = ($count1 / $count2) * 100;
        return round($percentage, 2);
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
}
