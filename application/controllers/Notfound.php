<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('Header');
        
        $this->load->view('notfound_view');
        
        $this->load->view('Footer');
        
    }

}

/* End of file Notfound.php */
