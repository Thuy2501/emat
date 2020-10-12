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

$('#btn-save_value').click(function(){
    var arr = $('.rolegroupadd:checked').map(function(){
        return this.value;
    }).get(); //console.log(arr.length);

}); 

$('#form-submit-content').on('submit',function(){

});

  $('#form-submit-content').on('submit',function(){ //alert('OK');
    //$('#button-submit-add-role').html('<img src="'+base_url_img+'/upload/sys/loading.gif">');
    $.ajax({
      url:base_url_web+'/adw-account/add-rolegroup',
      method:'post',
      //dataType:'text',
      data:$('#form-submit-content').serialize(),
      success:function(r){ console.log(r);
        location.reload();
      }
    });

    event.preventDefault();
  });  

</script>