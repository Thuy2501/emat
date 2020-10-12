<div class="modal-header">
    <h5 class="modal-title" id="formModal">Nhóm quyền : <b class="text-danger" ></b> </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form id="modal-form-edit-rolegroup" >
      
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
            <td>'.func_html_rolegroupadd2($action,$v['action'],$item_action).'</td>
          </tr>';
            }
          }
          ?>
          
        </tbody>
      </table>
      <div class="form-group">
        <label>Tên nhóm quyền</label>
        <div class="input-group">
          <input required minlength="3" maxlength="100" type="text" class="form-control" placeholder="Tên người dùng" name="rolegroup-name" value="<?=$item['name']?>" >
          <input type="hidden" name="rolegroup-code" value="<?=$item['id']?>">
        </div>
      </div>
      <div class="form-group">
        <div class="custom-control custom-radio custom-control-inline">
          <input <?=isset($item['active'])&&$item['active']==1 ? 'checked' : '' ?> type="radio" id="account-1" name="rolegroup-active"
            class="custom-control-input" value="1">
          <label class="custom-control-label" for="account-1">Kích hoạt</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input <?=isset($item['active'])&&$item['active']==0 ? 'checked' : '' ?> type="radio" id="account-2" name="rolegroup-active"
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
      var dt = $('#example').DataTable( {
          "scrollY":        "300px",
          "scrollCollapse": true,
          "paging":         false,
          "ordering": false
      } );
      setTimeout(function () {
       $($.fn.dataTable.tables( true ) ).DataTable().columns.adjust().draw();
    },200);

    $('#modal-form-edit-rolegroup').on('submit',function(){ //alert('OK');
      $('#button-submit-edit-account').html('<img src="<?=$base_url['img']?>/upload/sys/loading.gif">');
      $.ajax({
        url:'<?=$base_url['web']?>/adw-account/edit-rolegroup',
        method:'post',
        //dataType:'text',
        data:$('#modal-form-edit-rolegroup').serialize(),
        success:function(r){ //console.log(r);
          location.reload();
        }
      });

      event.preventDefault();
    });
  </script>