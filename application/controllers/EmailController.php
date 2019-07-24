<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class EmailController extends CI_Controller{

    function  __construct(){
        parent::__construct();
        $this->load->helper('url'); //Loading url helper  
        
    }
    
    function send(){
 
   
        $this->load->library('ciqrcode');
        $this->load->library('image_lib');
        
        $this->db->select('*');
        $this->db->where('id_upload', '31');
        $data = $this->db->get('upload');
        foreach($data->result_array() as $d)
        {
        
        $urlfile = 'uploads/';
        $namefile = $d['file'];
        $loadfile = $urlfile.$namefile;
        
 
        
        
        
        $params['data'] = base_url ().$loadfile;
        $params['level'] = 'H';
        $params['size'] = 50;
        $params['savename'] = FCPATH.'asd.png';
        $this->ciqrcode->generate($params);
        
        echo '<img src="'.base_url().'asd.png" style="width: 250px; height: 250px;" />';

        $config['source_image'] = './asd.png';
        $config['image_library'] = 'gd2';
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = './AOT.jpg';//the overlay image
        $config['wm_x_transp'] = 115;
        $config['wm_y_transp'] = 83.25;
        $config['width'] = 50;
        $config['height'] = 50;
        $config['padding'] = 50;
        $config['wm_opacity'] = 100;
        $config['wm_vrt_alignment'] = 'middle';
        $config['wm_hor_alignment'] = 'center';
        
        $this->image_lib->initialize($config);
        if (!$this->image_lib->watermark()) {
            $response['wm_errors'] = $this->image_lib->display_errors();
            $response['wm_status'] = 'error';
        } else {
            $response['wm_status'] = 'success';
        }
        echo json_encode($response);
    }
        
    
    }
}
