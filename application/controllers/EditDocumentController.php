<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EditDocumentController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 
    }
    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Footer');
        $this->load->view('Edit');  
    }
    // public function edit($edit_id)
    // {
    //     $this->data['edit_data']= $this->Upload->edit_data($edit_id);
    //     $this->load->view('Header');
    //     $this->load->view('EditDocument', $this->data, FALSE);
    //     $this->load->view('Footer');
    // }
    public function editdata(){
        // $files = $_FILES;
        // $count = count($_FILES['userfile']['name']);
        // for($i=0; $i<$count; $i++)
        // {
        // $_FILES['userfile']['name']= $files['userfile']['name'][$i];
        // $_FILES['userfile']['type']= $files['userfile']['type'][$i];
        // $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        // $_FILES['userfile']['error']= $files['userfile']['error'][$i];
        // $_FILES['userfile']['size']= $files['userfile']['size'][$i];
        // $config['upload_path'] = './uploads/';
        // $config['allowed_types'] = 'pdf|pptx|docx|xlsx|png|jpeg|jpg';
        // $config['max_size'] = '10000000'; //หน่วยเป็น byte กำหนดใน config xammps php.ini search post และ up
        // $config['remove_spaces'] = false; //ลบค่าว่างออกไป ชื่อไฟล์ค่าว่าง
        // $config['overwrite'] = true;
        // $config['max_width'] = '';
        // $config['max_height'] = '';
        // $this->load->library('upload', $config);
        // $this->upload->initialize($config);
        // $this->upload->do_upload();
        // $fileName = $_FILES['userfile']['name'];
        // $images[] = $fileName;
        // }
        //   $fileName = implode(',',$images); //อัพเดทได้หลายๆไฟล์
          $this->Upload->editdataupload($this->input->post());
        redirect('MyDocumentController','refresh');

    }
    public function checkaccount($edit_id)
    {
        $this->db->where('Id_upload', $edit_id);
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
}

/* End of file IndexController.php */

?>