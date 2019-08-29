<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 
        
    }


    public function index()
    {
        $this->load->view('HeaderAdmin');
        $this->load->view('Test');
        $this->load->view('Footer');
        
    }



/* End of file TestController.php */

public function Test(){
      
    }
    }