<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Repository_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function repository_data($id){
        $query=$this->db->query("SELECT *
                                 FROM Repository
                                 WHERE Repository.Id_Repository = $id");
        return $query->result_array();
    }

    
    public function repository_view($id){
        $query=$this->db->query("SELECT *
                                 FROM Repository repoid
                                 WHERE repoid.Id_Repository = $id");
        return $query->result_array();
    }

    public function upload_file($inputdata,$filename)
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
    
            $repostr = base_url(uri_string());
             //$repostr = site_url('/UploadFileRepoController/uploadfilerepo/'.$nono);
            $arraystate2 = (explode("/",$repostr));
            $idRepo = ($arraystate2[5]);

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
              'Id_Repository'=> $idRepo,
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
            
          $this->db->insert('UploadInRepository', $fill_user); 
          
          
    
            } 
          }
         
        }
      public function edit_repo($id){
        $query=$this->db->query("SELECT *
                                 FROM Repository 
                                 WHERE Id_Repository = $id");
        return $query->result_array();
    }


    public function editdata_repo($inputdata){
      $dateshow = date("Y/m/d");
       $data = array(
        'Createby' => $inputdata['name'],
        'Topic' => $inputdata['topic'],
        'Date'=> $dateshow,
        'Detail' => $inputdata['detail'],
        'Privacy' => $inputdata['privacy']
    );
    $this->db->where('Id_Repository', $this->input->post('Id_Repository'));
    $query=$this->db->update('Repository',$data);
    }

    public function delete_repo($id){
      $this->db->query("DELETE FROM Repository WHERE Id_Repository = $id");
      
    }
    
}

/* End of file repository_model.php */
