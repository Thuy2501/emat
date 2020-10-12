
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-account">Thêm mới</button>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                <thead>
                  <tr>
                    <th>Tài khoản</th>
                    <th>Người dùng</th>
                    <th>Phân quyền</th>
                    <th>Last Login</th>
                    <th>Active</th>
                    <th>TT</th>
                  </tr>
                </thead>
                <tbody id="table-body">
                  <?php 
                  if(isset($account)&&!empty($account)){ //echo $account;
                    foreach($account as $v){
                      echo '<tr id="tr-'.$v['id'].'">
                              <td>'.$v['username'].'</td>
                              <td>'.$v['fullname'].'</td>
                              <td>'.$v['role_name'].'</td>
                              <td>'.$v['date_login'].'</td>
                              <td>'.str_blog_active($v['active']).'</td>
                              <td><a href="#" onClick="openModalEdit(\''.$v['id'].'\')" class="btn btn-sm btn-primary">Edit</a></td>
                            </tr>';
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
<div class="modal fade" id="modal-add-account" tabindex="-1" role="dialog" aria-labelledby="formModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModal">Thêm tài khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="modal-form-add-account" >
          <div class="form-group">
            <label>Người dùng</label>
            <div class="input-group">
              <input required minlength="3" maxlength="100" type="text" class="form-control" placeholder="Tên người dùng" name="account-fullname">
            </div>
          </div>
          <div class="form-group">
            <label>Tên đăng nhập</label>
            <div class="input-group">
              <input required minlength="3" maxlength="100" type="text" class="form-control" placeholder="Tên đăng nhập" name="account-username">
            </div>
          </div>
          <div class="form-group">
            <label>Mật khẩu</label>
            <div class="input-group">
              <input required min="6" maxlength="100" type="text" class="form-control" placeholder=">6 ký tự" name="account-password">
            </div>
          </div>
          <div class="form-group">
            <label>Phân quyền</label>
            <div class="input-group">
              <select required name="account-role">
                <option value="" >---Chọn quyền ---</option>
                <?php 
                if(isset($role_account)&&!empty($role_account)){
                  foreach($role_account as $v){
                    echo '<option value="'.$v['id'].'" >'.$v['name'].'</option>';
                  }
                }
                ?>
              </select>
            </div>
          </div>
          
          <div id="button-submit-add-account">
            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Thêm mới</button>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-myload" tabindex="-1" role="dialog" aria-labelledby="formModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="modal-myload-content">
    </div>
  </div>
</div>