<?php
class Upload_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    

    public function upload_image($inputdata,$filename)
    {
        $addurl = ''.random_string('alnum',30).br();
        $addbaseurl = ($addurl);
        
        // echo $addbaseurl;
        $fill_user = array(
          'name' => $inputdata['name'],
          'url'=> $addbaseurl
        );
        
      $this->db->insert('user', $fill_user); 

      $insert_id = $this->db->insert_id();
      if($filename!='' ){
      $filename1 = explode(',',$filename);
      foreach($filename1 as $file){
      $file_data = array(
      'image' => $file,
      'user_id' => $insert_id
      );
      $this->db->insert('photos', $file_data);
      }
      }
    }

    public function view_data(){
        $query=$this->db->query("SELECT ud.*
                                 FROM user ud 
                                 ORDER BY ud.u_id DESC");
        return $query->result_array();
    }
    

    public function edit_data($id){
        $query=$this->db->query("SELECT ud.*
                                 FROM user ud 
                                 WHERE ud.u_id = $id");
        return $query->result_array();
    }

    public function edit_data_image($id){
        $query=$this->db->query("SELECT photo.*
                                 FROM user ud 
                                 RIGHT JOIN photos as photo
                                 ON ud.u_id = photo.user_id 
                                 WHERE ud.u_id = $id");
        return $query->result_array();
    }

    public function edit_upload_image($user_id,$inputdata,$filename ='')
    {

        $data = array('name'                   => $inputdata['name'],
                      'url'                  => $inputdata['url']);
        $this->db->where('u_id', $user_id);
        $this->db->update('user', $data);

      if($filename!='' ){
      $filename1 = explode(',',$filename);
      foreach($filename1 as $file){
      $file_data = array(
      'image' => $file,
      'user_id' => $user_id
      );
      $this->db->insert('photos', $file_data);
      }
      }
    }

}