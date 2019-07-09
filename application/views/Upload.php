<div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

            <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            <form name="login" id="login_form" method="post" action="<?php echo site_url('UploadController/file_upload');?>" enctype='multipart/form-data'>
                <h1 class="display-2" style="color:#2d3436;">อัพโหลดไฟล์</h1>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <div>Name</div>
                      <input type="Text" class="form-control form-control-alternative" name="name" placeholder="name" required id="name">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                    <!-- <div>Password</div>
                    <input type="password" class="form-control form-control-alternative" id="password" name="password" placeholder="Password" required>
                    </div>
                  </div> -->
                    <tr>
                    <td>File</td>
                    <td><input type="file"  name="userfile[]" required id="image_file" accept=".png,.jpg,.jpeg,.gif,.pdf,.pptx,.docx" multiple></td>
                    </tr>
                    </div>
                <button type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;" value="Submit" >ยืนยัน</button>
                
                
            </form>
            </div>
            </div>

            
            
</div>