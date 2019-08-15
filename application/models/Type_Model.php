<?php
class Type_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function upload_type($inputdata,$filename)
    { 
            if($filename!='' ){
            $filename1 = explode(',',$filename);
            foreach($filename1 as $file){

        $fill_user = array(
          'typename' => $inputdata['nametype'],
          'image' => $file
        );
        
      $this->db->insert('typeinsert', $fill_user); 
      


        } 
      }
     
    }
    public function view_type(){
      $query=$this->db->query("SELECT *
                               FROM typeinsert  
                               ORDER BY typeinsert.id_type
                               ");
      return $query->result_array();
  }

  public function delete_data($id){
    $this->db->query("DELETE FROM typeinsert WHERE id_type = $id");
    
  }



  public function edit_type($inputdata,$filename){

    if($filename!='' ){
      $filename1 = explode(',',$filename);
      foreach($filename1 as $file){

    $data = array(
    'typename' => $inputdata['nametype'],
    'image' => $file
  );
    $this->db->where('id_type', $this->input->post('id_type'));
    $query=$this->db->update('typeinsert',$data);

      }
    }
  }


  public function edit_data($id){
    $query=$this->db->query("SELECT *
                             FROM typeinsert
                             WHERE typeinsert.id_type = $id");
    return $query->result_array();
}
}