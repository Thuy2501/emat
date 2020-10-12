<div class="modal-header">
    <h5 class="modal-title" id="formModal">Tài khoản : <b class="text-danger" ><?=$item['username']?></b> </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form id="modal-form-edit-account" >
      <div class="form-group">
        <label>Người dùng</label>
        <div class="input-group">
          <input required minlength="3" maxlength="100" type="text" class="form-control" placeholder="Tên người dùng" name="account-fullname" value="<?=$item['fullname']?>" >
          <input type="hidden" name="account-code" value="<?=$item['id']?>">
        </div>
      </div>
      <div class="form-group">
        <label>Mật khẩu (<i style="font-size: 11px;color:red;" >Nhập password để reset</i>) </label>
        <div class="input-group">
          <input min="6" maxlength="100" type="text" class="form-control" placeholder=">6 ký tự" name="account-password">
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
                echo '<option '.($item['role_id']==$v['id'] ? 'selected' : '' ).' value="'.$v['id'].'" >'.$v['name'].'</option>';
              }
            }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="custom-control custom-radio custom-control-inline">
          <input <?=$item['active']==1 ? 'checked' : '' ?> type="radio" id="account-1" name="account-active"
            class="custom-control-input" value="1">
          <label class="custom-control-label" for="account-1">Kích hoạt</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input <?=$item['active']==0 ? 'checked' : '' ?> type="radio" id="account-2" name="account-active"
            class="custom-control-input" value="0">
          <label class="custom-control-label" for="account-2">Hủy kích hoạt</label>
        </div>
      </div>
      
      <div id="button-submit-edit-account">
        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Lưu</button>

      </div>
    </form>
  </div>

  <script type="text/javascript">
    $('#modal-form-edit-account').on('submit',function(){ //alert('OK');
      $('#button-submit-edit-account').html('<img src="<?=$base_url['img']?>/upload/sys/loading.gif">');
      $.ajax({
        url:'<?=$base_url['web']?>/adw-account/edit-account',
        method:'post',
        //dataType:'text',
        data:$('#modal-form-edit-account').serialize(),
        success:function(r){ //console.log(r);
          location.reload();
        }
      });

      event.preventDefault();
    });
  </script>