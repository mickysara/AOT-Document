<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ViewController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 
    }
    public function index()
    {
        $this->load->view('Header');
        $this->data['view_data']= $this->Upload->view_dataBackend(); //Upfile คือชื่อของโมเดล
        $this->load->view('ViewData', $this->data, FALSE);
        $this->load->view('Footer');
        
        
        
    }
    
     public function del($id)
     {
                                           //    ลบแต่ยังอยู่ในเบสการลบไฟล์
    //    $this->data['insertdeletefile']= $this->Upload->insertdeletefile($id);
    //    $this->data['delete_data']= $this->Upload->delete_data($id);
    //    redirect('ViewController','refresh');                
   
  $this->db->where('id_upload', $id);
    $query = $this->db->get('upload');

    foreach($query->result_array() as $data)
      { ?>
              <?php $insertdelete = array(
                     'id_delrepository' => $data['id_repository'],
                     'namedel' => $data['name'],
                     'topicdel' => $data['topic'],
                     'detaildel' =>  $data['detail'],
                     'urldel' => $data['url'],
                     'filedel' =>  $data['file'],
                     'datedel' => $data['date'],
                     'dateenddel' => $data['dateend'],
                     'typedel' => $data['type'],
                     'qr_codenamedel' => $data['qr_codename'],
                     'privacydel' => $data['privacy'],
                     'statusdel' =>  $data['status']
                );
                    $this->db->insert('deletefile', $insertdelete); 
                    $this->data['delete_data']= $this->Upload->delete_data($id);
                    redirect('ViewController','refresh'); 
               ?>

  <?php } 

   
 
     }
}
         