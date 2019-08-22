<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FileController extends CI_Controller {

    public function index()
    {
        $this->load->view('HeaderAdmin');
        $this->load->view('Footer');
        $this->load->view('File');
        
        
    }

}

/* End of file IndexController.php */

?>