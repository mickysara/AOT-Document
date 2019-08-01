<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class repository_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function repository_data($id){
        $query=$this->db->query("SELECT *
                                 FROM repository
                                 WHERE repository.id = $id");
        return $query->result_array();
    }

}

/* End of file repository_model.php */
