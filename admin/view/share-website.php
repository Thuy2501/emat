<?php include_once('layouts/zzz-head.php') ?>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/css/app.min.css">
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
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
<?php include_once('layouts/share/website.php') ?>        
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
  $('a.blog-del').on('click',function(){
    var code = $(this).attr('data-code'); 
    if(code!=''&&confirm('Bạn muốn xóa bản ghi này ?')){ //console.log(code);
      $.ajax({
        url:base_url_web+'/adw-share/remove-website',
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

  $('#modal-form-add-web').on('submit',function(){ //alert('OK');
    $.ajax({
      url:base_url_web+'/adw-share/add-validate',
      method:'post',
      dataType:'text',
      data:$('#modal-form-add-web').serialize(),
      success:function(r){
        /*console.log(r);
        if(typeof r=='object'&&r['code']==200){
          $('#table-body').append('<tr class="child"><td>123</td><td>aaaaa</td><td></td><td></td><td></td></tr>');
        }*/
        location.reload();
      }
    });

    event.preventDefault();
  });

  $('#save-stage').DataTable({
    "scrollX": true,
    "ordering": false,
    stateSave: true
  });

</script>
