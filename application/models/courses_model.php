<?php

class courses_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function insert($data)
    {
        $this->db->insert('courses', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function update($data, $id)
    {
        $this->db->where('course_id', $id);
        if ($this->db->update('courses', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete($id)
    {
        $this->db->where('course_id', $id);
        $this->db->delete('courses');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function select_all()
    {
        return $this->db->get('courses')->result();
    }

    function select_condition($condition)
    {
        $this->db->where($condition);
        return $this->db->get('courses')->result();
    }

    function filter_course($course_area, $course_level, $course_intake)
    {

        if ($course_area != "") {
            $this->db->where('course_area', $course_area);
        }
        if ($course_level != "") {
            $this->db->where('course_level', $course_level);
        }
        /* if ($course_area != "") {
            $this->db->where('coruses', $course_fee);
        } */
        if ($course_intake != "") {
            $this->db->where('course_intake', $course_intake);
        }
        $query = $this->db->get('courses')->result();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }
}
