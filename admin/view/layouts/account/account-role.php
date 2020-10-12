
<section class="section">
  <div class="section-body">
<div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="col-6">
              <h4>Danh sách</h4>
            </div>
            <div class="col-6 text-right">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add-action">Thêm Action</button> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-class">Thêm Class</button> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-add-role">Thêm Role</button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                <thead>
                  <tr>
                    <th>Loại Quyền</th>
                    <th>Code</th>
                     <th>Action</th>
                    <th>Active</th>
                    <th>TT</th>
                  </tr>
                </thead>
                <tbody id="table-body">
                  <?php 
                  if(isset($role_list)&&!empty($role_list)){ //echo $role_list;
                    foreach($role_list as $v){
                      if($v['parent']==0){
                        echo '<tr class="text-danger" id="tr-'.$v['id'].'">
                                <td title="'.$v['name'].'" >'.str_trimText($v['name'],50).'</td>
                                <td>'.$v['code'].'</td>
                                <td>'.$v['action_name'].'</td>
                                <td>'.str_blog_active($v['active']).'</td>
                                <td><a href="#" onClick="openModalEdit(\''.$v['id'].'\')" class="btn btn-sm btn-primary">Edit</a></td>
                              </tr>';
                            }else{
                              echo '<tr id="tr-'.$v['id'].'">
                                <td title="'.$v['name'].'" >'.str_trimText($v['name'],50).'</td>
                                <td>'.$v['code'].'</td>
                                <td>'.$v['action_name'].'</td>
                                <td>'.str_blog_active($v['active']).'</td>
                                <td><a href="#" onClick="openModalEdit(\''.$v['id'].'\')" class="btn btn-sm btn-primary">Edit</a></td>
                              </tr>';
                            }
                    }
                  }
                  ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal with form -->
<div class="modal fade" id="modal-add-class" tabindex="-1" role="dialog" aria-labelledby="formModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModal">Thêm mới Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="modal-form-add-class" >
          <div class="form-group">
            <label>Loại quyền</label>
            <div class="input-group">
              <input required maxlength="100" type="text" class="form-control" placeholder="Tên quyền" name="role-name">
            </div>
          </div>
          <div class="form-group">
            <label>Parent (Class)</label>
            <div class="input-group">
              <select class="form-control" name="role-parent">
                <option value="">Parent - 0</option>
                <?php 
                if(isset($roles)&&!empty($roles)){
                  foreach($roles as $v){
                    if($v['parent']==0){
                      echo '<option value="'.$v['code'].'-'.$v['id'].'">Parent - '.$v['name'].'</option>';
                    }
                  }
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label>Tên Class <small>(Không dấu, viết liền)</small></label>
            <div class="input-group">
              <input required maxlength="50" type="text" class="form-control" placeholder="Code" name="role-code">
            </div>
          </div>
          
          <div id="button-submit-add-class">
            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Thêm mới</button>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal with form -->
<div class="modal fade" id="modal-add-action" tabindex="-1" role="dialog" aria-labelledby="formModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModal">Thêm mới Action</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="modal-form-add-action" >
          <div class="form-group">
            <label>Loại action</label>
            <div class="input-group">
              <input required maxlength="100" type="text" class="form-control" placeholder="Tên action" name="action-name">
            </div>
          </div>
          <div class="form-group">
            <label>Tên Action <small>(Không dấu, viết liền)</small></label>
            <div class="input-group">
              <input required maxlength="50" type="text" class="form-control" placeholder="Code" name="action-code">
            </div>
          </div>
          <div id="button-submit-add-action">
            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Thêm mới</button>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-add-role" tabindex="-1" role="dialog" aria-labelledby="formModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModal">Thêm mới Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="modal-form-add-role" >
          <div class="form-group">
            <label>Chọn Class</label>
            <div class="input-group">
              <select required class="form-control" name="roleadd-class">
                <option value="">--- Chọn class ---</option>
                <?php 
                if(isset($roles)&&!empty($roles)){
                  foreach($roles as $v){
                    if($v['parent']==0){
                      echo '<option value="'.$v['id'].'">P - '.$v['name'].'</option>';
                    }else{
                      echo '<option value="'.$v['id'].'">C - '.$v['name'].'</option>';
                    }
                  }
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <label>Chọn Action</label>
            <div class="input-group">
              <?php 
              if(isset($action)&&!empty($action)){
                foreach($action as $k=>$v){
                  echo '<div class="custom-control custom-radio custom-control-inline">
                          <input type="checkbox" id="blog-'.$k.'" name="roleadd-action[]" class="custom-control-input" value="'.$v['id'].'">
                          <label class="custom-control-label" for="blog-'.$k.'">'.$v['name'].'</label>
                        </div>';
                }
              }
              ?>
                      
            </div>
          </div>
          <div id="button-submit-add-role">
            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Thêm mới</button>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-edit-website" tabindex="-1" role="dialog" aria-labelledby="formModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-content-edit-category">
    </div>
  </div>
</div>