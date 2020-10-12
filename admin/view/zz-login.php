<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/css/app.min.css">
    <link rel="stylesheet" href="<?=$base_url['lib']?>/public/admin/assets/css/style.css">
    <link rel="stylesheet" href="<?=$base_url['lib']?>/public/mylibs/css/main.css">
  <style>
    @import url("<?=$base_url['lib']?>/public/admin/assets/bundles/fontawesome-free/css/all.min.css");
    html, body {
        margin: 0;
        height: 100%;
    }
    .login-block{
    background: #DE6262;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to bottom, #FFB88C, #DE6262); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    width:100%;
    height:100%;
    padding : 50px 0;
    vertical-align: middle;
    }
    .img-fluid{
      max-height: 500px;
    }
    .banner-sec{background:url(<?=$base_url['img']?>/upload/banner/login1.jpg)  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
    .container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
    .carousel-inner{border-radius:0 10px 10px 0;}
    .carousel-caption{text-align:left; left:5%;}
    .login-sec{padding: 50px 30px; position:relative;}
    .login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
    .login-sec .copy-text i{color:#FEB58A;}
    .login-sec .copy-text a{color:#E36262;}
    .login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
    .login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
    .btn-login{background: #DE6262; color:#fff; font-weight:600;}
    .banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
    .banner-text h2{color:#fff; font-weight:600;}
    .banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
    .banner-text p{color:#fff;}
  </style>
</head>
<body>
  

  <!------ Include the above in your HEAD tag ---------->

  <section class="login-block col-md-12">
      <div class="container">
    <div class="row">
      <div class="col-md-4 login-sec">
          <h2 class="text-center">Login Now</h2>
          <form id="vv-form-submit" class="login-form" method="post" onsubmit="sys_preLoadSubmit()">
            <div class="form-group">
              <label for="exampleInputUser" class="text-uppercase">Username</label>
              <input required maxlength="50" minlength="3" type="text" class="form-control" name="login-username" placeholder="" value="">
              
            </div>
            <div class="form-group">
              <label for="exampleInputPassword" class="text-uppercase">Password</label>
              <input required maxlength="50" minlength="3" type="password" class="form-control" name = "login-password" placeholder="">
            </div>
            
            
              <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input">
                <small>Remember Me</small>
              </label>
              <button type="submit" class="btn btn-login float-right">Submit</button>
            </div>
            
          </form>
        <div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="https://cooftech.com">CFT</a> </div>
      </div>
      <div class="col-md-8 banner-sec">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                   <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
              <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img class="d-block img-fluid" src="<?=$base_url['img']?>/upload/banner/login2.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <div class="banner-text">
              <h2>This is Heaven</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
          </div>  
    </div>
      </div>
      <div class="carousel-item">
        <img class="d-block img-fluid" src="<?=$base_url['img']?>/upload/banner/login3.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <div class="banner-text">
              <h2>This is Heaven</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
          </div>  
      </div>
      </div>
      <div class="carousel-item">
        <img class="d-block img-fluid" src="<?=$base_url['img']?>/upload/banner/login1.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <div class="banner-text">
              <h2>This is Heaven</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
          </div>  
      </div>
    </div>
              </div>     
          
      </div>
    </div>
  </div>
  </section>

  
</body>
</html>
 <!-- General JS Scripts -->
  <script src="<?=$base_url['lib']?>/public/admin/assets/js/app.min.js"></script>
  <script src="<?=$base_url['lib']?>/public/admin/assets/js/scripts.js"></script>

<script src="<?=$base_url['lib']?>/public/mylibs/js/notify.min.js" type="text/javascript"></script>
<script src="<?=$base_url['lib']?>/public/mylibs/js/sys.js" type="text/javascript"></script>

<script type="text/javascript">
    const baseUrl = '<?=$base_url["web"]?>';
    const timeNow =  parseInt('<?=time()?>') ;
    window.onload = function(){
      document.getElementById('vv-form-submit').action = baseUrl+'/adw-login/validate';
      sys_ShowError(location.hash,1,timeNow,['','Dữ liệu thiếu','Lỗi, Tài khoản không tồn tại','Lỗi, Dữ liệu tài khoản không tồn tại','Tài khoản đã bị khóa, hoặc chưa kích hoạt' ] );
    }
</script>