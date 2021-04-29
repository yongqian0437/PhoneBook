<?php

class emp_applicant_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function insert($data, $table_name)
    {
        $this->db->insert($table_name, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function update($data, $id, $table_name)
    {
        $this->db->where('emp_applicant_id', $id);
        if ($this->db->update($table_name, $data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete($id, $table_name)
    {
        $this->db->where('emp_applicant_id', $id);
        $this->db->delete($table_name);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function select_all($table_name)
    {
        return $this->db->get($table_name)->result();
    }

    function select_condition($condition, $table_name)
    {
        $this->db->where($condition);
        return $this->db->get($table_name)->result();
    }
}
    