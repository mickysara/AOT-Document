<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EditStatusController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Admin_Model','Admin'); 
    }
    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Footer');
        $this->load->view('EditStatus');  
    }
    public function edit($edit_id)
    {
        $status = $this->session->userdata('employeeId');
        $this->db->where('Id_Emp', $status);
        $query3 = $this->db->get('Users');
        $admin = $query3->row_array();

        if($this->session->userdata('_success') == '')
        {
            redirect('AlertController/loginalert');

        }else if($admin['Status'] != 'superadmin')
        {
            redirect('AlertController/adminalert');

        }else{
            $this->data['edit_data']= $this->Admin->edit_data($edit_id);
        $this->load->view('Header');
        $this->load->view('EditStatus', $this->data, FALSE);
        $this->load->view('Footer');
        }
    }

    public function editdata(){
        // print_r($_POST);
          $this->Admin->edit_status($this->input->post());
          redirect('ViewStatusController','refresh');
    }

}

/* End of file IndexController.php */

?>