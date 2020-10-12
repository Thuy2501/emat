<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-2 col-lg-2"></div>
      <div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                    <form action="<?=$base_url['web']?>/adw-account/add-rolegroup" method="post" enctype="multipart/form-data" onsubmit="sys_preLoadSubmit()" >
                      <div class="card-body">
                        <div class="form-group">
                          <label class="my-lable">Đối tượng <span class="text-danger" title="Bắt buộc" >*</span></label>
                          <input required name="rolegroup-object" type="text" class="form-control form-control-sm" value="" >
                        </div>
                        <div class="form-group">
                          <label class="my-lable">Parent <span class="text-danger" title="Bắt buộc" >*</span></label>
                          <div class="input-group">
                              <select class="form-control" name="rolegroup-parent">
                                  <option value="0">Parent - root</option>
                                  <?php 
                                  if(isset($account)&&!empty($account)){
                                    foreach($account as $v){
                                      echo '<option value="'.$v['id'].'">Parent - '.$v['name'].'</option>';
                                    }
                                  }
                                  ?>
                              </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="my-lable">Danh sách quyền <i onClick="openModalRole()" class="text-danger fas fa-plus-circle"></i></label>
                          <div class="input-group">
                              <i id="rolegroup-noti" >Chưa có dữ liệu được chọn</i>
                              <input required type="hidden" name="rolegroup-role" value="" id="rolegroup-role">
                          </div>
                        </div>

              

                        
                      </div>
                        

                      <div class="card-footer text-right">
                        <button type="submit" name="blog-btn" class="btn btn-primary" value="<?=time()?>" >Thêm mới</button>
                      </div>

                   </form>
                </div>
            </div>
      <div class="col-12 col-md-2 col-lg-2"></div>
    </div>
  </div>
</section>

<div id="modal-add-rolegroup" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
          aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content modal-content-role-add">
      <div class="modal-header">
        <h5 class="modal-title" id="myLargeModalLabel">Chọn quyền</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="table-responsive">
          <table id="example" class="table table-striped table-hover" style="width:100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Loại quyền</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if(isset($role_list)&&!empty($role_list)){
                foreach($role_list as $k=>$v){
                  echo '<tr>
                <td>'.($k+1).'</td>
                <td>'.$v['name'].'</td>
                <td>'.func_html_rolegroupadd($action,$v['action']).'</td>
              </tr>';
                }
              }
              ?>
              
            </tbody>
          </table>
          </div>
          <div id="button-submit-add-role">
            <button id="btn-save_value" type="submit" class="btn btn-primary m-t-15 waves-effect">Lưu</button>
          </div>
      </div>
    </div>
  </div>
</div>