<?php

class company_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function insert($data)
    {
        $this->db->insert('company', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function update($data, $id)
    {
        $this->db->where('c_id', $id);
        if ($this->db->update('company', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete($id)
    {
        $this->db->where('c_id', $id);
        $this->db->delete('company');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function select_all()
    {
        return $this->db->get('company')->result();
    }

    function select_condition($condition)
    {
        $this->db->where($condition);
        return $this->db->get('company')->result();
    }
}
