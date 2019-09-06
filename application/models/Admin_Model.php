<?php
class Admin_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function status_view(){
        $query=$this->db->query("SELECT *
                                 FROM users  
                                 ORDER BY users.id_admin
                                 ");
        return $query->result_array();
    }

    public function delete_data($id){
        $this->db->query("DELETE FROM users WHERE id_admin = $id");
        
      }
    
    
    
      public function edit_status($inputdata){{
    
        $data = array(
        'status' => $inputdata['status']
      );
        $this->db->where('id_admin', $this->input->post('id_admin'));
        $query=$this->db->update('users',$data);
    
          
        }
      }
    
    
      public function edit_data($id){
        $query=$this->db->query("SELECT *
                                 FROM users
                                 WHERE users.id_admin = $id");
        return $query->result_array();
    }
}