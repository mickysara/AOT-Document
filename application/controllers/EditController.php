<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EditController extends CI_Controller {
    
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

        
        $this->data['edit_data']= $this->Upload->edit_data($edit_id);
        $this->data['edit_data_image']= $this->Upload->edit_data_image($edit_id);
        $this->load->view('edit', $this->data, FALSE);
        
        
        
    }

}

/* End of file IndexController.php */

?>