<?php
class Admin_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function status_view(){
        $query=$this->db->query("SELECT *
                                 FROM Users  
                                 ORDER BY Users.Id_Users
                                 ");
        return $query->result_array();
    }

    public function delete_data($id){
        $this->db->query("DELETE FROM Users WHERE Id_Users = $id");
        
      }
    
    
    
      public function edit_status($inputdata){{
    
        $data = array(
        'Status' => $inputdata['status']
      );
        $this->db->where('Id_Emp', $inputdata['id_status']);
        $query=$this->db->update('Users',$data);

        return $query;
        
    
          
        }
      }
    
    
      public function edit_data($id){
        $query=$this->db->query("SELECT *
                                 FROM Users
                                 WHERE Users.Id_Users = $id");
        return $query->result_array();
    }
}