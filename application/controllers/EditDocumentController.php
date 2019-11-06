<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EditDocumentController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 
    }
    // public function edit($edit_id)
    // {
    //     $this->data['edit_data']= $this->Upload->edit_data($edit_id);
    //     $this->load->view('Header');
    //     $this->load->view('EditDocument', $this->data, FALSE);
    //     $this->load->view('Footer');
    // }
    public function editdata(){
          $this->Upload->editdataupload($this->input->post());
          // print_r($_POST);
          redirect('MyDocumentController','refresh');

    }
    public function checkaccount($edit_id)
    {
        $this->db->where('Id_Upload', $edit_id);
        $query = $this->db->get('Upload');
        foreach($query->result_array() as $data)
      { ?>
              <?php 
                  if($data['Uploadby']==$this->session->userdata('accountName'))
                  {
                    $this->data['edit_data']= $this->Upload->edit_data($edit_id);
                    $this->load->view('Header');
                    $this->load->view('EditDocument', $this->data, FALSE);
                    $this->load->view('Footer');
                  }else{
                    $this->load->view('HeaderAdmin');
                    $this->load->view('notaccount_view');
                    $this->load->view('Footer');
                  }
               ?>  
  <?php } 
    
    }
    public function CheckTopic()
    {
      $topic = $this->input->post("topic");
      $this->db->where('Topic', $topic);
      $query = $this->db->get('Upload', 1);
      if($query->num_rows() == 0)
      {
        $this->db->where('Topic', $topic);
        $query = $this->db->get('UploadInRepository', 1);

        if($query->num_rows() == 0)
        {
          echo json_encode(['status' => 1, 'msg' => 'Success']);
           
        }else{
          echo json_encode(['status' => 0, 'msg' => 'fail']);
        }
      }else{
          echo json_encode(['status' => 0, 'msg' => 'fail']);
      }  
      
    }
}

/* End of file IndexController.php */

?>