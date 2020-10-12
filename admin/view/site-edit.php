<?php include_once('layouts/zzz-head.php') ?>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/css/app.min.css">

  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/bundles/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/bundles/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
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
<?php include_once('layouts/site/site-edit-content.php') ?>        
<?php include_once('layouts/zzz-setting.php') ?>        
      </div>
<?php include_once('layouts/zzz-footer.php') ?>      
    </div>
  </div>
  <!-- JS Libraies -->
  <script src="<?=$base_url['lib']?>/public/admin/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  

  <script src="<?=$base_url['lib']?>/public/admin/assets/bundles/cleave-js/dist/cleave.min.js"></script>
  <script src="<?=$base_url['lib']?>/public/admin/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?=$base_url['lib']?>/public/admin/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="<?=$base_url['lib']?>/public/admin/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?=$base_url['lib']?>/public/admin/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="<?=$base_url['lib']?>/public/admin/assets/bundles/select2/dist/js/select2.full.min.js"></script>
  <script src="<?=$base_url['lib']?>/public/admin/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>

  <script src="<?=$base_url['lib']?>/public/mylibs/ckeditor/ckeditor.js"></script>
  <!-- Template JS File -->
  <script src="<?=$base_url['lib']?>/public/admin/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?=$base_url['lib']?>/public/admin/assets/js/custom.js"></script>

  <script src="<?=$base_url['lib']?>/public/mylibs/js/notify.min.js" type="text/javascript"></script>
  <script src="<?=$base_url['lib']?>/public/mylibs/js/sys.js" type="text/javascript"></script>

</body>


</html>

<script type="text/javascript">
  
  const base_url_lib = '<?=$base_url["lib"]?>';
  const base_url_web = '<?=$base_url['web']?>';
  var _noti =  JSON.parse('<?=$_noti?>') ;
  var siteCount = 1;

    CKEDITOR.editorConfig = function( config ) {
  config.toolbarGroups = [
    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
    { name: 'forms', groups: [ 'forms' ] },
    '/',
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
    { name: 'links', groups: [ 'links' ] },
    { name: 'insert', groups: [ 'insert' ] },
    '/',
    { name: 'styles', groups: [ 'styles' ] },
    { name: 'colors', groups: [ 'colors' ] },
    { name: 'tools', groups: [ 'tools' ] },
    { name: 'others', groups: [ 'others' ] },
    { name: 'about', groups: [ 'about' ] }
  ];

  config.removeButtons = 'Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Undo,Redo,Find,Replace,SelectAll,Scayt,Checkbox,Radio,TextField,Textarea,Select,Button,HiddenField,ImageButton,CopyFormatting,RemoveFormat,CreateDiv,BidiLtr,BidiRtl,Flash,About,Form';

  config.filebrowserBrowseUrl = base_url_lib+'/public/mylibs/ckfinder/ckfinder.html';
 
   config.smiley_columns = 10;
   config.bodyId = 'content-1,content-2';

};
CKEDITOR.plugins.addExternal('bootstrapVisibility', base_url_lib+'/public/mylibs/ckeditor/plugins/bootstrapVisibility/', 'plugin.js');
CKEDITOR.config.extraPlugins = 'bootstrapVisibility';

CKEDITOR.plugins.addExternal('imageresponsive', base_url_lib+'/public/mylibs/ckeditor/plugins/imageresponsive/', 'plugin.js');
CKEDITOR.config.extraPlugins = 'imageresponsive';

CKEDITOR.plugins.addExternal('youtube', base_url_lib+'/public/mylibs/ckeditor/plugins/youtube/', 'plugin.js');
CKEDITOR.config.extraPlugins = 'youtube';

  CKEDITOR.replaceAll("site-content",
  {
       height: 250,
  });

$(".inputtags").tagsinput('items');

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

function convertStringUrl(str) {
            str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
            str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
            str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
            str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
            str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
            str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
            str = str.replace(/đ/g, "d");
            str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "a");
            str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "e");
            str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "i");
            str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "o");
            str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "u");
            str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "y");
            str = str.replace(/Đ/g, "d");
            str = str.replace(/[`~!@#$%^&*()_|+\-–=?;:'",.<>\{\}\[\]\\\/]/gi,'');
            str = str.replace(/[\s]+/g, "-");
            return str.toLowerCase();
        };


if(_noti['error']!=''){
  if(_noti['code']=='200'){
    sys_ShowError2(_noti['error'],'success');
  }else{
    sys_ShowError2(_noti['error'],'error');
  }
}

function appendSiteContent(){
  siteCount++;
  $('#site-content').append('<div id="site-content-add-'+siteCount+'" class="form-row" style="border:1px solid red;padding:3px;"> <div class="form-group col-md-9"> <input id="site-add-listname-'+siteCount+'" type="text" placeholder="Tên mục lục" class="form-control form-control-sm"> </div><div class="form-group col-md-1"> <input minlength="1" maxlength="99" step="1" id="site-add-position-'+siteCount+'" type="number" placeholder="STT" class="form-control form-control-sm" value="'+siteCount+'"> </div><div id="site-add-button-edit" class="form-group col-md-1"> <button type="button" onClick="addSiteContent('+siteCount+')" class="btn btn-primary form-control-sm">Add</button> </div><div id="site-add-button-remove" class="form-group col-md-1"> <button type="button" onClick="removeSiteContentAdd('+siteCount+')" class="btn btn-danger form-control-sm">Del</button> </div><div class="form-group col-md-12"> <textarea class="site-subcontent-'+siteCount+'" id="site-add-text-'+siteCount+'" ></textarea> </div></div>');
  CKEDITOR.replaceAll("site-subcontent-"+siteCount,
  {
       height: 200,
  });
}

function removeSiteContentAdd(n){
  $('#site-content-add-'+n).remove();
}

$('#form-submit-content').on('submit',function(){ //console.log('123'); sys_preLoadSubmit()
  sys_preLoadSubmit();
  $.ajax({
        url:base_url_web+'/adw-site/form-edit',
        method:'post',
        data: $('#form-submit-content').serialize(),
        dataType:'json',
        success:function(data){ //console.log(data);
          sys_preLoadDestroy();
          if(data.code=='200'){
            sys_ShowError2(data.error);
          }else{
            sys_ShowError2(data.error,'error');
          }
        }
      });

  event.preventDefault();
});

function saveSiteContent(id) { //console.log(222);

  sys_preLoadSubmit();
  $.ajax({
        url:base_url_web+'/adw-site/form-editcontent',
        method:'post',
        data:{
          id:id,
          name:$('#site-content-listname-'+id).val(),
          position:$('#site-content-position-'+id).val(),
          text:CKEDITOR.instances['site-content-text-'+id].getData()
        },
        dataType:'json',
        success:function(data){ console.log(data);
          sys_preLoadDestroy();
          if(data.code=='200'){
            sys_ShowError2(data.error);
          }else{
            sys_ShowError2(data.error,'error');
          }
        }
      });

  event.preventDefault();

};

function addSiteContent(id) { //console.log(222);

  sys_preLoadSubmit();

  $.ajax({
        url:base_url_web+'/adw-site/form-addcontent',
        method:'post',
        data:{
          id:$('#site-id').val(),
          name:$('#site-add-listname-'+id).val(),
          position:$('#site-add-position-'+id).val(),
          text:CKEDITOR.instances['site-add-text-'+id].getData()
        },
        dataType:'json',
        success:function(data){ console.log(data);
          sys_preLoadDestroy();
          if(data.code=='200'){
            /*sys_ShowError2(data.error);
            $('#site-content-add-'+id).attr("id", 'site-content-'+data.data);
            $('#site-add-listname-'+id).attr("id", 'site-content-listname-'+data.data);
            $('#site-add-position-'+id).attr("id", 'site-content-position-'+data.data);
            $('#site-add-text-'+id).attr("id", 'site-content-text-'+data.data);
            $('#site-add-button-remove').html('<button onClick="removeSiteContent('+data.data+')" type="button" class="btn btn-danger form-control-sm">Del</button>');
            $('#site-add-button-edit').html('<button onClick="saveSiteContent('+data.data+')" type="submit" class="btn btn-info form-control-sm">Save</button>');*/
            location.reload();
          }else{
            sys_ShowError2(data.error,'error');
          }
        }
      });

  event.preventDefault();

};

function removeSiteContent(id){
  if(confirm("Bạn muốn xóa bản ghi này ?")){
    sys_preLoadSubmit();
    $.ajax({
          url:base_url_web+'/adw-site/form-removecontent',
          method:'post',
          data:{
            id:id
          },
          dataType:'json',
          success:function(data){ //console.log(data);
            sys_preLoadDestroy();
            if(data.code=='200'){
              $('#site-content-'+id).remove();
              sys_ShowError2(data.error);
            }else{
              sys_ShowError2(data.error,'error');
            }
          }
        });

    event.preventDefault();
  }
}

</script>