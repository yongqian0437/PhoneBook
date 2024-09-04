<?php
class Phonebook_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    // This method now expects a parameter to define the condition
    public function get_total_entries($condition = null)
    {
        if ($condition) {
           
            $this->db->where($condition);
        }
        return $this->db->count_all_results('phonebook'); // Adjust 'phonebook' to your table name
    }


     // Insert a new phonebook entry
     public function insert_entry($data)
     {
         $this->db->insert('phonebook', $data);
         if ($this->db->affected_rows() > 0) {
             return true;
         } else {
             log_message('error', 'Failed to insert data: ' . print_r($this->db->error(), true));
             return false;
         }
     }

     // Get a single phonebook entry
    public function get_entry($book_id)
    {
        $this->db->where('book_id', $book_id);  // Changed 'id' to 'book_id'
        $query = $this->db->get('phonebook');
        return $query->row();
    }
 
    public function get_records($limit, $start, $user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('phonebook'); // Adjust 'phonebook' to your table name
        return $query->result();
    }

    public function get_record_by_id($id)
    {
        $query = $this->db->get_where('phonebook', array('book_id' => $id)); // Adjust 'phonebook' and 'book_id'
        return $query->row();
    }

    public function update_record($id, $data)
    {
        $this->db->where('book_id', $id); // Adjust 'book_id'
        return $this->db->update('phonebook', $data);
    }

    public function delete_record($id)
    {
        $this->db->where('book_id', $id); // Adjust 'book_id'
        return $this->db->delete('phonebook');
    }
}
