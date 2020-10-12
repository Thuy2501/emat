
<section class="section">
  <div class="section-body">
<div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Danh sách bài viết</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                <thead>
                  <tr>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Ngày viết</th>
                    <th>Trạng thái</th>
                    <th>TT</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  if(isset($item)&&!empty($item)){
                    foreach($item as $v){
                      echo '<tr id="tr-'.$v['code'].'">
                              <td title="'.$v['title'].'" ><a target="_blank" href="#">'.str_trimText($v['title'],50).'</a></td>
                              <td>'.$v['cat_name'].'</td>
                              <td>'.$v['date_create'].'</td>
                              <td>'.str_blog_active($v['active']).'</td>
                              <td><a href="'.$base_url['web'].'/adw-blog/edit?code='.$v['code'].'" class="btn btn-sm btn-primary">Edit</a> <a data-code="'.$v['code'].'" href="#" class="btn btn-sm btn-danger blog-del">Del</a></td>
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