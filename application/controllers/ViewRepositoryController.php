<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewRepositoryController extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('_success') == '')
      {
                $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
        $this->session->set_userdata('login_referrer', $referrer_value);
        redirect('AlertController/loginalert');
      }else{
        redirect('ViewRepositoryController/checkstatus');
      }
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
              if($data['Status']=='admin'|| $data['Status']=='superadmin')
              {
                $this->load->view('HeaderAdminTest');
                $this->load->view('ViewRepository');
                $this->load->view('Footer');
              }else{
                redirect('AlertController/adminalert');
              }
        
               ?>
          
  <?php } 
      }
    }
}

/* End of file ViewRepositoryController.php */

