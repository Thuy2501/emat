
<section class="section">
  <div class="section-body">
<div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="col-6">
              <select id="cft-lang-select">
                <option <?=isset($_GET['code'])&&$_GET['code']=='vi' ? 'selected' : '' ?> value="vi" >VI</option>
                <option <?=isset($_GET['code'])&&$_GET['code']=='en' ? 'selected' : '' ?> value="en" >EN</option>
                <option <?=isset($_GET['code'])&&$_GET['code']=='jp' ? 'selected' : '' ?> value="jp" >JP</option>
              </select>
            </div>
            <div class="col-6 text-right">
              
            </div>
          </div>
          <div class="card-body">
            <textarea id="sitemap-code" readonly class="form-control" rows=5 ><?=$item_json?></textarea> <hr>
            <div class="table-responsive">
              <form action="<?=$base_url['web']?>/adw-seo/language-edit" method="post" onsubmit="sys_preLoadSubmit()">
                <input type="hidden" name="CFT-LANG" value="<?=isset($_GET['code']) ? $_GET['code'] : 'vi' ?>">
                <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                  <thead>
                    <tr>
                      <th>Key</th>
                      <th><button type="submit" class="btn btn-danger">Lưu bản dịch</button></th>
                    </tr>
                  </thead>
                  <tbody id="table-body">
                    <?php 
                    if(isset($item)&&!empty($item)){
                      foreach($item as $k=>$v){
                        echo '<tr id="TR-'.$k.'">
                                <td>'.$k.'</td>
                                <td><input class="form-control"  value="'.$v.'" name="'.$k.'" ></td>
                              </tr>';
                      }
                    }
                    ?>
                    
                  </tbody>
                </table>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal with form -->
<div class="modal fade" id="modal-add-website" tabindex="-1" role="dialog" aria-labelledby="formModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModal">Thêm mới sitemap</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="modal-form-add-sitemap" >
          <div class="form-group">
            <label>Link</label>
            <div class="input-group">
              <input required maxlength="200" type="text" class="form-control" placeholder="Link" name="sitemap-link" value="test">
            </div>
          </div>
          <div class="form-group">
            <label>Trọng số</label>
            <div class="input-group">
              <input min=0.1 max=1 step="0.02" type="number" class="form-control" value="0.8" name="sitemap-priority">
            </div>
          </div>
          <div class="form-group">
            <label>Code sitemap</label>
            <div class="input-group">
              <textarea readonly class="form-control" rows=5 name="sitemap-code" ><?=$item_json?></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-primary m-t-15 waves-effect">Thêm mới</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-edit-website" tabindex="-1" role="dialog" aria-labelledby="formModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-content-edit-sitemap">
    </div>
  </div>
</div>