<section class="section">
	<div class="section-body">
		<div class="row">
			<div class="col-12 col-md-2 col-lg-2"></div>
			<div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                	<div class="card-body">
                		
	                   <form id="form-avatar-edit" enctype="multipart/form-data">
	                   	<div class="form-row">
	                      <div class="col-md-4" id="blog-avatar-view">
		                      <img style="width:100%;" src="<?=$base_url['img']?>/upload/blogs/<?=$_data['avatar']?>">
		                   </div>
		                   <div class="form-row col-md-8">
								<div class="form-group col-md-6">
									<div class="form-group">
								  		<label class="my-lable">Tên ảnh <span class="text-danger" title="Bắt buộc" >(không đổi)</span></label>
								  		<input required readonly id="blog-avatar" name="blog-avatar" type="text" class="form-control form-control-sm" value="<?=$_data['avatar']?>" >
								  		<input type="hidden" id="blog-code" name="blog-code" value="<?=(isset($_GET['code']) ? (int)$_GET['code'] : '' )?>">
									</div>
								</div>
								<div class="form-group col-md-6">
									<div class="form-group">
								  		<label class="my-lable">Tên mô tả <span class="text-danger" title="Bắt buộc" >*</span></label>
								  		<input required id="blog-avatar_alt" name="blog-avatar_alt" type="text" class="form-control form-control-sm" value="<?=isset($_data['avatar_alt']) ? $_data['avatar_alt'] : '' ?>" >
									</div>
								</div>
								<div class="form-group col-md-12">
									<input id="blog-file" name="blog-file" type="file">
								</div>
								<div class="form-group col-md-12">
									<button type="submit" name="blog-btn-avatar" class="btn btn-primary" value="<?=time()?>" >Thay đổi</button>
									<input type="hidden" name="blog-id" id="blog-id" value="<?=isset($_data['id']) ? $_data['id'] : '' ?>">
								</div>
		                   </div>
	                    </div>
	                   </form>
                	</div>
                	<hr>
                	
                  	<form id="form-submit-content" method="post" enctype="multipart/form-data" onsubmit="sys_preLoadSubmit()" >
                  		<input id="blog-avatar2" type="hidden" value="<?=$_data['avatar']?>" name="blog-avatar">
                  		<input id="blog-avatar_alt2" type="hidden" value="<?=$_data['avatar_alt']?>" name="blog-avatar_alt">
                   		<div class="card-body">
                   			<div class="form-group">
		                      <label class="my-lable">Tiêu đề <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      <input  name="blog-title" type="text" class="form-control form-control-sm" value="<?=isset($_data['title']) ? $_data['title'] : '' ?>" >
		                    </div>
		                    <div class="form-group">
		                      <label class="my-lable">Tiêu đề URL <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      <input  name="blog-title-url" type="text" class="form-control form-control-sm" value="<?=isset($_data['title_url']) ? $_data['title_url'] : '' ?>">
		                    </div>
		                    <div class="form-group">
		                      <label class="my-lable">Mô tả <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      <textarea  maxlength="200" name="blog-description" class="form-control"><?=isset($_data['description']) ? $_data['description'] : '' ?></textarea>
		                    </div>
		                    <div class="form-group">
		                      <label class="my-lable">Thẻ tags <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      <input  name="blog-tags" type="text" class="form-control inputtags" value="<?=isset($_data['tags']) ? $_data['tags'] : '' ?>">
		                    </div>
		                    <div class="form-group">
		                      <label class="my-lable">Keywords <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      <input  name="blog-keywords" type="text" class="form-control inputtags" value="<?=isset($_data['keywords']) ? $_data['keywords'] : '' ?>">
		                    </div>
		                    <div class="form-group">
		                      <label class="my-lable">ID Video Youtube</label>
		                      <input maxlength="20" name="blog-video" type="text" class="form-control form-control-sm" value="<?=isset($_data['video']) ? $_data['video'] : '' ?>">
		                    </div>
		                    

		                    

							<div class="form-group">
								<label for="inputState">Danh mục <span class="text-danger" title="Bắt buộc" >*</span></label>
								<select  name="blog-category" class="form-control">
									<option value="">Chọn danh mục</option>
								  <?php 
		                          if(isset($blog_category)&&!empty($blog_category)){
		                          	foreach($blog_category as $v){
		                          		echo '<option '.(isset($_data['cat_id'])&&$_data['cat_id']==$v['id'] ? 'selected' : '' ).' value="'.$v['id'].'">'.$v['name'].'</option>';
		                          	}
		                          }
		                          ?>
								</select>
							</div>

		                    <div class="form-row">
		                      <div class="form-group col-md-6">
		                        <label for="inputCity">Tác giả <span class="text-danger" title="Bắt buộc" >*</span></label>
		                        <input  name="blog-author" type="text" class="form-control" value="<?=isset($_data['author']) ? $_data['author'] : 'appwe.vn' ?>">
		                      </div>
		                      <!-- <div class="form-group col-md-4">
		                        <label for="inputState">Ngày viết <span class="text-danger" title="Bắt buộc" >*</span></label>
		                        <input type="text" class="form-control datetimepicker" value="?=isset($_data['date_create']) ? $_data['date_create'] : '' ?>">
		                      </div> -->
		                      <div class="form-group col-md-6">
		                        <label for="inputState">Lượt xem</label>
		                        <input name="blog-views" type="number" class="form-control" value="<?=isset($_data['views']) ? $_data['views'] : 0 ?>">
		                      </div>
		                    </div>
		                    <div class="form-row">
		                      <div class="form-group col-md-4">
		                        <label for="inputState">Loại tin <span class="text-danger" title="Bắt buộc" >*</span></label>
		                        <select name="blog-type" class="form-control">
		                          <?php 
		                          if(isset($blog_type)&&!empty($blog_type)){
		                          	foreach($blog_type as $v){
		                          		echo '<option '.(isset($_data['cat_id'])&&$_data['cat_id']==$v['id'] ? 'selected' : '' ).' value="'.$v['id'].'">'.$v['name'].'</option>';
		                          	}
		                          }
		                          ?>
		                        </select>
		                      </div>
		                      <div class="form-group col-md-4">
		                        <label for="inputState">Ngôn ngữ <span class="text-danger" title="Bắt buộc" >*</span></label>
		                        <select name="blog-language" class="form-control">
		                          <?php 
		                          if(isset($language)&&!empty($language)){
		                          	foreach($language as $v){
		                          		echo '<option '.(isset($_data['language'])&&$_data['language']==$v['id'] ? 'selected' : '' ).' value="'.$v['id'].'">'.$v['name'].'</option>';
		                          	}
		                          }
		                          ?>
		                        </select>
		                      </div>
		                      <div class="form-group col-md-4">
		                        <label for="inputState">Ghim Top <span class="text-danger" title="Bắt buộc" >*</span></label>
		                        <select name="blog-stick" class="form-control">
		                          <option  value="0" >Tin thường</option>
		                          <option <?=isset($_data['stick'])&&$_data['stick']==1 ? 'selected' : '' ?> value="1">Tin hot</option>
		                          <option <?=isset($_data['stick'])&&$_data['stick']==2 ? 'selected' : '' ?> value="2">Tin chính</option>
		                        </select>
		                      </div>
		                    </div>
							<div class="text-center">
		                      <button type="submit" name="blog-btn" class="btn btn-primary form-control" value="<?=time()?>" ><i class="fa fa-save"></i> Lưu thay đổi</button>
		                    </div>
		                    <hr>
                   		</div>
                   	</form>
           			<div class="card-body">
	                    <div class="form-group">
	                      <label class="my-lable">Nội dung bài viết</label>
		                      <div id="site-content">
		                      	<?php 
		                      	if(isset($_data['content'])&&!empty($_data['content'])){
		                      		foreach($_data['content'] as $v){
		                      			echo '<div id="site-content-'.$v["id"].'" class="form-row" style="border:1px solid red;padding:3px;">
					                      		<div class="form-group col-md-7">
					                      			<input id="site-content-listname-'.$v["id"].'" required name="site-listname" type="text" placeholder="Tên mục lục" class="form-control " value="'.$v["title_content"].'">
					                      		</div>
					                      		<div class="form-group col-md-1">
					                      			<input id="site-content-position-'.$v["id"].'" required minlength="1" maxlength="99" step="1" name="site-listposition" type="number" placeholder="STT" class="form-control " value="'.$v["position"].'">
					                      		</div>
												<div class="input-group colorpickerinput col-md-3">
													<input id="site-content-color-'.$v["id"].'" readonly type="text" class="form-control" value="'.$v["title_color"].'">
													<div class="input-group-append">
													<div class="input-group-text ">
														<i class="fas fa-fill-drip"></i>
													</div>
													</div>
												</div>
					                      		<div class="form-group col-md-1 text-right">
						                      		<i title="Save" onClick="saveSiteContent('.$v["id"].')" class="fas fa-save text-info"></i>
						                      		<i title="Remove" onClick="removeSiteContent('.$v["id"].')" class="far fa-times-circle text-danger"></i>
					                      		</div>
					                      		<div class="form-group col-md-12">
					                      			<textarea id="site-content-text-'.$v["id"].'" required class="site-content" name="site-content" >'.$v["content"].'</textarea>
					                      		</div>
					                  		</div>';
		                      		}
		                      	}
		                      	?>  	
		                      </div>
	                    </div>
	                    <div class="form-group">
	                      <button onClick="appendSiteContent()" type="button" class="btn btn-info" ><i class="fa fa-plus"></i> Thêm block nội dung</button>
	                    </div>
               		</div>
                   
                </div>
            </div>
			<div class="col-12 col-md-2 col-lg-2"></div>
		</div>
	</div>
</section>            	