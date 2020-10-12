
<section class="section">
  <div class="section-body">
<div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Danh sách đặt lịch đăng tự động</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
                <thead>
                  <tr>
                    <th>Tiêu đề</th>
                    <th>Mã bài viết</th>
                    <th>Ngày viết</th>
                    <th>Lịch đăng</th>
                    <th>TT</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  if(isset($item)&&!empty($item)){
                    $t_now = date('Y-m-d H:00:00',time());
                    foreach($item as $v){
                      echo '<tr id="tr-'.$v['code'].'">
                              <td title="'.$v['title'].'" ><a href="'.$base_url['web'].'/'.$v['title_url'].'-'.$v['code'].'.html" target="_bank">'.str_trimText($v['title'],50).'</a></td>
                              <td>'.$v['code'].'</td>
                              <td>'.$v['date_create'].'</td>
                              <td id="td-'.$v['code'].'">'.str_settime_date($v['date_settime'],$t_now).'</td>
                              <td><a data-code="'.$v['code'].'" href="#" class="btn btn-sm btn-success blog-up"><i class="fas fa-arrow-circle-up"></i> Up</a> <a data-code="'.$v['code'].'" href="#" onClick="openModalEditUp(\''.$v['date_settime'].'='.$v['code'].'\')" class="btn btn-sm btn-warning blog-up-edit"><i class="fas fa-calendar-alt"></i> Edit Up</a> <a href="'.$base_url['web'].'/adw-blog/edit?code='.$v['code'].'" class="btn btn-sm btn-primary">Edit</a> <a data-code="'.$v['code'].'" href="#" class="btn btn-sm btn-danger blog-del">Del</a></td>
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

