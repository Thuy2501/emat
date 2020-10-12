<section class="section">
	<div class="section-body">
		<div class="row">
			<div class="col-12 col-md-2 col-lg-2"></div>
			<div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                  	<form id="form-submit-content" method="post" enctype="multipart/form-data" onsubmit="sys_preLoadSubmit()" >
                   		<div class="card-body">
                   			<div class="form-group">
		                      <label class="my-lable">URL <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      <input required name="site-titleurl" type="text" class="form-control form-control-sm" value="<?=isset($_data['title_url']) ? $_data['title_url'] : '' ?>">
		                    </div>
                   			<div class="form-group">
		                      <label class="my-lable">Tiêu đề <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      <input required name="site-title" type="text" class="form-control form-control-sm" value="<?=isset($_data['title']) ? $_data['title'] : '' ?>" >
		                    </div>
		                    
		                    <div class="form-group">
		                      <label class="my-lable">Mô tả <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      <textarea required maxlength="200" name="site-description" class="form-control"><?=isset($_data['description']) ? $_data['description'] : '' ?></textarea>
		                    </div>
		                    <div class="form-group">
		                      <label class="my-lable">Thẻ tags <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      <input required name="site-tags" type="text" class="form-control inputtags" value="<?=isset($_data['tags']) ? $_data['tags'] : '' ?>">
		                    </div>
		                    <div class="form-group">
		                      <label class="my-lable">Keywords <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      <input required name="site-keywords" type="text" class="form-control inputtags" value="<?=isset($_data['keywords']) ? $_data['keywords'] : '' ?>">
		                    </div>
		                    <div class="form-row">
		                    	<div class="form-group col-md-8">
		                    		<label for="inputState">Loại site <span class="text-danger" title="Bắt buộc" >*</span></label>
									<select  name="site-type" class="form-control">
										<option value="1">Dịch Vụ</option>
										<option value="2">Tuyển Dụng</option>
									</select>
		                    	</div>
								<div class="form-group col-md-4">
									<label for="inputState">Ngôn ngữ <span class="text-danger" title="Bắt buộc" >*</span></label>
									<select name="site-language" class="form-control">
									  <?php 
									  if(isset($language)&&!empty($language)){
									  	foreach($language as $v){
									  		echo '<option '.(isset($_data['language'])&&$_data['language']==$v['code'] ? 'selected' : '' ).' value="'.$v['code'].'">'.$v['name'].'</option>';
									  	}
									  }
									  ?>
									</select>
								</div>
		                    </div>

							

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
	                      <button type="submit" name="site-btn" class="btn btn-primary" value="<?=time()?>" ><i class="fa fa-save"></i> Đăng bài</button>
	                    </div>

                   </form>
                </div>
            </div>
			<div class="col-12 col-md-2 col-lg-2"></div>
		</div>
	</div>
</section>            	