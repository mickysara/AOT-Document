<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function index()
    {
        $this->load->view('test2');        
    }

    public function sendmessage($msg="")
    {

        $location = getcwd();

        require $location . '/vendor/autoload.php';

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            'fd6ef33b944c8da371ee',
            '34b7bff3eb469fdf0c6f',
            '845233',
            $options
        );

        $data['page'] = 'chat';
        $data['msg'] = $msg;
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    public function tt(){
        
        $this->db->where('Id_Message', "3");
        $query = $this->db->get('Message', 1);
        $qq = $query->row_array();
        
        
        $strDate = $qq['DateTime'];
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        echo $strDay." ".$strMonthThai." ".$strYear;
        
   
    }
    public function file()
    {
        $this->load->view('Header');
        $this->load->view('Footer');
        $this->data['view_data']= $this->LineNotify->view_datadashboard(); //Upfile คือชื่อของโมเดล
        $this->load->view('FileEdit', $this->data, FALSE);
        
        
    }
    

}