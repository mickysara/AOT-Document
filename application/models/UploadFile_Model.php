<?php
class UploadFile_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function upload_image($inputdata,$filename)
    {
        $addurl = ''.random_string('alnum',30);
        $addbaseurl = ($addurl);
        $dateshow = date("Y/m/d");
        $insert_id = $this->db->insert_id();
        if($filename!='' ){
        $filename1 = explode(',',$filename);
        foreach($filename1 as $file){
          $str = $file;
          $arraystate = (explode(".",$str));
          echo ($arraystate[1]);
        
        $fill_user = array(
          'name' => $inputdata['name'],
          'topic' => $inputdata['topic'],
          'detail' => $inputdata['detail'],
          'url'=> $addbaseurl,
          'file' => $file,
          'date'=> $dateshow, 
          'type'=> $arraystate[1]
        );
        
      $this->db->insert('upload', $fill_user); 
        } 
      }
     
    }
    public function view_data(){
      $query=$this->db->query("SELECT upid.*
                               FROM upload upid 
                               ORDER BY upid.id_upload DESC");
      return $query->result_array();
  }

  public function edit_data($id){
    $query=$this->db->query("SELECT upid.*
                             FROM upload upid
                             WHERE upid.id_upload = $id");
    return $query->result_array();
}
    


}