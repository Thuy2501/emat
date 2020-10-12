
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
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                <thead>
                  <tr>
                    <th>Danh mục</th>
                    <th>Code</th>
                    <th>Ngày tạo</th>
                    <th>Kích hoạt</th>
                    <th>TT</th>
                  </tr>
                </thead>
                <tbody id="table-body">
                  <?php 
                  if(isset($item)&&!empty($item)){
                    foreach($item as $v){
                      echo '<tr id="tr-'.$v['id'].'">
                              <td title="'.$v['name'].'" >'.str_trimText($v['name'],50).'</td>
                              <td>'.$v['code'].'</td>
                              <td>'.$v['date_create'].'</td>
                              <td>'.str_blog_active($v['active']).'</td>
                              <td><a href="#" onClick="openModalEdit(\''.$v['id'].'\')" class="btn btn-sm btn-primary">Edit</a></td>
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
        <h5 class="modal-title" id="formModal">Thêm mới danh mục</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="modal-form-add-category" >
          <div class="form-group">
            <label>Danh mục</label>
            <div class="input-group">
              <input required maxlength="200" type="text" class="form-control" placeholder="Name" name="category-name">
            </div>
          </div>
          <div class="form-group">
            <label>Url danh mục ([a->z-])</label>
            <div class="input-group">
              <input required maxlength="200" type="text" class="form-control" placeholder="Url" name="category-url">
            </div>
          </div>
          <div class="form-group">
            <label>Thẻ tags (cách nhau dấu ,)</label>
            <div class="input-group">
              <textarea  maxlength="200" name="category-tags" class="form-control"></textarea>
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
    <div class="modal-content modal-content-edit-category">
    </div>
  </div>
</div>