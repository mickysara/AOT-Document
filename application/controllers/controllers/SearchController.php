<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchController extends CI_Controller {

    public function index()
    {
        $this->load->view('Header');
        $this->load->view('Search');
        $this->load->view('Footer');
        
        
        
    }
    public function serach($file_name)
    {
        $this->load->model('UploadFile_Model');
        $result = $this->UploadFile_Model->searchFile($file_name);
        foreach($result as $data)
        {?>

      
                <div class="col-sm" style="margin-right: auto; margin-left: auto;">
                 
                 <div class="card" style="width: 18rem; height: 385.828px; margin-top: 20px; margin-bottom: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                         <img class="card-img-top" src="<?php echo base_url('/assets/img/card/'.$data['type'].'.png');?>" alt="Card image cap">
                         <div class="card-body">
                         
                             <h3 class="card-title" style="color: #2d3436;">หัวข้อ : <?php echo $data['topic'];?> </h3>
                             <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px; font-weight: 500;">ชื่อไฟล์ : <?php echo $data['file'];?></p>
                             <p class="card-text" style="font-weight: 500;">วันที่อัพโหลด : <?php echo $data['date'];?></p>
                             <a href="<?php echo site_url(); ?>/DetailDocController/edit/<?php echo $data['id_upload'];?>" class="btn btn-primary" style="margin-top: 30px; background-color:#2d3436;">ดูรายละเอียดเพิ่มเติม</a>
                            
                         </div>
                     </div>
                 </div>
        

       <?php }
        
    }

}

/* End of file SearchController.php */