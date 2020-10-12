<div class="modal-header">
<h5 class="modal-title" id="formModal">Share bài viết: <strong class="text-danger"><?=$blog_code?></strong></h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
  <form id="modal-form-blog-share" >
    <input type="hidden" name="blog-code" value="<?=$blog_code?>">
    <div class="form-group">
      <select required  name="web-code" class="form-control select2" style="width:100% !important;">
        <option value="">Chọn domain</option>
        <?php  
        if(isset($item)&&!empty($item)){
          foreach($item as $v){
            echo '<option id="op-'.$v['code'].'" value="'.$v['code'].'">'.$v['domain'].'</option>';
          }
        }
        ?>
      </select>
    </div>
    <!-- <div class="form-group">
      <label>Mô tả</label>
      <div class="input-group">
        <textarea  maxlength="200" name="web-description" class="form-control"></textarea>
      </div>
    </div> -->
    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Share</button>
  </form>
  <hr>
      <label>Đường dẫn share : </label>
      <div id="url-blog-share">
        
      </div>
</div>

<script type="text/javascript">
  $('#modal-form-blog-share').on('submit',function(e){ //alert('OK');
    $('#url-blog-share').html('');
      $.ajax({
        url:base_url_web+'/adw-blog/add-share',
        method:'post',
        dataType:'json',
        data:$('#modal-form-blog-share').serialize(),
        success:function(r){ //console.log(r);
          if(typeof r=='object'&&r['code']==200){
            $('#url-blog-share').html('<a target="_blank" href="'+r['data']+'">'+r['data']+'</a>');
            $('#op-'+r['web']).remove();
            sys_ShowError2(r.error,'success');
          }else{
            sys_ShowError2(r.error,'error');
          }
        }
      });

      e.preventDefault();
    });
</script>