<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DateTest_Controller extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('DateTest');
        $this->load->view('Footer');
        
        
        
    }
    public function date()
    {
        $dateget = $this->input->post('date');
        $newDate = date("Y-m-d", strtotime($dateget));
        $datenow =  date('Y-m-d');
        echo $newDate;
        if($dateget >= $datenow)
        {
            echo('หมดอายุแล้ว');
        }else{
            echo('ยังไม่หมดอายุ');
        }
    }

}

/* End of file DateTest.php */
