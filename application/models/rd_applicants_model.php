<?php

class rd_applicants_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function insert($data)
    {
        $this->db->insert('rd_applicants', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function update($data, $id)
    {
        $this->db->where('rd_applicant_id', $id);
        if ($this->db->update('rd_applicants', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete($id)
    {
        $this->db->where('rd_applicant_id', $id);
        $this->db->delete('rd_applicants');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function select_all()
    {
        return $this->db->get('rd_applicants')->result();
    }

    function select_condition($condition)
    {
        $this->db->where($condition);
        return $this->db->get('rd_applicants')->result();
    }

    //Check if there is existing ep_collab_id and emp_id in the same row (existing record of student R&DP application)
    function past_application($user_id , $rd_id)
    {
        $this->db->where('user_id ', $user_id);
        $ep_data = $this->db->get('user_ep')->row();
        $condition = "ep_collab_id = '$ep_data->ep_id' AND rd_id = '$rd_id'";
        $this->db->from('rd_applicants')
            ->where($condition)
            ->limit(1);
        $result = $this->db->get()->result_array();
        // $condition = $this->db->get()->result_array();
        if ($result)
            return true;
        else
            return false;
    }
}
