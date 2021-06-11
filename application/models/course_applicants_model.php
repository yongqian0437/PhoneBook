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

    function past_application($course_id, $user_email)
    {
        $condition = "`course_id`= '$course_id' AND `c_applicant_email`= '$user_email' ";
        $this->db->select('c_applicant_id')
                 ->from('course_applicants')
                 ->where($condition)
                 ->limit(1);
        $result = $this->db->get()->result_array();
        // $condition = $this->db->get()->result_array();
        if ($result)
            return true;
        else
            return false;
    }

        // Get students who applied for the Course(s)
        function get_applicants_from_course($ac_id, $ac_uni_id)
        {
            $this->db->select('')
                     ->from('course_applicants')
                     ->join('courses', 'courses.course_id = course_applicants.course_id')
                     ->join('users', 'users.user_id = course_applicants.c_applicant_method') //change to user id
                     ->join('universities', 'universities.uni_id = courses.uni_id')
                     ->where('universities.uni_id', $ac_uni_id);

            return $this->db->get()->result_array();
        }
    
        // Get the details of ONE applicant (student)
        function course_applicant_details($c_applicant_id)
        {
            $this->db->select('')
                     ->from('course_applicants')
                     ->join('courses', 'courses.course_id = course_applicants.course_id')
                     ->where('course_applicants.c_applicant_id', $c_applicant_id);
            return $this->db->get()->row_array();
        }


}
