<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewRepositoryController extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('_success') == '')
      {
          $this->load->view('HeaderAdminTest');
          $this->load->view('ViewRepository');
          $this->load->view('Footer');
      }else{
        redirect('ViewRepositoryController/checkstatus');
      }
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
                $this->load->view('HeaderAdminTest');
                $this->load->view('ViewRepository');
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

/* End of file ViewRepositoryController.php */

