
<section class="section">
  <div class="section-body">
<div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Danh sách Site</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                <thead>
                  <tr>
                    <th>Url</th>
                    <th>Tiêu đề</th>
                    <th>Loại trang</th>
                    <th>Ngôn ngữ</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>TT</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  if(isset($item)&&!empty($item)){
                    foreach($item as $v){
                      echo '<tr id="tr-'.$v['code'].'">
                              <td><a target="_blank" href="'.$base_url['web'].'/'.$v['title_url'].'">'.$v['title_url'].'</a></td>
                              <td title="'.$v['title'].'" >'.str_trimText($v['title'],50).'</td>
                              <td>'.str_SiteType($v['site_type']).'</td>
                              <td>'.$v['language'].'</td>
                              <td>'.$v['date_create'].'</td>
                              <td>'.str_blog_active($v['active']).'</td>
                              <td><a href="'.$base_url['web'].'/adw-site/edit?code='.$v['title_url'].'" class="btn btn-sm btn-primary">Edit</a> <a data-code="'.$v['code'].'" href="#" class="btn btn-sm btn-danger blog-del">Del</a></td>
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