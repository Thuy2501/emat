<section class="section">
	<div class="section-body">
		<div class="row">
			<div class="col-12 col-md-2 col-lg-2"></div>
			<div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                  	<form id="form-submit-content" method="post" enctype="multipart/form-data" onsubmit="sys_preLoadSubmit()" >
                   		<div class="card-body">
                   			<div class="form-group">
		                      <label class="my-lable">Tiêu đề <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      <input required name="blog-title" type="text" class="form-control form-control-sm" value="<?=isset($_data['title']) ? $_data['title'] : '' ?>" >
		                    </div>
		                    <div class="form-group">
		                      <label class="my-lable">Tiêu đề URL <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      <input required name="blog-title-url" type="text" class="form-control form-control-sm" value="<?=isset($_data['title_url']) ? $_data['title_url'] : '' ?>">
		                    </div>
		                    <div class="form-group">
		                      <label class="my-lable">Mô tả <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      <textarea required maxlength="200" name="blog-description" class="form-control"><?=isset($_data['description']) ? $_data['description'] : '' ?></textarea>
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
		                    
		                    <div class="form-row">
		                      <div class="form-group col-md-6">
		                        <label class="my-lable">Tên ảnh <small>(không dấu, không khoảng trắng)</small> <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      	<input  name="blog-avatar-name" type="text" class="form-control form-control-sm" value="<?=isset($_data['avatar']) ? $_data['avatar'] : '' ?>">
		                      </div>
		                      <div class="form-group col-md-6">
		                        <label class="my-lable">Tên mô tả ảnh <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      	<input  name="blog-avatar-alt" type="text" class="form-control form-control-sm" value="<?=isset($_data['avatar_alt']) ? $_data['avatar_alt'] : '' ?>">
		                      </div>
		                    </div>
		                    <div class="form-group">
		                      <label class="my-lable">File Ảnh mô tả <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      <input  name="blog-avatar" type="file" class="form-control">
		                    </div>

		                    

							<div class="form-group">
								<label for="inputState">Danh mục <span class="text-danger" title="Bắt buộc" >*</span></label>
								<select required name="blog-category" class="form-control">
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
		                      <div class="form-group col-md-4">
		                        <label for="inputCity">Tác giả <span class="text-danger" title="Bắt buộc" >*</span></label>
		                        <input  name="blog-author" type="text" class="form-control" value="<?=isset($_data['author']) ? $_data['author'] : 'Cooftech' ?>">
		                      </div>
		                      <div class="form-group col-md-4">
		                        <label for="inputState">Ngày viết <span class="text-danger" title="Bắt buộc" >*</span></label>
		                        <input  name="blog-date" type="text" class="form-control datepicker" value="<?=isset($_data['date_create']) ? $_data['date_create'] : date('Y-m-d H:i:s',time()) ?>">
		                      </div>
		                      <div class="form-group col-md-4">
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

							

		                    <!-- <div class="form-group">
		                      <label class="my-lable">Nội dung <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      <textarea  class="blog-content" name="blog-content" ><?=isset($_content['content']) ? $_content['content'] : '' ?></textarea>
		                    </div> -->
		                    <div class="form-group">
		                      <label class="my-lable">Nội dung <span class="text-danger" title="Bắt buộc" >*</span></label>
			                      <div id="site-content">
			                      	<div class="form-row" style="border:1px solid red;padding:3px;">
			                      		<div class="form-group col-md-10">
			                      			<input required name="site-listname" type="text" placeholder="Tên mục lục" class="form-control form-control-sm">
			                      		</div>
			                      		<div class="form-group col-md-1">
			                      			<input required minlength="1" maxlength="99" step="1" name="site-listposition" type="number" placeholder="STT" class="form-control form-control-sm" value="1">
			                      		</div>
			                      		<div class="form-group col-md-1">
			                      			<button disabled type="button" class="btn btn-danger form-control-sm">Xóa</button>
			                      		</div>
			                      		<div class="form-group col-md-12">
			                      			<textarea required class="site-content" name="site-content" ></textarea>
			                      		</div>
			                  		</div>
			                      </div>
		                      
		                    </div>
		                    <div class="form-group">
		                      <button onClick="appendSiteContent()" type="button" class="btn btn-info" ><i class="fa fa-plus"></i> Thêm block nội dung</button>
		                    </div>
		                    
                   		</div>
		                   	

	                    <div class="card-footer text-right">
	                      <button type="submit" name="blog-btn" class="btn btn-primary" value="<?=time()?>" >Đăng bài</button>
	                    </div>

                   </form>
                </div>
            </div>
			<div class="col-12 col-md-2 col-lg-2"></div>
		</div>
	</div>
</section>            	