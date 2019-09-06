<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ViewStatusController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Admin_Model','Admin'); 
    }
    public function index()
    {
      if($this->session->userdata('_success') == '')
      {
          $this->load->view('Header');
          $this->load->view('Loginalert');     
          $this->load->view('Footer');
      }else{
        redirect('ViewStatusController/checkstatus');
      }
   
    }
    
     public function del($id){
        $this->data['delete_type']= $this->Admin->delete_data($id);
        redirect('ViewStatusController','refresh');  
     }
     
     public function checkstatus()
    {
        $status = $this->session->userdata('employeeId');
        $this->db->where('employeeId', $status);
        $query = $this->db->get('users');
        foreach($query->result_array() as $data)
      { ?>
              <?php 
              if($data['status']=='admin')
              {
                $this->load->view('HeaderAdminTest');
                $this->data['status_view']= $this->Admin->status_view(); //Upfile คือชื่อของโมเดล
                $this->load->view('ViewStatus', $this->data, FALSE);     
                $this->load->view('Footer');
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