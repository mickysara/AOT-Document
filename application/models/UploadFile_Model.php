<?php
class UploadFile_Model extends CI_Model
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
         }else if($arraystate[1]=="jpeg"){
          $showtype = "JPEG";
         }else if($arraystate[1]=="png"){
          $showtype = "PNG";
         }else if($arraystate[1]=="jpg"){
          $showtype = "JPG";
         }
          $showtypeall = $showtype;

        $fill_user = array(
          'Uploadby' => $inputdata['name'],
          'Topic' => $inputdata['topic'],
          'Detail' => $inputdata['detail'],
          'Url'=> $addbaseurl,
          'File' => $file,
          'Date'=> $dateshow,
          'Dateend'=> $newDate,
          'Type'=> $showtypeall,
          'Qr_Codename'=> $randomqrcode,
          'Privacy' => $inputdata['privacy'],
          'Status' => $status
        );
        
      $this->db->insert('Upload', $fill_user); 
      


        } 
      }
     
    }
    public function view_data(){
      $query=$this->db->query("SELECT *
                               FROM Upload  
                               WHERE Privacy = 'Public' And Status = 'ใช้งาน'
                               ORDER BY Upload.Id_Upload DESC
                               limit 6");
      return $query->result_array();
  }
  public function view_dataBackend(){
    $query=$this->db->query("SELECT *
                             FROM Upload  
                             ORDER BY Upload.Id_Upload DESC
                              ");
    return $query->result_array();
}

  
  public function edit_data($id){
    $query=$this->db->query("SELECT *
                             FROM Upload upid
                             WHERE upid.Id_Upload = $id");
    return $query->result_array();
}
public function edit_datarepo($id){
  $query=$this->db->query("SELECT *
                           FROM UploadInRepository upid
                           WHERE upid.Id_UploadInRepository = $id");
  return $query->result_array();
}

public function edit_viewrepo(){
  $query=$this->db->query("SELECT *
                           FROM UploadInRepository upid
                           WHERE upid.Id_UploadInRepository");
  return $query->result_array();
}

  public function searchFile($file_name)
  {
    $this->db->like('File', $file_name);
    $data = $this->db->get('Upload');

    return $data->result_array();
    
    
  }
public function delete_data($id){
  $this->db->query("DELETE FROM Upload WHERE Id_Upload = $id");
}
public function delete_datarepo($id){
  $this->db->query("DELETE FROM UploadInRepository WHERE Id_UploadInRepository = $id");
}

public function editdataupload($inputdata){
  $dateget = $inputdata['date_end'];
    $newDate = date("Y-m-d", strtotime($dateget));

  $filename = $inputdata['imagefile'];
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
      }else if($arraystate[1]=="jpeg"){
        $showtype = "JPEG";
        }else if($arraystate[1]=="png"){
        $showtype = "PNG";
        }else if($arraystate[1]=="jpg"){
        $showtype = "JPG";
      }
        $showtypeall = $showtype;
          
  $data = array(
    'Uploadby' => $inputdata['name'],
    'Topic' => $inputdata['topic'],
    'File' => $inputdata['imagefile'],
    'Date' => $inputdata['date'],
    'Dateend' => $newDate,
    'Detail' => $inputdata['detail'],
    'Type' => $showtypeall,
    'Privacy' => $inputdata['privacy']
    );
      $this->db->where('Id_Upload', $this->input->post('Id_Upload'));
      $query=$this->db->update('Upload',$data);

        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
     
        $ip = explode(',',$ipaddress);
        
        $object = array(
          'Id_Emp' =>  $this->session->userdata('employeeId'),
          'Ip'     =>  $ip[0],
          'Action' =>  'แก้ไขหัวข้อชื่อ : '.$inputdata['topic'] . ',ไฟล์ชื่อ : ' . $inputdata['imagefile']
        );
        $this->db->insert('Logs', $object);
        

    }
  }
  }
  
  public function editdatauploadrepo($inputdata){
    $dateget = $inputdata['date_end'];
      $newDate = date("Y-m-d", strtotime($dateget));
  
    $filename = $inputdata['imagefile'];
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
        }else if($arraystate[1]=="jpeg"){
          $showtype = "JPEG";
          }else if($arraystate[1]=="png"){
          $showtype = "PNG";
          }else if($arraystate[1]=="jpg"){
          $showtype = "JPG";
        }
          $showtypeall = $showtype;
            
    $data = array(
      'Uploadby' => $inputdata['name'],
      'Topic' => $inputdata['topic'],
      'File' => $inputdata['imagefile'],
      'Date' => $inputdata['date'],
      'Dateend' => $newDate,
      'Detail' => $inputdata['detail'],
      'Type' => $showtypeall

      );
        $this->db->where('Id_UploadInRepository', $this->input->post('Id_UploadInRepository'));
        $query=$this->db->update('UploadInRepository',$data);

        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
     
        $ip = explode(',',$ipaddress);
        
        $object = array(
          'Id_Emp' =>  $this->session->userdata('employeeId'),
          'Ip'     =>  $ip[0],
          'Action' =>  'แก้ไขหัวข้อชื่อ : '.$inputdata['topic'] . ',ไฟล์ชื่อ : ' . $inputdata['imagefile']
        );
        $this->db->insert('Logs', $object);
      }
    }
    }

  public function insertRepo($inputdata){
    $dateshow = date("Y/m/d");
    $privacyfix = "Public";
     $data = array(
      'Createby' => $inputdata['name'],
      'Topic' => $inputdata['topic'],
      'Date'=> $dateshow,
      'Detail' => $inputdata['detail'],
      'Privacy' => $privacyfix

  );
     $this->db->insert('Repository', $data); 
  }

    public function getAllData() 
    { 
      if($this->session->userdata('_success') == '')
      {
        $query = $this->db->query('SELECT * FROM Upload WHERE Privacy != "Private" AND privacy != "Authen" AND "Status" != "ลบ" AND "Status" != "หมดอายุ"'); 
      }else{
        $query = $this->db->query('SELECT * FROM Upload WHERE Privacy != "Private" AND "Status" != "ลบ" AND "Status" != "หมดอายุ"'); 
      }
      return $query->num_rows();
    }
    public function getPageData($page,$per_page)
    { 
      if($this->session->userdata('_success') == '')
      {
        $query = $this->db->query('SELECT * FROM Upload WHERE Privacy = "Public" ORDER BY Id_Upload DESC LIMIT '.$page.','.$per_page); 
        if($query->num_rows() > 0 ) {
          return $query->result_array();
        } else {
          return array();
        }
      }else{
        $query = $this->db->query('SELECT * FROM Upload WHERE Privacy != "Private" AND privacy != "Repository" ORDER BY Id_Upload DESC LIMIT '.$page.','.$per_page ); 
        if($query->num_rows() > 0 ) {
          return $query->result_array();
        } else {
          return array();
        }
      }
    }
    
 }
  
