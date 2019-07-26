<div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <div class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            <form method="post" id="upload_form" action="<?php echo site_url('UploadController/file_upload');?>" enctype='multipart/form-data'>
                <h1 class="display-2" style="color:#2d3436;">อัพโหลดไฟล์</h1>
                <hr>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <div>Name</div>
                      <input type="Text" class="form-control form-control-alternative" name="name" value="<?=$this->session->userdata('firstName')?> <?=$this->session->userdata('lastName')?>" required id="name" readonly>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                    <div>Topic</div>
                    <input type="text" class="form-control form-control-alternative" id="topic" name="topic" placeholder="topic" required>
                    </div>

                    <div class="form-group">
                    <tr>
                    <td>File</td>
                    <td><input type="file"  name="userfile[]" required id="image_file" accept=".png,.jpg,.jpeg,.gif,.pdf,.pptx,.docx,.xlsx" multiple></td>
                    </tr>
                    </div>

                    <div class="form-group">
                    <div>date</div>
                    <input type="text" class="form-control form-control-alternative" id="date" name="date" value="<?php echo"".date("d/m/Y") ?>" required readonly>
                    </div>

                    <div class="form-group">
                    <div>Detail</div>
                    <textarea class="form-control form-control-alternative" rows="4" id="detail" name="detail" placeholder="Write a large text here ..." required></textarea>
                    </div>

                    <script>
            </script>
                <button onclick="javascript:sweetalertclick()" type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;" value="Submit">ยืนยัน</button>
            </form>


             <script type="text/javascript">
                function sweetalertclick(){
              var name = $("#name").val();
              var topic = $("#topic").val();
              var file = $("#image_file").val();
              var date = $("#date").val();
              var detail = $("#detail").val();
                 if(name=='' || topic=='' || file=='' || date=='' || detail==''){
                    swal({
                          title: "Fail Upload",
                          text: "กรุณากรอกข้อมูลให้ครบถ้วน",
                          icon: "error",
                        });
                 }else{
                    swal({
                          title: "Upload Success",
                          text: "กรุณาคลิกปุ่ม OK เพื่อไปยังหน้าถัดไป",
                          icon: "success", 
                        });
                        
                 }
              }
            </script> 
      
            </div>
</div>