<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 
        
    }

    public function index()
    {
        if($this->session->userdata('_success') == '')
      {
          $this->load->view('Header');
          $this->load->view('Loginalert');     
          $this->load->view('Footer');
      }else{
        redirect('UploadController/checkstatus');
      }

    }

    public function file_upload(){
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
                $config['allowed_types'] = 'pdf|pptx|docx|xlsx|png|jpeg|jpg';
                $config['max_size'] = '10000000'; //หน่วยเป็น byte กำหนดใน config xammps php.ini search post และ up
                $config['remove_spaces'] = false; //ลบค่าว่างออกไป ชื่อไฟล์ค่าว่าง
                $config['overwrite'] = true; //falseไฟล์ซ้ำมีหลายไฟล์ true ลงทับไฟล์เดิม
                $config['max_width'] = '';
                $config['max_height'] = '';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload();
                $fileName = $_FILES['userfile']['name'];
                $images[] = $fileName;
                }
                  $fileName = implode(',',$images); //อัพเดทได้หลายๆไฟล์
                  $this->Upload->upload_image($this->input->post(),$fileName);
                  redirect('EmailController/send');
                  
              
                }

        public function view(){
            $this->data['view_data']= $this->Upload->view_data(); //welcome คือชื่อของโมเดล
            $this->load->view('view', $this->data, FALSE);
                }

        public function edit($edit_id){
             $this->data['edit_data']= $this->Upload->edit_data($edit_id);
             $this->data['edit_data_image']= $this->Upload->edit_data_image($edit_id);
            $this->load->view('DetailDoc', $this->data, FALSE);
                }

        public function checkstatus()
        {
        $this->load->view('Header');
        $this->load->view('Footer');
        $this->data['view_data']= $this->Upload->view_data(); //Upfile คือชื่อของโมเดล
        $this->load->view('Upload', $this->data, FALSE);       //เรียกใช้หน้าฟอร์ม

        }

        public function Mydoc()
        {

        $this->load->view('Header');
        $this->load->view('Footer');
        $this->data['view_data']= $this->Upload->view_data(); //Upfile คือชื่อของโมเดล
        $this->load->view('UploadMyDocument', $this->data, FALSE);       //เรียกใช้หน้าฟอร์ม

        }
    
        public function UploadMydocument()
        {
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
            $config['allowed_types'] = 'pdf|pptx|docx|xlsx|png|jpeg|jpg';
            $config['max_size'] = '10000000'; //หน่วยเป็น byte กำหนดใน config xammps php.ini search post และ up
            $config['remove_spaces'] = false; //ลบค่าว่างออกไป ชื่อไฟล์ค่าว่าง
            $config['overwrite'] = true; //falseไฟล์ซ้ำมีหลายไฟล์ true ลงทับไฟล์เดิม
            $config['max_width'] = '';
            $config['max_height'] = '';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload();
            $fileName = $_FILES['userfile']['name'];
            $images[] = $fileName;
            }
              $fileName = implode(',',$images); //อัพเดทได้หลายๆไฟล์
              $this->Upload->upload_image($this->input->post(),$fileName);
              redirect('EmailController/senddoc');
              
        }
    }
