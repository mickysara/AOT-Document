<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EditController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 
    }
    public function edit($edit_id)
    {
        if($this->session->userdata('_success') == '')
        {
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('AlertController/loginalert');
        }else{
            $this->data['edit_data']= $this->Upload->edit_data($edit_id);
            $this->load->view('Header');
            $this->load->view('edit', $this->data, FALSE);
            $this->load->view('Footer');
        }
    }
    public function editrepo($edit_id)
    {
        if($this->session->userdata('_success') == '')
        {
            $referrer_value = current_url().($_SERVER['QUERY_STRING']!=""?"?".$_SERVER['QUERY_STRING']:"");
            $this->session->set_userdata('login_referrer', $referrer_value);
            redirect('AlertController/loginalert');
        }else{
            $this->data['edit_data']= $this->Upload->edit_datarepo($edit_id);
            $this->load->view('Header');
            $this->load->view('EditFileRepository', $this->data, FALSE);
            $this->load->view('Footer');
        }
    }
    public function editdata(){        
        $this->Upload->editdataupload($this->input->post());
        
        redirect('ViewController','refresh');
    }
    public function editdatarepo(){
        // print_r($_POST);
          $this->Upload->editdatauploadrepo($this->input->post());
        //   $this->db->select('*');
        //   $this->db->order_by('Id_UploadInRepository', 'desc');
        //   $result = $this->db->get('UploadInRepository',1);
        //   $data = $result->row_array(); 
        //   redirect('repositoryController/showdata/'.$data['Id_Repository'],'refresh');
    }

    
    public function editDoc(){
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
          $this->Upload->editdataupload($this->input->post(),$fileName);
    //    $this->Upload->editdataupload();
        redirect('MyDoctumentController','refresh');
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