<div class="container">
  <div class="row mt-5" align="center">
    <div class="col">
        <div>
            <h1>ระบบค้นหาเอกสาร</h1>
        </div>
        <form name="Search" id="Search" method="post">
        <div class="input-group mt-4 mb-4" style="" align="center">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                            </div>
                            <input class="form-control" id="searchtxt" name="name_txt" placeholder="กรุณากรอกชื่อเอกสาร" type="text">
                            
        </div>
        <!-- <div class="custom-control custom-radio mb-3">
                        <input name="custom-radio-1" class="custom-control-input" id="customRadio1" value="Card View" type="radio">
                        <label class="custom-control-label" for="customRadio1">Card View</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                        <input name="custom-radio-1" class="custom-control-input" id="customRadio2"  value="List View" type="radio">
                        <label class="custom-control-label" for="customRadio2">List View</label>
                        </div>      -->
        <button type="submit" class="btn btn-success mt-5 mb-5" id="AdSearch" style="width: 192px; height: 52px;"> <i class="fa fa-search mr-2" aria-hidden="true"></i>เริ่มค้นหา</button>
        </form>
        <?php
        if($this->session->userdata('_success') != "")
        {?>
           <button type="button" class="btn btn-primary btn-lg" style="width: 192px; height: 52px;" onclick="location.href='<?php echo base_url();?>AdvanceSearchController'">Advancesearch</button>
       <?php } ?>
       
                
    </div>

  </div>
  <div class="row mt-5" id="Showsearch" align="center">

  </div>
</div>