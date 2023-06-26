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

    function total_user_count($database)
    {
        $this->db->select('COUNT(*)');
        $this->db->where('first_attempt_score' . '!=', 0);

        return $this->db->get($database)->row();
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
}

// get_selected_quiz_details($user_score, 'quiz_symptom')

// function show_result()
// {
//     $this->db->select('COUNT(items.item_id), item_category_name')
//         ->from('items')
//         ->join('items_subcategory', 'items_subcategory.item_subcategory_id = items.item_subcategory_id')
//         ->join('items_category', 'items_category.item_category_id = items_subcategory.item_category_id')
//         ->group_by('items_category.item_category_id')
//         ->order_by('COUNT(items.item_id)', 'DESC');
//     return $this->db->get()->result_array();
// }
