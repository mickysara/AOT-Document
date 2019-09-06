<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewRepositoryController extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('ViewRepository');
        $this->load->view('Footer');
    }


}

/* End of file ViewRepositoryController.php */

