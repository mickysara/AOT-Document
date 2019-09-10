<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Repository_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function repository_data($id){
        $query=$this->db->query("SELECT *
                                 FROM repository
                                 WHERE repository.id = $id");
        return $query->result_array();
    }

    
    public function repository_view($id){
        $query=$this->db->query("SELECT repoid.*
                                 FROM repository repoid
                                 WHERE repoid.id = $id");
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
            $idRepo = ($arraystate2[6]);

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
            
    
            $fill_user = array(
              'id_repository'=> $idRepo,
              'uploadby' => $inputdata['name'],
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
}

/* End of file repository_model.php */
