<?php

class user_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function insert($data)
    {
        $this->db->insert('users', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function update($data, $id)
    {
        $this->db->where('user_id', $id);
        if ($this->db->update('users', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('users');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function select_all()
    {
        return $this->db->get('users')->result();
    }

    function select_condition($condition)
    {
        $this->db->where($condition);
        return $this->db->get('users')->result();
    }

    public function update_approve()
   {
       //-------------------move to controller---------------//
       //------------------same as line 22------------------//
    //    $id=$_REQUEST['sid'];
    //    $sapproval=$_REQUEST['sapproval'];
    //    if($sapproval==1)
    //    {
    //     $user_approval=0;
    //    }
    //    else 
    //    {
    //     $user_approval=1;
    //    }
    //    $data=
    //    array(
    //     'user_approval'=>$user_approval
    //    );
        $this->db->where('user_id',$id);
      
        return $this->db->update('users',$data);
   }

  // --------------------Reference for datatable---------------------//
   public function searchdata()
   {
       $keyword=$this->input->post('keyword',true);
       $this->db->like('user_fname', $keyword);
       $this->db->or_like('user_lname', $keyword);
       $this->db->or_like('user_email', $keyword);
       $this->db->or_like('user_role', $keyword);
       return $this->db->get('users')->result_array();
    }

    //-------------------same as line 32 --------------//
    //    public function deletedata($id)
    //    {
    //       // $this->db->where('id', $id);
    //        $this->db->delete('users',['user_id'=>$id]);
    //    }
   
    //-------------------same as line 32 --------------//
    //    public function declinedata($id)
    //    {
    //       // $this->db->where('id', $id);
    //        $this->db->delete('users',['user_id'=>$id]);
    //    }

     //-------------------same as line 48 --------------//
//        public function  approvedata()
//    {
//      $this->db->where('user_approval', 1);
//      return $this->db->get('users')->result_array();

//    }

//     public function  pendingdata()
//     {
//       $this->db->where('user_approval', 0);
//       return $this->db->get('users')->result_array();
 
//      }

     //-------------------same as line 43 --------------//
     public function getuserid()
   {
    return $this->db->get('users')->result_array();
   }

   public function get_role()
   {
    $row = $this->db->select("*")->limit(1)->order_by('user_id',"DESC")->get("users")->row();
    return $row->user_role; //it will provide latest record.
   }

   

}
