<div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

  <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
            <form name="login" id="login_form" method="post">
                <h1 class="display-2" style="color:#2d3436;">ระบบจัดการเอกสาร</h1>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                    <div class="table-responsive">
         <div>
      <table class="table align-items-center table-dark">
        <thead class="thead-dark">
            <tr>
                <th scope="col">
                    S.No
                </th>
                <th scope="col">
                    Name
                </th>
                <th scope="col">
                    Class
                </th>
                <th scope="col">
                    Manage
                </th>
                
            </tr>
        </thead>
        <tbody class="list">
            <?php
            if(isset($view_data) && is_array($view_data) && count($view_data)): $i=1;
            foreach ($view_data as $key => $data) { 
            ?>

            <tr>
                <th scope="row" class="S.No">
                    <div class="media align-items-center">
                      <?php echo $i++ ?>
                    </div>
                </th>
                <td class="Name">
                      <?php echo $data['name']; ?>
                </td>
                <td class="Class">
                    <?php echo $data['url']; ?>
                </td>
                <td class="">
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </td>
                <?php } endif; ?>
            </tr>
            </tbody>
    </table>
</div>
                
                <button type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;" >ยืนยัน</button>
                
                
            </form>
            </div>
  </div>
</div>






 
    

<p align="center"><a href="<?php echo site_url("/IndexController");?>"><button type="button" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;">Back</button>
    
</div>