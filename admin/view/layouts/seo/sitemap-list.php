
<section class="section">
  <div class="section-body">
<div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="col-6">
              <h4>Danh sách</h4>
            </div>
            <div class="col-6 text-right">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-website">Thêm mới</button>
            </div>
          </div>
          <div class="card-body">
            <textarea id="sitemap-code" readonly class="form-control" rows=5 ><?=$item_json?></textarea> <hr>
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                <thead>
                  <tr>
                    <th>Link</th>
                    <th>Trọng số</th>
                    <th>Ngày tạo</th>
                    <th>TT</th>
                  </tr>
                </thead>
                <tbody id="table-body">
                  <?php 
                  if(isset($item)&&!empty($item)){
                    foreach($item as $k=>$v){
                      echo '<tr id="tr-'.$v[0].'">
                              <td title="'.$v[0].'" >'.$v[0].'</td>
                              <td>'.$v[2].'</td>
                              <td>'.$v[1].'</td>
                              <td><a href="#" onClick="openModalEdit(\''.$k.'\')" class="btn btn-sm btn-danger">Edit</a></td>
                            </tr>';
                    }
                  }
                  ?>
                  
                </tbody>
              </table>

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