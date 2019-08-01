<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class repositoryController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('repository_model'); 
    }  

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('repository');
        $this->load->view('Footer');
        
    }

    public function showdata($repository_id)
    {
        $this->data['repository_data']= $this->repository_model->repository_data($repository_id);
        $this->load->view('Header');
        $this->load->view('repository', $this->data, FALSE);
        $this->load->view('Footer');
    }


}

/* End of file repositoryController.php */
