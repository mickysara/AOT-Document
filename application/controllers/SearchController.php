<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchController extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Search');
        $this->load->view('Footer');
        
        
        
    }

}

/* End of file SearchController.php */
