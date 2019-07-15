<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailDocController extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('DetailDoc');
        $this->load->view('Footer');
        
        
        
    }

}

/* End of file DetailDocController.php */
