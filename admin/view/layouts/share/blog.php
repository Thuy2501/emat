
<section class="section">
  <div class="section-body">
<div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Danh sách</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                <thead>
                  <tr>
                    <th>Link share</th>
                    <th>Website</th>
                    <th>Traffic</th>
                    <th>Total</th>
                    <th>Date traffic</th>
                    <th>Date create</th>
                    <th>TT</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  if(isset($item)&&!empty($item)){
                    foreach($item as $v){
                      echo '<tr id="tr-'.$v['code'].'">
                              <td><a target="_blank" href="'.$base_url['web'].'/'.$v['title_url'].'-'.$v['blog_code'].'.html?s='.$v['code'].'">'.str_trimText($v['title'],50).'</a></td>
                              <td><a target="_blank" href="'.$v['domain'].'">'.$v['domain'].'</a></td>
                              <td>'.$v['traffic'].'</td>
                              <td>'.$v['is_views'].'</td>
                              <td>'.$v['date_traffic'].'</td>
                              <td>'.$v['date_create'].'</td>
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