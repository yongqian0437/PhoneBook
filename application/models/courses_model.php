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

    public function valid_course_name($course_name)
    {
        return $this->db->get_where('courses', ['course_name'=>$course_name])->row_array();
    }

    // public function last_course_id()
    // {
    //  $row = $this->db->select("*")->limit(1)->order_by('course_id',"DESC")->get("courses")->row();
    //  return $row->course_id; //it will provide latest or last record id.
    // }
}
