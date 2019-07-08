<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ViewController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Upload_Model','Upload'); 
    }
    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Footer');
        $this->data['view_data']= $this->Upload->view_data(); //Upfile คือชื่อของโมเดล
        $this->load->view('view', $this->data, FALSE);
        
        
        
    }

}

/* End of file IndexController.php */

?>