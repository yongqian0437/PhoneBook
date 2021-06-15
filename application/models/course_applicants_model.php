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

    // public function search_id($search_id)
    // {
    //     return $this->db->get_where('course_applicants',['c_applicant_method'=>$search_id]);
    // }

    public function valid_ea($c_applicant_method)
    {
        return $this->db->get_where('course_applicants', ['c_applicant_method'=>$c_applicant_method])->row_array();
    }

    // public function search_id($user_id)
    // {
    //    $this->db->where('c_applicant_method',$user_id);
    //    return $this->db->get('course_applicants')->result();
    // }

    public function get_user_id($user_id)
    {
       $this->db->where('c_applicant_method',$user_id);
       return $this->db->get('course_applicants')->result();
    }

    public function get_cas_id($c_applicant_id)
    {
       $this->db->where('c_applicant_id',$c_applicant_id);
       return $this->db->get('course_applicants')->row();// return one result in object format
    }

    public function get_cas_with_id($c_applicant_id)
    {
       $this->db->where('c_applicant_id',$c_applicant_id);
       return $this->db->get('course_applicants')->row_array();
    }

    public function ca_details($ca_id)
    {
     return $this->db->get_where('course_applicants',['c_applicant_id'=>$ca_id])->row_array();// return one result in array format
    }

    // function full_course_app_details()
    // {
    //     $this->db->select('')
    //         ->from('course_applicants') // course applicants table
    //         ->join('courses', 'courses.course_id = course_applicants.course_id') // courses table
    //         ->join('users', 'users.user_id = course_applicants.c_applicant_method'); // users table
    //     return $this->db->get()->result_array();// return array of array format
    // }

    public function full_course_app_details()
    {
        $this->db->select('')
        ->from('course_applicants') // course applicants table
        ->join('courses', 'courses.course_id = course_applicants.course_id') // courses table
        ->join('users', 'users.user_id = course_applicants.c_applicant_method') // users table
        ->join('universities', 'universities.uni_id = courses.uni_id'); // uni table
        return $this->db->get()->result();// return array of object format 
    }

    public function get_total_students($user_id)
    {
       $this->db->where('c_applicant_method',$user_id);
       return $this->db->get('course_applicants')->result_array();
    }

    // public function get_full_ca_details()
    // {
    // //    $this->db->where('c_applicant_method',$user_id);
    // //    return $this->db->get('course_applicants')->result();
    //     $this->db->select('')
    //     ->from('course_applicants') // course applicants table
    //     ->join('courses', 'courses.course_id = course_applicants.course_id')// uni table
    //     ->join('universities', 'universities.uni_id = courses.uni_id'); // uni table
    //     return $this->db->get()->result();// return array of object format 
    // }

     function get_uni_name()
    {
        $this->db->select('')
            ->from('course_applicants') // course applicants table
            ->join('courses', 'courses.course_id = course_applicants.course_id') // courses table
            ->join('universities', 'universities.uni_id = courses.course_id'); // users table
        return $this->db->get()->result();// return array of array format
    }


    



}
