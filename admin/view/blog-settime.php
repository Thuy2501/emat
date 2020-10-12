<?php include_once('layouts/zzz-head.php') ?>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/css/app.min.css">
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/css/style.css">
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/css/custom.css">

  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/mylibs/css/main.css">

  <style type="text/css">
    .form-group{
      margin-bottom:10px;
    }
  </style>
  
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include_once('layouts/zzz-top.php') ?>
      <div class="main-sidebar sidebar-style-2">
      <?php include_once('layouts/zzz-sidebar.php') ?>        
      </div>
      <!-- Main Content -->
      <div class="main-content">
<?php include_once('layouts/blog/blog-settime-list.php') ?>        
<?php include_once('layouts/zzz-setting.php') ?>        
      </div>
<?php include_once('layouts/zzz-footer.php') ?>      
    </div>
  </div>
  <script src="<?=$base_url['lib']?>/public/admin/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="<?=$base_url['lib']?>/public/admin/assets/bundles/datatables/datatables.min.js"></script>
  <script src="<?=$base_url['lib']?>/public/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?=$base_url['lib']?>/public/admin/assets/bundles/jquery-ui/jquery-ui.min.js"></script>

  <script src="<?=$base_url['lib']?>/public/admin/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>

  <script src="<?=$base_url['lib']?>/public/admin/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <!-- Template JS File -->
  <script src="<?=$base_url['lib']?>/public/admin/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?=$base_url['lib']?>/public/admin/assets/js/custom.js"></script>

  <script src="<?=$base_url['lib']?>/public/mylibs/js/notify.min.js" type="text/javascript"></script>
  <script src="<?=$base_url['lib']?>/public/mylibs/js/sys.js" type="text/javascript"></script>

</body>


</html>

<script type="text/javascript">
  const base_url_web = '<?=$base_url['web']?>';

  $('#save-stage').DataTable({
    "scrollX": true,
    "ordering": false,
    stateSave: true
  });



  $('a.blog-del').on('click',function(){
    var code = $(this).attr('data-code'); 
    if(code!=''&&confirm('Bạn muốn xóa bản ghi này ?')){ //console.log(code);
      $.ajax({
        url:base_url_web+'/adw-blog/settime-remove',
        method:'post',
        data:{ code:code },
        dataType:'json',
        success:function(data){ //console.log(data);
          $('#tr-'+code).remove();
          if(data.code=='200'){
            sys_ShowError2(data.msg);
          }else{
            sys_ShowError2(data.msg,'error');
          }
        }
      });
    }
  });

  $('a.blog-up').on('click',function(){
    var code = $(this).attr('data-code'); 
    if(code!=''&&confirm('Bạn muốn up bài viết này ?')){ //console.log(code);
      $.ajax({
        url:base_url_web+'/adw-blog/settime-up',
        method:'post',
        data:{ code:code },
        dataType:'json',
        success:function(data){ //console.log(data);
          $('#tr-'+code).remove();
          if(data.code=='200'){
            sys_ShowError2(data.msg);
          }else{
            sys_ShowError2(data.msg,'error');
          }
        }
      });
    }
  });

  /*$(".datepicker").daterangepicker({
        locale: { format: "YYYY-MM-DD" },
        singleDatePicker: true
      });*/
  function openModalEditUp(d){
    $('#modal-edit-blog-up').modal();
    $('.modal-content-edit-blog-up').empty();
    if(d!=''){
      let data = d.split('=');
      var time = data[0].split(' ');
      var html = '';
      for(var i=0;i<24;i++){
        if(i<10){
          html += '<option '+(time[1]=='0'+i+':00:00' ? 'selected' : '' )+' value="0'+i+':00:00" >0'+i+':00</option>';
        }else{
          html += '<option '+(time[1]==i+':00:00' ? 'selected' : '' )+' value="'+i+':00:00" >'+i+':00</option>';
        }
      }
      $('.modal-content-edit-blog-up').html('<div class="modal-header"> <h5 class="modal-title">Code Edit: <b class="text-danger">'+data[1]+'</b></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div><div class="modal-body"> <form onsubmit="editSettime()" id="modal-form-edit-settime" > <div class="row"> <div class="col-md-6"> <input name="blog-settime-day" type="text" class="form-control datepicker" value="'+time[0]+'"> </div><div class="input-group col-md-6"> <select name="blog-settime-hour" class="form-control">'+html+'</select> </div></div><input type="hidden" name="blog-settime-code" value="'+data[1]+'"><button type="submit" class="btn btn-primary m-t-15 waves-effect">Lưu</button> </form> </div>');
      $(".datepicker").daterangepicker({
        locale: { format: "YYYY-MM-DD" },
        singleDatePicker: true
      });
    }
  }
</script>

<div class="modal fade" id="modal-edit-blog-up" tabindex="-1" role="dialog" aria-labelledby="formModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-content-edit-blog-up">
      
    </div>
  </div>
</div>

<script type="text/javascript">

    function editSettime(){ //console.log('OK');

      $.ajax({
        url:base_url_web+'/adw-blog/edit-share',
        method:'post',
        dataType:'json',
        data:$('#modal-form-edit-settime').serialize(),
        success:function(r){ console.log(r);
          if(typeof r=='object'&&r['code']==200){
            $('#td-'+r['id']).text(r['data']);
            sys_ShowError2(r.error,'success');
            $('#modal-edit-blog-up').modal('hide');
            $('.modal-content-edit-blog-up').empty();
          }else{
            sys_ShowError2(r.error,'error');
          }
        }
      });

      event.preventDefault();
    }
</script>
