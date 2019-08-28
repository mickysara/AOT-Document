<?php  
 class Linenotify_Model extends CI_Model  
 {  
    public function LineNotify($data)
    {
        define('LINE_API',"https://notify-api.line.me/api/notify");


             $lineapi = ""; //ใส่Token ที่copy เอาไว้
            // $lineapi = "pL7Zkh47MrbJJ9a615UkObW27movggJ4O2uXxC6pFc2"; //ใส่Token ที่copy เอาไว้

            $mms =  trim($data); // ข้อความที่ต้องการส่ง
            date_default_timezone_set("Asia/Bangkok");
            $chOne = curl_init();
            curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
            // SSL USE
            curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
            //POST
            curl_setopt($chOne, CURLOPT_POST, 1);
            curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=$mms");
            //curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
            $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'', );
            curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($chOne);
            //Check error
            if(curl_error($chOne))
            {
                echo 'error:' . curl_error($chOne);
            }
            else {
            //$result_ = json_decode($result, true);
            echo json_encode(['status' => 1, 'msg' => 'yes']);
            //echo "status : ".$result_['status']; echo "message : ". $result_['message'];
            }
            curl_close($chOne);
        }


        public function insert_Linenotify($data)
    { 
        $status = "ยังไม่ได้รับการแก้ไข";
        $dateshow = date("Y/m/d");
        $insert = $data;
        $arraystate = (explode("/",$data));
        $fill_user = array(
          'notify' => $arraystate[0],
          'name' => $arraystate[1],
          'email' => $arraystate[2],
          'tel' => $arraystate[3],
          'date' => $dateshow,
          'status' => $status
        );

      $this->db->insert('linenotify', $fill_user); 
        } 
      
        public function view_data(){
          $query=$this->db->query("SELECT *
                                   FROM linenotify  
                                   ORDER BY linenotify.id_linenoti DESC
                                   limit 6");
          return $query->result_array();
      }

      public function view_datadashboard(){
        $query=$this->db->query("SELECT *
                                 FROM linenotify  
                                 ORDER BY linenotify.id_linenoti DESC
                                 limit 1");
        return $query->result_array();
    }

      public function delete_data($id){
        $this->db->query("DELETE FROM linenotify WHERE id_linenoti = $id");
        
      }

      public function edit_linenotify($inputdata){
        $data = array(
          'notify' => $inputdata["probem"],
          'name' => $inputdata["Name"],
          'email' => $inputdata["email"],
          'tel' => $inputdata["tel"],
          'status' => $inputdata['status']
      );
        $this->db->where('id_linenoti', $this->input->post('id_linenoti'));
        $query=$this->db->update('linenotify',$data);
      }
    
      public function edit_data($id){
        $query=$this->db->query("SELECT *
                                 FROM linenotify
                                 WHERE linenotify.id_linenoti = $id");
        return $query->result_array();
    }
  
    
  
    

      
  
    
  }