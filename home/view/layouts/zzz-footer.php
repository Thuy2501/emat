<footer class="page-footer text-footer blue pt-4 bg-emat">

        <!-- Footer Links -->
        <div class="container-fluid">
            <div class="row">
                <div class="offset-xl-1 offset-sm-0 col-xl-10 col-sm-12">
                    <div class=" text-center text-md-left">
                        <div class="row">
                            <div class="col-md-3 mt-md-0 mt-3 text-center">
                                <img src="<?=$base_url['web']?>/upload/logo/ms-icon-150x150.png" alt="logo msa footer" width="150"> <br>
                                <p class="text-white" style="font-size: 22px;">Dare to be wise!</p>

                            </div>
                            <div class="col-md-4 mt-md-0 mt-3 text-left">
                                <h5 class="text-uppercase text-white"><?=lang_menu($_lang,'chuong-trinh-hoc')?></h5> <span class="border-bottom-5"></span>
                                <ul class="dot-ul">
                                    <li class="dot-ul-li"><a href="<?=$base_url['web']?>/chuong-trinh/toan-hoc<?=url_lang($_lang) ?>"><?=lang_menu($_lang,'chuong-trinh-toan')?></a></li>
                                    <li class="dot-ul-li"><a href="<?=$base_url['web']?>/chuong-trinh/khoa-hoc<?=url_lang($_lang) ?>"><?=lang_menu($_lang,'chuong-trinh-khoahoc')?></a></li>
                                    <li class="dot-ul-li"><a href="<?=$base_url['web']?>/thi-quoc-te/igcse<?=url_lang($_lang) ?>">IGCSE</a></li>
                                    <li class="dot-ul-li"><a href="<?=$base_url['web']?>/thi-quoc-te/ssat-sat<?=url_lang($_lang) ?>">SSAT & SAT</a></li>
                                    <li class="dot-ul-li"><a href="<?=$base_url['web']?>/thi-quoc-te/amo-simoc<?=url_lang($_lang) ?>">AMO & SIMOC </a></li>
                                    <li class="dot-ul-li"><a href="<?=$base_url['web']?>/thi-quoc-te/vanda<?=url_lang($_lang) ?>">VANDA</a></li>
                                    <li class="dot-ul-li"><a href="<?=$base_url['web']?>/chuong-trinh/lo-trinh-hoc<?=url_lang($_lang) ?>"><?=lang_menu($_lang,'lo-trinh-hoc')?></a></li>
                                </ul>

                            </div>
                            <div class="col-md-5 mt-md-0 mt-3 text-left">
                                <h5 class="text-uppercase text-white"><?=lang_menu($_lang,'thong-tin-lien-he')?></h5><span class="border-bottom-4"></span>
                                <span class="text-emat text-white"><?=lang_menu($_lang,'thong-tin')?></span> <br>
                                <span class="text-emat text-white"> <?=lang_menu($_lang,'dien-thoai')?>: 0708 846 205</span> <br>
                                <span class="text-emat text-white"> Email: info@msa.edu.vn</span> <br>
                                <a class="social" href=""><i class="fab fa-facebook-square" style=" margin: 0 10px 0 0;"></i></a> 
                                <a class="social" href=""><i class="fab fa-instagram" style=" margin: 0 10px;"></i></a>

                            </div>
                        </div>
                        <!-- Grid row -->

                    </div>
                </div>

            </div>

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">
            <a href="#">©2020 MSA. All Rights Reserved</a>
        </div>
        <!-- Copyright -->

        <div class="phonering-alo-phone phonering-alo-green phonering-alo-show mypage-alo-phone" id="phonering-alo-phoneIcon">
            <a href="<?=$base_url['web']?>/tu-van" class="pps-btn-img" title="<?=lang_menu($_lang,'goi-tu-van')?>">
                <div class="phonering-alo-ph-img-circle"></div>
            </a>
        </div>
        <div class="mailring-alo-phone mailring-alo-green mailring-alo-show mypage-alo-phone" id="mailring-alo-phoneIcon">
            <a href="<?=$base_url['web']?>/tu-van" class="pps-btn-img" title="<?=lang_menu($_lang,'dang-ky-tu-van')?>">
                <div class="mailring-alo-ph-img-circle"></div>
            </a>
        </div>
    </footer>


<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<!-- <script>
    window.fbAsyncInit = function() {
    FB.init({
    xfbml : true,
    version : 'v8.0'
    });
    };

    (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script> -->

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat"
    attribution=setup_tool
    page_id="104053694293695"
    theme_color="#0084ff"
    logged_in_greeting="<?=lang_menu($_lang,'face-book')?>"
    logged_out_greeting="<?=lang_menu($_lang,'face-book')?>">
</div>    

