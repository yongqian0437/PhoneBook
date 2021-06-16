<?php

class rd_projects_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function insert($data)
    {
        $this->db->insert('rd_projects', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function update($data, $id)
    {
        $this->db->where('rd_id ', $id);
        if ($this->db->update('rd_projects', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete($id)
    {
        $this->db->where('rd_id ', $id);
        $this->db->delete('rd_projects');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function select_all()
    {
        return $this->db->get('rd_projects')->result();
    }

    function select_condition($condition)
    {
        $this->db->where($condition);
        return $this->db->get('rd_projects')->result();
    }

    function rd_by_approval($condition)
    {
        $this->db->where('uni_approval', $condition);
        return $this->db->get('universities')->result();
    }
}
