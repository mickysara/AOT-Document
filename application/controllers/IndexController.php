<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Home');
        $this->load->view('Footer');
        
        
        
    }

}

/* End of file IndexController.php */

?>