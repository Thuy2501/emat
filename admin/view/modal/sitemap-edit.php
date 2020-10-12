<div class="modal-header">
  <h5 class="modal-title" id="formModal">Thêm mới sitemap</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <form id="modal-form-edit-sitemap" >
    <div class="form-group">
      <label>Link</label>
      <div class="input-group">
        <input required maxlength="200" type="text" class="form-control" placeholder="Link" name="editsitemap-link" value="<?=$item[0]?>">
        <input type="hidden" name="editsitemap-key" value="<?=$item_key?>">
      </div>
    </div>
    <div class="form-group">
      <label>Trọng số (Chỉnh về 0 để xóa)</label>
      <div class="input-group">
        <input min=0 max=1 step="0.02" type="number" class="form-control" name="editsitemap-priority" value="<?=$item[2]?>">
      </div>
    </div>
    <div class="form-group">
      <label>Code sitemap</label>
      <div class="input-group">
        <textarea readonly class="form-control" rows=5 name="editsitemap-code" ><?=$item_json?></textarea>
      </div>
    </div>
    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Lưu</button>
  </form>
</div>

<script type="text/javascript">
  $('#modal-form-edit-sitemap').on('submit',function(){ //alert('OK');
    $.ajax({
      url:'<?=$base_url['web']?>/adw-seo/edit-validate',
      method:'post',
      //dataType:'text',
      data:$('#modal-form-edit-sitemap').serialize(),
      success:function(r){  //console.log(r);
        location.reload();
      }
    });

    event.preventDefault();
  });
</script>