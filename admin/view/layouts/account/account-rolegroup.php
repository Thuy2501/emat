
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
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                <thead>
                  <tr>
                    <th>Đối tượng</th>
                    <th>Role</th>
                    <th>Active</th>
                    <th>TT</th>
                  </tr>
                </thead>
                <tbody id="table-body">
                  <?php 
                  if(isset($roles)&&!empty($roles)){ //echo $roles;
                    foreach($roles as $v){
                      echo '<tr id="tr-'.$v['id'].'">
                              <td title="'.$v['name'].'" >'.str_trimText($v['name'],50).'</td>
                              <td>'.func_html_roleaccount($v['action'],$class,$action).'</td>
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

<div class="modal fade bd-example-modal-lg" id="modal-myload" tabindex="-1" role="dialog" aria-labelledby="formModal"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="modal-myload-content">
    </div>
  </div>
</div>