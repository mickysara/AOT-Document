<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TypeController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('Type_Model','Type'); 
        
    }

    public function index()
    {
      if($this->session->userdata('_success') == '')
      {
          $this->load->view('Header');
          $this->load->view('Loginalert');     
          $this->load->view('Footer');
      }else{
        redirect('TypeController/checkstatus');
      }
        
    }

    public function typeupload(){
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
                $config['allowed_types'] = 'png|jpeg|jpg';
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
                  $fileName = implode(',',$images); //อัพเดทได้หลายๆไฟล์
                  $this->Type->upload_type($this->input->post(),$fileName);
                  redirect('FileController');

               

              
                }
              public function checkstatus()
              {
                  $status = $this->session->userdata('employeeId');
                  $this->db->where('employeeId', $status);
                  $query = $this->db->get('adminaot');
                  foreach($query->result_array() as $data)
                  { ?>
                          <?php 
                          if($data['status']=='admin')
                          {
                          $this->load->view('Header');
                          $this->load->view('Footer');
                          $this->load->view('Type');       //เรียกใช้หน้าฟอร์ม
                          }else{
                          $this->load->view('HeaderAdmin');
                          $this->load->view('Adminalert');
                          $this->load->view('Footer');
                          }
                  
                          ?>
                      
              <?php } 
              }
      




        
    }
