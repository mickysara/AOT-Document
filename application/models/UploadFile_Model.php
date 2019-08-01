<?php
class UploadFile_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function upload_image($inputdata,$filename)
    { 

      function randtext($range){
        $char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIGKLMNOPQRSTUVWXYZ';
        $start = rand(1,(strlen($char)-$range));
        $shuffled = str_shuffle($char);
        return substr($shuffled,$start,$range);
        } 
        //echo randtext(1);  
        $firststring = randtext(1);
        $addurl = ''.random_string('alnum',30);
        $addbaseurl = $firststring.$addurl;

        $dateshow = date("Y/m/d");
        $d=strtotime("+10 Days");
        $dateendshow = date("Y/m/d",$d);
        $randomqrcode = random_string('alpha', 20);
        $status = 'ใช้งาน';
        $dateget = $inputdata['date_end'];
        $newDate = date("Y-m-d", strtotime($dateget));
        $insert_id = $this->db->insert_id();

            if($filename!='' ){
            $filename1 = explode(',',$filename);
            foreach($filename1 as $file){
            
              $str = $file;
              $arraystate = (explode(".",$str));
              echo ($arraystate[1]);

         if($arraystate[1]=="pdf"){
           $pdfshow = "PDF File";
         }else if($arraystate[1]=="docx"){
          $wordshow = "Microsoftword";
         }else if($arraystate[1]=="pptx"){
          $powerpointshow = "Microsoftpowerpoint";
         }else if($arraystate[1]=="xlsx"){
          $excelshow = "Microsoftexcel";
         }
          $showtype = $pdfshow.$wordshow.$powerpointshow.$excelshow;

        $fill_user = array(
          'name' => $inputdata['name'],
          'topic' => $inputdata['topic'],
          'detail' => $inputdata['detail'],
          'url'=> $addbaseurl,
          'file' => $file,
          'date'=> $dateshow,
          'dateend'=> $newDate,
          'type'=> $showtype,
          'qr_codename'=> $randomqrcode,
          'privacy' => $inputdata['privacy'],
          'status' => $status
        );
        
      $this->db->insert('upload', $fill_user); 
      


        } 
      }
     
    }
    public function view_data(){
      $query=$this->db->query("SELECT *
                               FROM upload  
                               ORDER BY upload.id_upload DESC
                               limit 6");
      return $query->result_array();
  }
  
  public function edit_data($id){
    $query=$this->db->query("SELECT upid.*
                             FROM upload upid
                             WHERE upid.id_upload = $id");
    return $query->result_array();
}

public function searchFile($file_name)
{
  $this->db->like('file', $file_name);
  $data = $this->db->get('upload');

  return $data->result_array();
  
  
}
public function delete_data($id){
  $this->db->query("DELETE FROM upload WHERE id_upload = $id");
  
}
public function editdataupload(){
   $data = array(
     'topic' =>$this->input->post('topic')
);
   $this->db->where('id_upload', $this->input->post('id_upload'));
   $query=$this->db->update('upload',$data);
}
}