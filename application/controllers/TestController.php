<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Test');
        $this->load->view('Footer');
        
    }

}

/* End of file TestController.php */

