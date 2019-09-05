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
          $showtype = "PDF File";
         }else if($arraystate[1]=="docx"){
          $showtype = "Microsoftword";
         }else if($arraystate[1]=="pptx"){
          $showtype = "Microsoftpowerpoint";
         }else if($arraystate[1]=="xlsx"){
          $showtype = "Microsoftexcel";
         }
          $showtypeall = $showtype;

        $fill_user = array(
          'name' => $inputdata['name'],
          'topic' => $inputdata['topic'],
          'detail' => $inputdata['detail'],
          'url'=> $addbaseurl,
          'file' => $file,
          'date'=> $dateshow,
          'dateend'=> $newDate,
          'type'=> $showtypeall,
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
  public function view_dataBackend(){
    $query=$this->db->query("SELECT *
                             FROM upload  
                             ORDER BY upload.id_upload DESC
                              ");
    return $query->result_array();
}

public function view_datadelete(){
  $query=$this->db->query("SELECT *
                           FROM deletefile  
                           ORDER BY deletefile.id_delfile DESC
                            ");
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
public function deletedelfile_data($id){
  $this->db->query("DELETE FROM deletefile WHERE id_delfile = $id");
  
  
}



    public function editdataupload($inputdata,$filename){
      $dateget = $inputdata['date_end'];
      $newDate = date("Y-m-d", strtotime($dateget));
    
      if($filename!='' ){
        $filename1 = explode(',',$filename);
        foreach($filename1 as $file){

          $str = $file;
          $arraystate = (explode(".",$str));

          if($arraystate[1]=="pdf"){
            $showtype = "PDF File";
          }else if($arraystate[1]=="docx"){
           $showtype = "Microsoftword";
          }else if($arraystate[1]=="pptx"){
           $showtype = "Microsoftpowerpoint";
          }else if($arraystate[1]=="xlsx"){
           $showtype = "Microsoftexcel";
          }
           $showtypeall = $showtype;
             
      $data = array(
        'name' => $inputdata['name'],
        'topic' => $inputdata['topic'],
        'file' => $file,
        'date' => $inputdata['date'],
        'dateend' => $newDate,
        'detail' => $inputdata['detail'],
        'type' => $showtypeall,
        'privacy' => $inputdata['privacy']
    );
      $this->db->where('id_upload', $this->input->post('id_upload'));
      $query=$this->db->update('upload',$data);
    }
  }


  }
  public function insertRepo($inputdata){
    $dateshow = date("Y/m/d");

     $data = array(
      'createby' => $inputdata['name'],
      'topic' => $inputdata['topic'],
      'date'=> $dateshow,
      'detail' => $inputdata['detail'],
      'privacy' => $inputdata['privacy']

      // 'topic' => $inputdata['topic'],
      // 'detail' => $inputdata['detail'],
      // 'date' => $inputdata['date'],
      // 'privacy' => $inputdata['privacy'],
      // 'name' => $inputdata['name']
  );
     $this->db->insert('repository', $data); 
  }


 }
  
