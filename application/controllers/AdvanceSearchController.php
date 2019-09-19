<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AdvanceSearchController extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('_success') == '')
        {
        $this->load->view('Header');
        $this->load->view('Loginalert');
        $this->load->view('Footer');
        }else{
        redirect('AdvanceSearchController/checkstatus');
        }
    }

    public function checkstatus()
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

        $uploadby = $this->input->post("Uploadby");

        $view =  $this->input->post("custom-radio-1");

        $this->db->like('File',  $name);

        if($years1 != "" && $years2 != "" )
        {
            $min = "'".$years1."-01-01'";
            $max = "'".$years2."-12-31'";
    

            $this->db->where_between('Date', $min, $max); 
        }
        if($uploadby != "")
        {
            $this->db->like('Uploadby', $uploadby); 
        }
        if($this->input->post("Public") == "on")
        {
            $this->db->like('Privacy', "Public");
            
        }
        if($this->input->post("Authen") == "on")
        {
            $this->db->like('Privacy', "Authen");
            

        }

            
        

        if($this->input->post("MicrosoftWord") == "on")
        {
            $this->db->like('Type', "MicrosoftWord");
            
            $c = 1;

        }if($this->input->post("MicrosoftPowerPoint") == "on")
        {
            if($c == 1)
            {
                $this->db->OR_like('Type', "MicrosoftPowerPoint");

            }else{

                $this->db->like('Type', "MicrosoftPowerPoint");
                $c ==1;
            }
        }if($this->input->post("MicrosoftExcel") == "on")
        {
            if($c == 1)
            {
                $this->db->OR_like('Type', "MicrosoftExcel");

            }else{

                $this->db->like('Type', "MicrosoftExcel");
                $c ==1;
            }
        }if($this->input->post("Access") == "on")
        {
            if($c == 1)
            {
                $this->db->OR_like('Type', "Access");

            }else{

                $this->db->like('Type', "Access");
                $c ==1;
            }
        }if($this->input->post("Visio") == "on")
        {
            if($c == 1)
            {
                $this->db->OR_like('Type', "Visio");

            }else{

                $this->db->like('Type', "Visio");
                $c ==1;
            }
        }
        if($this->input->post("Pdf") == "on")
        {
            if($c == 1)
            {
                $this->db->OR_like('Type', "Pdf");

            }else{

                $this->db->like('Type', "Pdf");
                $c ==1;
            }
        }
        $this->db->where('Privacy !=','Private');
        $this->db->where('Privacy !=','Repository');
        
        $d = $this->db->get('Upload');
        $count = $d->num_rows();
        $d->result_array();

        if($count == 0)
        {?>

             <h2 style="text-align: text-align: center; margin-left: auto; margin-right: auto;">ไม่พบเอกสารที่คุณต้องการค้นหา</h2>

        <?php }else{
                if($view == "Card View"){
                foreach($d->result_array() as $data)
                    {?>

                    <div class="col-sm" style="margin-right: auto; margin-left: auto;">
                    <div class="card" style="width: 18rem; height: 385.828px; margin-top: 20px; margin-bottom: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">
                            <img class="card-img-top" src="<?php echo base_url('/assets/img/card/'.$data['Type'].'.png');?>" alt="Card image cap">
                            <div class="card-body">
                                <h3 class="card-title" style="color: #2d3436;">หัวข้อ : <?php echo $data['Topic'];?> </h3>
                                <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 300px; font-weight: 500;">ชื่อไฟล์ : <?php echo $data['File'];?></p>
                                <p class="card-text" style="font-weight: 500;">วันที่อัพโหลด : <?php echo date('d/m/Y', strtotime($data['Date']));?></p>
                                <p class="card-text" style="font-weight: 500;">ความเป็นส่วนตัว : <?php echo $data['Privacy'];?></p>
                                <a href="<?php echo site_url(); ?>/DetailDocController/edit/<?php echo $data['Id_Upload'];?>" class="btn btn-primary" style="background-color:#2d3436;">ดูรายละเอียดเพิ่มเติม</a>
                                
                            </div>
                        </div>
                    </div>
                <?php }
                }
                 else{ ?>
                  <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                        <h3 class="mb-0">ตารางเอกสารทั้งหมด</h3>
                        </div>
                            <div class="table-responsive">
                                        <table class="table align-items-center table-flush" id="Filesearch">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col"><h4>ชื่อไฟล์</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">สร้างโดย</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เมื่อวันที่</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">ความเป็นส่วนตัว</h4></th>
                                                <th style="text-align:center;" scope="col"><h4 style="text-align: left;">เพิ่มเติม</h4></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php                 
                                                foreach($d->result_array() as $data)
                                                {?>
                                            <tr>
                                                <th scope="row">
                                                <div class="media align-items-center">
                                                    <a href="#" class="avatar rounded-circle mr-3">
                                                    <img src="<?php echo base_url().'assets/img/logofile/'. $data['Type']?>.png" alt="">
                                                    </a>
                                                    <div class="media-body">
                                                    <span class="mb-0 text-sm"><?php echo $data['File'];?></span>
                                                    </div>
                                                </div>
                                                </th>
                                                <td>
                                                <?php echo $data['Uploadby'];?>
                                                </td>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-success"></i> <?php echo date('d/m/Y', strtotime($data['Date']));?>
                                                </span>
                                                </td>   
                                                <td>
                                                <?php echo $data['Privacy'];?>
                                                </td>
                                                <td>
                                                <span class="badge badge-dot mr-4">
                                                <a href="<?php echo site_url(); ?>DetailDocController/edit/<?php echo  $data['Id_Upload'];?>"  class="btn btn mb-3" style="background-color: #2d3436; color: #fff;">View</a>              
                                
                                                </span>
                                                </td>  
                                            </tr>
                                            <?php } ?> 
                                            </tbody>
                                        </table>
                                        </div>
                                </div>
                            </div>

                 <?php }
            }
        }

    }



/* End of file AdvanceSearchController.php */
