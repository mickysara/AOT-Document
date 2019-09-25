<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class LogController extends CI_Controller {

    public function index()
    {
        $this->load->view('HeaderAdminTest');
        $this->load->view('Log');
        $this->load->view('Footer');
        
        
        
    }

}

/* End of file LogController.php */
