<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

  public function _construct()
  {
      parent::_construct();
  }
    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Login');
        $this->load->view('Footer');
        echo $this->session->userdata('_success');
      
    }
    public function Login()
    {
      $username =  $this->input->post("username");
      $password =  $this->input->post("password");

      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.airportthai.co.th/v2/Authen/AuthenUser/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "username=" . $username . "&password=" . $password,
        //CURLOPT_POSTFIELDS => "username=".$username."&password=".$password,
        CURLOPT_HTTPHEADER => array(
          "Postman-Token: c3c8b2b9-146d-4a89-b633-be954b49d589",
          "cache-control: no-cache",
          "x-api-key: 0HyLnGPCibLKetyPyzZJzhfI32d3V3kC2e8FkSt4"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);
      
      curl_close($curl);
      
      if ($err) {
        echo "cURL Error #:" . $err;
      } else {

         $data = json_decode($response, 1);
        
         
         if($data['_success'] == 1)
         {

           echo json_encode(['status' => 1, 'msg' => 'Success']);
           
           $this->session->set_userdata($data);
         
           //echo $this->session->userdata('_success');
          
           
         }else{
          echo json_encode(['status' => 0, 'msg' => 'fail']);
      
          
         }
      }
    }

    public function Logout()
    {
      session_destroy();
        
      redirect('/IndexController','refresh');
    }
}

/* End of file LoginController.php */

?>