<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class RepositoryController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Repository_Model'); 
    }  

    public function index()
    {
        if($this->session->userdata('_success') == '')
        {
            $this->load->view('Header');
            $this->load->view('Loginalert');     
            $this->load->view('Footer');
        }else{
          redirect('RepositoryController/checkstatus');
        }
        
    }

    public function showdata($repository_id)
    {
        $this->data['repository_data']= $this->Repository_Model->repository_data($repository_id);
        $this->load->view('Header');
        $this->load->view('repository', $this->data, FALSE);
        $this->load->view('Footer');
    }
    
    public function checkstatus()
    {
        $this->load->view('Header');
        $this->data['repository_view']= $this->Repository_Model->repository_view(); 
        $this->load->view('repository', $this->data, FALSE);
        $this->load->view('Footer');    
    }
}

/* End of file repositoryController.php */
