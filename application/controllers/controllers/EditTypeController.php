<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EditTypeController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Type_Model','Type'); 
    }
    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Footer');
        $this->load->view('EditType');  
    }
    public function edit($edit_id)
    {
        $this->data['edit_data']= $this->Type->edit_data($edit_id);
        $this->load->view('Header');
        $this->load->view('EditType', $this->data, FALSE);
        $this->load->view('Footer');
    }

    public function editdata(){
        
        $files = $_FILES;
        $count = count($_FILES['userfile']['name']);

        for($i=0; $i<$count; $i++)
        {
        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
        $_FILES['userfile']['size']= $files['userfile']['size'][$i];
        $config['upload_path'] = './type/';
        $config['allowed_types'] = 'png|jpeg|jpg|';
        $config['max_size'] = '10000000'; //หน่วยเป็น byte กำหนดใน config xammps php.ini search post และ up
        $config['remove_spaces'] = true; //ลบค่าว่างออกไป ชื่อไฟล์ค่าว่าง
        $config['overwrite'] = true;
        $config['max_width'] = '';
        $config['max_height'] = '';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload();
        $fileName = $_FILES['userfile']['name'];
        $images[] = $fileName;
        }
          $this->Type->edit_type($this->input->post(),$fileName);
          redirect('TypeViewController','refresh');
    }

}

/* End of file IndexController.php */

?>