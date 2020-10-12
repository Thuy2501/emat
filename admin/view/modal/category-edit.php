<div class="modal-header">
  <h5 class="modal-title" id="formModal">Edit danh mục</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <form id="modal-form-edit-category" >
    <div class="form-group">
      <label>Tên danh mục</label>
      <div class="input-group">
        <input required maxlength="200" type="text" class="form-control" placeholder="Name" name="m-category-name" value="<?=$item_category['name']?>">
        <input type="hidden" name="m-category-id" value="<?=$item_category['id']?>">
      </div>
    </div>
    <div class="form-group">
      <label>Url danh mục ([a->z-])</label>
      <div class="input-group">
        <input readonly maxlength="500" type="text" class="form-control" placeholder="Url" value="<?=$item_category['code']?>">
      </div>
    </div>
    <div class="form-group">
      <label>Thẻ tags (cách nhau dấu ,)</label>
      <div class="input-group">
        <textarea  maxlength="200" name="m-category-tags" class="form-control"><?=$item_category['tags']?></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="custom-control custom-radio custom-control-inline">
                      <input <?=$item_category['active']==1 ? 'checked' : '' ?> type="radio" id="customRadioInline1" name="m-category-active"
                        class="custom-control-input" value="1">
                      <label class="custom-control-label" for="customRadioInline1">Kích hoạt</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input <?=$item_category['active']==0 ? 'checked' : '' ?> type="radio" id="customRadioInline2" name="m-category-active"
                        class="custom-control-input" value="0">
                      <label class="custom-control-label" for="customRadioInline2">Hủy kích hoạt</label>
                    </div>
    </div>
    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Lưu</button>
  </form>
</div>

<script type="text/javascript">
  $('#modal-form-edit-category').on('submit',function(e){ //alert('OK');
    $('#url-blog-share').html('');
      $.ajax({
        url:base_url_web+'/adw-category/edit-validate',
        method:'post',
        //dataType:'json',
        data:$('#modal-form-edit-category').serialize(),
        success:function(r){ console.log(r);
          /*if(typeof r=='object'&&r['code']==200){
            $('#url-blog-share').html('<a target="_blank" href="'+r['data']+'">'+r['data']+'</a>');
            $('#op-'+r['web']).remove();
            sys_ShowError2(r.error,'success');
          }else{
            sys_ShowError2(r.error,'error');
          }*/
          location.reload();
        }
      });

      e.preventDefault();
    });
</script>