<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class LogController extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('_success') == '')
        {
          redirect('AlertController/loginalert');
        }else{
            redirect('LogController/checkstatus');
        }
        }  

        public function checkstatus()
        {
          if($this->session->userdata('_success') == '')
          {
            redirect('AlertController/loginalert');
          }else{
             $status = $this->session->userdata('employeeId');
        $this->db->where('Id_Emp', $status);
        $query = $this->db->get('Users');
        foreach($query->result_array() as $data)
         { ?>
              <?php 
              if($this->session->userdata('_success') == '')
              {
                redirect('AlertController/loginalert');

              }else if($data['Status']=='admin' || $data['Status']=='superadmin')
              {
                  $this->load->view('HeaderAdminTest');
                  $this->load->view('Log');
                  $this->load->view('Footer');
              }else{
                redirect('AlertController/adminalert');
              }
        
               ?>
          
        <?php } 
          }
           }
}

/* End of file LogController.php */
