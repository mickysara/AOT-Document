<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Repositoty_member extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function repository_memberdata($id){
        $query=$this->db->query("SELECT Repository_Member.*,Repository.topic,Repository.createby 
                                FROM Repository_Member,Repository 
                                WHERE Repository_Member.Id_Repository = Repository.Id_Repository 
                                AND Repository_Member.Id_Repository = $id");
        return $query->result_array();
    }
    

}

/* End of file repositoty_member.php */
