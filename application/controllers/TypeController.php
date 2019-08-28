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
        $this->load->view('Header');
        $this->load->view('Footer');
        // $this->data['view_data']= $this->Upload->view_data(); //Upfile คือชื่อของโมเดล
        // $this->load->view('Upload', $this->data, FALSE);       //เรียกใช้หน้าฟอร์ม
        $this->load->view('Type');       //เรียกใช้หน้าฟอร์ม
        
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
                $config['overwrite'] = false;
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

        // public function view(){
        //     $this->data['view_data']= $this->Upload->view_data(); //welcome คือชื่อของโมเดล
        //     $this->load->view('view', $this->data, FALSE);
        //         }

        // public function edit($edit_id){
        //      $this->data['edit_data']= $this->Upload->edit_data($edit_id);
        //      $this->data['edit_data_image']= $this->Upload->edit_data_image($edit_id);
        //     $this->load->view('DetailDoc', $this->data, FALSE);
        //         }

        // public function deleteimage(){
        //     $deleteid  = $this->input->post('image_id');
        //     $this->db->delete('photos', array('id' => $deleteid)); //photo ชื่อตาราง
        //     $verify = $this->db->affected_rows();
        //     echo $verify;

        // }


      //  public function edit_file_upload(){
      //         $files = $_FILES;
      //         if(!empty($files['userfile']['name'][0])){
      //         $count = count($_FILES['userfile']['name']);
      //         $user_id = $this->input->post('user_id');
      //         for($i=0; $i<$count; $i++)
      //           {
      //           $_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
      //           $_FILES['userfile']['type']= $files['userfile']['type'][$i];
      //           $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
      //           $_FILES['userfile']['error']= $files['userfile']['error'][$i];
      //           $_FILES['userfile']['size']= $files['userfile']['size'][$i];
      //           $config['upload_path'] = './uploads/';
      //           $config['allowed_types'] = 'pdf|pptx|docx|xlsx';
      //           $config['max_size'] = '10000000';
      //           $config['remove_spaces'] = true;
      //           $config['overwrite'] = false;
      //           $config['max_width'] = '';
      //           $config['max_height'] = '';
      //           $this->load->library('upload', $config);
      //           $this->upload->initialize($config);
      //           $this->upload->do_upload();
      //           $fileName = $_FILES['userfile']['name'];
      //           $images[] = $fileName;
      //           }
      //             $fileName = implode(',',$images);
      //             $this->Upload->edit_upload_image($id_upload,$this->input->post(),$fileName);
      //           }else
      //           {
      //         $user_id = $this->input->post('id_upload');
      //         $this->Upload->edit_upload_image($id_upload,$this->input->post());
      //           }
      //           // echo'<script type="text/javascript">
      //           // swal("ADD DATA", "You clicked the button!", "success");
      //           // </script>'; //ต้องใช้ echo ในแท้กphp ข้างในมีดับเบิ้ลโคดอยู่แล้ว
      //           redirect('ViewControllers');
      //           }





        
    }
