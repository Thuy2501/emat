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
<?php include_once('layouts/account/account-role.php') ?>        
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
  const base_url_img = '<?=$base_url['img']?>';

  $('#modal-form-add-class').on('submit',function(){ //alert('OK');
    $('#button-submit-add-class').html('<img src="'+base_url_img+'/upload/sys/loading.gif">');
    $.ajax({
      url:base_url_web+'/adw-account/add-class',
      method:'post',
      //dataType:'text',
      data:$('#modal-form-add-class').serialize(),
      success:function(r){ //console.log(r);
        location.reload();
      }
    });

    event.preventDefault();
  });

  $('#modal-form-add-action').on('submit',function(){ //alert('OK');
    $('#button-submit-add-action').html('<img src="'+base_url_img+'/upload/sys/loading.gif">');
    $.ajax({
      url:base_url_web+'/adw-account/add-action',
      method:'post',
      //dataType:'text',
      data:$('#modal-form-add-action').serialize(),
      success:function(r){ //console.log(r);
        location.reload();
      }
    });

    event.preventDefault();
  });

  $('#modal-form-add-role').on('submit',function(){ //alert('OK');
    $('#button-submit-add-role').html('<img src="'+base_url_img+'/upload/sys/loading.gif">');
    $.ajax({
      url:base_url_web+'/adw-account/add-role',
      method:'post',
      //dataType:'text',
      data:$('#modal-form-add-role').serialize(),
      success:function(r){ console.log(r);
        location.reload();
      }
    });

    event.preventDefault();
  });  

  $('#modal-form-edit-category').on('submit',function(){ //alert('OK');
    $.ajax({
      url:base_url_web+'/adw-category/edit-validate',
      method:'post',
      //dataType:'text',
      data:$('#modal-form-edit-category').serialize(),
      success:function(r){ console.log(r);
        //location.reload();
      }
    });

    event.preventDefault();
  });

  $('#save-stage').DataTable({
    "scrollX": true,
    "ordering": false,
    stateSave: true
  });

  function openModalEdit(id){
    $('#modal-edit-website').modal();
    $('.modal-content-edit-category').empty();
    $.ajax({
      url:base_url_web+'/adw-category/modal-editcategory',
      method:'get',
      data:{ code:id },
      success:function(r){ //console.log(r);
        $('.modal-content-edit-category').html(r);
      }
    });
  }
</script>
