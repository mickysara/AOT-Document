<div class="ct-example tab-content tab-example-result" style="width: 1000px; margin: auto; margin-top: 62px; padding: 1.25rem;
            border-radius: .25rem;
            background-color: #f7f8f9;">

  <div id="inputs-alternative-component" class="tab-pane tab-example-result fade active show" role="tabpanel" aria-labelledby="inputs-alternative-component-tab">
        <form name="login" id="login_form" method="post">
                <h1 class="display-2" style="color:#2d3436;">ระบบจัดการเอกสาร</h1>
                <hr>
                
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">ตารางเอกสารทั้งหมด</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="Filetable">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"><h4>ชื่อไฟล์</h4></th>
                    <th scope="col"><h4>สร้างโดย</h4></th>
                    <th scope="col"><h4>เมื่อวันที่</h4></th>
                    <th scope="col"><h4>จัดการ</h4></th>
                        
                    
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
                          <img alt="Image placeholder" src="../assets/img/logofile/excel1.png">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm"><?php echo $data['file'];?></span>
                        </div>
                      </div>
                    </th>
                    <td>
                    <?php echo $data['name'];?>
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i> <?php echo $data['date'];?>
                      </span>
                    </td>   
                    <td class="">
                        <div>
                            <button type="button" class="btn btn-block btn-primary mb-3" data-toggle="modal" data-target="#modal-default">Default</button>                           
                            <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                <div class="modal-content" style="color: #2d3436; height: 608px;">

                                    <div class="modal-header">
                                        <h2 class="modal-title" id="modal-title-default">ชื่อเอกสาร : </h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <p>รายละเอียด : aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa </p>
                                        <p>โดย : </p>
                                        <p>เมื่อวันที่ : </p>
                                        <p>หมดอายุ : </p>
                                        <p>สถานะ : </p>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                                    </div>
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


        






 
    


    
</div>
