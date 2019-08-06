<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class repositoty_member extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function repository_memberdata($id){
        $query=$this->db->query("SELECT repository_member.*,repository.topic,repository.createby 
                                FROM repository_member,repository 
                                WHERE repository_member.id_repository = repository.id 
                                AND repository_member.id_repository = $id");
        return $query->result_array();
    }
    

}

/* End of file repositoty_member.php */
