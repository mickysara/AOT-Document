<div class="container">
  <div class="row mt-5" align="center">
    <div class="col">
        <div>
            <h1>ระบบค้นหาเอกสาร</h1>
        </div>
        <form name="AdSearch" id="AdSearch" method="post" action='<?php echo base_url();?>index.php/AdvanceSearchController/AdvanceSearch'>
        <div class="input-group mt-4 mb-4"  align="center">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                            </div>
                            <input class="form-control" id="searchtxt" name="name_txt" placeholder="กรุณากรอกชื่อเอกสาร" type="text">                  

        </div>
                <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input" id="NameTopic" name="NameTopic" type="checkbox">
                    <label class="custom-control-label" for="NameTopic">ค้นหาจากชื่อหัวข้อ</label>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input" id="NameFile" name="NameFile" type="checkbox">
                    <label class="custom-control-label" for="NameFile">ค้นหาจากชื่อไฟล์ที่อัพโหลด</label>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input" id="Detail" name="Detail" type="checkbox">
                    <label class="custom-control-label" for="Detail">ค้นหาจากรายละเอียด</label>
                </div>
                        <!-- <div class="custom-control custom-radio mb-3">
                        <input name="custom-radio-1" class="custom-control-input" id="customRadio1" value="Card View" type="radio">
                        <label class="custom-control-label" for="customRadio1">Card View</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                        <input name="custom-radio-1" class="custom-control-input" id="customRadio2"  value="List View" type="radio">
                        <label class="custom-control-label" for="customRadio2">List View</label>
                        </div>      -->
    </div>
    </div>
    <div style="margin: auto;  padding: 10px">
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
                <input type="number" class="form-control form-control-alternative" id="years" name="years1" placeholder="2018">
                <p class="mt-3">ถึงปี</p>
                <input type="number" class="form-control form-control-alternative" id="years" name="years2" placeholder="2019">
            </div>
        </div>
        <div class="row">
            <div class="col">
            <h2>ระดับการเข้าถึง</h2>
                <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input" id="Public" name="Public" type="checkbox">
                    <label class="custom-control-label" for="Public">Public</label>
                </div>
                <div class="custom-control custom-checkbox mb-3">
                    <input class="custom-control-input" id="Authen" name="Authen" type="checkbox">
                    <label class="custom-control-label" for="Authen">Authen</label>
                </div>
            </div>
            <div class="col">
                <h2>ชื่อผู้อัพโหลด</h2>
                <input type="text" class="form-control form-control-alternative" id="uploadby" name="Uploadby" placeholder="Example.Ex">
            </div>
        </div>
    </div>
    <div align="center">
        <button type="submit" class="btn btn-success" id="AdvanceSearch" style=" text-align: center; margin-left: auto; margin-right: auto;"> <i class="fa fa-search mr-2" aria-hidden="true"></i>เริ่มค้นหา</button>
    </div>
    </form>
    <div class="row mt-5" id="Showsearch" align="center">

  </div>
