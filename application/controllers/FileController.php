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
          
          $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
          $this->session->set_userdata('login_referrer', $referrer_value);
          redirect('AlertController/loginalert');
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
        if($this->session->userdata('_success') == '')
        {
          $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
          $this->session->set_userdata('login_referrer', $referrer_value);
          redirect('AlertController/loginalert');
        }else{
        $status = $this->session->userdata('employeeId');
        $this->db->where('Id_Emp', $status);
        $query = $this->db->get('Users');
        foreach($query->result_array() as $data)
      { ?>
              <?php 
              if($data['Status']=='admin' || $data['Status']=='superadmin')
              {
                $this->load->view('Header');
                $this->load->view('Footer');
                $this->data['view_data']= $this->LineNotify->view_datadashboard(); //Upfile คือชื่อของโมเดล
                $this->load->view('File', $this->data, FALSE);
              }else{
                redirect('AlertController/adminalert');
              }
        
               ?>
          
  <?php } 
        }
    }
}

/* End of file IndexController.php */

?>