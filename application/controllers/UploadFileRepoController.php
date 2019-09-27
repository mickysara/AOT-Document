<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadFileRepoController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 
        $this->load->model('Repository_Model','RePo'); 
        
    }

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Footer');
        $this->load->view('UploadFileRepo');       //เรียกใช้หน้าฟอร์ม
      
        
    }

    public function uploadfilerepo($repo_id)
    {

      if($this->session->userdata('_success') == ''){    
         redirect('AlertController/loginalert','refresh');
         
      }else{
        $this->data['repository_view']= $this->RePo->repository_view($repo_id);
        $this->load->view('Header');
        $this->load->view('UploadFileRepo', $this->data, FALSE);
        $this->load->view('Footer');
      }
    }

    public function file_upload($repo_id){

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


                //   $this->db->where('Id_Repository', $repo_id);
                //   $this->db->order_by('Id_upload', 'desc');
                //   $query = $this->db->get('Upload', 1);
                //   $d = $query->row_array();

                // $this->db->where('File', $_FILES['userfile']['name']);
                // $query = $this->db->get('Upload');
                // $data = $query->row_array();

                // if($data['File'] ==  $_FILES['userfile']['name'])
                // {
                //   $this->load->view('Header');
                //   $this->load->view('UploadAlert');
                //   $this->load->view('Footer');
                // }else{



                    $this->RePo->upload_file($this->input->post(),$fileName);
                  redirect('EmailController/sendrepo');

                  



                // }
                //   $this->RePo->upload_file($this->input->post(),$fileName);
                //   redirect('EmailController/senddoc');
                //   redirect('DetailDocController/edit/'.$d['id_upload']);
                // echo('สวัสดี');
                //   print_r($_POST);
               

              
                }

                public function Checkname()
                {
                    $filename = $this->input->post("namefile");
                    $this->db->where('File', $filename);
                    $query = $this->db->get('Upload', 1);
                    if($query->num_rows() == 0)
                    {
                      $this->db->where('File', $filename);
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
