<?php

class course_applicants_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
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

    function get_student_courses($user_id)
    {
        $this->db->select('*')
            ->from('users')
            ->join('course_applicants', 'course_applicants.c_applicant_method = users.user_id')
            ->join('courses', 'courses.course_id = course_applicants.course_id')
            ->join('universities', 'universities.uni_id = courses.uni_id')
            ->where('users.user_id', $user_id);
        return $this->db->get()->result_array();
    }

    public function applicants_per_uni()
    {
        $this->db->select('count(course_applicants.c_applicant_id), universities.uni_name')
            ->from('course_applicants')
            ->join('courses', 'courses.course_id = course_applicants.course_id')
            ->join('universities', 'universities.uni_id = courses.uni_id')
            ->group_by('universities.uni_id')
            ->order_by('count(course_applicants.c_applicant_id)', 'DESC');
        return $this->db->get()->result_array();
    }

    function enrollment_method($method)
    {
        $this->db->select('')
            ->from('course_applicants')
            ->join('users', 'users.user_id = course_applicants.c_applicant_method') //change to user id
            ->where('users.user_role', $method);
        return $this->db->get()->result_array();
    }
}
