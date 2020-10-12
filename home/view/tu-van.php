<?php include_once('layouts/zzz-head.php') ?>
</head>
<body>
    <!-- start hearder -->

<?php include_once('layouts/zzz-header.php') ?>    
    <!-- end hearder -->
    <!-- start slider -->
    <!-- Swiper -->
    <div class="pt-2 mt-5">
        <img style="width:100%;" src="<?=$base_url['web']?>/upload/banner/Banner_Tu Van.jpg" alt="Hình ảnh mới">
    </div>
    <div class="clearfix"></div>

    <section style="background-color: #fafafa;">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-xl-2 col-md-8 col-xl-8 col-sm-12 offset-sm-0 pb-5 my-pt-5" style="background-color: #fff;">
                    <!--Section description-->
                    <p class="text-center w-responsive mx-auto">Cảm ơn quý phụ huynh đã lựa chọn MSA. Xin vui lòng để lại thông tin để được tư vấn chi tiết và đăng ký thi thử miễn phí cho con</p>
                    <span class="emat-border mr-2">
                        <span class="border-color-emat"></span>
                    </span>
                    <div class="row pb-5">

                        <!--Grid column-->
                        <div class="col-md-9 mb-md-0 mb-5">
                            <form class="" id="form-submit-contact">

                                <!--Grid row-->
                                <div class="row pb-4">

                                    <!--Grid column-->
                                    <div class="col-md-4">
                                        <div class="md-form mb-0">
                                            <label title="Bắt buộc" for="cft-hoten" class="">* <?=lang_menu($_lang,'ho-ten')?></label>
                                            <input required minlength="3" maxlength="200" type="text" id="cft-hoten" name="cft-hoten" class="form-control">
                                            
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-4">
                                        <div class="md-form mb-0">
                                            <label for="cft-email" class="">*Email</label>
                                            <input required minlength="3" maxlength="1000" type="mail" id="cft-email" name="cft-email" class="form-control">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-form mb-0">
                                            <label for="cft-phone" class="">*<?=lang_menu($_lang,'dien-thoai')?></label>
                                            <input type="text" id="cft-phone" name="cft-phone" class="form-control">
                                            
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                </div>

                                <div class="row pb-4">

                                    <!--Grid column-->
                                    <div class="col-md-4">
                                        <div class="md-form mb-0">
                                            <label title="Bắt buộc" for="cft-namsinh" class="">* <?=lang_menu($_lang,'nam-sinh-cua-con')?></label>
                                            <select required name="cft-namsinh" id="cft-namsinh" class="form-control">
                                                <option value="0"><?=lang_menu($_lang,'vui-long-chon')?></option>
                                                <?php 
                                                for($i=$years-1;$i>=$years-12;$i--){
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                }
                                                ?>
                                                
                                            </select>
                                            
                                            
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-8">
                                        <div class="md-form mb-0">
                                            <label for="cft-truonghoc" class=""><?=lang_menu($_lang,'truong-hoc')?></label>
                                            <input minlength="0" maxlength="1000" type="text" id="cft-truonghoc" name="cft-truonghoc" class="form-control">
                                            
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->
                                 <!--Grid row-->
                                <div class="row pb-4">

                                    <!--Grid column-->
                                    <div class="col-md-4">
                                        <div class="md-form mb-0">
                                            <label title="Bắt buộc" for="cft-monhoc" class=""><?=lang_menu($_lang,'mon-hoc-dk')?></label>
                                            <select name="cft-monhoc" id="cft-monhoc" class="form-control">
                                                <option value=""><?=lang_menu($_lang,'vui-long-chon')?></option>
                                                <option value="Toán">Toán</option>
                                                <option value="Khoa học">Khoa học</option>
                                                <option value="Cả 2 môn">Cả 2 môn</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-4">
                                        <div class="md-form mb-0">
                                            <label for="cft-dktt" class="">*<?=lang_menu($_lang,'dk-thi-thu')?></label>
                                            <select name="cft-dktt" id="cft-dktt" class="form-control">
                                                <option value="Có">Có</option>
                                                <option value="Không">Không</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-form mb-0">
                                            <label for="cft-mdkt" class=""><?=lang_menu($_lang,'mon-dk-thi')?></label>
                                            <select name="cft-mdkt" id="cft-mdkt" class="form-control">
                                                <option value=""><?=lang_menu($_lang,'vui-long-chon')?></option>
                                                <option value="Toán">Toán</option>
                                                <option value="Tiếng anh">Tiếng anh</option>
                                                <option value="Cả 2 môn">Cả 2 môn</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                </div>

                                <div class="row pb-4">
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <label for="cft-ctdkt" class=""><?=lang_menu($_lang,'chuong-trinh-dk-thi')?></label>
                                            <select name="cft-ctdkt" id="cft-ctdkt" class="form-control">
                                                <option value=""><?=lang_menu($_lang,'vui-long-chon')?></option>
                                                <option value="Toán phổ thông lớp 2-8">Toán phổ thông lớp 2-8</option>
                                                <option value="IGCSE">IGCSE</option>
                                                <option value="SAT">SAT</option>
                                                <option value="Chưa rõ, cần tư vấn thêm">Chưa rõ, cần tư vấn thêm</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>

                                <!--Grid row-->
                                <div class="row pb-4">

                                    <!--Grid column-->
                                    <div class="col-md-12">

                                        <div class="md-form">
                                            <label for="cft-note"><?=lang_menu($_lang,'yeu-cau-them')?></label>
                                            <textarea minlength="0" maxlength="2000" type="text" id="cft-note" name="cft-note" rows="2" class="form-control md-textarea"></textarea>
                                            
                                        </div>

                                    </div>
                                </div>
                                <!--Grid row-->
                                <div class="text-right text-md-right">
                                    <button type="submit" class="btn msa-bt-blue"><?=lang_menu($_lang,'dang-ky')?></button>
                                </div>
                            </form>

                            
                            <div class="status"></div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-3 text-center">
                            <ul class="list-unstyled mb-0">
                                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                    <p><?=lang_menu($_lang,'thong-tin')?></p>
                                </li>

                                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                    <p>0708 846 205</p>
                                </li>

                                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                                    <p>info@msa.edu.vn</p>
                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->

                    </div>
                </div>
                
            </div>
        </div>
        
</section>
    <!-- Footer -->
<?php include_once('layouts/zzz-footer.php') ?>    
    <!-- Footer -->
</body>

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

</html>
<script src="<?=$base_url['lib']?>/public/home/assets/js/custom.js"></script>
<script src="<?=$base_url['lib']?>/public/mylibs/js/notify.min.js" type="text/javascript"></script>
<script src="<?=$base_url['lib']?>/public/mylibs/js/sys.js" type="text/javascript"></script>
<script src="<?=$base_url['lib']?>/public/mylibs/js/cftAction.js" type="text/javascript"></script>

<script>

  $('#form-submit-contact').on('submit', function(e){
    itemSubmitForm2('form-submit-contact',base_url_web+'/tu-van/addcontact');
    event.preventDefault();
  });
</script>