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
                $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
        $this->session->set_userdata('login_referrer', $referrer_value);
        redirect('AlertController/loginalert');
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
              if($data['Status']=='superadmin')
              {
                $this->load->view('Header');
                $this->data['status_view']= $this->Admin->status_view(); //Upfile คือชื่อของโมเดล
                $this->load->view('ViewStatus', $this->data, FALSE);     
                $this->load->view('Footer');
              }else{
                redirect('AlertController/superadminalert');
              }
        
               ?>
          
  <?php } 
      }
    }
}

/* End of file IndexController.php */

?>