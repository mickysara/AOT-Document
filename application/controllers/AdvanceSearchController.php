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
        $name   =  $this->input->post("name_txt");

        $years1 =  $this->input->post("years1");
        $years2 =  $this->input->post("years2");


        $min = "'".$years1."-01-01'";
        $max = "'".$years2."-12-31'";

        $this->db->like('file',  $name);
        $this->db->where_between('date', $min, $max); 

            
        

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
        $count = $d->num_rows();
        $d->result_array();

        if($count == 0)
        {?>

             <h2 style="text-align: text-align: center; margin-left: auto; margin-right: auto;">ไม่พบเอกสารที่คุณต้องการค้นหา</h2>

        <?php }else{

            foreach($d->result_array() as $data)
            {?>
                <?if($d['topic'] == "null")
                {
    
                } 
                ?>
          
                <div class="col-sm" style="margin-right: auto; margin-left: auto;">
                     
                     <div class="card" style="width: 18rem; margin-top: 20px; margin-bottom: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                             <img class="card-img-top" src="<?php echo base_url('/assets/img/card/'.$data['type'].'.png');?>" alt="Card image cap">
                             <div class="card-body">
                             
                                 <h3 class="card-title" style="color: #2d3436;">ชื่อ : <?php echo $data['topic'];?> </h3>
                                 <p class="card-text" style="font-weight: 500;">รายละเอียด : <?php echo $data['detail'];?></p>
                                 <p class="card-text" style="font-weight: 500;">วันที่อัพโหลด : <?php echo $data['date'];?></p>
                                 <a href="<?php echo site_url(); ?>/DetailDocController/edit/<?php echo $data['id_upload'];?>" class="btn btn-primary" style="background-color:#2d3436;">ดูรายละเอียดเพิ่มเติม</a>
                                
                             </div>
                         </div>
                     </div> 
            
    
           <?php }
        }

    }

}

/* End of file AdvanceSearchController.php */
