<!DOCTYPE html>
<html lang="en">
 <head>
  </head>
  <body>
  <div class="container" style="margin-top: 60px;">
    <div class="ct-example tab-content tab-example-result" style="margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <div class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            <form method="post" id="upload_form" action="<?php echo site_url('RepoController/insertrepo');?>" enctype='multipart/form-data'>
                <h1 class="display-2" style="color:#2d3436;">สร้าง Event</h1>
                <hr>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <div>ชื่อ</div>
                      <input type="Text" class="form-control form-control-alternative" name="name" value="<?=$this->session->userdata('accountName')?>" required id="name" readonly>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                    <div>หัวข้อ</div>
                    <input type="text" class="form-control form-control-alternative" id="topic" name="topic" placeholder="topic" required>
                    </div>


                    <div class="form-group">
                    <div>ใช้วันที่</div>
                    <input type="text" class="form-control form-control-alternative" id="date" name="date" value="<?php echo"".date("d/m/Y") ?>" required readonly>
                    </div>

 
                    <div class="form-group">
                    <div>รายละเอียด</div>
                    <textarea class="form-control form-control-alternative" rows="4" id="detail" name="detail"  placeholder="Write a large text here ..." required></textarea>
                    </div>

                    <div class="form-group">
                    <div>ระดับการเข้าถึงเอกสาร</div>
                    <select name="privacy" id="privacy" required>
                      <option value="" disabled selected>กรุณาเลือกระดับการเข้าถึงเอกสาร</option>
                      <option value="Authen">เฉพาะที่ผู้ที่มีรหัส</option>
                      <option value="Public">สาธารณะ</option>
                    </select>
                    </div>

                    <script>
            </script>
                <button type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;" value="Submit">ยืนยัน</button>
            </form>
</div>

              <script type="text/javascript">
                  function sweetalertclick(){
                var privacy = $("#privacy").val();
                var topic = $("#topic").val();
                var detail = $("#detail").val();
                  if(privacy ==""||topic ==""||detail ==""){
                      alert("กรุณากรอกข้อมูลให้ครบ");
                  }else{
                    swal({
                          title: "Upload Success",
                          text: "กรุณาคลิกปุ่ม OK เพื่อไปยังหน้าถัดไป",
                          icon: "success", 
                        }); 
                 }
                  }

                  </script> 
            
           
      </body>
            </div>
</div>
