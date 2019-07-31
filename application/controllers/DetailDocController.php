<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailDocController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->helper('url');
        $this->load->model('UploadFile_Model','Upload'); 
    }  
    public function index()
    {
        $this->load->view('Header');
        // $this->data['edit_data']= $this->Upload->edit_data(); //Upfile คือชื่อของโมเดล
        // $this->load->view('DetailDoc', $this->data, FALSE);
        // $this->data['edit_data']= $this->Upload->edit_data($edit_id);
        $this->load->view('DetailDoc');
        $this->load->view('Footer');  
        


    }
    public function edit($edit_id){
        $this->data['edit_data']= $this->Upload->edit_data($edit_id);
        $this->load->view('Header');
        $this->load->view('DetailDoc', $this->data, FALSE);
        $this->load->view('Footer');
    }
    public function download($url)
    {
        $this->load->helper('download');

        $this->db->where('url',$url);
        $data = $this->db->get('upload', 1);
        
        $fileInfo = $data->result_array();

        foreach($fileInfo as $d)
        {
            echo $d['file'];

            //Path File
            $file = 'uploads/'.$d['file'];
            force_download($file, NULL);
        }
    }

}

/* End of file DetailDocController.php */
