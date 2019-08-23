<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 
        
    }


    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Test');
        $this->load->view('Footer');
        
    }



/* End of file TestController.php */

public function Test(){
        $files = $_FILES;
        $count = count($_FILES['userfile']['name']);
        for($i=0; $i<$count; $i++)
        {
        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
        $_FILES['userfile']['size']= $files['userfile']['size'][$i];
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|pptx|docx|xlsx';
        $config['max_size'] = '10000000'; //หน่วยเป็น byte กำหนดใน config xammps php.ini search post และ up
        $config['remove_spaces'] = true; //ลบค่าว่างออกไป ชื่อไฟล์ค่าว่าง
        $config['overwrite'] = false;
        $config['max_width'] = '';
        $config['max_height'] = '';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload();
        $fileName = $_FILES['userfile']['name'];
        $images[] = $fileName;
        }

        $this->db->select('file');
        $this->db->where('file',$fileName);
        $query = $this->db->get('upload');
        $num = $query->num_rows();
        // echo $fileName;
        if($num > 0){
            $this->Upload->editfileonly($this->input->post(),$fileName);
            
            }else{
            $this->Upload->upload_image($this->input->post(),$fileName);
            redirect('ViewController','refresh');
            }
    }
    }