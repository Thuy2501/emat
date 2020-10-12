<?php include_once('layouts/zzz-head.php') ?>
</head>
<body>
    <!-- start hearder -->

<?php include_once('layouts/zzz-header.php') ?>    
    <!-- end hearder -->
    <!-- start slider -->
    <!-- Swiper -->
    <div class="clearfix"></div>
    <div class="slider-emat pb-5 mb-5 mt-5">
        <div id="myslider" class="carousel slide" data-ride="carousel">
          <ul class="carousel-indicators">
            <li data-target="#myslider" data-slide-to="0" class="active"></li>
            <li data-target="#myslider" data-slide-to="1"></li>
            <li data-target="#myslider" data-slide-to="2"></li>
          </ul>
          
          <!-- The slideshow -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="img-fluid" src="<?=$base_url['web']?>/upload/banner/banner-01.jpg" alt="msa-home-slider">
            </div>
            <div class="carousel-item">
              <img class="img-fluid" src="<?=$base_url['web']?>/upload/banner/banner-02.jpg" alt="msa-home-slider">
            </div>
            <div class="carousel-item">
              <img class="img-fluid" src="<?=$base_url['web']?>/upload/banner/banner-03.jpg" alt="msa-home-slider">
            </div>
          </div>
          <a class="carousel-control-prev" href="#myslider" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#myslider" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>        
    </div>
    <div class="clearfix"></div>
    <div class="container-fluid pb-5 mb-5">
        <div class="row pl-2 pr-2">
            <div class="col-md-5 col-sm-12 col-xl-5 col-lg-5 ">

                    <div id="demo" class="carousel slide" data-ride="carousel">

                      <!-- Indicators -->
                      <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                        <li data-target="#demo" data-slide-to="3"></li>
                        <li data-target="#demo" data-slide-to="4"></li>
                      </ul>
                      
                      <!-- The slideshow -->
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="img-fluid img-thumbnail image-slide-home" src="<?=$base_url['web']?>/upload/images/msa-home-slider-1.jpg" alt="msa-home-slider">
                        </div>
                        <div class="carousel-item">
                          <img class="img-fluid img-thumbnail image-slide-home" src="<?=$base_url['web']?>/upload/images/msa-home-slider-2.jpg" alt="msa-home-slider">
                        </div>
                        <div class="carousel-item">
                          <img class="img-fluid img-thumbnail image-slide-home" src="<?=$base_url['web']?>/upload/images/msa-home-slider-3.jpg" alt="msa-home-slider">
                        </div>
                        <div class="carousel-item">
                          <img class="img-fluid img-thumbnail image-slide-home" src="<?=$base_url['web']?>/upload/images/msa-home-slider-4.jpg" alt="msa-home-slider">
                        </div>
                        <div class="carousel-item">
                          <img class="img-fluid img-thumbnail image-slide-home" src="<?=$base_url['web']?>/upload/images/msa-home-slider-5.jpg" alt="msa-home-slider">
                        </div>
                      </div>
                      
                      <!-- Left and right controls -->
                      <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                      </a>
                      <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                      </a>
                    </div>
            </div>
            <div class="col-xl-7 col-md-7 col-sm-12 col-lg-7">
                <p class="text-emat">
                    Năm 2019, MSA được thành lập để tập trung vào 2 môn học cốt lõi trong chương trình phổ thông quốc tế: Toán và Khoa học.
                </p>
                <p class="text-emat">
                    MSA là Trung tâm Đào tạo Toán và Khoa học theo giáo trình phổ thông quốc tế của Anh và Singapore dành cho học sinh từ 7 – 15 tuổi. Với mong muốn đưa học sinh tiệm cận nền giáo dục quốc tế, khai phá năng lực bản thân, chủ động định hướng tương lai, MSA xây dựng chương trình đào tạo kiến thức Toán và Khoa học vững chắc, là nền tảng phát triển tư duy phản biện và giải quyết vấn đề, phù hợp với yêu cầu học tập hiện đại. Học sinh không chỉ học tập tốt ở trường học chính khóa, mà còn đủ kiến thức để lấy bằng phổ thông quốc tế (IGCSE) hay đủ bản lĩnh gặt hái thành công tại các kỳ thi chuyên quốc tế Toán (AMO, SIMOC), Khoa học (VANDA), và kỳ thi tuyển sinh đại học Mỹ (SAT). 
                </p>
                <div class="mt-5">
                    
                    <a class="btn pl-4 pr-4 pt-2 pb-2 msa-bt-blue" href="<?=$base_url['web']?>/gioi-thieu"><?=lang_menu($_lang,'xem-chi-tiet')?></a>
                </div>
            </div>
        </div>

    </div>
    <!-- Lộ trình-->
    <section class="bg-emat mb-5 mb-5">
        <div class="pt-5 container-fluid">
            <div class="text-center  ">
                <div class="pb-3">
                    <h2 class="text-white text-center" ><span style=" font-weight: 600">Xây dựng lộ trình riêng cho bé</span></h2>
                </div>

            </div>
            <div class="pb-3 text-center">
                <!-- <img data-toggle="modal" data-target=".modal-contact-view" title="Bấm vào để đăng ký lộ trình cho bé !" style="cursor: pointer;" class="img-fluid" src="<?=$base_url['lib']?>/upload/banner/lo-trinh-hoc.jpg" alt="Lo trinh hoc cua be"> -->
                <img class="img-fluid" src="<?=$base_url['lib']?>/upload/banner/lo-trinh-hoc.jpg" alt="Lo trinh hoc cua be">
            </div>
            <div class="pb-5 text-center">
                    
                    <a class="btn emat-bg-red pb-3 pt-3 pl-4 pr-4" href="<?=$base_url['web']?>/tu-van"><?=lang_menu($_lang,'dang-ky-tu-van')?></a>
                </div>
        </div>
    </section>
    <section class="mb-5">
        <div class="container-fluid mb-5 mt-5">
            <div class="text-center">
                <div class="pd-3 pt-5">
                    <h2 class="text-color-emat text-center" ><span style=" font-weight: 600"> CHƯƠNG TRÌNH PHỔ THÔNG QUỐC TẾ</span></h2>
                </div>
            </div>
            <div class="container pb-5">
                <div class="pd-3 text-center  ">
                    <span class="text-emat text-secondary">
                        Giáo trình tiêu chuẩn Anh & Singapore, kiến thức chuyên sâu theo lộ trình giúp học sinh hoàn thiệnkhả năng tư duy, phân tích và đánh giá vấn đề. Đồng thời trau dồi kiến thức đa dạng và phát triển kỹ năng xã hội, sẵn sàng cho tương lai.
                    </span>
                </div>
            </div>
            <div class="container-fluid">
            <div class="row ">
                <div class="offset-xl-1 offset-md-1 offset-sm-0 col-lg-10 col-xl-10 col-sm-12 ">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-lg-4 pt-4">
                            <div class="card text-center emat-bg-blue" style="width: 100%; align-items: center; border-radius: 2em">
                                <div style="width: 80%; padding-top: 2em" class="pb-3 mb-3">
                                    <img style="border-radius: 50%;" class="card-img-top" src="<?=$base_url['lib']?>/upload/images/giao-vien.jpg" alt="Card image cap" style="width: 100%">
                                </div>
                                <div class="d-flex" style="width: 100%">
                                    <div class=" emat-border-10 " style="width: 30%; margin-top:6px">
                                        <span class="emat-border">
                                        <span style="border-color:#ffffff;  " class=""></span>
                                        </span>
                                    </div>
                                    <div class="text-white emat-title" style="width: 40%">
                                        <h4>GIÁO VIÊN</h4>
                                    </div>
                                    <div class=" emat-border-10 " style="width: 30%; margin-top:6px">
                                        <span class="emat-border">
                                        <span style="border-color:#ffffff;  " class=""></span>
                                        </span>
                                    </div>
                                </div>

                                <div class="card-body" style="height:230px;">
                                    <h5 class="card-title text-white">TRÌNH ĐỘ QUỐC TẾ</h5>
                                    <p class="card-text text-white text-emat pt-4">Giáo viên là các giáo viên giảng dạy tại trường Quốc Tế có uy tín (BVIS, AIS, v.v. ) và Thạc sĩ, Tiến sĩ tốt nghiệp các trường đại học hàng đầu thế giới, giúp đảm bảo chất lượng giảng dạy, truyền cảm hứng cho học sinh duy trì kỷ luật học tập tốt.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-lg-4 pt-4">
                            <div class="card emat-bg-blue text-center text-left" style="width: 100%; align-items: center; border-radius: 2.3em">
                                <div style="width: 80%; padding-top: 2em" class="pb-3 mb-3">
                                    <img style="border-radius: 50%;" class="card-img-top" src="<?=$base_url['lib']?>/upload/images/hoc-vui.jpg" alt="Card image cap" style="width: 100%">
                                </div>
                                <div class="d-flex" style="width: 100%">
                                    <div class=" emat-border-10 " style="width: 30%; margin-top:6px">
                                        <span class="emat-border">
                                        <span style="border-color:#ffffff;  " class=""></span>
                                        </span>
                                    </div>
                                    <div class="text-white emat-title" style="width: 40%">
                                        <h4>HỌC TẬP</h4>
                                    </div>
                                    <div class=" emat-border-10 " style="width: 30%; margin-top:6px">
                                        <span class="emat-border">
                                        <span style="border-color:#ffffff;  " class=""></span>
                                        </span>
                                    </div>
                                </div>

                                <div class="card-body" style="height:230px;">
                                    <h5 class="card-title text-white">HỌC VUI VÀ HIỆU QUẢ</h5>
                                    <p class="card-text text-white text-emat pt-4">Môi trường học tập dân chủ, tạo động lực phát triển. Hệ thống theodõi và đánh giá quá trình học tập thường xuyên, báo cáo và hỗ trợ liên tục và kịp thời giúp học sinh vững kiến thức và thoải mái với việc học.</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-lg-4 pt-4">
                            <div class="card emat-bg-blue text-center" style="width: 100%; align-items: center; border-radius: 2.3em">
                                <div style="width: 80%; padding-top: 2em" class="pb-3 mb-3">
                                    <img style="border-radius: 50%;" class="card-img-top" src="<?=$base_url['lib']?>/upload/images/dau-ra.jpg" alt="Card image cap" style="width: 100%">
                                </div>
                                <div class="d-flex" style="width: 100%">
                                    <div class=" emat-border-10 " style="width: 30%; margin-top:6px">
                                        <span class="emat-border">
                                        <span style="border-color:#ffffff;  " class=""></span>
                                        </span>
                                    </div>
                                    <div class="text-white emat-title" style="width: 40%">
                                        <h4>KẾT QUẢ</h4>
                                    </div>
                                    <div class=" emat-border-10 " style="width: 30%; margin-top:6px">
                                        <span class="emat-border">
                                        <span style="border-color:#ffffff;  " class=""></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body" style="height:230px;">
                                    <h5 class="card-title text-white">ĐẦU RA TỐI ƯU</h5>
                                    <p class="card-text text-white text-emat pt-4">Không chỉ đủ khả năng thi lấy bằng phổ thông quốc tế, học sinh còn có thể tham gia các kỳ thi chuyên Toán và Khoa học quốc tế, đạt thành tựu làm hành trang cho tương lai.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        </div>
    </section>
    <!-- tin tức sự kiện -->
    <section class="pb-5 mb-5">
        <div class="container-fluid">
            <div class="text-center mt-5 ">
                <div class="mb-5 pt-5">
                    <h2 class="text-color-emat text-center" ><span style=" font-weight: 600"><?=lang_menu($_lang,'tin-tuc-su-kien')?></span></h2>
                </div>

            </div>

            <div class="swiper-container">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="card" style="width: 100%;">
                            <div class="img-blog-emat">
                                <a href="<?=$base_url['web']?>/tin-tuc/yeu-to-giup-tre-nhanh-thich-nghi-voi-du-lich-p01.html"><img class="card-img-top" src="<?=$base_url['web']?>/upload/images/blog-1.jpg" alt="Card image cap"></a>
                            </div>
                            <div class="card-body pl-1 pr-1">
                                <h5 class="card-title tintuc-title" style="font-size: 18px;line-height: 1.5em; color: #333; font-weight: 600"><a href="<?=$base_url['web']?>/tin-tuc/yeu-to-giup-tre-nhanh-thich-nghi-voi-du-lich-p01.html">Yếu tố giúp trẻ nhanh thích nghi khi du học</a></h5>
                                <p class="card-text" style="font-size: 14px; ">Tố chất thủ lĩnh không phải yếu tố quyết định, song vẫn mang lại lợi thế cho trẻ, xét về tốc độ thích nghi trong môi trường du học. </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card" style="width: 100%;">
                            <div class="img-blog-emat">
                                <a href="<?=$base_url['web']?>/tin-tuc/yeu-to-giup-tre-nhanh-thich-nghi-voi-du-lich-p01.html"><img class="card-img-top" src="<?=$base_url['web']?>/upload/images/blog-2.jpg" alt="Card image cap"></a>
                            </div>
                            <div class="card-body pl-1 pr-1">
                                <h5 class="card-title tintuc-title" style="font-size: 18px;line-height: 1.5em; color: #333; font-weight: 600"><a href="<?=$base_url['web']?>/tin-tuc/yeu-to-giup-tre-nhanh-thich-nghi-voi-du-lich-p01.html">Triển lãm du học quốc tế online tháng 9</a></h5>
                                <p class="card-text" style="font-size: 14px; ">Triển lãm du học quốc tế trực tuyến cho phép người tham gia tùy chỉnh nội dung sự kiện để phù hợp nhất với nhu cầu cá nhân. </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card" style="width: 100%;">
                            <div class="img-blog-emat">
                                <a href="<?=$base_url['web']?>/tin-tuc/yeu-to-giup-tre-nhanh-thich-nghi-voi-du-lich-p01.html">
                                    <img class="card-img-top" src="<?=$base_url['web']?>/upload/images/blog-3.png" alt="Card image cap">
                                </a>
                                
                            </div>
                            <div class="card-body pl-1 pr-1">
                                <h5 class="card-title tintuc-title" style="font-size: 18px;line-height: 1.5em; color: #333; font-weight: 600"><a href="<?=$base_url['web']?>/tin-tuc/yeu-to-giup-tre-nhanh-thich-nghi-voi-du-lich-p01.html">Hội thảo du học Thụy Sĩ, trường HTMi mùa Covid-19</a></h5>
                                <p class="card-text" style="font-size: 14px; ">Công ty Cầu Xanh tổ chức buổi trò chuyện trực tiếp với đại diện trường HTMi tại 74 Cửa Bắc, Ba Đình, Hà Nội vào 10h, ngày 5/9. </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="swiper-pagination" style="bottom: 0px;"></div>
            </div>
    </section>
    <!-- Footer -->
<?php include_once('layouts/zzz-footer.php') ?>    
    <!-- Footer -->
</body>

<div class="modal fade modal-contact-view" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">

    <div class="modal-content p-3">
        <p class="text-center w-responsive mx-auto">Cảm ơn quý phụ huynh đã lựa chọn MSA, xin vui lòng để lại thông tin để được tư vấn chi tiết và đăng ký lộ trình cho con</p>
        <span class="emat-border mb-2">
            <span class="border-color-emat"></span>
        </span>
        <form class="" id="form-submit-contact" name="form-submit-contact">

            <!--Grid row-->
            <div class="row pb-2">

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <label title="Bắt buộc" for="name" class="">* Tên phụ huynh</label>
                        <input required minlength="3" maxlength="1000" type="text" id="cft-hoten" name="cft-hoten" class="form-control">
                        
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <label for="email" class="">*Số điện thoại</label>
                        <input required minlength="8" maxlength="12" type="text" id="cft-phone" name="cft-phone" class="form-control">
                        
                    </div>
                </div>

            </div>

            <div class="row pb-2">

                <!--Grid column-->
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <label title="Bắt buộc" for="name" class="">* Năm sinh của con</label>
                        <select required name="cft-namsinh" id="cft-namsinh" class="form-control">
                            <option value="0">Vui lòng chọn</option>
                            <?php 
                            for($i=$years-1;$i>=$years-12;$i--){
                                echo '<option>'.$i.'</option>';
                            }
                            ?>
                            
                        </select>
                        
                        
                    </div>
                </div>

            </div>

            <!--Grid row-->
            <div class="row pb-2">

                <!--Grid column-->
                <div class="col-md-12">

                    <div class="md-form">
                        <label for="message">Ghi chú</label>
                        <textarea minlength="0" maxlength="2000" type="text" id="cft-note" name="cft-note" rows="2" class="form-control md-textarea"></textarea>
                        
                    </div>

                </div>
            </div>
            <!--Grid row-->
            <div class="text-center text-md-left">
                <button class="btn msa-bt-blue">Đăng ký</button>
                <button class="btn btn-danger" type="button" class="close" data-dismiss="modal" aria-label="Close">
          Đóng
        </button>
            </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade modal-contact-confirm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">

    <div class="modal-content p-3">
        <p class="text-center w-responsive mx-auto">Cảm ơn quý phụ huynh! MSA sẽ liên lạc với quý phụ huynh trong thời gian sớm nhất.</p>
        <span class="emat-border mb-2">
            <span class="border-color-emat"></span>
        </span>
            
            <div class="text-center text-md-center">
                <button class="btn btn-danger" type="button" class="close" data-dismiss="modal" aria-label="Close">
          Đóng
        </button>
            </div>
    </div>
  </div>
</div>



<script>
    var base_url_web = '<?=$base_url['web']?>';

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="<?=$base_url['lib']?>/public/home/assets/js/jquery.countup.js"></script>
<script src="<?=$base_url['lib']?>/public/home/assets/js/custom.js"></script>


</html>

<script src="<?=$base_url['lib']?>/public/mylibs/js/notify.min.js" type="text/javascript"></script>
<script src="<?=$base_url['lib']?>/public/mylibs/js/sys.js" type="text/javascript"></script>
<script src="<?=$base_url['lib']?>/public/mylibs/js/cftAction.js" type="text/javascript"></script>

<script>

  $('#form-submit-contact').on('submit', function(e){
    itemSubmitForm1('form-submit-contact',base_url_web+'/tu-van/addcontact');
    event.preventDefault();
  });
</script>

<script>

    if ($(window).width() <= 800) {

        var swiper = new Swiper('.swiper-container', {
          slidesPerView: 1,
          spaceBetween: 30,
          freeMode: true,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
        });
       

      }else{
        var swiper = new Swiper('.swiper-container', {
          slidesPerView: 3,
          spaceBetween: 30,
          freeMode: true,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
        });
      }

      $(".carousel").on("touchstart", function(event){
        var xClick = event.originalEvent.touches[0].pageX;
            $(this).one("touchmove", function(event){
                var xMove = event.originalEvent.touches[0].pageX;
                if( Math.floor(xClick - xMove) > 5 ){
                    $(this).carousel('next');
                }
                else if( Math.floor(xClick - xMove) < -5 ){
                    $(this).carousel('prev');
                }
            });
            $(".carousel").on("touchend", function(){
                    $(this).off("touchmove");
            });
        });
</script>