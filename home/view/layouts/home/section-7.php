<section class="section section-no-border section-angled bg-color-light-scale-1 m-0">
    <div class="container py-5 my-5">
        <div class="row align-items-center text-center my-5">
            <div class="col-md-6">
                <h2 class="font-weight-bold text-9 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" data-appear-animation-duration="750">Đăng ký nhận khuyến mãi</h2>
                <p class="font-weight-semibold text-primary text-4 fonts-weight-semibold positive-ls-2 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600" data-appear-animation-duration="750">Cập nhật những sự kiện, thông tin khuyến mãi mới nhất</p>
                <form class="contact-form" method="POST" novalidate="novalidate">
                    <div class="contact-form-success alert alert-success d-none mt-4">
                        <strong>Success!</strong> Your message has been sent to us.
                    </div>
                
                    <div class="contact-form-error alert alert-danger d-none mt-4">
                        <strong>Error!</strong> There was an error sending your message.
                        <span class="mail-error-message text-1 d-block"></span>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="required font-weight-bold text-dark text-2">Tên liên hệ</label>
                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" required="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="required font-weight-bold text-dark text-2">Số điện thoại</label>
                            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="font-weight-bold text-dark text-2">Nội dung</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <input type="submit" value="Gửi liên hệ" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 py-5">
                <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="500">
                    <img class="porto-lz"src="<?=$base_url['web']?>/public/home/img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="<?=$base_url['web']?>/public/home/img/landing/porto_dots2.png" alt="" width="149" height="142" style="position: absolute; top: -60px; right: -8%;">
                </div>
                <div class="appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="0" data-appear-animation-duration="750">
                    <div class="strong-shadow rounded strong-shadow-top-right">
                        <img src="<?=$base_url['web']?>/public/home/img/lazy.png" data-plugin-lazyload data-plugin-options="{'threshold': 500, 'effect':'fadeIn'}" data-original="<?=$base_url['web']?>/public/home/img/landing/porto_admin.jpg" class="img-fluid border border-width-10 border-color-light rounded box-shadow-3" alt="Porto Admin" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>