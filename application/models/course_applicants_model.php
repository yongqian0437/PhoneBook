<?php

class course_applicants_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        return $this->db->get('course_applicants');
    }

    function insert($data)
    {
        $this->db->insert('course_applicants', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function update($data, $id)
    {
        $this->db->where('c_applicant_id', $id);
        if ($this->db->update('course_applicants', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete($id)
    {
        $this->db->where('c_applicant_id', $id);
        $this->db->delete('course_applicants');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function select_all()
    {
        return $this->db->get('course_applicants')->result();
    }

    function select_condition($condition)
    {
        $this->db->where($condition);
        return $this->db->get('course_applicants')->result();
    }

    function find_data_with_id($id) 
    {
        $this->db->where('user_id', $id);
        return $this->db->get('user_student')->row();
    }

    public function search_id($search_id)
    {
        return $this->db->get_where('course_applicants',['c_applicant_method'=>$search_id]);
    }

    public function valid_ea($c_applicant_method)
    {
        return $this->db->get_where('course_applicants', ['c_applicant_method'=>$c_applicant_method])->row_array();
    }



}
