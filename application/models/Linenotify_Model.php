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
          'Detail' => $arraystate[0],
          'AccName' => $arraystate[1],
          'Email' => $arraystate[2],
          'Tel' => $arraystate[3],
          'Date' => $dateshow,
          'Status' => $status
        );

      $this->db->insert('Problem', $fill_user); 
        } 
      
        public function view_data(){
          $query=$this->db->query("SELECT *
                                   FROM Problem  
                                   ORDER BY Problem.Id_Problem DESC
                                   limit 6");
          return $query->result_array();
      }

      public function view_datadashboard(){
        $query=$this->db->query("SELECT *
                                 FROM Problem  
                                 ORDER BY Problem.Id_Problem DESC
                                 limit 1");
        return $query->result_array();
    }

      public function delete_data($id){
        $this->db->query("DELETE FROM Problem WHERE Id_Problem = $id");
        
      }

      public function edit_linenotify($inputdata){
        $data = array(
          'Detail' => $inputdata["probem"],
          'AccName' => $inputdata["Name"],
          'Email' => $inputdata["email"],
          'Tel' => $inputdata["tel"],
          'Status' => $inputdata['status']
      );
        $this->db->where('Id_Problem', $this->input->post('Id_Problem'));
        $query=$this->db->update('Problem',$data);
      }
    
      public function edit_data($id){
        $query=$this->db->query("SELECT *
                                 FROM Problem
                                 WHERE Problem.Id_Problem = $id");
        return $query->result_array();
    }
  
    
  
    

      
  
    
  }