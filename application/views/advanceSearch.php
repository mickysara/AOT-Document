<div class="container">
  <div class="row mt-5" align="center">
    <div class="col">
        <div>
            <h1>ระบบค้นหาเอกสาร</h1>
        </div>
        <form name="AdSearch" id="AdSearch" method="post" action='<?php echo base_url();?>index.php/AdvanceSearchController/AdvanceSearch'>
        <div class="input-group mt-4 mb-4" style="width: 800px;" align="center">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                            </div>
                            <input class="form-control" id="searchtxt" name="name_txt" placeholder="กรุณากรอกชื่อเอกสาร" type="text">   

        </div>
    </div>
    </div>
    <div style="margin: auto; width: 800px; padding: 10px">
        <div class="row">
            <div class="col">
            <h2>ประเภทไฟล์</h2>
                <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input" id="MicrosoftWord" name="MicrosoftWord" type="checkbox">
                    <label class="custom-control-label" for="MicrosoftWord">MicrosoftWord</label>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input" id="MicrosoftPowerPoint" name="MicrosoftPowerPoint" type="checkbox">
                    <label class="custom-control-label" for="MicrosoftPowerPoint">MicrosoftPowerPoint</label>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input" id="MicrosoftExcel" name="MicrosoftExcel" type="checkbox">
                    <label class="custom-control-label" for="MicrosoftExcel">MicrosoftExcel</label>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input" id="Access" name="Access" type="checkbox">
                    <label class="custom-control-label" for="Access">Access</label>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input" id="Visio" name="Visio" type="checkbox">
                    <label class="custom-control-label" for="Visio">Visio</label>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input" id="Pdf" name="Pdf" type="checkbox">
                    <label class="custom-control-label" for="Pdf">Pdf</label>
                </div>
            </div>
            <div class="col">
                <h2>ปีที่อัพโหลด</h2>
                <p>ระหว่าง ปี </p>
                <input type="number" class="form-control form-control-alternative" id="years" name="years1" placeholder="2560">
                <p class="mt-3">ถึงปี</p>
                <input type="number" class="form-control form-control-alternative" id="years" name="years2" placeholder="2562">
                
            </div>
        </div>
    </div>
    <div align="center">
        <button type="submit" class="btn btn-success" id="AdvanceSearch" style="width: 600px; text-align: center; margin-left: auto; margin-right: auto;"> <i class="fa fa-search mr-2" aria-hidden="true"></i>เริ่มค้นหา</button>
    </div>
    </form>
    <div class="row mt-5" id="Showsearch" align="center">

  </div>
</div>