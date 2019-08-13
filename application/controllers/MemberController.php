<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('repositoty_member'); 
    }  

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('member');
        $this->load->view('Footer');
        
    }

    public function showmember($repository_id)
    {
        $this->data['repositoty_memberdata']= $this->repositoty_member->repository_memberdata($repository_id);
        print_r($this->data);
    }

}

/* End of file MemberController.php */
