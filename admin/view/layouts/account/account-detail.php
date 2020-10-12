<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-4 col-lg-4"></div>
      <div class="col-12 col-md-4 col-lg-4">
                <div class="card">
                    <form action="<?=$base_url['web']?>/adw-account/edit-password" method="post" enctype="multipart/form-data" onsubmit="sys_preLoadSubmit()" >
                      <div class="card-body">
                        <div class="form-group">
                          <label class="my-lable">Mật khẩu cũ <span class="text-danger" title="Bắt buộc" >*</span></label>
                          <input minlength="3" maxlength="30" required name="password-old" type="password" class="form-control form-control-sm" placeholder="*****" value="" >
                        </div>
                        <div class="form-group">
                          <label class="my-lable">Mật khẩu mới <span class="text-danger" title="Bắt buộc" >*</span></label>
                          <input minlength="3" maxlength="30" required name="password-new" type="password" class="form-control form-control-sm" placeholder="***" value="" >
                        </div>
                        <div class="form-group">
                          <label class="my-lable">Mật khẩu mới xác nhận <span class="text-danger" title="Bắt buộc" >*</span></label>
                          <input minlength="3" maxlength="30" required name="password-renew" type="password" class="form-control form-control-sm" placeholder="***" value="" >
                        </div>
                      </div>
                      <div class="card-footer text-right">
                        <button type="submit" name="password-btn" class="btn btn-primary" value="<?=time()?>" >Lưu</button>
                      </div>

                   </form>
                </div>
            </div>
      <div class="col-12 col-md-4 col-lg-4"></div>
    </div>
  </div>
</section>

