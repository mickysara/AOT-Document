<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class InchatroomController extends CI_Controller {

    public function index()
    {

        $this->load->view('Header');
        $this->load->view('Inchatroom');
        $this->load->view('Footer');
        
    }

}

/* End of file InchatroomController.php */
