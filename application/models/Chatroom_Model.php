<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Chatroom_Model extends CI_Model {

    public function chatroom_data($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('chatroom', 1);
        return $query->row_array();
        
        
    }

    

}

/* End of file Chatroom_Model.php */
