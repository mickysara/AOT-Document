<div class="container">
  <div class="row mt-5" align="center">
    <div class="col">
        <div>
            <h1>ระบบค้นหาเอกสาร</h1>
        </div>
        <div class="input-group mt-4 mb-4" style="" align="center">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                            </div>
                            <input class="form-control" id="searchtxt" placeholder="กรุณากรอกชื่อเอกสาร" type="text">
                            
        </div>
        <button type="button" class="btn btn-success" id="Search" style="width: 192px; height: 52px;"> <i class="fa fa-search mr-2" aria-hidden="true"></i>เริ่มค้นหา</button>
        <button type="button" class="btn btn-primary btn-lg" style="width: 192px; height: 52px;" onclick="location.href='<?php echo base_url();?>AdvanceSearchController'">Advancesearch</button>
                
    </div>

  </div>
  <div class="row mt-5" id="Showsearch" align="center">

  </div>
</div>