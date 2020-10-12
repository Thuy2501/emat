<section class="section">
	<div class="section-body">
		<div class="row">
			<div class="col-12 col-md-2 col-lg-2"></div>
			<div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                  	<form id="form-submit-content" method="post">
                   		<div class="card-body">
                   			<div class="form-group">
		                      <label class="my-lable">URL <span class="text-danger" title="Bắt buộc" >*</span></label>
		                      <input required name="site-titleurl" type="text" class="form-control form-control-sm" value="<?=isset($_data['title_url']) ? $_data['title_url'] : '' ?>">
		                      <input type="hidden" name="site-id" id="site-id" value="<?=isset($_data['id']) ? $_data['id'] : '' ?>">
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
										<option <?=(isset($_data['site_type'])&&$_data['site_type']==1 ? 'selected' : '' )?> value="1">Dịch Vụ</option>
										<option <?=(isset($_data['site_type'])&&$_data['site_type']==2 ? 'selected' : '' )?> value="2">Tuyển Dụng</option>
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
		                    <div class="card-footer text-center">
		                      <button type="submit" name="site-btn" class="btn btn-primary form-control" value="<?=time()?>" ><i class="fa fa-save"></i> Lưu</button>
		                    </div>
		                    <hr>
                   		</div>
		                   	

	                    

                   </form>

               		<div class="card-body">
	                    <div class="form-group">
	                      <label class="my-lable">Nội dung</label>
		                      <div id="site-content">
		                      	<?php 
		                      	if(isset($_content)&&!empty($_content)){
		                      		foreach($_content as $v){
		                      			echo '<div id="site-content-'.$v["id"].'" class="form-row" style="border:1px solid red;padding:3px;">
					                      		<div class="form-group col-md-9">
					                      			<input id="site-content-listname-'.$v["id"].'" required name="site-listname" type="text" placeholder="Tên mục lục" class="form-control form-control-sm" value="'.$v["list_name"].'">
					                      		</div>
					                      		<div class="form-group col-md-1">
					                      			<input id="site-content-position-'.$v["id"].'" required minlength="1" maxlength="99" step="1" name="site-listposition" type="number" placeholder="STT" class="form-control form-control-sm" value="'.$v["position"].'">
					                      		</div>
					                      		<div class="form-group col-md-1">
					                      			<button onClick="saveSiteContent('.$v["id"].')" type="submit" class="btn btn-info form-control-sm">Save</button>
					                      		</div>
					                      		<div class="form-group col-md-1">
					                      			<button onClick="removeSiteContent('.$v["id"].')" type="button" class="btn btn-danger form-control-sm">Del</button>
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