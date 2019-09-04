<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewAllController extends CI_Controller {

    public $PAGE;
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
		$this->load->model('UploadFile_model');
	
	}
	public function Viewdata()
	{
		$per_page = 9;
		$page = ($this->uri->segment(3) != '')?$this->uri->segment(3):0; // เลขหน้าที่จะถูกส่งมาเช่น home/member/3
        $this->load->library('pagination'); // โหลด pagination library
        $config['attributes'] = array('class' => 'page-link');
		$config['base_url'] = base_url("ViewAllController/Viewdata"); // ชี้หน้าเพจหลักที่จะใช้งานมาที่ home/member
		$config['total_rows'] = $this->UploadFile_model->getAllData(); // จำนวนข้อมูลทั้งหมด
		$config['per_page'] = $per_page; // จำนวนข้อมูลต่อหน้า
		
		$config['use_page_numbers'] = TRUE; // เพื่อให้เลขหน้าในลิงค์ถูกต้อง ให้เซตค่าส่วนนี้เป็น TRUE
		$config['full_tag_open'] = '<ul class="pagination mt-5" >';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = ' <i class="fa fa-angle-right"></i> <span class="sr-only">Next</span>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#"><span class="sr-only">(current)</span>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$this->PAGE['member_list'] = $this->UploadFile_model->getPageData($page,$per_page); // รายชื่อสมาชิกที่จะนำไปแสดงในหน้านั้น
        $this->PAGE['pagination'] = $this->pagination->create_links(); // เลขหน้า
        $this->load->view('Header');
        $this->load->view('ViewAll',$this->PAGE); // ส่งข้อมูลออกไปที่ member_veiw
        $this->load->view('Footer');
        
	}

}

/* End of file ViewAllController.php */
