<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdvanceSearchController extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('advanceSearch');
        $this->load->view('Footer');
    }

    public function AdvanceSearch()
    {
        $c = 0;
        $name = $this->input->post("name_txt");

        $this->db->like('file', $name);

        if($this->input->post("MicrosoftWord") == "on")
        {
            $this->db->like('type', "MicrosoftWord");
            
            $c = 1;

        }if($this->input->post("MicrosoftPowerPoint") == "on")
        {
            if($c == 1)
            {
                $this->db->OR_like('type', "MicrosoftPowerPoint");

            }else{

                $this->db->like('type', "MicrosoftPowerPoint");
                $c ==1;
            }
        }if($this->input->post("MicrosoftExcel") == "on")
        {
            if($c == 1)
            {
                $this->db->OR_like('type', "MicrosoftExcel");

            }else{

                $this->db->like('type', "MicrosoftExcel");
                $c ==1;
            }
        }if($this->input->post("Access") == "on")
        {
            if($c == 1)
            {
                $this->db->OR_like('type', "Access");

            }else{

                $this->db->like('type', "Access");
                $c ==1;
            }
        }if($this->input->post("Visio") == "on")
        {
            if($c == 1)
            {
                $this->db->OR_like('type', "Visio");

            }else{

                $this->db->like('type', "Visio");
                $c ==1;
            }
        }
        if($this->input->post("Pdf") == "on")
        {
            if($c == 1)
            {
                $this->db->OR_like('type', "Pdf");

            }else{

                $this->db->like('type', "Pdf");
                $c ==1;
            }
        }

        $d = $this->db->get('upload');
        $d->result_array();
        echo "<pre>";
        print_r($d);
        echo "</pre>";
    
    }

}

/* End of file AdvanceSearchController.php */
