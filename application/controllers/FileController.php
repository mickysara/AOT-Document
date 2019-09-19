<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FileController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Linenotify_Model','LineNotify'); 
    }

    public function index()
    {
        if($this->session->userdata('_success') == '')
        {
         $this->load->view('Header');
         $this->load->view('LoginAlert');     
         $this->load->view('Footer');
        }else{
            redirect('FileController/checkstatus');
        }
    }
    public function edit()
    {
        $this->load->view('Header');
        $this->load->view('Footer');
        $this->data['view_data']= $this->LineNotify->view_datadashboard(); //Upfile คือชื่อของโมเดล
        $this->load->view('FileEdit', $this->data, FALSE);    
    }
    public function checkstatus()
    {
        $status = $this->session->userdata('employeeId');
        $this->db->where('Id_Emp', $status);
        $query = $this->db->get('Users');
        foreach($query->result_array() as $data)
      { ?>
              <?php 
              if($data['Status']=='admin')
              {
                $this->load->view('Header');
                $this->load->view('Footer');
                $this->data['view_data']= $this->LineNotify->view_datadashboard(); //Upfile คือชื่อของโมเดล
                $this->load->view('File', $this->data, FALSE);
              }else{
                $this->load->view('HeaderAdmin');
                $this->load->view('Adminalert');
                $this->load->view('Footer');
              }
        
               ?>
          
  <?php } 
    }
}

/* End of file IndexController.php */

?>