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

    function get_course_with_id($id)  //new function
    {
        $this->db->where('course_id', $id);
        return $this->db->get('courses')->result();
    }
    
    function fetch_courses($uni_id, $course_level)  //new function
    {
        $this->db->where('uni_id', $uni_id);
        $this->db->where('course_level', $course_level);
        $query = $this->db->get('courses');

        if ($query->num_rows() > 0) 
        {
            $output = '<option value="" selected disabled>Please select a course</option>';
            foreach($query->result() as $row)
            {
            $output .= '<option value="'.$row->course_id.'">'.$row->course_name.'</option>';
            }
        }
        else{
            $output = '<option value="" selected disabled>No courses available</option>';
        }

        return $output;

    }

}
