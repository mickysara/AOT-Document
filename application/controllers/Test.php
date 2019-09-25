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

    public function tt()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
     
        $ip = explode(',',$ipaddress);

       echo $ip[0];

        
    }

}