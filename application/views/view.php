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
                <td>
                    <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                    
                </td>
              
            </tr>
            </tbody>
    </table>
</div>
                
                <button type="submit" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;" >ยืนยัน</button>
                
                <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Card tables</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Manage</th>
                        
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($view_data) && is_array($view_data) && count($view_data)): $i=1;
                    foreach ($view_data as $key => $data) { 
                    ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">ชื่อไฟล์ที่อัพ</span>
                        </div>
                      </div>
                    </th>
                    <td>
                    โดย ชื่อผู้อัพ
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i> pending
                      </span>
                    </td>   
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(32px, -2px, 0px);">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php } endif; ?>
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
            </form>
            </div>
  </div>
</div>







 
    

<p align="center"><a href="<?php echo site_url("/IndexController");?>"><button type="button" class="btn btn-success btn-lg" style="margin-top: 44px; margin-bottom: 44px; width:120px;">Back</button>
    
</div>