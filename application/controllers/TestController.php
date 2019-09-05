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
        $this->load->view('HeaderAdminTest');
        $this->load->view('Footer');
        
    }
    
    public function checklogin()
    {
        if($this->session->userdata('_success') == '')
        {
            $this->load->view('Header');
            $this->load->view('Loginalert');     
            $this->load->view('Footer');
        }else{
          redirect('TestController/checkstatus');
        }
    }

    public function checkstatus()
    {
        $status = $this->session->userdata('employeeId');
        $this->db->where('employeeId', $status);
        $query = $this->db->get('adminaot');
        foreach($query->result_array() as $data)
      { ?>
              <?php 
              if($data['status']=='admin')
              {
                $this->load->view('Header');
                $this->load->view('Adminalert');     
                $this->load->view('Footer');
              }else{
                $this->load->view('HeaderAdmin');
                $this->load->view('notfound_view');
                $this->load->view('Footer');
              }
        
               ?>
          
  <?php } 
    }
    }